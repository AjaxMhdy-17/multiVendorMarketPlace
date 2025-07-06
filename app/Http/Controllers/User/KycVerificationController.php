<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\KycSetting;
use App\Models\KycVerification;
use App\Services\NotificationService;
use App\Traits\HandlesImageUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KycVerificationController extends Controller
{
    use HandlesImageUploads;

    public function index()
    {
        $data['kycSetting'] = KycSetting::first();
        return view('user.pages.kyc.index', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'document_type' => 'required|string|in:nid,passport',
            'document_number' => 'required|string|max:40',
            'documents' => 'required|array',
            'documents.*' => 'required|file|mimes:jpeg,png,jpg,pdf|max:5000',
        ]);
        $user_id = Auth::guard('web')->user()->id;
        $kyc = new KycVerification();
        $kyc->user_id = $user_id;
        $kyc->document_type = $data['document_type'];
        $kyc->document_number = $data['document_number'];
        foreach ($data['documents'] as $doc) {
            $path = $this->uploadImage($doc, 'uploads/user/kyc', 800, 800);
            $kyc->documents = $kyc->documents . '::' . $path;
        }
        $kyc->save();
        NotificationService::CREATED('Kyc Documents Has Been Uploaded!');
        return redirect()->route('profile.user.edit', ['user' => $user_id]);
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
        //
    }
}
