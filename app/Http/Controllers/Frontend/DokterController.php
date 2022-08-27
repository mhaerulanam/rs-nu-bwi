<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Dokter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DokterController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['dokters'] =  DB::table('dokters')->select('dokters.*', 'jd.jabatan', 'fp.id as poli_id', 'fp.title as title_poli')
            ->join('jabatan_dokters as jd', 'jd.id', 'dokters.id_jabatan')
            ->join('fasilitas_polis as fp', 'fp.id', 'dokters.id_poli')
            ->orderByDesc('id')
            ->paginate(3);
        return view('frontend.dokter', $data);
    }

    public function jadwalDokter()
    {
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();

        $data['poli'] =  DB::table('dokters')->select('dokters.id_poli', 'fp.title')
            ->join('fasilitas_polis as fp', 'fp.id', 'dokters.id_poli')
            ->groupBy('dokters.id_poli')
            ->paginate(3);

        $data['dokters'] =  DB::table('dokters')->select('dokters.id_poli', 'dokters.name','dokters.jadwal', 'jd.jabatan', 'fp.id as poli_id', 'fp.title as title_poli')
            ->join('jabatan_dokters as jd', 'jd.id', 'dokters.id_jabatan')
            ->join('fasilitas_polis as fp', 'fp.id', 'dokters.id_poli')
            ->orderByDesc('dokters.id')
            ->get();

        return view('Frontend.jadwal-dokter', $data);
    }
}
