<?php

// Made with ❤️ By RDev Team

namespace App\Command;

use Illuminate\Http\Request;
use Auth, RDev;

use App\Models\Bosnas;
use App\Models\Bosda;
use App\Models\KodeRekening;
use App\Models\DataPokokPendidikan;
use App\Models\KonfirmasiDataSatuanPendidikan;
use App\Models\AnggaranBos;

class RDevCommand {

    public static function TBOS($jenis)
    {
        return DataPokokpendidikan::sum($jenis);
    }

    public static function TPD()
    {
        return DataPokokpendidikan::sum('peserta_didik');
    }

    public static function TS()
    {
        return DataPokokpendidikan::count();
    }
    
    public static function BOSS($jenis)
    {
        if ($jenis == 'pagu_bosnas') {
            return DataPokokpendidikan::where('npsn', Auth::user()->email)->first()->pagu_bosnas;
        } else {
            return DataPokokpendidikan::where('npsn', Auth::user()->email)->first()->pagu_bosda;
        }
    }

    public static function PDS()
    {
        return DataPokokpendidikan::where('npsn', Auth::user()->email)->first()->peserta_didik;
    }

    public static function LSH($jenis)
    {
        if ($jenis == 'bosnas') {
            return Bosnas::all();
        } else {
            return Bosda::all();
        }
    }

    public static function LKR($jenis)
    {
        return KodeRekening::where('jenis', $jenis)->get();
    }

    public static function UbahSH($request, $jenis)
    {
        // dd($request->bosnas1[1]);
        if ($jenis == "bosnas") {
            Bosnas::find(1)->update([
                'sma' => $request->bosnas1[0],
                'smk' => $request->bosnas1[1],
                'slb' => $request->bosnas1[2],
            ]);
    
            Bosnas::find(2)->update([
                'sma' => $request->bosnas2[0],
                'smk' => $request->bosnas2[1],
                'slb' => $request->bosnas2[2],
            ]);
    
            Bosnas::find(3)->update([
                'sma' => $request->bosnas3[0],
                'smk' => $request->bosnas3[1],
                'slb' => $request->bosnas3[2],
            ]);
    
            Bosnas::find(4)->update([
                'sma' => $request->bosnas4[0],
                'smk' => $request->bosnas4[1],
                'slb' => $request->bosnas4[2],
            ]);
    
            Bosnas::find(5)->update([
                'sma' => $request->bosnas5[0],
                'smk' => $request->bosnas5[1],
                'slb' => $request->bosnas5[2],
            ]);
    
            Bosnas::find(6)->update([
                'sma' => $request->bosnas6[0],
                'smk' => $request->bosnas6[1],
                'slb' => $request->bosnas6[2],
            ]);
    
            Bosnas::find(7)->update([
                'sma' => $request->bosnas7[0],
                'smk' => $request->bosnas7[1],
                'slb' => $request->bosnas7[2],
            ]);
    
            Bosnas::find(8)->update([
                'sma' => $request->bosnas8[0],
                'smk' => $request->bosnas8[1],
                'slb' => $request->bosnas8[2],
            ]);
    
            Bosnas::find(9)->update([
                'sma' => $request->bosnas9[0],
                'smk' => $request->bosnas9[1],
                'slb' => $request->bosnas9[2],
            ]);
    
            Bosnas::find(10)->update([
                'sma' => $request->bosnas10[0],
                'smk' => $request->bosnas10[1],
                'slb' => $request->bosnas10[2],
            ]);
        } else {
            Bosda::find(1)->update([
                'sma' => $request->bosda1[0],
                'smk' => $request->bosda1[1],
                'slb' => $request->bosda1[2],
            ]);
    
            Bosda::find(2)->update([
                'sma' => $request->bosda2[0],
                'smk' => $request->bosda2[1],
                'slb' => $request->bosda2[2],
            ]);
    
            Bosda::find(3)->update([
                'sma' => $request->bosda3[0],
                'smk' => $request->bosda3[1],
                'slb' => $request->bosda3[2],
            ]);
    
            Bosda::find(4)->update([
                'sma' => $request->bosda4[0],
                'smk' => $request->bosda4[1],
                'slb' => $request->bosda4[2],
            ]);
    
            Bosda::find(5)->update([
                'sma' => $request->bosda5[0],
                'smk' => $request->bosda5[1],
                'slb' => $request->bosda5[2],
            ]);
    
            Bosda::find(6)->update([
                'sma' => $request->bosda6[0],
                'smk' => $request->bosda6[1],
                'slb' => $request->bosda6[2],
            ]);
    
            Bosda::find(7)->update([
                'sma' => $request->bosda7[0],
                'smk' => $request->bosda7[1],
                'slb' => $request->bosda7[2],
            ]);
    
            Bosda::find(8)->update([
                'sma' => $request->bosda8[0],
                'smk' => $request->bosda8[1],
                'slb' => $request->bosda8[2],
            ]);
    
            Bosda::find(9)->update([
                'sma' => $request->bosda9[0],
                'smk' => $request->bosda9[1],
                'slb' => $request->bosda9[2],
            ]);
    
            Bosda::find(10)->update([
                'sma' => $request->bosda10[0],
                'smk' => $request->bosda10[1],
                'slb' => $request->bosda10[2],
            ]);
        }
    }

    public static function UbahKR($request, $jenis)
    {
        $i=0;
        foreach ($request->id as $key) {
            KodeRekening::where('jenis', $jenis)->find($request->id[$i])->update([
                'kode_rekening' => $request->kr[$i],
                'uraian_rekening' => $request->ur[$i],
                'keterangan' => $request->k[$i++],
            ]);
        }
    }

    public static function DAPODIK()
    {
        return DataPokokPendidikan::get();
    }

    public static function CBosnas($kk, $bp, $pd)
    {
        // dd(Bosnas::where('kab_kota', $kk)->first()->slb * $pd);
        $bosnas = Bosnas::firstWhere('kab_kota', $kk);
        if ($bp == "SLB" && $pd < 60) {
            $count = $bosnas->slb * 60;
            return $count;
        } elseif ($bp == "SMA") {
            $count = $bosnas->sma * $pd;
            return $count;
        } elseif ($bp == "SMK") {
            $count = $bosnas->smk * $pd;
            return $count;
        } else {
            $count = $bosnas->slb;
            return $count;
        }
    }

    public static function CBosda($bp, $pd)
    {
        return Bosda::firstWhere('bentuk_pendidikan', $bp)->satuan_biaya;
    }

    public static function KonfirmasiData($status)
    {
        if ($status == 'own') {
            return KonfirmasiDataSatuanPendidikan::where('author', Auth::user()->email)->get();
        } else {
            return KonfirmasiDataSatuanPendidikan::where('status_k', $status)->get();
        }
    }

    public static function CKD()
    {
        return KonfirmasiDataSatuanPendidikan::where('status_k', '0')->count();
    }

    public static function LRBOS($jenis_bos, $sp)
    {
        return AnggaranBos::where('jenis_bos', $jenis_bos)->where('email_sp', $sp)->get();
    }
    
    public static function TRBOS($jenis_bos, $sp)
    {
        return AnggaranBos::where('jenis_bos', $jenis_bos)->where('email_sp', Auth::user()->email)->sum('pagu');
    }

    public static function CSel($jenis_bos)
    {
        if (RDev::BOSS('pagu_'.$jenis_bos)!=RDev::TRBOS($jenis_bos, Auth::user()->email)) {
            return 'Selisih';
        }
    }
}