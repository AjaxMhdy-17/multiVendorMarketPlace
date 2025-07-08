<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\KycSetting;
use App\Models\Setting;
use App\Services\NotificationService;
use App\Services\SettingService;
use Illuminate\Http\Request;

class SettingController extends Controller
{



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data['title'] = "Settings";
        return view('admin.kyc.setting.index', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->validate([
            'site_name' => 'required|string|max:255',
            'site_email' => 'required|email|max:255'
        ]);

        foreach ($data as $key => $value) {
            Setting::updateOrCreate(
                ['key' => $key],
                ['value' => $value]
            );
        }

        $setting = app()->make(SettingService::class);
        $setting->clearCachedSetting();

        NotificationService::UPDATED("Setting Updated");
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
