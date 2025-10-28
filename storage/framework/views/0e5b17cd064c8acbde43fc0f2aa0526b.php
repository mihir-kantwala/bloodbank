<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Digital Blood Bank</title>
    <?php echo app('Illuminate\Foundation\Vite')(['resources/css/app.css','resources/js/app.js']); ?>
</head>
<body class="bg-gradient-to-br from-red-100 via-white to-red-200 min-h-screen flex items-center justify-center font-sans">

    <div class="bg-white shadow-2xl rounded-2xl p-8 w-full max-w-md text-center">
        
        <!-- Logo / Title -->
        <div class="flex items-center justify-center space-x-2 mb-6">
            <div class="bg-red-600 text-white rounded-full p-2">
                ❤️
            </div>
            <h1 class="text-2xl font-bold text-red-700">Digital Blood Bank</h1>
        </div>

        <h2 class="text-xl font-semibold text-gray-700 mb-6">Login to Your Account</h2>

        <!-- Login Form -->
        <form action="<?php echo e(route('auth.login.submit')); ?>" method="POST" class="space-y-4 text-left">
            <?php echo csrf_field(); ?>

            <div>
                <label class="block text-gray-600 font-medium">Email</label>
                <input type="email" name="email" placeholder="Email ID" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-600 font-medium">Password</label>
                <input type="password" name="password" placeholder="Password" required
                       class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <button type="submit" 
                    class="w-full bg-red-600 text-white py-2 rounded-lg shadow-md hover:bg-red-700 transition">
                🔑 Login
            </button>

             <?php if($errors->any()): ?>
        <div class="text-red-500 mt-2">
            <?php echo e($errors->first()); ?>

        </div>
    <?php endif; ?>

        </form>

        <!-- Extra Links -->
        <div class="mt-6 text-sm text-gray-600">
            <p>Don't have an account? <a href="<?php echo e(url('/register')); ?>" class="text-red-600 font-semibold hover:underline">Register</a></p>
            <p class="mt-2"><a href="#" class="text-yellow-600 hover:underline">Forgot Password?</a></p>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\bloodbank\resources\views/login.blade.php ENDPATH**/ ?>