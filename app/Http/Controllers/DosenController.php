<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    function show($id){
        $Dosen = Dosen::find($id);
        if (!$Dosen) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }
        return response()->json(['mahasiswa' => $Dosen]);
    }
    function store(Request $request, $id){
        $request->validate([
            'id' => 'required|unique:id',
            'nama' => 'required',
            'umur' => 'required|integer',
            'makul' => 'required'
        ]);

        $Dosen = Dosen::create($request->all());

        return response()->json(['message' => 'Dosen created successfully', 'mahasiswa' => $Dosen]);
    }

    function update(Request $request ,$id){
        $Dosen = Dosen::find($id);
        if (!$Dosen) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }

        $request->validate([
            'id' => 'required|unique:id',
            'nama' => 'required',
            'umur' => 'required|integer',
            'makul' => 'required'
        ]);

        $Dosen->update($request->all());

        return response()->json(['message' => 'Dosen updated successfully', 'mahasiswa' => $Dosen]);
    }

    function destroy($id){
        $Dosen = Dosen::find($id);
        if (!$Dosen) {
            return response()->json(['message' => 'Dosen not found'], 404);
        }

        $Dosen->delete();

        return response()->json(['message' => 'Dosen deleted successfully']);
    }
}
