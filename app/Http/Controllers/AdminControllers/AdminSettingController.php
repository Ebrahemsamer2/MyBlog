<?php

namespace App\Http\Controllers\AdminControllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Setting;

class AdminSettingController extends Controller
{
    public function edit()
    {
        return view('admin_dashboard.about.edit', [
            'setting' => Setting::find(1)
        ]);
    }

    public function update()
    {
        $validated = request()->validate([
            'about_first_text' => 'required|min:50,max:500',
            'about_second_text' => 'required|min:50,max:500',
            'about_our_vision' => 'required',
            'about_our_mission' => 'required',
            'about_services' => 'required',
            'about_first_image' => 'nullable|image',
            'about_second_image' => 'nullable|image', 
        ]);

        if(request()->has('about_first_image'))
        {
            $about_first_image = request()->file('about_first_image');
            $path = $about_first_image->store('setting', 'public');
            $validated['about_first_image'] = $path;
        }

        if(request()->has('about_second_image'))
        {
            $about_second_image = request()->file('about_second_image');
            $path = $about_second_image->store('setting', 'public');
            $validated['about_second_image'] = $path;
        }

        Setting::find(1)->update($validated);
        return redirect()->route('admin.setting.edit')->with('success', 'Setting has been Updated.');
    }
}
