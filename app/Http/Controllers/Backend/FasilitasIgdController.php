<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\FasilitasIgd;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FasilitasIgdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['fasilitasIgd'] =  FasilitasIgd::all();
        return view('Backend/fasIgd.index', $data);
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
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/fas-igd/', $name);
            $imageurl = $name;
        }

        $dtfasilitas = [
            'description' => $request->description,
            'image' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('fasilitas_igds')->insert($dtfasilitas);

        if ($save) {
            return redirect('/fasilitas-igd')
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
        $data['fasilitasIgd'] = FasilitasIgd::where('id', $id)->first();
        return view('Backend/fasIgd.edit', $data);
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
        $fasilitas = FasilitasIgd::where('id', $id)->first();
        $imageurl = $fasilitas->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/fas-igd/', $name);
            $imageurl = $name;

            $file = 'upload/fas-igd/' . $fasilitas->image;
            if ($fasilitas->image != '' && $fasilitas->image != null) {
                unlink($file);
            }
        }

        $changeFasilitas = [
            'description' => $request->description,
            'image' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('fasilitas_igds')
            ->where('id', $id)
            ->update($changeFasilitas);

        if ($data) {
            return redirect('/fasilitas-igd')
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
        $fasilitas = FasilitasIgd::where('id', $id)->first();

        if (empty($fasilitas)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'data Fasilitas tidak ditemukan!',
                ]);
        }

        $file = 'upload/fas-igd/' . $fasilitas->image;
        if ($fasilitas->image != '' && $fasilitas->image != null) {
            unlink($file);
        }

        $data = FasilitasIgd::where('id', $id)->delete();

        if ($fasilitas) {
            return redirect('/fasilitas-igd')
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
