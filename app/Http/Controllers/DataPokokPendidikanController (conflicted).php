<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RDev, Excel;

use App\Imports\DataPokokPendidikanImport;
use App\Exports\DataPokokPendidikanExport;
use App\Models\DataPokokPendidikan;

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
        $datas = DataPokokPendidikan::find($id)->first(); 
        dd($datas);
        return view('Pages.DataPokokSekolah.EditPD', $datas);
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
        //
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
