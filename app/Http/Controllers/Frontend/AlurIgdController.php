<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AlurIGD;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;

class AlurIgdController extends Controller
{
    public function index()
    {
        try {
            $data['banners'] = Banner::select('banners.*')
                ->where('status', true)
                ->orderByDesc('id')
                ->get();
            $data['alurIgd'] =  AlurIGD::orderByDesc('id')->get();
            return view('frontend.alur-igd', $data);
        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError($th->getMessage());
        }
    }
}
