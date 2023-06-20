<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaContrller extends Controller
{
    public function login(Request $request)
        {
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {

        $token = $request->user()->createToken('token-name');

        return response()->json([

        'access_token' => $token->plainTextToken,

        ]);
        }
        return response()->json([

        'message' => 'Invalid login credentials',

        ], 401);

        }
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
        $model -> Umur=$req->umur;
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

    function show($nim){
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }
        return response()->json(['mahasiswa' => $mahasiswa]);
    }
    function store(Request $request){
        $request->validate([
            
            'nim' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'umur' => 'required|integer',
            'alamat' => 'required',
            'kota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa = Mahasiswa::create($request->all());

        return response()->json(['message' => 'Mahasiswa created successfully', 'mahasiswa' => $mahasiswa]);
    }

    function update(Request $request ,$nim){
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $request->validate([
            'nama' => 'required',
            'umur' => 'required|integer',
            'alamat' => 'required',
            'kota' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
        ]);

        $mahasiswa->update($request->all());

        return response()->json(['message' => 'Mahasiswa updated successfully', 'mahasiswa' => $mahasiswa]);
    }

    function destroy($nim){
        $mahasiswa = Mahasiswa::find($nim);
        if (!$mahasiswa) {
            return response()->json(['message' => 'Mahasiswa not found'], 404);
        }

        $mahasiswa->delete();

        return response()->json(['message' => 'Mahasiswa deleted successfully']);
    }
    
    //delete
    //update


}
