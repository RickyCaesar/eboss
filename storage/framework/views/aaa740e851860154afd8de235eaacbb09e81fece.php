
<?php $__env->startSection('Content'); ?>
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
                    <div>Konfirmasi Data Pokok Pendidikan</div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-12 col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Konfrimasi Data Pokok Pendidikan</h5>
                            </div>
                        </div>
                        <form action="<?php echo e(route('verifikasi-data-pokok-pendidikan.store')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="position-relative form-group">
                                <label for="konfirmasi" class="">Konfirmasi</label>
                                <textarea name="konfirmasi" id="konfirmasi" class="form-control"></textarea>
                            </div>
                            <button type="submit" class="btn btn-success">Kirim</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-12 col-md-12">
                <div class="main-card mb-3 card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-7">
                                <h5 class="card-title">Respon Dinas</h5>
                            </div>
                        </div>
                        <div class="table-responsive">
                            <table id="example2" class="table table-hover table-bordered">
                                <thead>
                                    <tr class="bg-grow-early text-white">
                                        <th class="align-middle text-center">Konfirmasi</th>
                                        <th class="align-middle text-center">Status</th>
                                        <th class="align-middle text-center">Verifikator</th>
                                        <th class="align-middle text-center">Tanggal Respon</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    
                                    <?php $__currentLoopData = RDev::KonfirmasiData('own'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    
                                    <tr>
                                        <td><?php echo e($data->konfirmasi); ?></td>
                                        <td>
                                            <?php if($data->status_k == 0): ?>
                                                Belum direpson
                                            <?php elseif($data->status_k == 1): ?>
                                                Disetujui
                                            <?php else: ?>
                                                Ditolak
                                            <?php endif; ?>
                                        </td>
                                        <td><?php echo e($data->Verifikator != null ? $data->Verifikator->name : '-'); ?></td>
                                        <td><?php echo e($data->updated_at != null ? $data->updated_at->isoFormat('dddd, D MMMM Y') : '-'); ?> <?php echo e($data->updated_at != null ? '('.$data->updated_at->diffForHumans().')' : ''); ?></td>
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

<script type="text/javascript"
    src="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/date-1.1.2/sb-1.3.3/datatables.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        $('#example2').DataTable({

        });
    });
</script>

<?php $__env->stopPush(); ?>
<?php echo $__env->make('Layouts.Index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\#Ricky's\Code\eboss\resources\views/Pages/VerifikasiDataSatuanPendidikan/VerifikasiDataSatuanPendidikan.blade.php ENDPATH**/ ?>