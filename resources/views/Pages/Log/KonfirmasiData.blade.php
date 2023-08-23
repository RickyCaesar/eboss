@extends('Layouts.Index')
@section('Content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="app-page-title">
            <div class="page-title-wrapper">
                <div class="page-title-heading">
                    <div class="page-title-icon">
                        <i class="pe-7s-server icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Konfirmasi Data</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Konfirmasi Data</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example1" class="table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center">NPSN</th>
                                        <th class="align-middle text-center">Satuan Pendidikan</th>
                                        <th class="align-middle text-center">Kabupaten/Kota</th>
                                        <th class="align-middle text-center">Konfirmasi</th>
                                        <th class="align-middle text-center">Tanggal Konfirmasi</th>
                                        <th class="align-middle text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (RDev::KonfirmasiData('0') as $data)
                                    <tr>
                                        <td>{{$data->author}}</td>
                                        <td>{{$data->Author->name}}</td>
                                        <td>{{$data->KabKot->kab_kota_sp}}</td>
                                        <td>{{$data->konfirmasi}}</td>
                                        <td>{{$data->created_at->isoFormat('dddd, D MMMM Y')}}  ({{$data->created_at->diffForHumans()}})</td>
                                        <td class="d-flex justify-content-center">
                                            <form action="{{route('konfirmasi-data.update', $data->id)}}" method="post" class="mx-1">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="status_k" value="1" class="btn btn-primary"><i class="fa fa-thumbs-up font-weight-bold"></i></button>
                                            </form>
                                            <form action="{{route('konfirmasi-data.update', $data->id)}}" method="post" class="mx-1">
                                                @csrf
                                                @method('PUT')
                                                <button type="submit" name="status_k" value="2" class="btn btn-danger"><i class="fa fa-thumbs-down font-weight-bold"></i></button>
                                            </form>
                                        </td>
                                    </tr>
                                    @endforeach
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
                                <h5 class="card-title">Respon Data (Disetujui)</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center">NPSN</th>
                                        <th class="align-middle text-center">Satuan Pendidikan</th>
                                        <th class="align-middle text-center">Kabupaten/Kota</th>
                                        <th class="align-middle text-center">Konfirmasi</th>
                                        <th class="align-middle text-center">Verifikator</th>
                                        <th class="align-middle text-center">Tanggal Respon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (RDev::KonfirmasiData('1') as $data)
                                    <tr>
                                        <td>{{$data->author}}</td>
                                        <td>{{$data->Author->name}}</td>
                                        <td>{{$data->KabKot->kab_kota_sp}}</td>
                                        <td>{{$data->konfirmasi}}</td>
                                        <td>{{$data->Verifikator->name}}</td>
                                        <td>{{$data->updated_at->isoFormat('dddd, D MMMM Y')}}  ({{$data->updated_at->diffForHumans()}})</td>
                                    </tr>
                                    @endforeach
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
                                <h5 class="card-title">Respon Data (Ditolak)</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example3" class="table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center">NPSN</th>
                                        <th class="align-middle text-center">Satuan Pendidikan</th>
                                        <th class="align-middle text-center">Kabupaten/Kota</th>
                                        <th class="align-middle text-center">Konfirmasi</th>
                                        <th class="align-middle text-center">Verifikator</th>
                                        <th class="align-middle text-center">Tanggal Respon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (RDev::KonfirmasiData('2') as $data)
                                    <tr>
                                        <td>{{$data->author}}</td>
                                        <td>{{$data->Author->name}}</td>
                                        <td>{{$data->KabKot->kab_kota_sp}}</td>
                                        <td>{{$data->konfirmasi}}</td>
                                        <td>{{$data->Verifikator->name}}</td>
                                        <td>{{$data->updated_at->isoFormat('dddd, D MMMM Y')}}  ({{$data->updated_at->diffForHumans()}})</td>
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
</div>


@endsection

@push('Javascript')
<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/date-1.1.2/sb-1.3.3/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example1').DataTable({
            dom: 'Qlfrtip',
        });
    });
    $(document).ready(function () {
        $('#example2').DataTable({
            dom: 'Qlfrtip',
        });
    });
    $(document).ready(function () {
        $('#example3').DataTable({
            dom: 'Qlfrtip',
        });
    });
</script>

@endpush