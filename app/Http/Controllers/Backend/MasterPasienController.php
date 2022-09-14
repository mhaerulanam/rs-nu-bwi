<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\MasterDiagnosa;
use App\Models\MasterLayanan;
use App\Models\MasterPasien;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use DateTime;
use Illuminate\Support\Facades\DB;

class MasterPasienController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['masterPasien'] =  DB::table('master_pasiens')->select('master_pasiens.*', 'md.diagnosa', 'ml.layanan', 'u.*')
            ->join('master_diagnosas as md', 'md.id', 'master_pasiens.id_diagnosa')
            ->join('master_layanans as ml', 'ml.id', 'master_pasiens.id_layanan')
            ->join('users as u', 'u.id', 'master_pasiens.id_user')
            ->orderByDesc('master_pasiens.no_rm')
            ->get();
        $data['masterDiagnosa'] =  MasterDiagnosa::all()->sortDesc();
        $data['masterLayanan'] =  MasterLayanan::all()->sortDesc();
        return view('Backend/master-pasien.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'diagnosa' => ['required', 'int'],
            'layanan' => ['required', 'int'],
            'alamat' => ['required', 'string'],
        ]);

        $password = 'pWd-rme9?o';

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($password),
            'role' => 2,
            'is_homecare' => false,
        ]);

        $dt = new DateTime();
        $tahun = $dt->format('y');
        $bulan = $dt->format('m');
        $no_rm = "";

        $masterPasiens = MasterPasien::orderBy('no_rm', 'desc')->get();

        if ($masterPasiens->count() > 0) {
            $no_rm = $masterPasiens[0]->no_rm;
            $last_increment = substr($no_rm, 9);

            $no_rm = str_pad($last_increment + 1, 3, '0', STR_PAD_LEFT);
            $no_rm = 'RM-' . $tahun . '-' . $bulan . '-' . $no_rm;
        } else {
            $no_rm = 'RM-' . $tahun . '-' . $bulan . '-001';
        };

        $users = User::orderBy('id', 'desc')->first();
        $idUsers = $users->id;

        if (empty($request->keterangan)) {
            $request->keterangan = '-';
        }
        $dtPasien = [
            'no_rm' => $no_rm,
            'id_diagnosa' => $request->diagnosa,
            'id_layanan' => $request->layanan,
            'keterangan' => $request->keterangan,
            'alamat' => $request->alamat,
            'id_user' => $idUsers,
            'created_at' => now(),
        ];

        $save = DB::table('master_pasiens')->insert($dtPasien);

        if ($save) {
            return redirect('/master-pasien')
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
        $data['masterPasien'] =  DB::table('master_pasiens')->select('master_pasiens.*', 'md.diagnosa', 'ml.layanan', 'u.*')
            ->join('master_diagnosas as md', 'md.id', 'master_pasiens.id_diagnosa')
            ->join('master_layanans as ml', 'ml.id', 'master_pasiens.id_layanan')
            ->join('users as u', 'u.id', 'master_pasiens.id_user')
            ->orderByDesc('master_pasiens.no_rm')
            ->where('master_pasiens.no_rm', $id)
            ->first();
        $data['masterDiagnosa'] =  MasterDiagnosa::all()->sortDesc();
        $data['masterLayanan'] =  MasterLayanan::all()->sortDesc();
        return view('Backend/master-pasien.edit', $data);
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
        $data['master_pasien'] =  DB::table('master_pasiens')->where('no_rm', $id)->first();
        $idUser = $data['master_pasien']->id_user;

        $data = DB::table('users')
            ->where('id', $idUser)
            ->update([
                'name' => $request->name,
            ]);

        if (empty($request->keterangan)) {
            $request->keterangan = '-';
        }

        $dtPasien = [
            'id_diagnosa' => $request->diagnosa,
            'id_layanan' => $request->layanan,
            'keterangan' => $request->keterangan,
            'alamat' => $request->alamat,
            'updated_at' => now(),
        ];

        $data = DB::table('master_pasiens')
            ->where('no_rm', $id)
            ->update($dtPasien);

        if ($data) {
            return redirect('/master-pasien')
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
        $data['master_pasien'] = MasterPasien::where('no_rm', $id)->first();
        $idUser = $data['master_pasien']->id_user;
        $data['user'] = User::where('id', $idUser)->first();

        if (empty($data)) {
            return redirect()
                ->back()
                ->withInput()
                ->with([
                    'error' => 'Data tidak ditemukan!',
                ]);
        }

        $data['user'] = User::where('id', $idUser)->delete();
        $data['master_pasien'] = MasterPasien::where('no_rm', $id)->delete();

        if ($data) {
            return redirect('/master-pasien')
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

    public function isHomecare($id, Request $request)
    {
        $data = DB::table('users')
            ->where('id', $id)
            ->update([
                'is_homecare' => $request->is_homecare,
                'updated_at' => now(),
            ]);

        if ($data) {
            return redirect('/master-pasien')
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
}
