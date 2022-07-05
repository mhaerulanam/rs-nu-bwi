<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\CategoryArticle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $dtcategory_articles = [
            'name_category' => $request->name_category,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('category_articles')->insert($dtcategory_articles);

        if ($save) {
            return redirect('/article')
                ->with([
                    'success-category' => 'Data Berhasil Ditambah',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error-category' => 'Data Gagal Ditambah!',
                ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['category_articles'] = CategoryArticle::where('id', $id)->first();
        return view('Backend/category_article.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category_articles = CategoryArticle::where('id', $id)->first();

        $changeCategroy = [
            'name_category' => $request->name_category,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('category_articles')
            ->where('id', $id)
            ->update($changeCategroy
            );

        if ($data) {
            return redirect('/article')
                ->with([
                    'success-category' => 'Data Berhasil Diperbarui',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error-category' => 'Data Gagal Diperbarui!',
                ]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category_articles = CategoryArticle::where('id', $id)->first();

        if (empty($category_articles)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error-category' => 'Data Kategori Artikel tidak ditemukan!',
                ]);
        }

        $data = CategoryArticle::where('id', $id)->delete();

        if ($data) {
            return redirect('/article')
                ->with([
                    'success-category' => 'Data Berhasil Dihapus',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error-category' => 'Data Gagal Dihapus!',
                ]);
        }
    }
}
