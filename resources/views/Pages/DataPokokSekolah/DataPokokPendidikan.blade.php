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
                                <h5 class="card-title">Data Pokok Pendidikan</h5>
                            </div>
                            <div class="col-5 text-right">
                                <button class="btn-shadow btn btn-success text-white font-weight-bold"
                                    data-toggle="modal" data-target="#exampleModal">Import</button>
                                <a href="{{route('data-pokok-pendidikan.export')}}" class="btn-shadow btn btn-danger text-white font-weight-bold">Export</a>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center">Satuan Pendidikan</th>
                                        <th class="align-middle text-center">NPSN</th>
                                        <th class="align-middle text-center">Bentuk Pendidikan</th>
                                        <th class="align-middle text-center">Kabupaten/Kota</th>
                                        <th class="align-middle text-center">Status</th>
                                        <th class="align-middle text-center">Peserta Didik</th>
                                        <th class="align-middle text-center">Besaran Satuan Biaya (BOSNAS)</th>
                                        <th class="align-middle text-center">Besaran Satuan Biaya (BOSDA)</th>
                                        <th class="align-middle text-center">Peserta Didik</th>
                                        <th class="align-middle text-center">Pagu BOSNAS</th>
                                        <th class="align-middle text-center">Pagu BOSDA</th>
                                        <th class="align-middle text-center">#</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach (RDev::DAPODIK() as $data)
                                    <tr>
                                        <td>{{$data->satuan_pendidikan}}</td>
                                        <td>{{$data->npsn}}</td>
                                        <td>{{$data->bentuk_pendidikan}}</td>
                                        <td>{{$data->kab_kota_sp}}</td>
                                        <td>{{$data->status}}</td>
                                        <td>{{$data->peserta_didik}}</td>
                                        <td>{{number_format($data->besaran_satuan_biaya_bosnas)}}</td>
                                        <td>{{number_format($data->besaran_satuan_biaya_bosda)}}</td>
                                        <td>{{$data->peserta_didik}}</td>
                                        <td>{{number_format($data->pagu_bosnas)}}</td>
                                        <td>{{number_format($data->pagu_bosda)}}</td>
                                        <td><a class="btn-shadow btn btn-primary text-white font-weight-bold" href="{{route('data-pokok-pendidikan.edit', $data->id)}}">Edit</a></td>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Pokok Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormImport" action="{{route('data-pokok-pendidikan.import')}}" method="post"
                    enctype="multipart/form-data">
                    @csrf
                    <div class="position-relative form-group">
                        <label for="Excel" class="">Import Excel</label>
                        <input name="file" id="Excel" type="file" class="form-control-file">
                        <small class="form-text text-muted">Format File Seperti file ini <a
                                href="javascript:void(0)">Format.xlsx</a>.</small>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="FormImport">Kirim</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/date-1.1.2/sb-1.3.3/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example').DataTable({
            dom: 'Qlfrtip',
            aLengthMenu: [
                [25, 50, 100, 200, -1],
                [25, 50, 100, 200, "Semua"]
            ],
        });
    });
</script>

@endpush