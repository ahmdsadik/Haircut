<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Http\Requests\Settings\StoreSettingRequest;
use App\Http\Requests\Settings\UpdateSettingRequest;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $settings = Setting::all();

        return view('dashboard.settings.index', compact('settings'));
    }

    public function create()
    {
        return view('dashboard.settings.create');
    }

    public function store(StoreSettingRequest $request)
    {
        $setting = Setting::create($request->validated());

        if ($request->hasFile('image')) {
            $setting->addMediaFromRequest('image')->toMediaCollection($setting->key);
        }

        return to_route('dashboard.settings.index');
    }

    public function edit(Setting $setting)
    {
        $setting->load('media');
        return view('dashboard.settings.edit',compact('setting'));
    }

    public function update(UpdateSettingRequest $request, Setting $setting)
    {
        $setting->update($request->validated());

        if ($request->hasFile('image')) {
            $setting->addMediaFromRequest('image')->toMediaCollection($setting->key);
        }

        return to_route('dashboard.settings.index');
    }

    public function destroy(Setting $setting)
    {
        $setting->delete();

        return to_route('dashboard.settings.index');

    }
}
