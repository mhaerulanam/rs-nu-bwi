<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BeritaController extends Controller
{
    public function index(Request $request)
    {
        $cari = $request->cari;
        if ($cari) {
            $data['articles'] = Article::select('articles.*', 'ca.name_category')
                ->orWhere('articles.title', 'like', "%" . $cari . "%")
                ->orWhere('articles.description', 'like', "%" . $cari . "%")
                ->orWhere('ca.name_category', 'like', "%" . $cari . "%")
                ->where('articles.status', true)
                ->join('category_articles as ca', 'ca.id', 'articles.id_category')
                ->orderByDesc('articles.id')
                ->paginate(2);
        } else {
            $data['articles'] = Article::select('articles.*')
                ->where('status', true)
                ->orderByDesc('id')
                ->paginate(2);
        }
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['category_articles'] =  DB::table('articles')
            ->select(DB::raw(' ca.name_category, COUNT(ca.id) AS total'))
            ->join('category_articles as ca', 'ca.id', 'articles.id_category')
            ->where('articles.status', true)
            ->groupBy('ca.name_category')
            ->get();

        return view('frontend.berita', $data);
    }

    public function kategori($kategori)
    {
        $data['banners'] = Banner::select('banners.*')
            ->where('status', true)
            ->orderByDesc('id')
            ->get();
        $data['articles'] = Article::select('articles.*', 'ca.name_category')
            ->orWhere('ca.name_category', 'like', "%" . $kategori . "%")
            ->where('articles.status', true)
            ->join('category_articles as ca', 'ca.id', 'articles.id_category')
            ->orderByDesc('articles.id')
            ->paginate(2);
        $data['category_articles'] =  DB::table('articles')
            ->select(DB::raw(' ca.name_category, COUNT(ca.id) AS total'))
            ->join('category_articles as ca', 'ca.id', 'articles.id_category')
            ->where('articles.status', true)
            ->groupBy('ca.name_category')
            ->get();

        return view('frontend.berita', $data);
    }

    public function show($id)
    {
        $data['articles'] = Article::select('articles.*', 'ca.name_category')
            ->where('articles.id', $id)
            ->where('articles.status', true)
            ->join('category_articles as ca', 'ca.id', 'articles.id_category')
            ->first();
        $data['category_articles'] =  DB::table('articles')
            ->select(DB::raw(' ca.name_category, COUNT(ca.id) AS total'))
            ->join('category_articles as ca', 'ca.id', 'articles.id_category')
            ->where('articles.status', true)
            ->groupBy('ca.name_category')
            ->get();
        return view('frontend.detail-berita', $data);
    }
}
