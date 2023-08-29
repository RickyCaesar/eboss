@extends('Layouts.Index')
@section('Content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-cash icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Satuan Harga</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Satuan Harga Dana BOSNAS Prov. Kaltim</h5>
                            </div>
                            <div class="col-5 text-right">
                                <button class="btn-shadow btn btn-primary text-white font-weight-bold"
                                    style="display: inline;" id="UbahBosnas" onclick="UbahBosnas()">Ubah</button>
                                <button class="btn-shadow btn btn-danger text-white font-weight-bold"
                                    style="display: none;" id="CloseBosnas" onclick="BatalBosnas()">Batal</button>
                                <button class="btn-shadow btn btn-success text-white font-weight-bold"
                                    style="display: none;" id="SubmitBosnas" type="submit"
                                    form="FormBosnas">Kirim</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="mb-0 table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center">No</th>
                                        <th class="align-middle text-center">Kabupaten Berau</th>
                                        <th class="align-middle text-center">Sekolah Menengah Atas</th>
                                        <th class="align-middle text-center">Sekolah Menengah Kejuruan</th>
                                        <th class="align-middle text-center">Sekolah Luar Biasa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{route('satuan-harga.update', 'bosnas')}}" method="POST"
                                        id="FormBosnas">
                                        @csrf
                                        @method('PUT')

                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach (RDev::LSH('bosnas') as $data)
                                        <tr>
                                            <th scope="row">{{$i}}</th>
                                            <td>{{$data->kab_kota}}</td>
                                            <td>
                                                <span id="SMA{{$i}}"
                                                    style="display: inline;">{{ number_format($data->sma, 0, ',', '.') }}</span>
                                                <input type="text" name="bosnas{{$i}}[]" value="{{$data->sma}}"
                                                    id="InputSMA{{$i}}" style="display: none;">
                                            </td>
                                            <td>
                                                <span id="SMK{{$i}}"
                                                    style="display: inline;">{{ number_format($data->smk, 0, ',', '.') }}</span>
                                                <input type="text" name="bosnas{{$i}}[]" value="{{$data->smk}}"
                                                    id="InputSMK{{$i}}" style="display: none;">
                                            </td>
                                            <td>
                                                <span id="SLB{{$i}}"
                                                    style="display: inline;">{{ number_format($data->slb, 0, ',', '.') }}</span>
                                                <input type="text" name="bosnas{{$i}}[]" value="{{$data->slb}}"
                                                    id="InputSLB{{$i++}}" style="display: none;">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Satuan Harga Dana BOSDA Prov. Kaltim</h5>
                            </div>
                            {{-- <div class="col-5 text-right">
                                <button class="btn-shadow btn btn-primary text-white font-weight-bold"
                                    style="display: inline;" id="UbahBosnas" onclick="UbahBosda()">Ubah</button>
                                <button class="btn-shadow btn btn-danger text-white font-weight-bold"
                                    style="display: none;" id="CloseBosnas" onclick="BatalBosda()">Batal</button>
                                <button class="btn-shadow btn btn-success text-white font-weight-bold"
                                    style="display: none;" id="SubmitBosnas" type="submit"
                                    form="FormBosnas">Kirim</button>
                            </div> --}}
                        </div>
                        <div class="table-responsive">
                            <table class="mb-0 table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center">No</th>
                                        <th class="align-middle text-center">Kabupaten Berau</th>
                                        <th class="align-middle text-center">Sekolah Menengah Atas</th>
                                        <th class="align-middle text-center">Sekolah Menengah Kejuruan</th>
                                        <th class="align-middle text-center">Sekolah Luar Biasa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{route('satuan-harga.update', 'bosda')}}" method="POST"
                                        id="FormBosda">
                                        @csrf
                                        @method('PUT')

                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach (RDev::LSH('bosda') as $data)
                                        <tr>
                                            <th scope="row">{{$i}}</th>
                                            <td>{{$data->kab_kota}}</td>
                                            <td>
                                                <span id="SMA{{$i}}"
                                                    style="display: inline;">{{ number_format($data->sma, 0, ',', '.') }}</span>
                                                <input type="text" name="bosnas{{$i}}[]" value="{{$data->sma}}"
                                                    id="InputSMA{{$i}}" style="display: none;">
                                            </td>
                                            <td>
                                                <span id="SMK{{$i}}"
                                                    style="display: inline;">{{ number_format($data->smk, 0, ',', '.') }}</span>
                                                <input type="text" name="bosnas{{$i}}[]" value="{{$data->smk}}"
                                                    id="InputSMK{{$i}}" style="display: none;">
                                            </td>
                                            <td>
                                                <span id="SLB{{$i}}"
                                                    style="display: inline;">{{ number_format($data->slb, 0, ',', '.') }}</span>
                                                <input type="text" name="bosnas{{$i}}[]" value="{{$data->slb}}"
                                                    id="InputSLB{{$i++}}" style="display: none;">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            {{-- <div class="col-xl-6 col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Satuan Harga Dana BOSDA Prov. Kaltim</h5>
                            </div>
                            <div class="col-5 text-right">
                                <button class="btn-shadow btn btn-primary text-white font-weight-bold"
                                    id="UbahBosda" onclick="UbahBosda()">Ubah</button>
                                <button class="btn-shadow btn btn-danger text-white font-weight-bold"
                                    style="display: none;" id="CloseBosda" onclick="BatalBosda()">Batal</button>
                                <button class="btn-shadow btn btn-success text-white font-weight-bold"
                                    style="display: none;" id="SubmitBosda" type="submit"
                                    form="FormBosda">Kirim</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="mb-0 table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center">No</th>
                                        <th class="align-middle text-center">Bentuk Pendidikan</th>
                                        <th class="align-middle text-center">Satuan Biaya</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{route('satuan-harga.update', 'bosda')}}" method="POST"
                                        id="FormBosda">
                                        @csrf
                                        @method('PUT')
                                        <tr>
                                            <th scope="row">1</th>
                                            <td>Sekolah Menengah Atas</td>
                                            <td>
                                                <span id="SMA11"
                                                    style="display: inline;">{{ number_format(RDev::LSH('bosda')->where('bentuk_pendidikan', 'SMA')->first()->satuan_biaya, 0, ',', '.') }}</span>
                                                <input type="text" name="bosda[]"
                                                    value="{{RDev::LSH('bosda')->where('bentuk_pendidikan', 'SMA')->first()->satuan_biaya}}"
                                                    id="InputSMA11" style="display: none;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">2</th>
                                            <td>Sekolah Menengah Kejuruan</td>
                                            <td>
                                                <span id="SMK11"
                                                    style="display: inline;">{{ number_format(RDev::LSH('bosda')->where('bentuk_pendidikan', 'SMK')->first()->satuan_biaya, 0, ',', '.') }}</span>
                                                <input type="text" name="bosda[]"
                                                    value="{{RDev::LSH('bosda')->where('bentuk_pendidikan', 'SMK')->first()->satuan_biaya}}"
                                                    id="InputSMK11" style="display: none;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">3</th>
                                            <td>Sekolah Luar Biasa</td>
                                            <td>
                                                <span id="SLB11"
                                                    style="display: inline;">{{ number_format(RDev::LSH('bosda')->where('bentuk_pendidikan', 'SLB')->first()->satuan_biaya, 0, ',', '.') }}</span>
                                                <input type="text" name="bosda[]"
                                                    value="{{RDev::LSH('bosda')->where('bentuk_pendidikan', 'SMK')->first()->satuan_biaya}}"
                                                    id="InputSLB11" style="display: none;">
                                            </td>
                                        </tr>
                                    </form>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div> --}}
        </div>
    </div>
