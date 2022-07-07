<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Sejarah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sejarah'] =  Sejarah::all();
        return view('Backend/sejarah.index', $data);
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
        $data = $this->validate($request, [
            'name' => 'required',
            'description' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/sejarah/', $name);
            $imageurl = $name;
        }

        $dtfasilitas = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageurl,
            'status' => $request->status,
            'created_at' => now(),
        ];

        $save = DB::table('sejarahs')->insert($dtfasilitas);

        if ($save) {
            return redirect('/sejarah')
                ->with([
                    'success' => 'Data Berhasil Ditambah',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Ditambah!',
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
        $data['sejarah'] = Sejarah::where('id', $id)->first();
        return view('Backend/sejarah.edit', $data);
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
        $sejarah = Sejarah::where('id', $id)->first();
        $imageurl = $sejarah->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/sejarah/', $name);
            $imageurl = $name;

            $file = 'upload/sejarah/' . $sejarah->image;
            if ($sejarah->image != '' && $sejarah->image != null) {
                unlink($file);
            }
        }

        $changeSejarah = [
            'name' => $request->name,
            'description' => $request->description,
            'image' => $imageurl,
            'status' => $request->status,
            'updated_at' => now(),
        ];

        $data = DB::table('sejarahs')
            ->where('id', $id)
            ->update($changeSejarah);

        if ($data) {
            return redirect('/sejarah')
                ->with([
                    'success' => 'Data Berhasil Diperbarui',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Diperbarui!',
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
        $sejarah = Sejarah::where('id', $id)->first();

        if (empty($sejarah)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'data sejarah tidak ditemukan!',
                ]);
        }

        $file = 'upload/sejarah/' . $sejarah->image;
        if ($sejarah->image != '' && $sejarah->image != null) {
            unlink($file);
        }

        $data = Sejarah::where('id', $id)->delete();

        if ($sejarah) {
            return redirect('/sejarah')
                ->with([
                    'success' => 'Data Berhasil Dihapus',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data Gagal Dihapus!',
                ]);
        }
    }
}
