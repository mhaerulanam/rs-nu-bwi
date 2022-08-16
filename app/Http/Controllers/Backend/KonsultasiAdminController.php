<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KonsultasiAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KonsultasiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['konsultasiAdmin'] =  KonsultasiAdmin::all()->sortDesc();
        return view('Backend/konsultasi-admin.index', $data);
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
        //
    }

    public function detail($id)
    {
        $data['konsultasiAdmin'] = KonsultasiAdmin::where('id', $id)->first();
        return view('Backend/konsultasi-admin.detail', $data);
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
        $changeKonsultasi = [
            'status_pasien' => true,
            'status_admin' => true,
            'balas' => $request->balas,
            'updated_at' => now(),
        ];

        $data = DB::table('konsultasi_admins')
            ->where('id', $id)
            ->update($changeKonsultasi);

        if ($data) {
            return redirect('/konsultasi-admin')
                ->with([
                    'success' => 'Balasan konsultasi berhasil terkirim',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Balasan konsultasi gagal!',
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
        $konsultasiAdmin = KonsultasiAdmin::where('id', $id)->first();

        if (empty($konsultasiAdmin)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data konsultasi tidak ditemukan!',
                ]);
        }

        $data = KonsultasiAdmin::where('id', $id)->delete();

        if ($data) {
            return redirect('/konsultasi-admin')
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
