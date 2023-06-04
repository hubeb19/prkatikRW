<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaContrller extends Controller
{
    public function index(){
   
    $products = [
        ['id' => 1, 'name' => 'Product A', 'price' => 10000],
        ['id' => 2, 'name' => 'Product B', 'price' => 20000],
        ['id' => 3, 'name' => 'Product C', 'price' => 30000],
    ];

    return response()->json($products);

    
}
// getdata all table
    function getData(){
        $data = Mahasiswa::all();

        if (!empty($data)){
            $success= true;
            $message = "data berhasil dibaca";
        } else{
            $success= false;
            $message = "data kosong";
        }
        $response =[
            "success"=>$success,
            "messege" => $message,
            "data"=> @$data
        ];
        return $response;
    }

    function getV2(){
        $model = new Mahasiswa();
        $data=$model -> all();
        foreach($data as $dt){
            $data []=[
                'nim'=>$dt->nim,
                'nama'=>$dt->nama,
                'umur'=>$dt->nim,
                'alamat'=>$dt->nim,
                'kota'=>$dt->nim,
                'kelas'=>$dt->nim,
                'jurusan'=>$dt->nim,
                
            ];
        }
    }

    // input create
    function create(Request $req){
        $model = new Mahasiswa();
        $model -> nim=$req->nim;
        $model -> nama=$req->nama;
        $model -> Umur=$req->Umur;
        $model -> alamat=$req->alamat;
        $model -> kota=$req->kota;
        $model -> kelas=$req->kelas;
        $model -> jurusan=$req->jurusan;

        if ($model->save()){
            $success= true;
            $message = "data berhasil disimpan";
        } else{
            $success= false;
            $message = "data gagal disimpan";
        }
        $response =[
            "success"=>$success,
            "messege" => $message,
            "data"=> @$req->all()
        ];
        return $response;
    }
    



}
