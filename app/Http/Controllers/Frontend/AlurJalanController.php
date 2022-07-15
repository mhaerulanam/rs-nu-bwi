<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AlurJalan;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;

class AlurJalanController extends Controller
{
    public function index()
    {
        try {
            $data['banners'] = Banner::select('banners.*')
                ->where('status', true)
                ->orderByDesc('id')
                ->get();
            $data['alurJalan'] =  AlurJalan::orderByDesc('id')->get();
            return view('frontend.alur-jalan', $data);
        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError($th->getMessage());
        }
    }
}
