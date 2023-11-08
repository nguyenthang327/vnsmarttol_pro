<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class HomeSettingController extends Controller
{
    public function index()
    {
        $videoIntro = Setting::first('video_intro');
        return view('admin.pages.home_settings.index', [
            'videoIntro' => $videoIntro
        ]);
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show($id)
    {
    }

    public function edit($id)
    {
    }

    public function update(Request $request, $id)
    {
    }

    public function destroy($id)
    {
    }
}
