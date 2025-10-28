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
            <div class="bg-red-600 text-white rounded-full p-3">
                ❤️
            </div>
            <h1 class="text-2xl font-bold text-red-700">Digital Blood Bank</h1>
        </div>

        <h2 class="text-xl font-semibold text-gray-700 mb-6">Register to Your Account</h2>

        <!-- Registration Form -->
        <form action="<?php echo e(route('auth.register.submit')); ?>" method="POST" class="space-y-4 text-left">
            <?php echo csrf_field(); ?>

            <div>
                <label class="block text-gray-600 font-medium">First Name</label>
                <input type="text" name="firstname" placeholder="First Name" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-600 font-medium">Last Name</label>
                <input type="text" name="lastname" placeholder="Last Name" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-600 font-medium">Contact Number</label>
                <input type="text" name="contact" placeholder="Contact Number" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-600 font-medium">Email</label>
                <input type="email" name="email" placeholder="Email ID" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-600 font-medium">Gender</label>
                <select name="gender" required 
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
                    <option value="">Select Gender</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                    <option value="Other">Other</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-600 font-medium">Age</label>
                <input type="number" name="age" placeholder="Age" required min="18" max="65"
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-600 font-medium">Blood Group</label>
                <select name="blood_group" required
                        class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
                    <option value="">Select Blood Group</option>
                    <option>A+</option>
                    <option>A-</option>
                    <option>B+</option>
                    <option>B-</option>
                    <option>O+</option>
                    <option>O-</option>
                    <option>AB+</option>
                    <option>AB-</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-600 font-medium">State</label>
                <input type="text" name="state" placeholder="State" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-600 font-medium">District</label>
                <input type="text" name="district" placeholder="District" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-600 font-medium">Password</label>
                <input type="password" name="password" placeholder="Password" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <div>
                <label class="block text-gray-600 font-medium">Confirm Password</label>
                <input type="password" name="password_confirmation" placeholder="Confirm Password" required
                    class="w-full mt-1 px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-red-400">
            </div>

            <button type="submit" 
                    class="w-full bg-red-600 text-white py-2 rounded-lg shadow-md hover:bg-red-700 transition">
                📝 Register
            </button>
        </form>


        <!-- Extra Links -->
        <div class="mt-6 text-sm text-gray-600">
            <p>Already have an account? <a href="<?php echo e(url('/login')); ?>" class="text-red-600 font-semibold hover:underline">Login</a></p>
            <p class="mt-2"><a href="#" class="text-yellow-600 hover:underline">Forgot Password?</a></p>
        </div>
    </div>

</body>
</html>
<?php /**PATH C:\laragon\www\bloodbank\resources\views/register.blade.php ENDPATH**/ ?>