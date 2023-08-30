<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RDev, Excel, DB;

use App\Imports\DataPokokPendidikanImport;
use App\Exports\DataPokokPendidikanExport;
use App\Models\DataPokokPendidikan;
use App\Models\Bosnas;
use App\Models\Bosda;

class DataPokokPendidikanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pages.DataPokokSekolah.DataPokokPendidikan');
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
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataPokokPendidikan  $dataPokokPendidikan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataPokokPendidikan  $dataPokokPendidikan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sekolah = DataPokokPendidikan::find($id); 
        // dd($data);
        return view('Pages.DataPokokSekolah.EditPD', ['sekolah'=>$sekolah]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataPokokPendidikan  $dataPokokPendidikan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // DB::enableQueryLog();
        $sekolah = DataPokokPendidikan::find($id);

        if ($sekolah->bentuk_pendidikan == "SLB" && $request->peserta_didik < 60) {
            $pagu_bosnas = Bosnas::firstWhere('kab_kota', $sekolah->kab_kota_sp)->slb * 60;
            $pagu_bosda = Bosda::firstWhere('kab_kota', $sekolah->kab_kota_sp)->slb * $request->peserta_didik;
        } elseif ($sekolah->bentuk_pendidikan == "SMA") {
            $pagu_bosnas = Bosnas::firstWhere('kab_kota', $sekolah->kab_kota_sp)->sma * $request->peserta_didik;
            $pagu_bosda = Bosda::firstWhere('kab_kota', $sekolah->kab_kota_sp)->sma * $request->peserta_didik;
        } elseif ($sekolah->bentuk_pendidikan == "SMK") {
            $pagu_bosnas = Bosnas::firstWhere('kab_kota', $sekolah->kab_kota_sp)->smk * $request->peserta_didik;
            $pagu_bosda = Bosda::firstWhere('kab_kota', $sekolah->kab_kota_sp)->smk * $request->peserta_didik;
        } else {
            $pagu_bosnas = Bosnas::firstWhere('kab_kota', $sekolah->kab_kota_sp)->slb * $request->peserta_didik;
            $pagu_bosda = Bosda::firstWhere('kab_kota', $sekolah->kab_kota_sp)->slb * $request->peserta_didik;
        }

        $sekolah->update([
            'peserta_didik' => $request->peserta_didik,
            'pagu_bosnas' => strval($pagu_bosnas),
            'pagu_bosda' => strval($pagu_bosda),
        ]);
        // dd(DB::getQueryLog());
        // dd($sekolah->toSql());

        return redirect()->route('data-pokok-pendidikan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataPokokPendidikan  $dataPokokPendidikan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function importExcel(Request $request)
    {
        Excel::import(new DataPokokPendidikanImport, $request->file);
        return redirect()->route('data-pokok-pendidikan.index');
    }

    public function exportExcel()
    {
        return Excel::download(new DataPokokPendidikanExport, 'DanaBOSSekolah.xlsx');
    }

    public function reset()
    {
        DataPokokPendidikan::truncate();
        return redirect()->route('data-pokok-pendidikan.index');
    }
}
