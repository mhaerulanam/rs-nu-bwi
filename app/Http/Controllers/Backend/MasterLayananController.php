<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MasterLayanan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterLayananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['masterLayanan'] =  MasterLayanan::all();
        return view('Backend/master-layanan.index', $data);
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
        $dt_layanan = [
            'layanan' => $request->layanan,
            'created_at' => now(),
        ];

        $save = DB::table('master_layanans')->insert($dt_layanan);

        if ($save) {
            return redirect('/master-layanan')
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
        $data['masterLayanan'] = MasterLayanan::where('id', $id)->first();
        return view('Backend/master-layanan.edit', $data);
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
        $master_layanans = MasterLayanan::where('id', $id)->first();

        $changeLayanan = [
            'layanan' => $request->layanan,
            'updated_at' => now(),
        ];

        $data = DB::table('master_layanans')
            ->where('id', $id)
            ->update($changeLayanan
            );

        if ($data) {
            return redirect('/master-layanan')
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
        $master_layanans = MasterLayanan::where('id', $id)->first();

        if (empty($master_layanans)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Layanan tidak ditemukan!',
                ]);
        }

        $data = MasterLayanan::where('id', $id)->delete();

        if ($data) {
            return redirect('/master-layanan')
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
