

<?php $__env->startSection('content'); ?>
<div class="max-w-md mx-auto mt-20 bg-white p-8 rounded-xl shadow-lg">
    <h1 class="text-3xl font-bold text-red-600 mb-6 text-center">🏥 Hospital / Blood Bank Login</h1>

    <?php if(session('error')): ?>
        <div class="bg-red-100 text-red-800 p-4 rounded mb-4">
            <?php echo e(session('error')); ?>

        </div>
    <?php endif; ?>

    <form action="<?php echo e(route('hospital.login.submit')); ?>" method="POST" class="space-y-6">
        <?php echo csrf_field(); ?>

        <div>
            <label class="block text-gray-700 font-medium">Email</label>
            <input type="email" name="email" value="<?php echo e(old('email')); ?>" 
                   class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
        </div>

        <div>
            <label class="block text-gray-700 font-medium">Password</label>
            <input type="password" name="password" 
                   class="w-full mt-1 px-4 py-2 border rounded-lg focus:ring-2 focus:ring-red-400" required>
        </div>

        <div class="flex items-center justify-between">
            <label class="flex items-center gap-2">
                <input type="checkbox" name="remember" class="h-4 w-4">
                <span class="text-gray-700 text-sm">Remember me</span>
            </label>

            
        </div>

        <div class="text-center">
            <button type="submit" 
                    class="bg-red-600 hover:bg-red-700 text-white px-6 py-3 rounded-lg font-semibold shadow-md transition">
                Login
            </button>
        </div>

        <p class="text-center text-gray-600 mt-4 text-sm">
            Don't have an account? 
            <a href="<?php echo e(route('hospital.register')); ?>" class="text-red-600 hover:underline">Register a Hospital / Blood Bank</a>
        </p>
    </form>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH C:\laragon\www\bloodbank\resources\views/hospital/login.blade.php ENDPATH**/ ?>