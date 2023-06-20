<?php

namespace App\Http\Controllers;
use App\Models\makul;
use Illuminate\Http\Request;

class MakulController extends Controller
{
    function show($id){
        $makul = makul::find($id);
        if (!$makul) {
            return response()->json(['message' => 'makul not found'], 404);
        }
        return response()->json(['makul' => $makul]);
    }
    function store(Request $request, $id){
        $request->validate([
            'id' => 'required|unique:id',
            'nama' => 'required',
            'sks' => 'required|integer',
            'dosen' => 'required',
        ]);

        $makul = makul::create($request->all());

        return response()->json(['message' => 'makul created successfully', 'makul' => $makul]);
    }

    function update(Request $request ,$id){
        $makul = makul::find($id);
        if (!$makul) {
            return response()->json(['message' => 'makul not found'], 404);
        }

        $request->validate([
            'id' => 'required|unique:id',
            'nama' => 'required',
            'sks' => 'required|integer',
            'dosen' => 'required',
        ]);

        $makul->update($request->all());

        return response()->json(['message' => 'makul updated successfully', 'makul' => $makul]);
    }

    function destroy($id){
        $makul = makul::find($id);
        if (!$makul) {
            return response()->json(['message' => 'makul not found'], 404);
        }

        $makul->delete();

        return response()->json(['message' => 'makul deleted successfully']);
    }
}
