<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AlurInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlurInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['inaps'] = AlurInap::orderByDesc('id')->get();
        return view('Backend/inap.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['inaps'] = AlurInap::where('id', $id)->first();
        return view('Backend/inap.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $inaps = AlurInap::where('id', $id)->first();
        $imageurl = $inaps->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/inap/', $name);
            $imageurl = $name;

            $file = 'upload/inap/' . $inaps->image;
            if ($inaps->image != '' && $inaps->image != null) {
                unlink($file);
            }
        }

        $changeinaps = [
            'image' => $imageurl,
        ];

        $data = DB::table('alur_inaps')
            ->where('id', $id)
            ->update($changeinaps);

        if ($data) {
            return redirect('/alur-inap')
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
