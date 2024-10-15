<table>
    <thead>
    <tr>
        <th>Satuan Pendidikan</th>
        <th>NPSN</th>
        <th>Bentuk Pendidikan</th>
        <th>Kabupaten/Kota</th>
        <th>Status</th>
        <th>Peserta Didik</th>
        <th>Besaran Satuan Biaya (BOSNAS)</th>
        <th>Besaran Satuan Biaya (BOSDA)</th>
        <th>Pagu BOSNAS</th>
        <th>Pagu BOSDA</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $bos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td><?php echo e($data->satuan_pendidikan); ?></td>
            <td><?php echo e($data->npsn); ?></td>
            <td><?php echo e($data->bentuk_pendidikan); ?></td>
            <td><?php echo e($data->kab_kota_sp); ?></td>
            <td><?php echo e($data->status); ?></td>
            <td><?php echo e($data->peserta_didik); ?></td>
            <td><?php echo e($data->besaran_satuan_biaya_bosnas); ?></td>
            <td><?php echo e($data->besaran_satuan_biaya_bosda); ?></td>
            <td><?php echo e($data->pagu_bosnas); ?></td>
            <td><?php echo e($data->pagu_bosda); ?></td>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table><?php /**PATH E:\Project\eboss\resources\views/exports/format.blade.php ENDPATH**/ ?>