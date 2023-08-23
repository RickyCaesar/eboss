<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="en">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Analytics Dashboard - This is an example dashboard created using build-in elements and components.</title>
    <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
    <link href="<?php echo e(asset('architectui-html-free/main.css')); ?>" rel="stylesheet">
    <link rel="stylesheet"
        href="<?php echo e(asset('architectui-html-free/assets/bower_components/Font-Awesome/css/all.min.css')); ?>">
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/v/bs4/jq-3.6.0/dt-1.12.1/date-1.1.2/sb-1.3.3/datatables.min.css" />
</head>

<body>
    <div class="app-container app-theme-white body-tabs-shadow fixed-sidebar fixed-header">
        <div class="app-main">
            <div class="container my-auto">
                <div class="row">
                    <div class="col-12 bg-heavy-rain border rounded shadow-lg p-5">
                        <h2 class="text-center">Login</h2>
                        <form action="<?php echo e(route('login.go')); ?>" method="post">
                            <?php echo csrf_field(); ?>
                            <div class="position-relative form-group">
                                <label for="Username" class="">Username</label>
                                <input name="email" id="Username" placeholder="Username" type="text"
                                    class="form-control">
                            </div>
                            <div class="position-relative form-group">
                                <label for="Password" class="">Password</label>
                                <input name="password" id="Password" placeholder="Password" type="password"
                                    class="form-control">
                            </div>
                            <button type="submit" class="mt-2 btn btn-primary">Login</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<script src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script type="text/javascript" src="<?php echo e(asset('architectui-html-free/assets/scripts/main.js')); ?>"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script type="text/javascript"
    src="<?php echo e(asset('architectui-html-free/assets/bower_components/Font-Awesome/js/all.min.js')); ?>"></script><?php /**PATH E:\Project\eboss\resources\views/Pages/Login.blade.php ENDPATH**/ ?>