<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\BPJS;
use Exception;
use Illuminate\Http\Request;

class BpjsController extends Controller
{
    public function index()
    {
        try {
            $data['banners'] = Banner::select('banners.*')
                ->where('status', true)
                ->orderByDesc('id')
                ->get();
            $data['bpjs'] =  BPJS::orderByDesc('id')->get();
            return view('frontend.bpjs', $data);
        } catch (Exception $th) {
            return back()->withError("Terjadi Kessalahan!". $th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError("Terjadi Kesalahan Pada Database!".$th->getMessage());
        }
    }
}
