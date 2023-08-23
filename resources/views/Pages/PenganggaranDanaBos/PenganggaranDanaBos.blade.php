@extends('Layouts.Index')
@section('Content')
<style>
    input[type=text],
    textarea {
        width: 100%;
    }
</style>
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-cash icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Penganggaran Dana BOS</div>
                </div>
                <div class="page-title-actions">
                    <a href="{{route('penganggaran-dana-bos.show', Auth::user()->email)}}" onmouseover="{{RDev::CSel('bosda')=='Selisih'||RDev::CSel('bosnas')=='Selisih' ? 'checkS()':''}}" data-toggle="tooltip" id="printBos" title="Print BOS"
                        data-placement="bottom" class="btn-shadow mr-3 btn btn-success text-white">
                        <i class="fa fa-print"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-6 col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Pagu Dana BOSNAS <p class="text-primary font-weight-bolder" style="font-size: 1.5rem;">{{number_format(RDev::BOSS('pagu_bosnas'))}}</p></h5>
                                <h5 class="card-title">
                                    <span class="d-block">Rincian BOSNAS</span> 
                                    <span class="text-success font-weight-bolder" style="font-size: 1.5rem;">{{number_format(RDev::TRBOS('bosnas', Auth::user()->email))}}</span>
                                    <span class="badge badge-pill badge-danger">{{RDev::Csel('bosnas')}}</span>
                                </h5>
                            </div>
                            <div class="col-5 text-right">
                                <button class="btn-shadow btn btn-primary text-white font-weight-bold"
                                data-toggle="modal" data-target=".modalBosnas"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead class="bg-grow-early text-white">
                                <tr>
                                    <th>Kode Rekening</th>
                                    <th>Uraian Rekening</th>
                                    <th>Pagu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (RDev::LRBOS('bosnas', Auth::user()->email) as $value)    
                                <tr>
                                    <td>{{$value->kd_rekening}}</td>
                                    <td>{{$value->UraianRekening->uraian_rekening}}</td>
                                    <td>{{number_format($value->pagu)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Pagu Dana BOSDA <p class="text-primary font-weight-bolder" style="font-size: 1.5rem;">{{number_format(RDev::BOSS('pagu_bosda'))}}</p></h5>
                                <h5 class="card-title">
                                    <span class="d-block">Rincian BOSDA</span> 
                                    <span class="text-success font-weight-bolder" style="font-size: 1.5rem;">{{number_format(RDev::TRBOS('bosda', Auth::user()->email))}}</span>
                                    <span class="badge badge-pill badge-danger">{{RDev::Csel('bosda')}}</span>
                                </h5>
                            </div>
                            <div class="col-5 text-right">
                                <button class="btn-shadow btn btn-primary text-white font-weight-bold"
                                data-toggle="modal" data-target=".modalBosda"><i class="fa fa-plus"></i></button>
                            </div>
                        </div>
                        <table class="table table-hover table-bordered">
                            <thead class="bg-grow-early text-white">
                                <tr>
                                    <th>Kode Rekening</th>
                                    <th>Uraian Rekening</th>
                                    <th>Pagu</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach (RDev::LRBOS('bosda', Auth::user()->email) as $value)    
                                <tr>
                                    <td>{{$value->kd_rekening}}</td>
                                    <td>{{$value->UraianRekening->uraian_rekening}}</td>
                                    <td>{{number_format($value->pagu)}}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('Javascript')

<!-- Large modal -->

<div class="modal fade modalBosnas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">BOSNAS - <span class="font-weight-bold">{{number_format(RDev::BOSS('pagu_bosnas', Auth::user()->email))}}</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('penganggaran-dana-bos.store')}}" method="post" id="FormBosnas">
                    @csrf
                    <input type="hidden" name="jenis_bos" value="bosnas">    
                    @foreach (RDev::LKR('bosnas') as $field)    
                    <input type="hidden" name="kd_rekening[]" value="{{$field->kode_rekening}}">     
                    <div class="position-relative form-group">
                        <label for="{{$field->kode_rekening}}" class="">{{$field->kode_rekening}} - {{$field->uraian_rekening}}</label>
                        <input name="pagu[{{$field->kode_rekening}}]" id="{{$field->kode_rekening}}" placeholder="Pagu Rekening" type="text" value="0" class="form-control">
                        <small class="form-text font-weight-bold text-danger">* Perhatian {{$field->keterangan}}</small>
                    </div>
                    @endforeach
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="FormBosnas">Kirim</button>
            </div>
        </div>
    </div>
</div>

<!-- Large modal -->

<div class="modal fade modalBosda" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">BOSDA - <span class="font-weight-bold">{{number_format(RDev::BOSS('pagu_bosda', Auth::user()->email))}}</span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="{{route('penganggaran-dana-bos.store')}}" method="post" id="FormBosda">
                    @csrf
                    <input type="hidden" name="jenis_bos" value="bosda">    
                    @foreach (RDev::LKR('bosda') as $field)    
                    <input type="hidden" name="kd_rekening[]" value="{{$field->kode_rekening}}">     
                    <div class="position-relative form-group">
                        <label for="{{$field->kode_rekening}}" class="">{{$field->kode_rekening}} - {{$field->uraian_rekening}}</label>
                        <input name="pagu[{{$field->kode_rekening}}]" id="{{$field->kode_rekening}}" placeholder="Pagu Rekening" type="text" value="0" class="form-control">
                        <small class="form-text font-weight-bold text-danger">* Perhatian {{$field->keterangan}}</small>
                    </div>
                    @endforeach
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="FormBosda">Kirim</button>
            </div>
        </div>
    </div>
</div>
{{-- {{dd(RDev::CSel('bosnas')=='Selisih')}} --}}
@if (RDev::CSel('bosda')=='Selisih'||RDev::CSel('bosnas')=='Selisih')
    <script>
        document.getElementById("printBos").classList.add('disabled');

        function checkS() {
            document.getElementById("printBos").classList.add('disabled');
        }
    </script>
@endif
<script>  

    // document.getElementById("printBos").classList.add('disabled');
    // document.getElementById("printBos").onmouseover = function() {document.getElementById("printBos").classList.add({{RDev::CSel('bosda')=='Selisih'||RDev::CSel('bosnas')=='Selisih'?'':'"disabled"'}})}
</script>
@endpush