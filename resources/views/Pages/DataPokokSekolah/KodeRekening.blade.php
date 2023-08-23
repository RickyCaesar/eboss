@extends('Layouts.Index')
@section('Content')
<style>
    input[type=text], textarea {
        width: 100%;
    }
</style>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-diamond icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Kode Rekening</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Kode Rekening BOSNAS Prov. Kaltim</h5>
                            </div>
                            <div class="col-5 text-right">
                                <button class="btn-shadow btn btn-primary text-white font-weight-bold"
                                    style="display: inline;" id="UbahKRBosnas" onclick="UbahKRBosnas()">Ubah</button>
                                <button class="btn-shadow btn btn-danger text-white font-weight-bold"
                                    style="display: none;" id="CloseKRBosnas" onclick="BatalKRBosnas()">Batal</button>
                                <button class="btn-shadow btn btn-success text-white font-weight-bold"
                                    style="display: none;" id="SubmitKRBosnas" type="submit"
                                    form="FormKRBosnas">Kirim</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="mb-0 table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center" style="width: 3%">No</th>
                                        <th class="align-middle text-center" style="width: 11%">Kode Rekening</th>
                                        <th class="align-middle text-center" style="width: 25%">Uraian Rekening</th>
                                        <th class="align-middle text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{route('kode-rekening.update', 'bosnas')}}" method="POST"
                                        id="FormKRBosnas">
                                        @csrf
                                        @method('PUT')

                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach (RDev::LKR('bosnas') as $data)
                                        <input type="hidden" name="id[]" value="{{$data->id}}">
                                        <tr>
                                            <th scope="row">{{$i}}</th>
                                            <td>
                                                <span id="KRBosnas{{$i}}"
                                                    style="display: inline;">{{$data->kode_rekening}}</span>
                                                <input type="text" name="kr[]" value="{{$data->kode_rekening}}"
                                                    id="InputKRBosnas{{$i}}" style="display: none;">
                                            </td>
                                            <td>
                                                <span id="URBosnas{{$i}}"
                                                    style="display: inline;">{{$data->uraian_rekening}}</span>
                                                <input type="text" name="ur[]" value="{{$data->uraian_rekening}}"
                                                    id="InputURBosnas{{$i}}" style="display: none; width: 1000px;">
                                            </td>
                                            <td>
                                                <span id="KBosnas{{$i}}"
                                                    style="display: inline;">{{$data->keterangan}}</span>
                                                <textarea name="k[]" id="InputKBosnas{{$i++}}" style="display: none;">{{$data->keterangan}}</textarea>
                                                {{-- <input type="text" name="k[]" value="{{$data->keterangan}}"
                                                    id="InputKBosnas{{$i++}}" style="display: none;"> --}}
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
            <div class="col-xl-12 col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Kode Rekening BOSDA Prov. Kaltim</h5>
                            </div>
                            <div class="col-5 text-right">
                                <button class="btn-shadow btn btn-primary text-white font-weight-bold"
                                    id="UbahKRBosda" onclick="UbahKRBosda()">Ubah</button>
                                <button class="btn-shadow btn btn-danger text-white font-weight-bold"
                                    style="display: none;" id="CloseKRBosda" onclick="BatalKRBosda()">Batal</button>
                                <button class="btn-shadow btn btn-success text-white font-weight-bold"
                                    style="display: none;" id="SubmitKRBosda" type="submit"
                                    form="FormKRBosda">Kirim</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table class="mb-0 table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center" style="width: 3%">No</th>
                                        <th class="align-middle text-center" style="width: 11%">Kode Rekening</th>
                                        <th class="align-middle text-center" style="width: 25%">Uraian Rekening</th>
                                        <th class="align-middle text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <form action="{{route('kode-rekening.update', 'bosda')}}" method="POST"
                                        id="FormKRBosda">
                                        @csrf
                                        @method('PUT')

                                        @php
                                        $i = 1;
                                        @endphp
                                        @foreach (RDev::LKR('bosda') as $data)
                                        <input type="hidden" name="id[]" value="{{$data->id}}">
                                        <tr>
                                            <th scope="row">{{$i}}</th>
                                            <td>
                                                <span id="KRBosda{{$i}}"
                                                    style="display: inline;">{{$data->kode_rekening}}</span>
                                                <input type="text" name="kr[]" value="{{$data->kode_rekening}}"
                                                    id="InputKRBosda{{$i}}" style="display: none;">
                                            </td>
                                            <td>
                                                <span id="URBosda{{$i}}"
                                                    style="display: inline;">{{$data->uraian_rekening}}</span>
                                                <input type="text" name="ur[]" value="{{$data->uraian_rekening}}"
                                                    id="InputURBosda{{$i}}" style="display: none;">
                                            </td>
                                            <td>
                                                <span id="KBosda{{$i}}"
                                                    style="display: inline;">{{$data->keterangan}}</span>
                                                <textarea name="k[]" id="InputKBosda{{$i++}}" style="display: none;">{{$data->keterangan}}</textarea>
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
        </div>
    </div>
