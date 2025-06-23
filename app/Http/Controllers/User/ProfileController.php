<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\HandlesImageUploads;
use Illuminate\Http\Request;

use Intervention\Image\ImageManager;
use Intervention\Image\Drivers\Gd\Driver;

class ProfileController extends Controller
{

    use HandlesImageUploads;

    public function edit(string $id)
    {
        $user = User::findOrFail($id);
        return view('user.panel.profile.index', ['user' => $user]);
    }

    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'avatar' => 'sometimes|file|image|mimes:jpeg,png,jpg|max:2048',
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'level_id' => 'sometimes',
            'balance' => 'sometimes',
            'user_type' => 'sometimes',
            'country' => 'sometimes',
            'city' => 'sometimes',
            'address' => 'sometimes',
            'kyc_status' => 'sometimes',
            'total_sales' => 'sometimes',
            'withdraw_method_id' => 'sometimes',
        ]);
        if ($request->hasFile('avatar')) {
            $imagePath = $this->uploadImage($request->file('avatar'), 'uploads/images/profile', 300, 300);
            $data['avatar'] = $imagePath;
        } else {
            unset($data['avatar']);
        }
        $user = User::findOrFail($id);
        $user->update($data);
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
