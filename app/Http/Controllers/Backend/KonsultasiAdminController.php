<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\KonsultasiAdmin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class KonsultasiAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['konsultasiAdmin'] =  KonsultasiAdmin::all()->sortDesc();
        return view('Backend/konsultasi-admin.index', $data);
    }


    public function getAllData()
    {
        try {
            $data['listKonsultasi'] = DB::table('chat_konsultasi as ck')
                                    ->select('rm.*', 'u.name','ck.messages','ck.status')
                                    ->join('room_konsultasi as rm', 'rm.id', 'ck.id_room')
                                    ->join('users as u', 'u.id', 'rm.id_user')
                                    ->groupBy('ck.id_room')
                                    ->orderBy('ck.created_at', 'desc')
                                    ->get();

            return response()->json($data);
        } catch (Exception $th) {
            return $th->getMessage();
            return back()->withError($th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError($th->getMessage());
        }

    }

    public function getDetailData($id)
    {
        try {
            $data['id']= $id;
            $room = DB::table('room_konsultasi')->where('id', $id)->first();
            $data['idRoom'] = $room->id;
            $data['konsultasi'] = DB::table('chat_konsultasi as ck')
                                    ->join('room_konsultasi as rm', 'rm.id', 'ck.id_room')
                                    ->select('u.name','ck.*')
                                    ->join('users as u', 'u.id', 'rm.id_user')
                                    ->where('id_room', $id)
                                    ->get();

            $dtKonsultasi = [
                'status' => true,
                'updated_at' => now(),
            ];

            $save = DB::table('chat_konsultasi')->where('id_room', $id)->where('perawat_id', null)->update($dtKonsultasi);

            return response()->json($data);
        } catch (Exception $th) {
            return $th->getMessage();
            return back()->withError($th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError($th->getMessage());
        }

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
        $dtKonsultasi = [
            'id_room' => $request->idRoom,
            'perawat_id' => Auth::user()->id,
            'messages' => $request->messages,
            'status' => false,
            'created_at' => now(),
        ];

        $save = DB::table('chat_konsultasi')->insert($dtKonsultasi);

        if ($save) {
            return redirect('/konsultasi-admin')
                ->with([
                    'success' => 'Konsultasi berhasil terkirim',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Konsultasi gagal!',
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
        //
    }

    public function detail($id)
    {
        $data['konsultasiAdmin'] = KonsultasiAdmin::where('id', $id)->first();
        return view('Backend/konsultasi-admin.detail', $data);
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
        $changeKonsultasi = [
            'status_pasien' => true,
            'status_admin' => true,
            'balas' => $request->balas,
            'updated_at' => now(),
        ];

        $data = DB::table('konsultasi_admins')
            ->where('id', $id)
            ->update($changeKonsultasi);

        if ($data) {
            return redirect('/konsultasi-admin')
                ->with([
                    'success' => 'Balasan konsultasi berhasil terkirim',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Balasan konsultasi gagal!',
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
        $konsultasiAdmin = KonsultasiAdmin::where('id', $id)->first();

        if (empty($konsultasiAdmin)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data konsultasi tidak ditemukan!',
                ]);
        }

        $data = KonsultasiAdmin::where('id', $id)->delete();

        if ($data) {
            return redirect('/konsultasi-admin')
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
