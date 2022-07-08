<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Dokter;
use App\Models\JabatanDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['dokters'] =  DB::table('dokters')->select('dokters.*', 'jd.jabatan')
            ->join('jabatan_dokters as jd', 'jd.id', 'dokters.id_jabatan')
            ->orderByDesc('id')
            ->get();
        $data['jabatan_dokters'] =  JabatanDokter::all();
        $data['jabatan'] =  DB::table('jabatan_dokters')->where('status', true)->get();
        return view('Backend/dokter.index', $data);
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
            'name' => 'required',
            'id_jabatan' => 'required',
            'jadwal' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/dokter/', $name);
            $imageurl = $name;
        }

        $dtDokter = [
            'name' => $request->name,
            'jadwal' => $request->jadwal,
            'id_jabatan' => $request->id_jabatan,
            'image' => $imageurl,
            'created_at' => now(),
        ];

        $save = DB::table('dokters')->insert($dtDokter);

        if ($save) {
            return redirect('/dokter')
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
        $data['dokters'] =  DB::table('dokters')->where('id', $id)->first();
        $data['jabatan'] =  DB::table('jabatan_dokters')->where('status', true)->get();
        return view('Backend/dokter.edit', $data);
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
        $dokters =  DB::table('dokters')->where('id', $id)->first();
        $imageurl = $dokters->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/dokter/', $name);
            $imageurl = $name;

            $file = 'upload/dokter/' . $dokters->image;
            if ($dokters->image != '' && $dokters->image != null) {
                unlink($file);
            }
        }

        $dtdokters = [
            'name' => $request->name,
            'jadwal' => $request->jadwal,
            'id_jabatan' => $request->id_jabatan,
            'image' => $imageurl,
            'updated_at' => now(),
        ];

        $data = DB::table('dokters')
            ->where('id', $id)
            ->update($dtdokters);

        if ($data) {
            return redirect('/dokter')
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
        $dokters = Dokter::where('id', $id)->first();

        if (empty($dokters)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'data Dokter tidak ditemukan!',
                ]);
        }

        $file = 'upload/dokter/' . $dokters->image;
        if ($dokters->image != '' && $dokters->image != null) {
            unlink($file);
        }

        $data = Dokter::where('id', $id)->delete();

        if ($data) {
            return redirect('/dokter')
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
