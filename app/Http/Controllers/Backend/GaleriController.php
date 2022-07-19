<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['galeris'] =  Galeri::all();
        return view('Backend/galeri.index', $data);
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
        $data = $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/galeri/', $name);
            $imageurl = $name;
        }

        $dtfasilitas = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('galeris')->insert($dtfasilitas);

        if ($save) {
            return redirect('/galeri')
                ->with([
                    'success' => 'Data Berhasil Ditambah',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Ditambah!',
                ]);
        }
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
        $data['galeris'] = Galeri::where('id', $id)->first();
        return view('Backend/galeri.edit', $data);
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
        $galeris = Galeri::where('id', $id)->first();
        $imageurl = $galeris->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/galeri/', $name);
            $imageurl = $name;

            $file = 'upload/galeri/' . $galeris->image;
            if ($galeris->image != '' && $galeris->image != null) {
                unlink($file);
            }
        }

        $changeGaleris = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('galeris')
            ->where('id', $id)
            ->update($changeGaleris);

        if ($data) {
            return redirect('/galeri')
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
        $galeri = Galeri::where('id', $id)->first();

        if (empty($galeri)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'data galeri tidak ditemukan!',
                ]);
        }

        $file = 'upload/galeri/' . $galeri->image;
        if ($galeri->image != '' && $galeri->image != null) {
            unlink($file);
        }

        $data = Galeri::where('id', $id)->delete();

        if ($data) {
            return redirect('/galeri')
                ->with([
                    'success' => 'Data Berhasil Dihapus',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Dihapus!',
                ]);
        }
    }
}
