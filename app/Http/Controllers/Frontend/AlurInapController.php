<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\AlurInap;
use App\Models\Banner;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlurInapController extends Controller
{
    public function index()
    {
        try {
            $data['banners'] = Banner::select('banners.*')
                ->where('status', true)
                ->orderByDesc('id')
                ->get();
            $data['alurInap'] =  AlurInap::orderByDesc('id')->get();
            return view('frontend.alur-inap', $data);
        } catch (Exception $th) {
            return back()->withError($th->getMessage());
        } catch (\Illuminate\Database\QueryException $th) {
            return back()->withError($th->getMessage());
        }
    }
}
