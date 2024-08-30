<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kecamatan = Kecamatan::all();
        return view('kecamatan.index', compact('kecamatan'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kabupaten = Kabupaten::all();
        return view('kecamatan.create', compact('kabupaten'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_kecamatan' => 'required|string|max:255|unique:kecamatans',
        ],

            [
                'nama_kecamatan.unique' => 'Kabupaten dengan nama tersebut sudah ada sebelumnya.',
            ]

        );

        $kecamatan = new Kecamatan;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kabupaten = $request->id_kabupaten;

        $kecamatan->save();
        return redirect()->route('kecamatan.index')
            ->with('success', 'data berhasil di tambahkan');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kecamatan = Kecamatan::FindOrFail($id);
        $kabupaten = Kabupaten::all();
        return view('kecamatan.show', compact('kecamatan', 'kabupaten'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $kecamatan = Kecamatan::FindOrFail($id);
        $kabupaten = Kabupaten::all();
        return view('kecamatan.edit', compact('kecamatan', 'kabupaten'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'nama_kecamatan' => 'required|string|max:255|unique:kecamatans',
        ],

            [
                'nama_kecamatan.unique' => 'Kabupaten dengan nama tersebut sudah ada sebelumnya.',
            ]

        );

        $kecamatan = Kecamatan::FindOrFail($id);
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->id_kabupaten = $request->id_kabupaten;

        $kecamatan->save();
        return redirect()->route('kecamatan.index')
            ->with('success', 'data berhasil di tambahkan');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Kecamatan  $kecamatan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $kecamatan = Kecamatan::FindOrFail($id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')
            ->with('success', 'data berhasil dihapus');

    }
}
