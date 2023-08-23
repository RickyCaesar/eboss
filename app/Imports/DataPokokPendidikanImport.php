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
        // dd($row);
        // dd(Bosnas::firstWhere('kab_kota', $row['kab_kota'])->slb);
        if ($row['bentuk_pendidikan'] == "SLB" && $row['peserta_didik'] < 60) {
            $pagu_bosnas = Bosnas::firstWhere('kab_kota', $row['kab_kota'])->slb * 60;
        } elseif ($row['bentuk_pendidikan'] == "SMA") {
            $pagu_bosnas = Bosnas::firstWhere('kab_kota', $row['kab_kota'])->sma * $row['peserta_didik'];
        } elseif ($row['bentuk_pendidikan'] == "SMK") {
            $pagu_bosnas = Bosnas::firstWhere('kab_kota', $row['kab_kota'])->smk * $row['peserta_didik'];
        } else {
            $pagu_bosnas = Bosnas::firstWhere('kab_kota', $row['kab_kota'])->slb * $row['peserta_didik'];
        }

        $pagu_bosda = Bosda::firstWhere('bentuk_pendidikan', $row['bentuk_pendidikan'])->satuan_biaya * $row['peserta_didik'];

        User::insert([
            'name' => $row['satuan_pendidikan'],
            'email' => $row['npsn'],
            'role' => '1',
            'password' => Hash::make($row['npsn']),
        ]);

        return new DataPokokPendidikan([
            'satuan_pendidikan' => $row['satuan_pendidikan'],
            'npsn' => $row['npsn'],
            'bentuk_pendidikan' => $row['bentuk_pendidikan'],
            'kab_kota_sp' => $row['kab_kota'],
            'peserta_didik' => $row['peserta_didik'],
            'pagu_bosnas' => $pagu_bosnas,
            'pagu_bosda' => $pagu_bosda,
        ]);
    }
}
