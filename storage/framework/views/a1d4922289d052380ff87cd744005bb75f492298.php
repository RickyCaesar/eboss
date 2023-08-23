<?php echo $__env->make('Layouts.Header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldContent('Content'); ?>
<?php echo $__env->make('Layouts.Footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->yieldPushContent('Javascript'); ?>
<?php /**PATH D:\#Ricky's\Code\eboss\resources\views/Layouts/Index.blade.php ENDPATH**/ ?>