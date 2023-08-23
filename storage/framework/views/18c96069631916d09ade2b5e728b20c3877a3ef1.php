
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
                        <i class="pe-7s-cash icon-gradient bg-happy-itmeo">
                        </i>
                    </div>
                    <div>Penganggaran Dana BOS</div>
                </div>
                <div class="page-title-actions">
                    <a href="<?php echo e(route('penganggaran-dana-bos.show', Auth::user()->email)); ?>" onmouseover="<?php echo e(RDev::CSel('bosda')=='Selisih'||RDev::CSel('bosnas')=='Selisih' ? 'checkS()':''); ?>" data-toggle="tooltip" id="printBos" title="Print BOS"
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
                                <h5 class="card-title">Pagu Dana BOSNAS <p class="text-primary font-weight-bolder" style="font-size: 1.5rem;"><?php echo e(number_format(RDev::BOSS('pagu_bosnas'))); ?></p></h5>
                                <h5 class="card-title">
                                    <span class="d-block">Rincian BOSNAS</span> 
                                    <span class="text-success font-weight-bolder" style="font-size: 1.5rem;"><?php echo e(number_format(RDev::TRBOS('bosnas', Auth::user()->email))); ?></span>
                                    <span class="badge badge-pill badge-danger"><?php echo e(RDev::Csel('bosnas')); ?></span>
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
                                <?php $__currentLoopData = RDev::LRBOS('bosnas', Auth::user()->email); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                <tr>
                                    <td><?php echo e($value->kd_rekening); ?></td>
                                    <td><?php echo e($value->UraianRekening->uraian_rekening); ?></td>
                                    <td><?php echo e(number_format($value->pagu)); ?></td>
                                </tr>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                                <h5 class="card-title">Pagu Dana BOSDA <p class="text-primary font-weight-bolder" style="font-size: 1.5rem;"><?php echo e(number_format(RDev::BOSS('pagu_bosda'))); ?></p></h5>
                                <h5 class="card-title">
                                    <span class="d-block">Rincian BOSDA</span> 
                                    <span class="text-success font-weight-bolder" style="font-size: 1.5rem;"><?php echo e(number_format(RDev::TRBOS('bosda', Auth::user()->email))); ?></span>
                                    <span class="badge badge-pill badge-danger"><?php echo e(RDev::Csel('bosda')); ?></span>
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
                                <?php $__currentLoopData = RDev::LRBOS('bosda', Auth::user()->email); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                                <tr>
                                    <td><?php echo e($value->kd_rekening); ?></td>
                                    <td><?php echo e($value->UraianRekening->uraian_rekening); ?></td>
                                    <td><?php echo e(number_format($value->pagu)); ?></td>
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


<?php $__env->stopSection(); ?>

<?php $__env->startPush('Javascript'); ?>

<!-- Large modal -->

<div class="modal fade modalBosnas" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">BOSNAS - <span class="font-weight-bold"><?php echo e(number_format(RDev::BOSS('pagu_bosnas', Auth::user()->email))); ?></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('penganggaran-dana-bos.store')); ?>" method="post" id="FormBosnas">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="jenis_bos" value="bosnas">    
                    <?php $__currentLoopData = RDev::LKR('bosnas'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                    <input type="hidden" name="kd_rekening[]" value="<?php echo e($field->kode_rekening); ?>">     
                    <div class="position-relative form-group">
                        <label for="<?php echo e($field->kode_rekening); ?>" class=""><?php echo e($field->kode_rekening); ?> - <?php echo e($field->uraian_rekening); ?></label>
                        <input name="pagu[<?php echo e($field->kode_rekening); ?>]" id="<?php echo e($field->kode_rekening); ?>" placeholder="Pagu Rekening" type="text" value="0" class="form-control">
                        <small class="form-text font-weight-bold text-danger">* Perhatian <?php echo e($field->keterangan); ?></small>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
                <h5 class="modal-title" id="exampleModalLongTitle">BOSDA - <span class="font-weight-bold"><?php echo e(number_format(RDev::BOSS('pagu_bosda', Auth::user()->email))); ?></span></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(route('penganggaran-dana-bos.store')); ?>" method="post" id="FormBosda">
                    <?php echo csrf_field(); ?>
                    <input type="hidden" name="jenis_bos" value="bosda">    
                    <?php $__currentLoopData = RDev::LKR('bosda'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $field): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>    
                    <input type="hidden" name="kd_rekening[]" value="<?php echo e($field->kode_rekening); ?>">     
                    <div class="position-relative form-group">
                        <label for="<?php echo e($field->kode_rekening); ?>" class=""><?php echo e($field->kode_rekening); ?> - <?php echo e($field->uraian_rekening); ?></label>
                        <input name="pagu[<?php echo e($field->kode_rekening); ?>]" id="<?php echo e($field->kode_rekening); ?>" placeholder="Pagu Rekening" type="text" value="0" class="form-control">
                        <small class="form-text font-weight-bold text-danger">* Perhatian <?php echo e($field->keterangan); ?></small>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary" form="FormBosda">Kirim</button>
            </div>
        </div>
    </div>
</div>

<?php if(RDev::CSel('bosda')=='Selisih'||RDev::CSel('bosnas')=='Selisih'): ?>
    <script>
        document.getElementById("printBos").classList.add('disabled');

        function checkS() {
            document.getElementById("printBos").classList.add('disabled');
        }
    </script>
<?php endif; ?>
<script>  

    // document.getElementById("printBos").classList.add('disabled');
    // document.getElementById("printBos").onmouseover = function() {document.getElementById("printBos").classList.add(<?php echo e(RDev::CSel('bosda')=='Selisih'||RDev::CSel('bosnas')=='Selisih'?'':'"disabled"'); ?>)}
</script>
<?php $__env->stopPush(); ?>
<?php echo $__env->make('Layouts.Index', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\#Ricky's\Code\eboss\resources\views/Pages/PenganggaranDanaBos/PenganggaranDanaBos.blade.php ENDPATH**/ ?>