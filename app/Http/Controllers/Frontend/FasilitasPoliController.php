<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\FasilitasPoli;
use Illuminate\Http\Request;

class FasilitasPoliController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['fasPoli'] = FasilitasPoli::select('fasilitas_polis.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->paginate(3);
        return view('frontend.fasilitas-poli', $data);
    }
}
