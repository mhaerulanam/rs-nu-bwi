<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomecareAdmin;
use Dotenv\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class HomecareAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['homecareAdmin'] =  DB::table('homecare_admins')
            ->select('homecare_admins.*', 'mp.*', 'md.diagnosa', 'ml.layanan', 'u.name', 'u.email')
            ->join('master_pasiens as mp', 'mp.no_rm', 'homecare_admins.id_pasien')
            ->join('master_diagnosas as md', 'md.id', 'mp.id_diagnosa')
            ->join('master_layanans as ml', 'ml.id', 'mp.id_layanan')
            ->join('users as u', 'u.id', 'mp.id_user')
            ->orderByDesc('homecare_admins.id')
            ->get();
        return view('Backend/homecare-admin.index', $data);
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
            'date_awal'    => 'required|date',
            'date_akhir'      => 'required|date|after_or_equal:date_awal',
        ]);

        $noRm = $request->noRm;
        $tanggal_awal = $request->date_awal;
        $tanggal_akhir = $request->date_akhir;

        if ($noRm != null || $noRm != "") {
            $data = DB::table('homecare_admins')
                ->select('homecare_admins.*', 'mp.*', 'md.diagnosa', 'ml.layanan', 'u.name', 'u.email')
                ->join('master_pasiens as mp', 'mp.no_rm', 'homecare_admins.id_pasien')
                ->join('master_diagnosas as md', 'md.id', 'mp.id_diagnosa')
                ->join('master_layanans as ml', 'ml.id', 'mp.id_layanan')
                ->join('users as u', 'u.id', 'mp.id_user')
                ->orderByDesc('homecare_admins.id')
                ->where('mp.no_rm', $noRm)
                ->whereBetween('homecare_admins.created_at', [$tanggal_awal, $tanggal_akhir])
                ->get();
        } else {
            $data = DB::table('homecare_admins')
                ->select('homecare_admins.*', 'mp.*', 'md.diagnosa', 'ml.layanan', 'u.name', 'u.email')
                ->join('master_pasiens as mp', 'mp.no_rm', 'homecare_admins.id_pasien')
                ->join('master_diagnosas as md', 'md.id', 'mp.id_diagnosa')
                ->join('master_layanans as ml', 'ml.id', 'mp.id_layanan')
                ->join('users as u', 'u.id', 'mp.id_user')
                ->orderByDesc('homecare_admins.id')
                ->whereBetween('homecare_admins.created_at', [$tanggal_awal, $tanggal_akhir])
                ->get();
        }
        $pdf = PDF::loadview('Backend/laporan/homecare_pdf',['dataHomecare'=>$data, 'start_date'=>$tanggal_awal, 'end_date'=>$tanggal_akhir]);
        // return $pdf->download('laporan-homecare-nu-bwi-pdf');
        return $pdf->stream();
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
