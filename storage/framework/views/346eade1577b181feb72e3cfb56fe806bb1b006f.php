
<?php $__env->startSection('Content'); ?>
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
                    <div>Data Pokok Pendidik</div>
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
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="display nowrap table table-hover table-bordered" style="width:100%">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center">Kabupaten Berau</th>
                                        <th class="align-middle text-center">Sekolah Menengah Atas</th>
                                        <th class="align-middle text-center">Sekolah Menengah Kejuruan</th>
                                        <th class="align-middle text-center">Sekolah Luar Biasa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $__currentLoopData = RDev::LSH('bosnas'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->kab_kota); ?></td>
                                            <td>
                                                <span id="SMA"
                                                    style="display: inline;"><?php echo e(number_format($data->sma, 0, ',', '.')); ?></span>
                                                <input type="text" name="bosnas[]" value="<?php echo e($data->sma); ?>"
                                                    id="InputSMA" style="display: none;">
                                            </td>
                                            <td>
                                                <span id="SMK"
                                                    style="display: inline;"><?php echo e(number_format($data->smk, 0, ',', '.')); ?></span>
                                                <input type="text" name="bosnaS[]" value="<?php echo e($data->smk); ?>"
                                                    id="InputSMK" style="display: none;">
                                            </td>
                                            <td>
                                                <span id="SLB"
                                                    style="display: inline;"><?php echo e(number_format($data->slb, 0, ',', '.')); ?></span>
                                                <input type="text" name="bosnas[]" value="<?php echo e($data->slb); ?>"
                                                    id="InputSLB" style="display: none;">
                                            </td>
                                        </tr>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startPush('Javascript'); ?>

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/date-1.1.2/sb-1.3.3/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable( {
        dom: 'Qlfrtip'
    });
});
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('Layouts.Index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\#Ricky's\Code\eboss\resources\views/Pages/DataPokokSekolah/DataPokokPendidik.blade.php ENDPATH**/ ?>