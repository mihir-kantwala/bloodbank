

<?php $__env->startSection('content'); ?>
<div class="max-w-2xl mx-auto bg-white p-8 rounded-xl shadow-md mt-6">
    <h2 class="text-2xl font-bold text-red-600 mb-6">Edit Blood Stock</h2>

    <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <ul class="list-disc list-inside">
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li><?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('hospital.bloodstock.update', $bloodStock->id)); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <!-- Blood Group -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Blood Group</label>
            <select name="blood_group" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400" required>
                <option value="">Select Blood Group</option>
                <?php $__currentLoopData = ['A+', 'A-', 'B+', 'B-', 'AB+', 'AB-', 'O+', 'O-']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($group); ?>" <?php echo e($bloodStock->blood_group == $group ? 'selected' : ''); ?>><?php echo e($group); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Blood Component -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Component</label>
            <select name="component" class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400" required>
                <option value="">Select Component</option>
                <?php $__currentLoopData = ['Whole Blood', 'Plasma', 'Platelets', 'Red Blood Cells', 'Cryoprecipitate']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $component): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($component); ?>" <?php echo e($bloodStock->component == $component ? 'selected' : ''); ?>><?php echo e($component); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </select>
        </div>

        <!-- Quantity -->
        <div>
            <label class="block font-medium text-gray-700 mb-1">Quantity (units)</label>
            <input type="number" name="units_available" value="<?php echo e($bloodStock->units_available); ?>" min="1" required
                   class="w-full border rounded-lg px-4 py-2 focus:ring-2 focus:ring-red-400">
        </div>

        <div class="text-center space-x-4">
            <button type="submit"
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg shadow-md font-semibold transition">
                Update Stock
            </button>
            <a href="<?php echo e(route('hospital.bloodstock.index')); ?>"
               class="bg-gray-300 hover:bg-gray-400 text-gray-700 px-6 py-3 rounded-lg shadow-md font-semibold transition">
                Cancel
            </a>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospitalheader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bloodbank\resources\views/hospital/bloodstock/edit.blade.php ENDPATH**/ ?>