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
        $data['dokters'] =  DB::table('dokters')->select('dokters.*', 'jd.jabatan')
        ->join('jabatan_dokters as jd', 'jd.id', 'dokters.id_jabatan')
        ->orderByDesc('id')
        ->paginate(3);
        return view('frontend.dokter', $data);
    }
}
