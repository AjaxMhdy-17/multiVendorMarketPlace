<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycVerification;
use App\Services\MailSenderService;
use App\Services\NotificationService;
use App\Traits\HandlesImageUploads;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KycSubmissionController extends Controller
{
    use HandlesImageUploads;
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $kycs = KycVerification::with(['user:id,name'])->select(['id', 'user_id', 'document_type', 'document_number', 'status', 'created_at'])->orderBy('created_at', 'desc');
            return DataTables::eloquent($kycs)
                ->addColumn('checkbox', function ($kyc) {
                    return '<input type="checkbox" class="row-checkbox" value="' . $kyc->id . '">';
                })
                ->addIndexColumn()
                ->addColumn('name', function ($kyc) {
                    return $kyc->user->name;
                })
                ->editColumn('status', function ($kyc) {
                    if ($kyc->status == 'pending') {
                        return '<td><span class="badge bg-warning me-1"></span>' . $kyc->status . '</td>';
                    } else if ($kyc->status == 'approved') {
                        return '<td><span class="badge bg-success me-1"></span>' . $kyc->status . '</td>';
                    } else if ($kyc->status == 'rejected') {
                        return '<td><span class="badge bg-danger me-1"></span>' . $kyc->status . '</td>';
                    }
                })
                ->editColumn('created_at', function ($kyc) {
                    return Carbon::parse($kyc->created_at)->format('Y-m-d');
                })
                // ->filterColumn('document_number', function ($query, $keyword) {
                //     $query->where('kyc_verifications.document_number', 'like', "%{$keyword}%");
                // })
                ->editColumn('document_number', function ($kyc) {
                    return  $kyc->document_number;
                })
                ->addColumn('action', function ($kyc) {
                    $editUrl = route('admin.kyc.submission.show', ['submission' => $kyc->id]);
                    $deleteUrl = route('admin.kyc.submission.destroy', ['submission' => $kyc->id]);
                    return '
                        <div class="btn-list flex-nowrap">
                            <div class="dropdown">
                                <button class="btn dropdown-toggle align-text-top"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                        height="24" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        class="icon icon-tabler icons-tabler-outline icon-tabler-arrows-random">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M20 21h-4v-4" />
                                        <path d="M16 21l5 -5" />
                                        <path d="M6.5 9.504l-3.5 -2l2 -3.504" />
                                        <path d="M3 7.504l6.83 -1.87" />
                                        <path d="M4 16l4 -1l1 4" />
                                        <path d="M8 15l-3.5 6" />
                                        <path d="M21 5l-.5 4l-4 -.5" />
                                        <path d="M20.5 9l-4.5 -5.5" />
                                    </svg>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end">
                                    <a class="dropdown-item" href="' . $editUrl . '">View</a>
                                    <a href="#" class="dropdown-item show-alert-delete-box" data-form-id="delete-form-' . $kyc->id . '">Delete</a>
                                    <form id="delete-form-' . $kyc->id . '" method="POST" action="' . $deleteUrl . '" class="d-none">
                                        ' . csrf_field() . method_field('DELETE') . '
                                    </form>
                                </div>
                            </div>
                        </div>';
                })
                ->rawColumns(['name', 'action', 'status', 'checkbox'])
                ->make(true);
        }
        $data['title'] = "Kyc Submissions";
        $data['kycVerifications'] = KycVerification::orderBy('created_at', 'desc')->get();
        return view('admin.kycManagement.submission.index', $data);
    }

    public function show(string $id)
    {
        $data['title'] = "Kyc Detail";
        $data['kyc'] = KycVerification::with('user')->findOrFail($id);
        preg_match_all('/::(uploads\/[^:]+)/',  $data['kyc']->documents, $matches);
        $data['photos'] = $matches[1];
        return view('admin.kycManagement.submission.detail', $data);
    }

    public function update(Request $request, string $id)
    {
        $kyc = KycVerification::with('user')->findOrFail($id);
        if ($request->has('approve')) {
            $kyc->status = 'approved';
            $kyc->user->update([
                'kyc_status' => 1,
                'user_type' => 'author'
            ]);
            MailSenderService::sendMail(
                name: $kyc->user->name,
                mailSubject: "Your Kyc Request Has Been Approved",
                content: "Kyc Approved",
                toMail: $kyc->user->email
            );
        } else if ($request->has('reject')) {
            $kyc->status = 'rejected';
            $kyc->user->update([
                'kyc_status' => 0,
                'user_type' => 'user'
            ]);
            MailSenderService::sendMail(
                name: $kyc->user->name,
                mailSubject: "Your Kyc Request Has Been Rejected",
                content: "Kyc Rejected",
                toMail: $kyc->user->email
            );
        }
        $kyc->save();
        NotificationService::UPDATED('KYC Status Updated!');
        return back();
    }


    public function destroy(string $id)
    {
        $user = KycVerification::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.kyc.submission.index');
    }


    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return redirect()->back()->with('error', 'No items selected for deletion.');
        }
        $kycs = KycVerification::whereIn('id', $ids)->get();
        foreach ($kycs as $kyc) {
            $this->deleteImage($kyc->photo);
            $kyc->delete();
        }
        return redirect()->route('admin.kyc.submission.index');
    }
}
