<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\BPJS;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BPJSController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['bpjs'] =  BPJS::all();
        return view('Backend/bpjs.index', $data);
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
        $data['bpjs'] = BPJS::where('id', $id)->first();
        return view('Backend/bpjs.edit', $data);
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
        $bpjs = BPJS::where('id', $id)->first();
        $imageurl = $bpjs->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/bpjs/', $name);
            $imageurl = $name;

            $file = 'upload/bpjs/' . $bpjs->image;
            if ($bpjs->image != '' && $bpjs->image != null) {
                unlink($file);
            }
        }

        $changebpjs = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageurl,
            'updated_at' => now(),
        ];

        $data = DB::table('bpjs')
            ->where('id', $id)
            ->update($changebpjs);

        if ($data) {
            return redirect('/bpjs')
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
