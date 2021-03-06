<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\VisiMisiTujuan;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['visimisi'] = VisiMisiTujuan::all();
        return view('frontend.visimisi', $data);
    }
}
