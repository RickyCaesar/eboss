<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel 7 PDF Example</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link href="<?php echo e(asset('css/app.css')); ?>" rel="stylesheet" type="text/css" />
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
        Dengan ini menyatakan dengan sesungguhnya bahwa saya bertanggung jawab penuh atas data BOSNAS dan BOSDA Tahun <?php echo e(date('Y')); ?> Sebagai Berikut :
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
                <?php if(RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMA'): ?>
                Pengelolaan Pendidikan Sekolah Menengah Atas
                <?php elseif(RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMK'): ?>
                Pengelolaan Pendidikan Sekolah Menengah Kejuruan
                <?php else: ?>
                Pengelolaan Pendidikan Khusus
                <?php endif; ?>
            </td>
        </tr>
        <tr>
            <td>Sub Kegiatan</td>
            <td>:</td>
            <td>
                <b>
                    <u>
                        <?php if(RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMA'): ?>
                        Pengelolaan Dana BOS Sekolah Menengah Atas (BOSNAS)
                        <?php elseif(RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMK'): ?>
                        Pengelolaan Dana BOS Sekolah Menengah Kejuruan (BOSNAS)
                        <?php else: ?>
                        Pengelolaan Dana BOS Sekolah Pendidikan Khusus (BOSNAS)
                        <?php endif; ?>
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
                <?php $__currentLoopData = $rincian_bosnas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bosnas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($bosnas->kd_rekening); ?></td>
                        <td><?php echo e($bosnas->UraianRekening->uraian_rekening); ?></td>
                        <td><?php echo e(number_format($bosnas->pagu, 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                    <?php if(RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMA'): ?>
                    Pengelolaan Pendidikan Sekolah Menengah Atas
                    <?php elseif(RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMK'): ?>
                    Pengelolaan Pendidikan Sekolah Menengah Kejuruan
                    <?php else: ?>
                    Pengelolaan Pendidikan Khusus
                    <?php endif; ?>
                </td>
            </tr>
            <tr>
                <td>Sub Kegiatan</td>
                <td>:</td>
                <td>
                    <b>
                        <u>
                            <?php if(RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMA'): ?>
                            Penyediaan Biaya Personil Peserta Didik Sekolah Menengah Atas (BOSDA)
                            <?php elseif(RDev::DAPODIK()->where('npsn', Auth::user()->email)->first()->bentuk_pendidikan == 'SMK'): ?>
                            Penyediaan Biaya Personil Peserta Didik Sekolah Menengah Kejuruan (BOSDA)
                            <?php else: ?>
                            Penyediaan Biaya Personil Peserta Didik Sekolah Pendidikan Khusus (BOSDA)
                            <?php endif; ?>
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
                <?php $__currentLoopData = $rincian_bosda; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $bosda): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <tr>
                        <td><?php echo e($bosda->kd_rekening); ?></td>
                        <td><?php echo e($bosda->UraianRekening->uraian_rekening); ?></td>
                        <td><?php echo e(number_format($bosda->pagu, 2)); ?></td>
                    </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <script src="<?php echo e(asset('js/app.js')); ?>" type="text/js"></script>
</body>
</html><?php /**PATH E:\Project\eboss\resources\views/pdf/pdf_view.blade.php ENDPATH**/ ?>