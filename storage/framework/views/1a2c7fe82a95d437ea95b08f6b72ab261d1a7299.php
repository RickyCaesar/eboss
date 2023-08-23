
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
                    <div>Data Pokok Pendidikan</div>
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
                                <button class="btn-shadow mr-3 btn btn-success text-white font-weight-bold" data-toggle="modal" data-target="#exampleModal">Import</button>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example" class="display nowrap table table-hover table-bordered" style="width:100%">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center">Satuan Pendidikan</th>
                                        <th class="align-middle text-center">NPSN</th>
                                        <th class="align-middle text-center">Bentuk Pendidikan</th>
                                        <th class="align-middle text-center">Kabupaten/Kota</th>
                                        <th class="align-middle text-center">Peserta Didik</th>
                                        <th class="align-middle text-center">Pagu BOSNAS</th>
                                        <th class="align-middle text-center">Pagu BOSDA</th>
                                    </tr>
                                </thead>
                                <tbody>
                                        <?php $__currentLoopData = RDev::DAPODIK(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <tr>
                                            <td><?php echo e($data->satuan_pendidikan); ?></td>
                                            <td><?php echo e($data->npsn); ?></td>
                                            <td><?php echo e($data->bentuk_pendidikan); ?></td>
                                            <td><?php echo e($data->kab_kota_sp); ?></td>
                                            <td><?php echo e($data->peserta_didik); ?></td>
                                            <td><?php echo e(number_format($data->pagu_bosnas)); ?></td>
                                            <td><?php echo e(number_format($data->pagu_bosda)); ?></td>
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
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Import Data Pokok Pendidikan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="FormImport" action="<?php echo e(route('data-pokok-pendidikan.import')); ?>" method="post" enctype="multipart/form-data">
                    <?php echo csrf_field(); ?>
                    <div class="position-relative form-group">
                        <label for="Excel" class="">Import Excel</label>
                        <input name="file" id="Excel" type="file" class="form-control-file">
                        <small class="form-text text-muted">Format File Seperti file ini <a href="javascript:void(0)">Format.xlsx</a>.</small>
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

<script type="text/javascript" src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/date-1.1.2/sb-1.3.3/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
    $('#example').DataTable( {
        dom: 'Qlfrtip'
    });
});
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('Layouts.Index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /mnt/d/#Ricky's/Code/eboss/resources/views/Pages/DataPokokSekolah/DataPokokPendidikan.blade.php ENDPATH**/ ?>