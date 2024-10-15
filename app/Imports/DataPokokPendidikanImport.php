<?php

namespace App\Imports;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use RDev, Hash;

use App\Models\DataPokokPendidikan;
use App\Models\Bosnas;
use App\Models\Bosda;
use App\Models\User;


class DataPokokPendidikanImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row['kab_kota']);
        // dd(Bosnas::firstWhere('kab_kota', $row['kab_kota'])->slb);

        if ($row['bentuk_pendidikan'] == "SLB" && $row['peserta_didik'] < 60) {
            $besaran_bosnas = Bosnas::firstWhere('kab_kota', $row['kab_kota'])->slb;
            $besaran_bosda = Bosda::firstWhere('kab_kota', $row['kab_kota'])->slb;
            $pagu_bosnas = $besaran_bosnas * 60;
            $pagu_bosda = $besaran_bosda * $row['peserta_didik'];
        } elseif ($row['bentuk_pendidikan'] == "SMA") {
            $besaran_bosnas = Bosnas::firstWhere('kab_kota', $row['kab_kota'])->sma;
            $besaran_bosda = Bosda::firstWhere('kab_kota', $row['kab_kota'])->sma;
            $pagu_bosnas = $besaran_bosnas * $row['peserta_didik'];
            $pagu_bosda = $besaran_bosda * $row['peserta_didik'];
        } elseif ($row['bentuk_pendidikan'] == "SMK") {
            $besaran_bosnas = Bosnas::firstWhere('kab_kota', $row['kab_kota'])->smk;
            $besaran_bosda = Bosda::firstWhere('kab_kota', $row['kab_kota'])->smk;
            $pagu_bosnas = $besaran_bosnas * $row['peserta_didik'];
            $pagu_bosda = $besaran_bosda * $row['peserta_didik'];
        } else {
            $besaran_bosnas = Bosnas::firstWhere('kab_kota', $row['kab_kota'])->slb;
            $besaran_bosda = Bosda::firstWhere('kab_kota', $row['kab_kota'])->slb;
            $pagu_bosnas = $besaran_bosnas * $row['peserta_didik'];
            $pagu_bosda = $besaran_bosda * $row['peserta_didik'];
        }
        
        // $pagu_bosda = Bosda::firstWhere('bentuk_pendidikan', $row['bentuk_pendidikan'])->satuan_biaya * $row['peserta_didik'];

        if (empty(User::where('email', $row['npsn'])->first())) {
            User::insert([
                'name' => $row['satuan_pendidikan'],
                'email' => $row['npsn'],
                'role' => '1',
                'password' => Hash::make($row['npsn']),
            ]);
        }

        if (empty(DataPokokPendidikan::where('npsn', $row['npsn'])->first())) {
            return new DataPokokPendidikan([
                'satuan_pendidikan' => $row['satuan_pendidikan'],
                'npsn' => $row['npsn'],
                'bentuk_pendidikan' => $row['bentuk_pendidikan'],
                'kab_kota_sp' => $row['kab_kota'],
                'status' => $row['status'],
                'peserta_didik' => $row['peserta_didik'],
                'besaran_satuan_biaya_bosnas' => $besaran_bosnas,
                'besaran_satuan_biaya_bosda' => $besaran_bosda,
                'pagu_bosnas' => strval($pagu_bosnas),
                'pagu_bosda' => strval($pagu_bosda),
            ]);
        } else {
            DataPokokPendidikan::where('npsn', $row['npsn'])->first()->update([
                'status' => $row['status'],
                'peserta_didik' => $row['peserta_didik'],
                'besaran_satuan_biaya_bosnas' => $besaran_bosnas,
                'besaran_satuan_biaya_bosda' => $besaran_bosda,
                'pagu_bosnas' => strval($pagu_bosnas),
                'pagu_bosda' => strval($pagu_bosda),
            ]);
        }
        
    }
}
