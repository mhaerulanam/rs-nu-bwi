<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\FasilitasIgd;
use App\Models\FasilitasPoli;
use Illuminate\Http\Request;

class FasilitasIgdController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['fasIgd'] = FasilitasIgd::select('fasilitas_igds.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->paginate(1);
        return view('frontend.fasilitas-igd', $data);
    }
}
