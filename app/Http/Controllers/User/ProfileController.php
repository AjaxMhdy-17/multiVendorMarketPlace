<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\Profile\ProfileUpdateRequest;
use App\Models\User;
use App\Services\NotificationService;
use App\Traits\HandlesImageUploads;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{

    use HandlesImageUploads;


    public function store(Request $request)
    {
        $data  = $request->validate([
            'current-password' => ['required', 'string', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $user = User::findOrFail(Auth::guard('web')->user()->id);
        if (!Hash::check($data['current-password'], $user->password)) {
            NotificationService::ERROR("Please Enter Current Password Carefully!");
            return back();
        }
        $user->password = bcrypt($data['password']);
        $user->save();
        NotificationService::UPDATED();
        return back();
    }


    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.panel.profile.index', ['user' => $user]);
    }

    public function update(ProfileUpdateRequest $request, string $id)
    {
        $data = $request->validated();

        $user = User::findOrFail($id);

        if ($request->hasFile('avatar')) {
            $this->deleteImage($user->avatar);
            $imagePath = $this->uploadImage($request->file('avatar'), 'uploads/images/profile', 300, 300);
            $data['avatar'] = $imagePath;
        } else {
            unset($data['avatar']);
        }

        $user->update($data);

        NotificationService::UPDATED();

        return back();
    }


    // public function destroy(string $id)
    // {
    //     //
    // }
}
