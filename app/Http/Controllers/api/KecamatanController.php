<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Kecamatan;
use Illuminate\Http\Request;
use Validator;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::latest()->get();
        $res = [
            'success' => true,
            'message' => 'Daftar Kecamatan',
            'data' => $kecamatan,
        ];
        return response()->json($res, 200);
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'nama_kecamatan' => 'required|unique:kecamatans',
            'id_kabupaten' => 'required',

        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validasi gagal',
                'errors' => $validate->errors(),
            ], 422);
        }

        try {
            $kecamatan = new Kecamatan;
            $kecamatan->nama_kecamatan = $request->nama_kecamatan;
            $kecamatan->save();
            return response()->json([
                'success' => true,
                'message' => 'data Kecamatan berhasil dibuat',
                'data' => $kecamatan,
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
            $kecamatan = kecamatan::findOrFail($id);
            return response()->json([
                'success' => true,
                'message' => 'Detail Kecamatan',
                'data' => $kecamatan,
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
            'nama_kecamatan' => 'required',
            'id_kabupaten' => 'required',
        ]);

        if ($validate->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'validasi gagal',
                'errors' => $validate->errors(),
            ], 422);
        }

        try {
            $kecamatan = kecamatan::findOrFail($id);
            $kecamatan->nama_kecamatan = $request->nama_kecamatan;
            $kecamatan->save();
            return response()->json([
                'success' => true,
                'message' => 'data Kecamatan berhasil diubah',
                'data' => $kecamatan,
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
            $kecamatan = kecamatan::findOrFail($id);
            $kecamatan->delete();
            return response()->json([
                'success' => true,
                'message' => 'Data ' . $kecamatan->nama_kecamatan . ' berhasil dihapus',
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
