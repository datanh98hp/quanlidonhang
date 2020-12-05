<?php

namespace App\Http\Controllers;
use App\Models\Thuchi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ThuchiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // date("Y-m-d H:i:s");
       // $tc = Thuchi::where('created_at','')->get('created_at');
        $thuchi = Thuchi::whereDate('created_at','=', date('Y-m-d'))->get();
        $Conlai = 0; $Tongthu=0; $Tongchi= 0;
        foreach ($thuchi as $key => $value) {
            $Conlai+=( $thuchi[$key]->SoTen_Thu - $thuchi[$key]->SoTen_Chi);
            $Tongthu += $thuchi[$key]->SoTen_Thu;
            $Tongchi += $thuchi[$key]->SoTen_Chi;
        }

        return view('Thuchi.Bangthuchi',
        [
            'thuchi'=>$thuchi,
            'Conlai'=>$Conlai,
            'Tongthu'=>$Tongthu,
            'Tongchi'=>$Tongchi
        ]);
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
        foreach ($request->input('NDCV') as $key=>$id) {
         
            $thuchi = new Thuchi;
            $thuchi->NDCV = $request->NDCV[$key];
            $thuchi->SoTen_Thu = $request->SoTen_Thu[$key];
            $thuchi->SoTen_Chi = $request->SoTen_Chi[$key];
            $thuchi->id_user  = Auth::user()->id;
            $thuchi->save();
        }
        return redirect('thuchi')->with('status','Thêm thành công...');
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
        $thuchi = Thuchi::find($id);

        return view('Thuchi.EditThuchi');
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
        $thuchi = Thuchi::find($id);
        $thuchi->delete();

        return redirect('thuchi')->with('status','Xóa thành công...');
    }
    public function print_bc_thuchi(Request $request){
        
        $start = $request->input('startdate');
        $end = $request->input('enddate');

        // $users = User::all();
        $thuchi = Thuchi::whereDate('created_at','>=',$start)->whereDate('created_at','<=',$end)->orderBy('id')->get();

        $Conlai = 0; $Tongthu=0; $Tongchi= 0;

        foreach ($thuchi as $key => $value) {
            $Conlai+=( $thuchi[$key]->SoTen_Thu - $thuchi[$key]->SoTen_Chi);
            $Tongthu += $thuchi[$key]->SoTen_Thu;
            $Tongchi += $thuchi[$key]->SoTen_Chi;
        }


        return view('Baocao.bc-Thuchi.print-BaocaoThuchi',[
            'thuchi'=>$thuchi,
            'Conlai'=>$Conlai,
            'Tongthu'=>$Tongthu,
            'Tongchi'=>$Tongchi,
            'start'=>$start,
            'end'=>$end
        ]);
    }
}
