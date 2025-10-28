

<?php $__env->startSection('content'); ?>
<div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold text-red-600 mb-6 text-center">🏥 Hospital Profile</h1>

    <?php if(session('success')): ?>
        <div class="bg-green-100 text-green-800 p-4 rounded mb-4">
            <?php echo e(session('success')); ?>

        </div>
    <?php endif; ?>

    <?php if($errors->any()): ?>
        <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
            <ul>
                <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <li>• <?php echo e($error); ?></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('hospital.profile.update')); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>
        <?php echo method_field('PUT'); ?>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-gray-700 font-medium">Hospital Name</label>
                <input type="text" name="name" value="<?php echo e(old('name', $hospital->name)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Email</label>
                <input type="email" name="email" value="<?php echo e(old('email', $hospital->email)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Address</label>
                <input type="text" name="address" value="<?php echo e(old('address', $hospital->address)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Website</label>
                <input type="url" name="website" value="<?php echo e(old('website', $hospital->website)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">City</label>
                <input type="text" name="city" value="<?php echo e(old('city', $hospital->city)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">State</label>
                <input type="text" name="state" value="<?php echo e(old('state', $hospital->state)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Contact Number</label>
                <input type="text" name="contact" value="<?php echo e(old('contact', $hospital->contact)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

            <div>
                <label class="block text-gray-700 font-medium">Alternate Number</label>
                <input type="text" name="alternate_number" value="<?php echo e(old('alternate_number', $hospital->alternate_number)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">ZIP Code</label>
                <input type="text" name="zip" value="<?php echo e(old('zip', $hospital->zip)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
            </div>

             <div class="mb-4">
                <label for="category" class="block text-gray-700 font-medium">Hospital Category</label>
                <select id="category" name="category" 
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
                    <option value="">Select Category</option>
                    <option value="Government" <?php echo e((old('category', $hospital->category ?? '') == 'Government') ? 'selected' : ''); ?>>Government</option>
                    <option value="Private" <?php echo e((old('category', $hospital->category ?? '') == 'Private') ? 'selected' : ''); ?>>Private</option>
                    <option value="NGO" <?php echo e((old('category', $hospital->category ?? '') == 'NGO') ? 'selected' : ''); ?>>NGO</option>
                </select>
                <?php $__errorArgs = ['category'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                    <p class="text-red-600 text-sm mt-1"><?php echo e($message); ?></p>
                <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div>


            <div>
                <label class="block text-gray-700 font-medium">License Number</label>
                <input type="text" name="license_number" value="<?php echo e(old('license_number', $hospital->license_number)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">License Valid From</label>
                <input type="date" name="from_date" value="<?php echo e(old('from_date', $hospital->from_date)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-700 font-medium">License Valid To</label>
                <input type="date" name="to_date" value="<?php echo e(old('to_date', $hospital->to_date)); ?>"
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400">
            </div>
        </div>

        <div class="text-center mt-6">
            <button type="submit" class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition">
                Update Profile
            </button>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.hospitalheader', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bloodbank\resources\views/hospital/profile.blade.php ENDPATH**/ ?>