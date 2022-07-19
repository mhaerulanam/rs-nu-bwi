<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\FasilitasPenunjang;
use Illuminate\Http\Request;

class FasilitasPenunjangController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['fasPenunjang'] = FasilitasPenunjang::select('fasilitas_penunjangs.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        return view('frontend.fasilitas-penunjang', $data);
    }
}
