<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth, PDF, RDev;

use App\Models\AnggaranBos;

class AnggaranBosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('Pages.PenganggaranDanaBos.PenganggaranDanaBos');
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
        if (AnggaranBos::where('email_sp', Auth::user()->email)->where('jenis_bos', $request->jenis_bos)->count() > 0) {
            foreach ($request->kd_rekening as $value) {
                AnggaranBos::where('kd_rekening', $value)->where('email_sp', Auth::user()->email)->first()->update([
                    'kd_rekening' =>$value,
                    'pagu' => $request->pagu[$value],
                    'email_sp' => Auth::user()->email,
                ]);
            }
        } else {
            foreach ($request->kd_rekening as $value) {
                AnggaranBos::create([
                    'kd_rekening' =>$value,
                    'jenis_bos' => $request->jenis_bos,
                    'pagu' => $request->pagu[$value],
                    'email_sp' => Auth::user()->email,
                ]);
            }
        }
        return redirect()->route('penganggaran-dana-bos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AnggaranBos  $anggaranBos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rincian_bosnas = RDev::LRBOS('bosnas', $id);
        $rincian_bosda = RDev::LRBOS('bosda', $id);
        $nama_file = RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->satuan_pendidikan;
        
        $pdf = PDF::loadView('pdf.pdf_view', ['rincian_bosnas'=>$rincian_bosnas, 'rincian_bosda' => $rincian_bosda]);
        return $pdf->download('sptjm'.$nama_file.'.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AnggaranBos  $anggaranBos
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
     * @param  \App\Models\AnggaranBos  $anggaranBos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AnggaranBos  $anggaranBos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
