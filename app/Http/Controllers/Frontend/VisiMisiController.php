<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\VisiMisiTujuan;
use Illuminate\Http\Request;

class VisiMisiController extends Controller
{
    public function index()
    {
        $data['visimisi'] = VisiMisiTujuan::orderByDesc('id')
            ->get();
        return view('frontend.sejarah', $data);
    }
}
