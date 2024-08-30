<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kabupaten;
use Illuminate\Http\Request;
use Validator;

class KabupatenController extends Controller
{
    public function index()
    {
        $kabupaten = Kabupaten::latest()->get();
        $res = [
            'success' => true,
            'message' => 'Daftar Kabupaten',
            'data' => $kabupaten,
        ];
        return response()->json($res, 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_kabupaten' => 'required|unique:Kabupatens',
           
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validasi gagal',
                'errors' => $validate->errors(),
            ], 422);
        }

        try {
            $kabupaten = new Kabupaten;
            $kabupaten->nama_kabupaten = $request->nama_kabupaten;
            $kabupaten->save();
            return response()->json([
                'success' => true,
                'message' => 'data kabupaten berhasil dibuat',
                'data' => $kabupaten,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'terjadi kesalahan',
                'errors' => $e->getMassage(),
            ], 500);
        }
    }
    public function show($id)
    {
        try {
            $kabupaten = Kabupaten::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Detail Kabupaten',
                'data' => $kabupaten,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ada',
                'errors' => $e->getMassage(),
            ], 404);
        }
    }
    public function update(Request $request, $id)
    {
        $validate = Validator::make($request->all(), [
            'nama_kabupaten' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validasi gagal',
                'errors' => $validate->errors(),
            ], 422);
        }

        try {
            $kabupaten = Kabupaten::findOrFail($id);
            $kabupaten->nama_kabupaten = $request->nama_kabupaten;
            $kabupaten->save();
            return response()->json([
                'success' => true,
                'message' => 'data Kabupaten berhasil diubah',
                'data' => $kabupaten,
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'terjadi kesalahan',
                'errors' => $e->getMassage(),
            ], 500);
        }
    }
    public function destroy($id)
    {
        try {
            $kabupaten = Kabupaten::findOrFail($id);
            $kabupaten->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data ' . $kabupaten->nama_kabupaten . ' berhasil dihapus',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'data tidak ada',
                'errors' => $e->getMassage(),
            ], 404);
        }
    }
}

