<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\JabatanDokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JabatanDokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $dataJabatan = [
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('jabatan_dokters')->insert($dataJabatan);

        if ($save) {
            return redirect('/dokter')
                ->with([
                    'success-category' => 'Data Berhasil Ditambah',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error-category' => 'Data Gagal Ditambah!',
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
        $data['jabatan_dokters'] = JabatanDokter::where('id', $id)->first();
        return view('Backend/jabatan_dokter.edit', $data);
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
        $changeJabatan = [
            'jabatan' => $request->jabatan,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('jabatan_dokters')
            ->where('id', $id)
            ->update($changeJabatan
            );

        if ($data) {
            return redirect('/dokter')
                ->with([
                    'success-category' => 'Data Berhasil Diperbarui',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error-category' => 'Data Gagal Diperbarui!',
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
        $jabantan_dokters = JabatanDokter::where('id', $id)->first();

        if (empty($jabantan_dokters)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error-category' => 'Data Kategori Artikel tidak ditemukan!',
                ]);
        }

        $data = JabatanDokter::where('id', $id)->delete();

        if ($data) {
            return redirect('/dokter')
                ->with([
                    'success-category' => 'Data Berhasil Dihapus',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error-category' => 'Data Gagal Dihapus!',
                ]);
        }
    }
}
