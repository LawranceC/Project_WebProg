<div class="container-fluid navbar navbar-expand-lg bg-body-tertiary">
    <a class="navbar-brand" href="/"><?php echo e(env('APP_NAME')); ?></a>
    <?php if(Auth::check()): ?>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="/logout" class="nav-link">Logout</a>
            </li>
        </ul>
    <?php else: ?>
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
            <li class="nav-item">
                <a href="/" class="nav-link <?php echo e($page == 'login' ? 'active' : ''); ?>">Login</a>
            </li>
            <li class="nav-item">
                <a href="/register" class="nav-link <?php echo e($page == 'register' ? 'active' : ''); ?>">Register</a>
            </li>
        </ul>
    <?php endif; ?>
</div>
<?php /**PATH D:\Coding Environment\Project_WebProg\resources\views/components/navbar.blade.php ENDPATH**/ ?>