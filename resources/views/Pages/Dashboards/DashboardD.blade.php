@extends('Layouts.Index')
@section('Content')
<div class="app-main__outer">
    <div class="app-main__inner">
        <div class="row">
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-midnight-bloom">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Peserta Didik</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <i class="fa-solid fa-users"></i>
                                <span>{{number_format(RDev::TPD())}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-arielle-smile">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Sekolah</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <i class="fa-solid fa-school"></i>
                                <span>{{number_format(RDev::TS())}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-4">
                <div class="card mb-3 widget-content bg-slick-carbon">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Terverifikasi</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <i class="fa-solid fa-circle-check"></i>
                                <span>568</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="card mb-3 widget-content bg-grow-early">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Pagu BOSNAS</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <i class="fa-solid fa-rupiah-sign"></i>
                                <span>{{number_format(RDev::TBOS('pagu_bosnas'))}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-6">
                <div class="card mb-3 widget-content bg-night-fade">
                    <div class="widget-content-wrapper text-white">
                        <div class="widget-content-left">
                            <div class="widget-heading">Pagu BOSDA</div>
                        </div>
                        <div class="widget-content-right">
                            <div class="widget-numbers text-white">
                                <i class="fa-solid fa-rupiah-sign"></i>
                                <span>{{number_format(RDev::TBOS('pagu_bosda'))}}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 col-lg-6">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            BOSNAS
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                            <canvas id="ChartBosnas"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-12 col-lg-6">
                <div class="mb-3 card">
                    <div class="card-header-tab card-header-tab-animation card-header">
                        <div class="card-header-title">
                            <i class="header-icon lnr-apartment icon-gradient bg-love-kiss"> </i>
                            BOSDA
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="tabs-eg-77">
                                <div class="card mb-3 widget-chart widget-chart2 text-left w-100">
                                    <div class="widget-chat-wrapper-outer">
                                        <div class="widget-chart-wrapper widget-chart-wrapper-lg opacity-10 m-0">
                                            <canvas id="ChartBosda"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="app-wrapper-footer">
        <div class="app-footer">
            <div class="app-footer__inner">
                <div class="app-footer-left">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                Footer Link 1
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                Footer Link 2
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="app-footer-right">
                    <ul class="nav">
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                Footer Link 3
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="javascript:void(0);" class="nav-link">
                                <div class="badge badge-success mr-1 ml-0">
                                    <small>NEW</small>
                                </div>
                                Footer Link 4
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('Javascript')
<script>
    const labels1 = [
        'BOSNAS',
    ];

    const data1 = {
        labels: labels1,
        datasets: [{
                label: '5.1.01.88.88.8888 Belanja Pegawai BOS',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [1000000],
            },
            {
                label: '5.1.02.88.88.8888 Belanja Barang dan Jasa BOS',
                backgroundColor: 'rgb(155, 199, 132)',
                borderColor: 'rgb(155, 199, 132)',
                data: [1900000],
            },
            {
                label: '5.2.02.88.88.8888 Belanja Modal Peralatan dan Mesin BOS',
                backgroundColor: 'rgb(205, 205, 0)',
                borderColor: 'rgb(205, 205, 0)',
                data: [1900000],
            },
            {
                label: '5.2.05.88.88.8888 Belanja Modal Aset Tetap Lainnya BOS',
                backgroundColor: 'rgb(105, 105, 205)',
                borderColor: 'rgb(105, 105, 205)',
                data: [5000000],
            }
        ]
    };

    const config1 = {
        type: 'bar',
        data: data1,
        options: {}
    };


    const myChart1 = new Chart(
        document.getElementById('ChartBosnas'),
        config1,
    );

    const labels2 = [
        'BOSDA',
    ];

    const data2 = {
        labels: labels2,
        datasets: [{
                label: '5.1.02.01.01.0036 Belanja Alat/Bahan untuk Kegiatan Kantor-Alat/Bahan untuk Kegiatan Kantor Lainnya',
                backgroundColor: 'rgb(255, 99, 132)',
                borderColor: 'rgb(255, 99, 132)',
                data: [1000000],
            },
            {
                label: '5.1.02.02.01.0013 Belanja Jasa Tenaga Pendidikan',
                backgroundColor: 'rgb(155, 199, 132)',
                borderColor: 'rgb(155, 199, 132)',
                data: [1900000],
            },
            {
                label: '5.2.02.05.01.0005 Belanja Modal Alat Kantor Lainnya',
                backgroundColor: 'rgb(205, 205, 0)',
                borderColor: 'rgb(205, 205, 0)',
                data: [1900000],
            },
            {
                label: '5.2.05.01.01.0001 Belanja Modal Buku Umum',
                backgroundColor: 'rgb(105, 105, 205)',
                borderColor: 'rgb(105, 105, 205)',
                data: [5000000],
            }
        ]
    };

    const config2 = {
        type: 'bar',
        data: data2,
        options: {}
    };

    const myChart2 = new Chart(
        document.getElementById('ChartBosda'),
        config2,
    );
</script>
@endpush