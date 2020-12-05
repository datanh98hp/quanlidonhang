<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Thiepcuoi;
use Illuminate\Support\Facades\Auth;
class ThiepcuoiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $thiepcuoi = Thiepcuoi::all();
        return view('Thiepcuoi.Thiepcuoi',['thiepcuoi'=>$thiepcuoi]);
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
        try {
            //code...
            $thiepcuoi = new Thiepcuoi;
        $thiepcuoi->KH = $request->input('KH');
        $thiepcuoi->id_user = Auth::id();
        $thiepcuoi->o_nhatrai = $request->input('o_nhatrai');
        $thiepcuoi->b_nhatrai = $request->input('b_nhatrai');
        $thiepcuoi->o_nhatgai = $request->input('o_nhatgai');
        $thiepcuoi->b_nhagai = $request->input('b_nhagai');
        $thiepcuoi->qh = $request->input('qh');
        $thiepcuoi->of = $request->input('of');
        $thiepcuoi->chure = $request->input('chure');
        $thiepcuoi->codau = $request->input('codau');
        $thiepcuoi->bac_chure = $request->input('bac_chure');
        $thiepcuoi->bac_codau = $request->input('bac_codau');
        $thiepcuoi->time_an_trai = $request->input('time_an_trai');
        $thiepcuoi->time_tochuc_trai = $request->input('time_tochuc_trai');
        $thiepcuoi->time_an_gai = $request->input('time_an_gai');
        $thiepcuoi->time_tochuc_gai = $request->input('time_tochuc_gai');
        $thiepcuoi->diachi_nhatrai = $request->input('diachi_nhatrai');
        $thiepcuoi->diachi_nhagai = $request->input('diachi_nhagai');
        $thiepcuoi->sdt_trai = $request->input('sdt_trai');
        $thiepcuoi->sdt_gai = $request->input('sdt_gai');
        $thiepcuoi->soluong_trai = $request->input('soluong_trai');
        $thiepcuoi->soluong_gai = $request->input('soluong_gai');
        $thiepcuoi->Tong_tien = $request->input('Tong_tien');
        $thiepcuoi->Dat_coc = $request->input('Dat_coc');
        $thiepcuoi->code_thiep = $request->input('code_thiep');
        $thiepcuoi->ngay_tra = $request->input('ngay_tra');

        $thiepcuoi->save();
        
        return redirect('/inthiepcuoi')->with('status','Đã thêm thành công ...');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/inthiepcuoi')->with('status','Thêm  không thành công thành công ...'.'\n ERROR:'.$th);
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
        $thiepcuoi = Thiepcuoi::find($id);
        return view('Thiepcuoi.Chitiet',['thiepcuoi'=>$thiepcuoi]);
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
        $thiepcuoi = Thiepcuoi::find($id);
        return view('Thiepcuoi.Edit',['thiepcuoi'=>$thiepcuoi]);
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
        try {
            //code...
            $thiepcuoi =  Thiepcuoi::find($id);
            $thiepcuoi->KH = $request->input('KH');
            $thiepcuoi->id_user = Auth::id();
            $thiepcuoi->o_nhatrai = $request->input('o_nhatrai');
            $thiepcuoi->b_nhatrai = $request->input('b_nhatrai');
            $thiepcuoi->o_nhatgai = $request->input('o_nhatgai');
            $thiepcuoi->b_nhagai = $request->input('b_nhagai');
            $thiepcuoi->qh = $request->input('qh');
            $thiepcuoi->of = $request->input('of');
            $thiepcuoi->chure = $request->input('chure');
            $thiepcuoi->codau = $request->input('codau');
            $thiepcuoi->bac_chure = $request->input('bac_chure');
            $thiepcuoi->bac_codau = $request->input('bac_codau');
            $thiepcuoi->time_an_trai = $request->input('time_an_trai');
            $thiepcuoi->time_tochuc_trai = $request->input('time_tochuc_trai');
            $thiepcuoi->time_an_gai = $request->input('time_an_gai');
            $thiepcuoi->time_tochuc_gai = $request->input('time_tochuc_gai');
            $thiepcuoi->diachi_nhatrai = $request->input('diachi_nhatrai');
            $thiepcuoi->diachi_nhagai = $request->input('diachi_nhagai');
            $thiepcuoi->sdt_trai = $request->input('sdt_trai');
            $thiepcuoi->sdt_gai = $request->input('sdt_gai');
            $thiepcuoi->soluong_trai = $request->input('soluong_trai');
            $thiepcuoi->soluong_gai = $request->input('soluong_gai');
            $thiepcuoi->Tong_tien = $request->input('Tong_tien');
            $thiepcuoi->Dat_coc = $request->input('Dat_coc');
            $thiepcuoi->code_thiep = $request->input('code_thiep');
            $thiepcuoi->ngay_tra = $request->input('ngay_tra');
    
            $thiepcuoi->update();
            
            return redirect('/inthiepcuoi')->with('status','Cập nhật thành công ...');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/inthiepcuoi')->with('status','Cập nhật thất bại vui lòng kiểm tra lại, dữ liệu không được trống ... \n ERROR: '.$th);
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
        //
        try {
            $thiepcuoi = Thiepcuoi::find($id);
            $thiepcuoi->delete();
            return redirect('/inthiepcuoi')->with('status','Xóa thành công ...');
        } catch (\Throwable $th) {
            //throw $th;
            return redirect('/inthiepcuoi')->with('status','Xóa KHÔNG thành công ...'.'\n'.$th->msg);
        }
       
    }
}
