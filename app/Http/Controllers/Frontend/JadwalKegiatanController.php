<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Jadwal;
use Exception;
use Illuminate\Http\Request;

class JadwalKegiatanController extends Controller
{
    public function index()
    {
        try {
            $data['banners'] = Banner::select('banners.*')
                ->where('status', true)
                ->orderByDesc('id')
                ->get();
            $data['jadwalKegiatan'] =  Jadwal::orderByDesc('id')->get();
            return view('frontend.jadwal-kegiatan', $data);
        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError($th->getMessage());
        }
    }
}
