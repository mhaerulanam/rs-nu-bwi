<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Staf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StafController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['stafs'] =  Staf::all();
        return view('Backend/staf.index', $data);
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
            'jabatan' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif|required|max:10000',
        ]);

        $reqImage = $request->image;
        if ($request->hasFile('image')) {
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/staf/', $name);
            $imageurl = $name;
        }

        $dtStaf = [
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'image' => $imageurl,
            'created_at' => now(),
        ];

        $save = DB::table('stafs')->insert($dtStaf);

        if ($save) {
            return redirect('/staf')
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
        $data['stafs'] = Staf::where('id', $id)->first();
        return view('Backend/staf.edit', $data);
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
        $staf = Staf::where('id', $id)->first();
        $imageurl = $staf->image;

        if ($request->hasFile('image')) {
            $reqImage = $request->image;
            $name = time() . rand(1, 100) . '.' . $reqImage->extension();
            $reqImage->move(public_path() . '/upload/staf/', $name);
            $imageurl = $name;

            $file = 'upload/staf/' . $staf->image;
            if ($staf->image != '' && $staf->image != null) {
                unlink($file);
            }
        }

        $changestaf = [
            'name' => $request->name,
            'jabatan' => $request->jabatan,
            'image' => $imageurl,
            'updated_at' => now(),
        ];

        $data = DB::table('stafs')
            ->where('id', $id)
            ->update($changestaf);

        if ($data) {
            return redirect('/staf')
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
        $staf = Staf::where('id', $id)->first();

        if (empty($staf)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'data staf tidak ditemukan!',
                ]);
        }

        $file = 'upload/staf/' . $staf->image;
        if ($staf->image != '' && $staf->image != null) {
            unlink($file);
        }

        $data = Staf::where('id', $id)->delete();

        if ($staf) {
            return redirect('/staf')
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
