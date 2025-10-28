

<?php $__env->startSection('content'); ?>

<div class="max-w-5xl mx-auto mt-10">
    <h1 class="text-3xl font-bold text-red-600 mb-6">🏥 Hospital Dashboard</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <div class="bg-white p-6 rounded-xl shadow-lg space-y-4">
        <h2 class="text-xl font-semibold">Welcome, <?php echo e($hospital->name); ?></h2>

        <p><strong>Email:</strong> <?php echo e($hospital->email); ?></p>
        <p><strong>Contact:</strong> <?php echo e($hospital->contact); ?></p>
        <p><strong>City:</strong> <?php echo e($hospital->city); ?>, <strong>State:</strong> <?php echo e($hospital->state); ?></p>
        <p><strong>Address:</strong> <?php echo e($hospital->address); ?></p>
        <?php if($hospital->website): ?>
            <p><strong>Website:</strong> <a href="<?php echo e($hospital->website); ?>" target="_blank" class="text-red-600 underline"><?php echo e($hospital->website); ?></a></p>
        <?php endif; ?>

        <form action="<?php echo e(route('hospital.logout')); ?>" method="POST">
            <?php echo csrf_field(); ?>
            <button type="submit" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 transition">
                Logout
            </button>
        </form>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospitalheader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bloodbank\resources\views/hospital/dashboard.blade.php ENDPATH**/ ?>