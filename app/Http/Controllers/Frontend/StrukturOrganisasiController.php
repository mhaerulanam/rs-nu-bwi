<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Struktur;
use Illuminate\Http\Request;

class StrukturOrganisasiController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['strukturs'] = Struktur::all();
        return view('frontend.strukturs', $data);
    }
}
