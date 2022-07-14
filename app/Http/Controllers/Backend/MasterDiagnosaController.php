<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MasterDiagnosa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MasterDiagnosaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['masterDiagnosa'] =  MasterDiagnosa::all();
        return view('Backend/master-diagnosa.index', $data);
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
        $dt_diagnosa = [
            'diagnosa' => $request->diagnosa,
            'created_at' => now(),
        ];

        $save = DB::table('master_diagnosas')->insert($dt_diagnosa);

        if ($save) {
            return redirect('/master-diagnosa')
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
        $data['masterDiagnosa'] = MasterDiagnosa::where('id', $id)->first();
        return view('Backend/master-diagnosa.edit', $data);
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
        $master_diagnosas = MasterDiagnosa::where('id', $id)->first();

        $changeDiagnosa = [
            'diagnosa' => $request->diagnosa,
            'updated_at' => now(),
        ];

        $data = DB::table('master_diagnosas')
            ->where('id', $id)
            ->update($changeDiagnosa
            );

        if ($data) {
            return redirect('/master-diagnosa')
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
        $master_diagnosas = MasterDiagnosa::where('id', $id)->first();

        if (empty($master_diagnosas)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Diagnosa tidak ditemukan!',
                ]);
        }

        $data = MasterDiagnosa::where('id', $id)->delete();

        if ($data) {
            return redirect('/master-diagnosa')
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
