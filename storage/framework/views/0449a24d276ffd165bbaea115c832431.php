<?php
    use App\Models\Category;
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.8.1/font/bootstrap-icons.min.css">
<div class="d-flex flex-column flex-shrink-0 bg-light" style="width: 280px;">
    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/dashboard" class="nav-link <?php echo e($page == 'dashboard' ? 'active' : 'link-dark'); ?>" aria-current="page">Dashboard</a>
        </li>
        <hr>
        <li class="nav-item">
            <a href="#jobs" data-bs-toggle="collapse" class="nav-link <?php echo e($page == 'jobs' ? 'active' : 'link-dark'); ?>">
                Jobs
                <span class="float-end">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </a>
            <div class="collapse ms-2" id="jobs">
                <ul class="nav nav-pills flex-column mb-auto">
                    <?php $__currentLoopData = Category::all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $category): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li class="nav-item">
                        <form action="/jobs">
                            <input type="hidden" name="id" value="<?php echo e($category->id); ?>">
                            <button type="submit" class="nav-link text-start my-2 <?php echo e($category_id == $category->id ? 'active' : 'link-dark'); ?>" value="submit">
                                <?php echo e($category->name); ?>

                            </button>
                        </form>
                    </li>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </ul>
            </div>
        </li>
        <hr>
        <li class="nav-item">
            <a href="#personal" data-bs-toggle="collapse" class="nav-link link-dark">
                Personal
                <span class="float-end">
                    <i class="bi bi-chevron-down"></i>
                </span>
            </a>
            <div class="collapse ms-2" id="personal">
                <ul class="nav nav-pills flex-column mb-auto">
                    <li class="nav-item">
                        <a href="/my-jobs" class="nav-link link-dark text-start my-2">My Jobs</a>
                    </li>
                    <li class="nav-item">
                        <a href="/my-application" class="nav-link link-dark text-start my-2">My Application</a>
                    </li>
                    <li class="nav-item">
                        <a href="/profile" class="nav-link link-dark text-start my-2">Profile</a>
                    </li>
                </ul>
            </div>
        </li>
        <hr>
    </ul>
</div><?php /**PATH D:\Coding Environment\Project_WebProg\resources\views/components/sidebar.blade.php ENDPATH**/ ?>