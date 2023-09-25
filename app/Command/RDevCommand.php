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

    public static function TBOS($jenis, $status=null)
    {
        if (isset($status)) {
            return DataPokokpendidikan::where('status', $status)->sum($jenis);
        }else{
            return DataPokokpendidikan::sum($jenis);
        }
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
        if ($jenis == "bosnas") {
            for ($i=1; $i < 11; $i++) {
                Bosnas::find($i)->update([
                    'sma' => $request->{'bosnas'.$i}[0],
                    'smk' => $request->{'bosnas'.$i}[1],
                    'slb' => $request->{'bosnas'.$i}[2],
                ]);
            }
        } else {
            for ($i=1; $i < 11; $i++) {
                Bosda::find($i)->update([
                    'sma' => $request->{'bosda'.$i}[0],
                    'smk' => $request->{'bosda'.$i}[1],
                    'slb' => $request->{'bosda'.$i}[2],
                ]);
            }
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