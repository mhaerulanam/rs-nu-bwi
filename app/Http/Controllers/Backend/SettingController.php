<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettingController extends Controller
{
    public function index()
    {
        $data['settings'] = DB::table('settings')->orderByDesc('id')->get();
        return view('Backend/setting.index', $data);
    }

    public function edit($id)
    {
        $data['settings'] =  DB::table('settings')->where('id', $id)->first();
        return view('Backend/setting.edit', $data);
    }

    public function update(Request $request, $id)
    {
        $settings =  DB::table('settings')->where('id', $id)->first();

        if ($request->hasFile('image')) {
            $imageurl = $settings->content;
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/setting/', $name);
            $imageurl = $name;

            $file = 'upload/setting/' . $settings->content;
            if($settings->content != 'default.jpg') {
                if ($settings->content != '' && $settings->content != null) {
                    unlink($file);
                }
            }
            $changesettings = [
                'content' => $imageurl,
            ];
        } else {
            $changesettings = [
                'content' => $request->content,
            ];
        }


        $data = DB::table('settings')
            ->where('id', $id)
            ->update($changesettings);

        if ($data) {
            return redirect('/setting')
                ->with([
                    'success' => 'Data Berhasil Diperbarui',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Diperbarui!',
                ]);
        }
    }
}
