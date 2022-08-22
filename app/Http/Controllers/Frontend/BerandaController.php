<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Banner;
use App\Models\Fasilitas;
use App\Models\VisiMisiTujuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BerandaController extends Controller
{
    public function index()
    {
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['fasilitas'] = Fasilitas::select('fasilitas.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['articles'] = Article::select('articles.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->paginate(3);
        return view('frontend.home', $data);
    }
}
