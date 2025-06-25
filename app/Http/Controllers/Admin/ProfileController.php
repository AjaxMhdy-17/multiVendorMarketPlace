<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Services\NotificationService;
use App\Traits\HandlesImageUploads;
use Illuminate\Http\Request;

class ProfileController extends Controller
{

    use HandlesImageUploads;

    public function store(Request $request)
    {
        //
    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $title = "Admin Profile";
        return view('admin.profile.index', ['title' => $title]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'avatar' => 'sometimes'
        ]);

        $profile = Admin::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $this->deleteImage($profile->avatar);
            $imagePath = $this->uploadImage($request->file('avatar'), 'uploads/admin/images/profile', 300, 300);
            $data['avatar'] = $imagePath;
        } else {
            unset($data['avatar']);
        }

        $profile->update($data);
        NotificationService::UPDATED("Admin Profile Updated Successfully!");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
