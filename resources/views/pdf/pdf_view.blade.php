<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet" type="text/css" />
</head>
<body>
    <center>KOP SURAT</center>
    <h6 class="text-center mt-5 mb-5 pt-5"><u>SURAT PERNYATAAN TANGGUNGJAWAB MUTLAK</u></h6>
    <p>
        Saya yang bertanda tangan di bawah ini :
    </p>
    <table class="mt-3 mb-3 ml-4 mr-4">
        <tr>
            <td width="100px">Nama</td>
            <td>:</td>
            <td>......................................</td>
        </tr>
        <tr>
            <td>NIP</td>
            <td>:</td>
            <td>......................................</td>
        </tr>
        <tr>
            <td>Jabatan</td>
            <td>:</td>
            <td>......................................</td>
        </tr>
    </table>
    <p>
        Dengan ini menyatakan dengan sesungguhnya bahwa saya bertanggung jawab penuh atas data BOSNAS dan BOSDA Tahun {{date('Y')}} Sebagai Berikut :
    </p>
    <table class="mt-5 mb-3 ml-4 mr-4">
        <tr>
            <td width="100px">Program</td>
            <td>:</td>
            <td>PROGRAM PENGELOLAAN PENDIDIKAN</td>
        </tr>
        <tr>
            <td>Kegiatan</td>
            <td>:</td>
            <td>
                @if (RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMA')
                Pengelolaan Pendidikan Sekolah Menengah Atas
                @elseif (RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMK')
                Pengelolaan Pendidikan Sekolah Menengah Kejuruan
                @else
                Pengelolaan Pendidikan Khusus
                @endif
            </td>
        </tr>
        <tr>
            <td>Sub Kegiatan</td>
            <td>:</td>
            <td>
                <b>
                    <u>
                        @if (RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMA')
                        Pengelolaan Dana BOS Sekolah Menengah Atas (BOSNAS)
                        @elseif (RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMK')
                        Pengelolaan Dana BOS Sekolah Menengah Kejuruan (BOSNAS)
                        @else
                        Pengelolaan Dana BOS Sekolah Pendidikan Khusus (BOSNAS)
                        @endif
                    </u>
                </b>
            </td>
        </tr>
    </table>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">Kode Rekening</th>
                    <th scope="col">Uraian Rekening</th>
                    <th scope="col">Pagu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rincian_bosnas as $bosnas)
                    <tr>
                        <td>{{$bosnas->kd_rekening}}</td>
                        <td>{{$bosnas->UraianRekening->uraian_rekening}}</td>
                        <td>{{number_format($bosnas->pagu, 2)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <table class="mt-5 mb-3 ml-4 mr-4">
            <tr>
                <td width="100px">Program</td>
                <td>:</td>
                <td>PROGRAM PENGELOLAAN PENDIDIKAN</td>
            </tr>
            <tr>
                <td>Kegiatan</td>
                <td>:</td>
                <td>
                    @if (RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMA')
                    Pengelolaan Pendidikan Sekolah Menengah Atas
                    @elseif (RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMK')
                    Pengelolaan Pendidikan Sekolah Menengah Kejuruan
                    @else
                    Pengelolaan Pendidikan Khusus
                    @endif
                </td>
            </tr>
            <tr>
                <td>Sub Kegiatan</td>
                <td>:</td>
                <td>
                    <b>
                        <u>
                            @if (RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMA')
                            Penyediaan Biaya Personil Peserta Didik Sekolah Menengah Atas (BOSDA)
                            @elseif (RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMK')
                            Penyediaan Biaya Personil Peserta Didik Sekolah Menengah Kejuruan (BOSDA)
                            @else
                            Penyediaan Biaya Personil Peserta Didik Sekolah Pendidikan Khusus (BOSDA)
                            @endif
                        </u>
                    </b>
                </td>
            </tr>
        </table>
        <table class="table table-bordered mb-5">
            <thead>
                <tr class="table-secondary">
                    <th scope="col">Kode Rekening</th>
                    <th scope="col">Uraian Rekening</th>
                    <th scope="col">Pagu</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rincian_bosda as $bosda)
                    <tr>
                        <td>{{$bosda->kd_rekening}}</td>
                        <td>{{$bosda->UraianRekening->uraian_rekening}}</td>
                        <td>{{number_format($bosda->pagu, 2)}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <p style="text-indent: 50px">
            Demikian surat pernyataan tanggungjawab mutlak ini buat  sesuai dengan kebutuhan sebenarnya.
        </p>
        <br>
        <br>
        <p style="text-align: right; margin-right: 105px;">Samarinda</p>
        <p style="text-align: right; margin-right: 70px;">Kepala Sekolah</p>
        <br>
        <br>
        <br>
        <p style="text-align: right; margin-right: 95px;">(.................)</p>
        <p style="text-align: right; margin-right: 70px;">NIP...................</p>
    <script src="{{ asset('js/app.js') }}" type="text/js"></script>
</body>
</html>