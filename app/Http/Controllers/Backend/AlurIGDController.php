<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\AlurIGD;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlurIGDController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['igds'] = AlurIGD::orderByDesc('id')->get();
        return view('Backend/igd.index', $data);
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
        $data['igds'] = AlurIGD::where('id', $id)->first();
        return view('Backend/igd.edit', $data);
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
        $igds = AlurIGD::where('id', $id)->first();
        $imageurl = $igds->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/igd/', $name);
            $imageurl = $name;

            $file = 'upload/igd/' . $igds->image;
            if ($igds->image != '' && $igds->image != null) {
                unlink($file);
            }
        }

        $changeigds = [
            'image' => $imageurl,
        ];

        $data = DB::table('alur_igds')
            ->where('id', $id)
            ->update($changeigds);

        if ($data) {
            return redirect('/alur-igd')
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
