<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\HomecareAdmin;
use App\Models\MasterDiagnosa;
use App\Models\MasterLayanan;
use App\Models\MasterPasien;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class HomecareController extends Controller
{
    public function index()
    {
        try {
            $data['banners'] = Banner::where('status', true)
                ->orderByDesc('id')
                ->first();
            if (Auth::user()) {
                $idUser = Auth::user()->id;
                $data['homecareRiwayat'] = HomecareAdmin::select('mp.*', 'homecare_admins.*')
                    ->join('master_pasiens as mp', 'mp.no_rm', 'homecare_admins.id_pasien')
                    ->join('users as u', 'u.id', 'mp.id_user')
                    ->join('master_diagnosas as md', 'md.id', 'mp.id_diagnosa')
                    ->join('master_layanans as ml', 'ml.id', 'mp.id_layanan')
                    ->where('u.id', $idUser)
                    ->orderByDesc('homecare_admins.id')
                    ->get();
                $data['layanan'] =  MasterPasien::select('master_pasiens.*', 'ml.*')
                    ->join('master_layanans as ml', 'ml.id', 'master_pasiens.id_layanan')
                    ->join('users as u', 'u.id', 'master_pasiens.id_user')
                    ->where('u.id', $idUser)->first();
                $data['masterDiagnosa'] =  MasterDiagnosa::all()->sortDesc();
                $data['masterLayanan'] =  MasterLayanan::all()->sortDesc();

                // return $data;
            }
            return view('Frontend.homecare', $data);
        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError($th->getMessage());
        }
    }


    public function show(Request $request)
    {
        $id = $request->id;
        $homecareRiwayat = HomecareAdmin::select('mp.*', 'homecare_admins.*', 'u.*', 'md.diagnosa', 'ml.layanan')
            ->join('master_pasiens as mp', 'mp.no_rm', 'homecare_admins.id_pasien')
            ->join('users as u', 'u.id', 'mp.id_user')
            ->join('master_diagnosas as md', 'md.id', 'mp.id_diagnosa')
            ->join('master_layanans as ml', 'ml.id', 'mp.id_layanan')
            ->where('homecare_admins.id', $id)->first();

        return response()->json(['success' => 'Ajax request submitted successfully', 'data' => $homecareRiwayat]);
    }

    public function store(Request $request)
    {
        $data = $this->validate($request, [
            'kondisiTubuh' => 'required',
        ]);

        $id = $request->id;
        $layanan = $request->layanan;
        $kondisi_pasien = $request->kondisiTubuh;

        $dtPasien = [
            'id_layanan' => $layanan,
        ];

        $data = DB::table('master_pasiens')
            ->where('no_rm', $id)
            ->update($dtPasien);

        $dtHomecare = [
            'id_pasien' => $id,
            'kondisi_pasien' => $kondisi_pasien,
            'created_at' => now(),
        ];

        $save = DB::table('homecare_admins')->insert($dtHomecare);

        if ($save) {
            return redirect('/user/homecare')
                ->with([
                    'success' => 'Homecare berhasil terkirim',
                ]);
        } else {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Homecare gagal!',
                ]);
        }
    }
}