</div>
@endsection

@push('Javascript')
<script type="text/javascript">
    function UbahKRBosnas() {
        for (let index = 1; index <= 4; index++) {
            $kr = "KRBosnas" + index;
            $ur = "URBosnas" + index;
            $k  = "KBosnas" + index;
            ShowInputKRBosnas($kr);
            ShowInputKRBosnas($ur);
            ShowInputKRBosnas($k);
        }
    }

    function UbahKRBosda() {
        for (let index = 1; index <= 4; index++) {
            $kr = "KRBosda" + index;
            $ur = "URBosda" + index;
            $k  = "KBosda" + index;       
            ShowInputKRBosda($kr);
            ShowInputKRBosda($ur);
            ShowInputKRBosda($k);
        }
    }

    function BatalKRBosnas() {
        for (let index = 1; index <= 4; index++) {
            $kr = "KRBosnas" + index;
            $ur = "URBosnas" + index;
            $k  = "KBosnas" + index;
            CloseInputKRBosnas($kr);
            CloseInputKRBosnas($ur);
            CloseInputKRBosnas($k);
        }
    }

    function BatalKRBosda() {
        for (let index = 1; index <= 4; index++) {
            $kr = "KRBosda" + index;
            $ur = "URBosda" + index;
            $k  = "KBosda" + index;
            CloseInputKRBosda($kr);
            CloseInputKRBosda($ur);
            CloseInputKRBosda($k);
        }
    }

    function ShowInputKRBosnas(id) {
        document.getElementById(id).style = "display: none;"
        document.getElementById('Input' + id).style = "display: inline;"
        document.getElementById('UbahKRBosnas').style = "display: none;"
        document.getElementById('CloseKRBosnas').style = "display: inline;"
        document.getElementById('SubmitKRBosnas').style = "display: inline;"
    }

    function ShowInputKRBosda(id) {
        document.getElementById(id).style = "display: none;"
        document.getElementById('Input' + id).style = "display: inline;"
        document.getElementById('UbahKRBosda').style = "display: none;"
        document.getElementById('CloseKRBosda').style = "display: inline;"
        document.getElementById('SubmitKRBosda').style = "display: inline;"
    }

    function CloseInputKRBosnas(id) {
        document.getElementById(id).style = "display: inline;"
        document.getElementById('Input' + id).style = "display: none;"
        document.getElementById('UbahKRBosnas').style = "display: inline;"
        document.getElementById('CloseKRBosnas').style = "display: none;"
        document.getElementById('SubmitKRBosnas').style = "display: none;"
    }

    function CloseInputKRBosda(id) {
        document.getElementById(id).style = "display: inline;"
        document.getElementById('Input' + id).style = "display: none;"
        document.getElementById('UbahKRBosda').style = "display: inline;"
        document.getElementById('CloseKRBosda').style = "display: none;"
        document.getElementById('SubmitKRBosda').style = "display: none;"
    }
</script>
@endpush