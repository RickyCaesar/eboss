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
                        <i class="pe-7s-diamond icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Data Pokok Pendidikan</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="main-card card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Edit Peserta Didik </h5>
                                <h3>{{$sekolah->satuan_pendidikan}}</h3>
                                <form action="{{route('data-pokok-pendidikan.update', $sekolah->id)}}" method="post">
                                    @csrf
                                    @method("PUT")
                                    <span style="">Peserta Didik</span>
                                    <input type="text" name="peserta_didik" value="{{$sekolah->peserta_didik}}" id="InputSMK11">
                                    <br><br>
                                    <button type="submit" class="btn-shadow btn btn-success text-white font-weight-bold">Ubah</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection

@push('Javascript')

@endpush