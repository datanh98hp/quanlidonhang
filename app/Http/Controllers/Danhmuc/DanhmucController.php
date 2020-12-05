<?php

namespace App\Http\Controllers\Danhmuc;
use App\Models\Khachhang;
use App\Models\Donhang;
use App\Models\Banggia;
use App\Models\Nhacungcap;
use App\Models\Vatlieu;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DanhmucController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //lay thong tin tat ca danh muc
        $kh= Khachhang::all();
        $dh = Donhang::all();
        $bg = Banggia::all();
        $ncc = Nhacungcap::all();
        $vl = Vatlieu::all();
        return view('danhmuc.Danhmuc',['kh'=>$kh,'dh'=>$dh,'bg'=>$bg,'ncc'=>$ncc,'vl'=>$vl]);
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
