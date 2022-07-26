<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\KonsultasiAdmin;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Psy\Readline\Hoa\Console;
use SebastianBergmann\Environment\Console as EnvironmentConsole;

class KonsultasiController extends Controller
{
    public function index()
    {

        $email = Auth::user()->email;

        try {
            $data['banners'] = Banner::where('status', true)
                ->orderByDesc('id')
                ->first();

            $data['konsultasiMasuk'] = KonsultasiAdmin::where('email', $email)
                ->where('status_pasien', false)->get();
            $data['konsultasiMasukRead'] = KonsultasiAdmin::where('email', $email)
                ->where('status_pasien', true)->get();
            return view('Frontend.konsultasi', $data);
        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError($th->getMessage());
        }
    }

    public function addKonsultasi()
    {

        try {
            $data['banners'] = Banner::where('status', true)
                ->orderByDesc('id')
                ->first();
            return view('Frontend.add-konsultasi', $data);
        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError($th->getMessage());
        }
    }

    public function store(Request $request)
    {
        $dtKonsultasi = [
            'title' => $request->title,
            'name' => $request->name,
            'email' => $request->email,
            'noHp' => $request->noHp,
            'pekerjaan' => $request->pekerjaan,
            'keluhan' => $request->konsultasi,
            'status_pasien' => false,
            'status_admin' => false,
            'created_at' => now(),
        ];

        $save = DB::table('konsultasi_admins')->insert($dtKonsultasi);

        if ($save) {
            return redirect('/user/konsultasi')
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

    public function update(Request $request)
    {
        $id = $request->id;
        $changeKonsultasi = [
            'status_pasien' => true,
        ];
        $data = DB::table('konsultasi_admins')
            ->where('id', $id)
            ->update($changeKonsultasi);

        $detailKonsultasi = KonsultasiAdmin::where('id', $id)->first();

        return response()->json(['success'=>'Ajax request submitted successfully', 'data'=>$detailKonsultasi]);
    }

    public function show(Request $request)
    {
        $id = $request->id;
        $detailKonsultasi = KonsultasiAdmin::where('id', $id)->first();

        return response()->json(['success'=>'Ajax request submitted successfully', 'data'=>$detailKonsultasi]);
    }
}
