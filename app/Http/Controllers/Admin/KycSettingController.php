<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycSetting;
use App\Services\NotificationService;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class KycSettingController extends Controller
{
    public function index(Request $request)
    {
        $data['title'] = "Kyc Setting";
        $data['kycSetting'] = KycSetting::first();
        return view('admin.kyc.setting.index', $data);
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nid_verification' => "sometimes|boolean",
            'passport_verification' => "sometimes|boolean",
            'auto_approve' => "sometimes|boolean",
            'instructions' => "nullable|string",
            'status' => "sometimes|boolean",
        ]);
        KycSetting::updateOrCreate(
            ['id' => 1],
            $data
        );

        NotificationService::UPDATED("Kyc Settings Successfully!");
        return back();
        // return redirect()->route('admin.roles.user.index');
    }

    public function destroy(string $id)
    {
        //
    }
}
