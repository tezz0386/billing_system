<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingRequest;
use App\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $setting = Setting::first();

        if (!$setting) {
            $setting = new Setting();
        }

        return view('bill.setting', compact('setting'));
    }

    public function store(SettingRequest $request)
    {
        Setting::create($request->validated());

        return redirect()->back()->with('sucess', 'Settings applied');
    }

    public function update(SettingRequest $request, Setting $setting)
    {
        $setting->update($request->validated());

        return redirect()->back()->with('sucess', 'Settings updated');
    }
}