</div>
@endsection

@push('Javascript')
<script type="text/javascript">
    function UbahBosnas() {
        for (let index = 1; index <= 10; index++) {
            $sma = "SMA" + index;
            $smk = "SMK" + index;
            $slb = "SLB" + index;
            ShowInputBosnas($sma);
            ShowInputBosnas($smk);
            ShowInputBosnas($slb);
        }
    }

    function UbahBosda() {
        document.getElementById('SMA11').style = "display: none;"
        document.getElementById('SMK11').style = "display: none;"
        document.getElementById('SLB11').style = "display: none;"
        document.getElementById('UbahBosda').style = "display: none;"
        document.getElementById('InputSMA11').style = "display: inline;"
        document.getElementById('InputSMK11').style = "display: inline;"
        document.getElementById('InputSLB11').style = "display: inline;"
        document.getElementById('CloseBosda').style = "display: inline;"
        document.getElementById('SubmitBosda').style = "display: inline;"
    }

    function BatalBosnas() {
        for (let index = 1; index <= 10; index++) {
            $sma = "SMA" + index;
            $smk = "SMK" + index;
            $slb = "SLB" + index;
            CloseInputBosnas($sma);
            CloseInputBosnas($smk);
            CloseInputBosnas($slb);
        }
    }

    function BatalBosda() {
        document.getElementById('SMA11').style = "display: inline;"
        document.getElementById('SMK11').style = "display: inline;"
        document.getElementById('SLB11').style = "display: inline;"
        document.getElementById('UbahBosda').style = "display: inline;"
        document.getElementById('InputSMA11').style = "display: none;"
        document.getElementById('InputSMK11').style = "display: none;"
        document.getElementById('InputSLB11').style = "display: none;"
        document.getElementById('CloseBosda').style = "display: none;"
        document.getElementById('SubmitBosda').style = "display: none;"
    }

    function ShowInputBosnas(id) {
        document.getElementById(id).style = "display: none;"
        document.getElementById('Input' + id).style = "display: inline;"
        document.getElementById('UbahBosnas').style = "display: none;"
        document.getElementById('CloseBosnas').style = "display: inline;"
        document.getElementById('SubmitBosnas').style = "display: inline;"
    }

    function CloseInputBosnas(id) {
        document.getElementById(id).style = "display: inline;"
        document.getElementById('Input' + id).style = "display: none;"
        document.getElementById('UbahBosnas').style = "display: inline;"
        document.getElementById('CloseBosnas').style = "display: none;"
        document.getElementById('SubmitBosnas').style = "display: none;"
    }
</script>
@endpush