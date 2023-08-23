<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\KonfirmasiDataSatuanPendidikan;

class KonfirmasiDataSatuanPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pages.Log.KonfirmasiData');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Pages.VerifikasiDataSatuanPendidikan.VerifikasiDataSatuanPendidikan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        KonfirmasiDataSatuanPendidikan::create([
            'konfirmasi' => $request->konfirmasi,
            'author' => Auth::user()->email,
            'updated_at' => null,
        ]);

        return redirect()->route('verifikasi-data-pokok-pendidikan.create');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\KonfirmasiDataSatuanPendidikan  $konfirmasiDataSatuanPendidikan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\KonfirmasiDataSatuanPendidikan  $konfirmasiDataSatuanPendidikan
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
     * @param  \App\Models\KonfirmasiDataSatuanPendidikan  $konfirmasiDataSatuanPendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        KonfirmasiDataSatuanPendidikan::find($id)->update([
            'status_k' => $request->status_k,
            'verifikator' => Auth::user()->email,
        ]);

        return redirect()->route('konfirmasi-data.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\KonfirmasiDataSatuanPendidikan  $konfirmasiDataSatuanPendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
