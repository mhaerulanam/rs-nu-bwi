<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\HomecareAdmin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomecareAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['homecareAdmin'] =  DB::table('homecare_admins')
            ->select('homecare_admins.*','mp.*', 'md.diagnosa', 'ml.layanan', 'u.name', 'u.email')
            ->join('master_pasiens as mp', 'mp.no_rm', 'homecare_admins.id_pasien')
            ->join('master_diagnosas as md', 'md.id', 'mp.id_diagnosa')
            ->join('master_layanans as ml', 'ml.id', 'mp.id_layanan')
            ->join('users as u', 'u.id', 'mp.id_user')
            ->orderByDesc('homecare_admins.id')
            ->get();
        return view('Backend/homecare-admin.index', $data);
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
        //
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
