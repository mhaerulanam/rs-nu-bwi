<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\KonsultasiAdmin;
use App\Models\Room;
use App\Models\User;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Psy\Readline\Hoa\Console;
use SebastianBergmann\Environment\Console as EnvironmentConsole;

class KonsultasiController extends Controller
{
    public function index()
    {

        if (Auth::user()) {
            $email = Auth::user()->email;
            try {
                $data['banners'] = Banner::where('status', true)
                    ->orderByDesc('id')
                    ->first();

                $data['konsultasi'] = DB::table('room_konsultasi as rm')
                                        ->where('rm.id_user', Auth::user()->id)
                                        ->join('chat_konsultasi as ck', 'ck.id_room', 'rm.id')
                                        ->get();
                return view('Frontend.konsultasi', $data);
            } catch (Exception $th) {
                return $th->getMessage();
                return back()->withError($th->getMessage());
            } catch (\Illuminate\Database\QueryException $th) {
                return back()->withError($th->getMessage());
            }
        } else {
            try {
                $data['banners'] = Banner::where('status', true)
                    ->orderByDesc('id')
                    ->first();
                    $data['konsultasiMasuk'] = [];
                    $data['konsultasiMasukRead'] = [] ;
                    $data['konsultasiTerKirim'] = [];
                return view('Frontend.konsultasi', $data)->with([
                    'error' => 'Silahkan Login terlebih dahulu, untuk melihat riwayat konsultasi! ',
                ]);
            } catch (Exception $th) {
                return back()->withError($th->getMessage());
            } catch (\Illuminate\Database\QueryException $th) {
                return back()->withError($th->getMessage());
            }
        }

    }

    public function getAllData()
    {

        if (Auth::user()) {
            $email = Auth::user()->email;
            try {
                $data['banners'] = Banner::where('status', true)
                    ->orderByDesc('id')
                    ->first();

                $data['konsultasi'] = DB::table('room_konsultasi as rm')
                                        ->where('rm.id_user', Auth::user()->id)
                                        ->join('chat_konsultasi as ck', 'ck.id_room', 'rm.id')
                                        ->get();
                return response()->json($data);
            } catch (Exception $th) {
                return $th->getMessage();
                return back()->withError($th->getMessage());
            } catch (\Illuminate\Database\QueryException $th) {
                return back()->withError($th->getMessage());
            }
        } else {
            try {
                $data['banners'] = Banner::where('status', true)
                    ->orderByDesc('id')
                    ->first();
                    $data['konsultasiMasuk'] = [];
                    $data['konsultasiMasukRead'] = [] ;
                    $data['konsultasiTerKirim'] = [];
                return response()->json($data);
            } catch (Exception $th) {
                return back()->withError($th->getMessage());
            } catch (\Illuminate\Database\QueryException $th) {
                return back()->withError($th->getMessage());
            }
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
        $idUser = Auth::user()->id;
        $roomChat = DB::table('room_konsultasi')->where('id_user', $idUser)->first();
        $idRoom =  $roomChat->id;

        $dtKonsultasi = [
            'id_room' => $idRoom,
            'messages' => $request->messages,
            'status' => false,
            'created_at' => now(),
        ];

        $save = DB::table('chat_konsultasi')->insert($dtKonsultasi);

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

    public function register()
    {
        if (Auth::user()) {
            $email = Auth::user()->email;
            try {
                $data['banners'] = Banner::where('status', true)
                    ->orderByDesc('id')
                    ->first();

                $data['konsultasiMasuk'] = KonsultasiAdmin::where('email', $email)
                    ->where('status_pasien', false)
                    ->orderByDesc('updated_at')
                    ->get();
                $data['konsultasiMasukRead'] = KonsultasiAdmin::where('email', $email)
                    ->where('status_pasien', true)
                    ->orderByDesc('updated_at')
                    ->get();
                $data['konsultasiTerKirim'] = KonsultasiAdmin::where('email', $email)
                    ->where('status_pasien', null)
                    ->orderByDesc('id')
                    ->get();
                return view('Frontend.konsultasi-register', $data);
            } catch (Exception $th) {
                return $th->getMessage();
                return back()->withError($th->getMessage());
            } catch (\Illuminate\Database\QueryException $th) {
                return back()->withError($th->getMessage());
            }
        } else {
            try {
                $data['banners'] = Banner::where('status', true)
                    ->orderByDesc('id')
                    ->first();
                    $data['konsultasiMasuk'] = [];
                    $data['konsultasiMasukRead'] = [] ;
                    $data['konsultasiTerKirim'] = [];
                return view('Frontend.konsultasi-register', $data)->with([
                    'error' => 'Silahkan Login terlebih dahulu, untuk melihat riwayat konsultasi! ',
                ]);
            } catch (Exception $th) {
                return back()->withError($th->getMessage());
            } catch (\Illuminate\Database\QueryException $th) {
                return back()->withError($th->getMessage());
            }
        }
    }

    public function registerKonsultasi(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 4,
        ]);

        $user = DB::table('room_konsultasi')->insert([
            'id_user' => $user->id,
            'created_at' => now(),
        ]);

        $email = $request->email;
        try {
            return redirect()->route('konsultasiuser');
        } catch (Exception $th) {
            return $th->getMessage();
            return back()->withError($th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError($th->getMessage());
        }
    }
}
