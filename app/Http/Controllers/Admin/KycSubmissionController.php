<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycSetting;
use App\Models\KycVerification;
use App\Models\User;
use App\Services\NotificationService;
use App\Traits\HandlesImageUploads;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class KycSubmissionController extends Controller
{

    use HandlesImageUploads;

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        if ($request->ajax()) {
            $users = User::select(['id', 'name', 'email', 'avatar', 'created_at'])->orderBy('created_at', 'desc');
            return DataTables::eloquent($users)
                ->addColumn('checkbox', function ($user) {
                    return '<input type="checkbox" class="row-checkbox" value="' . $user->id . '">';
                })
                ->addIndexColumn()
                ->addColumn('photo', function ($user) {
                    $imageUrl = isset($user->avatar) ? asset($user->avatar) : null;
                    return '<img src="' . $imageUrl . '" alt="Photo" width="50" height="50">';
                })
                ->addColumn('created_at', function ($user) {
                    return Carbon::parse($user->created_at)->format('Y-m-d');
                })
                // ->addColumn('status', function ($product) {
                //     return $product->status == 1 ? "<span class='badge badge-primary'>Active</span>" : " <span class='badge badge-danger'>In Active</span>";
                // })
                ->addColumn('action', function ($user) {
                    $editUrl = route('admin.kyc.submission.edit', ['submission' => $user->id]);
                    $deleteUrl = route('admin.kyc.submission.destroy', ['submission' => $user->id]);
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
                                    <a class="dropdown-item" href="' . $editUrl . '">Edit</a>
                                    <a href="#" class="dropdown-item show-alert-delete-box" data-form-id="delete-form-' . $user->id . '">
                                        Delete
                                    </a>
                                    <form id="delete-form-' . $user->id . '" class="delete-form d-none" method="POST" action="' . $deleteUrl . '">
                                        ' . csrf_field() . method_field('DELETE') . '
                                    </form>
                                </div>
                            </div>
                        </div>';
                })
                ->rawColumns(['action', 'status', 'photo', 'checkbox'])
                ->make(true);
        }

        $data['title'] = "Kyc Submissions";
        $data['kycVerifications'] = User::all();
        return view('admin.kyc.submission.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        dd($id);
    }


    public function bulkDelete(Request $request)
    {

        $idsString = $request->input('ids');
        $ids = array_filter(explode(',', $idsString));
        if (empty($ids)) {
            return redirect()->back()->with('error', 'No items selected for deletion.');
        }
        $users = User::whereIn('id', $ids)->get();
        foreach ($users as $user) {
            $this->deleteImage($user->photo);
        }
        User::whereIn('id', $ids)->delete();

        // NotificationService::DELETED("Selected User Deleted!");


        return redirect()->route('admin.kyc.submission.index');
    }
}
