<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        return $request->all();
    }

    public function show(Setting $setting)
    {
    }

    public function edit(Setting $setting)
    {
    }

    public function update(Request $request, Setting $setting)
    {
    }

    public function destroy(Setting $setting)
    {
    }
}
