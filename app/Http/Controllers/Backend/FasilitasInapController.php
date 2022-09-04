<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FasilitasInap;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FasilitasInapController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['fasilitasInap'] =  FasilitasInap::all();
        return view('Backend/fasInap.index', $data);
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
            'price' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/fas-inap/', $name);
            $imageurl = $name;
        }

        $dtfasilitas = [
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('fasilitas_inaps')->insert($dtfasilitas);

        if ($save) {
            return redirect('/fasilitas-inap')
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
        $data['fasilitasInap'] = FasilitasInap::where('id', $id)->first();
        return view('Backend/fasInap.edit', $data);
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
        $fasilitas = FasilitasInap::where('id', $id)->first();
        $imageurl = $fasilitas->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/fas-inap/', $name);
            $imageurl = $name;

            $file = 'upload/fas-inap/' . $fasilitas->image;
            if ($fasilitas->image != '' && $fasilitas->image != null) {
                unlink($file);
            }
        }

        $changeFasilitas = [
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imageurl,
            'price' => $request->price,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('fasilitas_inaps')
            ->where('id', $id)
            ->update($changeFasilitas);

        if ($data) {
            return redirect('/fasilitas-inap')
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
        $fasilitas = FasilitasInap::where('id', $id)->first();

        if (empty($fasilitas)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'data Fasilitas tidak ditemukan!',
                ]);
        }

        $file = 'upload/fas-inap/' . $fasilitas->image;
        if ($fasilitas->image != '' && $fasilitas->image != null) {
            unlink($file);
        }

        $data = FasilitasInap::where('id', $id)->delete();

        if ($fasilitas) {
            return redirect('/fasilitas-inap')
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
