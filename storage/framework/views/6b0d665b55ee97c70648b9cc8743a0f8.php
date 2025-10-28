

<?php $__env->startSection('content'); ?>
<div class="max-w-4xl mx-auto mt-6 bg-white p-6 rounded-xl shadow-md">
    <h2 class="text-2xl font-bold text-red-600 mb-4">Your Blood Stock</h2>

    <a href="<?php echo e(route('hospital.bloodstock.create')); ?>" class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700 mb-4 inline-block">
        Add Blood Stock
    </a>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-3 rounded mb-4"><?php echo e(session('success')); ?></div>
    <?php endif; ?>

    <table class="w-full table-auto border-collapse border border-gray-300">
        <thead>
            <tr class="bg-gray-100">
                <th class="border px-4 py-2">Blood Group</th>
                <th class="border px-4 py-2">Component</th>
                <th class="border px-4 py-2">Quantity</th>
                <th class="border px-4 py-2">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $__empty_1 = true; $__currentLoopData = $stocks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $stock): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <tr>
                <td class="border px-4 py-2"><?php echo e($stock->blood_group); ?></td>
                <td class="border px-4 py-2"><?php echo e($stock->component); ?></td>
                <td class="border px-4 py-2"><?php echo e($stock->units_available); ?></td>
                <td class="border px-4 py-2 space-x-2">
                    <a href="<?php echo e(route('hospital.bloodstock.edit', $stock->id)); ?>" class="text-blue-600 hover:underline">Edit</a>
                    <form action="<?php echo e(route('hospital.bloodstock.destroy', $stock->id)); ?>" method="POST" class="inline-block">
                        <?php echo csrf_field(); ?>
                        <?php echo method_field('DELETE'); ?>
                        <button type="submit" class="text-red-600 hover:underline" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                </td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <tr>
                <td colspan="4" class="border px-4 py-2 text-center">No blood stock found.</td>
            </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospitalheader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bloodbank\resources\views/hospital/bloodstock/index.blade.php ENDPATH**/ ?>