<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\FasilitasInap;
use App\Models\FasilitasPoli;
use Illuminate\Http\Request;

class FasilitasInapController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['fasInap'] = FasilitasInap::select('fasilitas_inaps.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        return view('frontend.fasilitas-inap', $data);
    }
}
