<?php

namespace App\Http\Controllers;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class BackupController extends Controller
{
    public function backup_view(){
        $listFileBackUp_path = glob(storage_path('app\Laravel\*'));
        $arr_listFileName = [];/// mang ten file

       foreach($listFileBackUp_path as $filename){
        //Simply print them out onto the screen.
            array_push($arr_listFileName, substr( $filename, 51));
        }
    //   dd($arr_listFile);
        return view('backup.backup',['listfilenameBackUp'=>$arr_listFileName,'list_path'=>$listFileBackUp_path]);
    }
    public function backup_file($filename){
     dd(storage_path('app\Laravel').$filename);
     $headers =['Content-Type: application/zip'];
       return Storage::download(storage_path('app\Laravel').$filename,$filename,$headers);
    }
}
