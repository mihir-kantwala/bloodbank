<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hospital Dashboard | Digital Blood Bank</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-100 font-sans text-gray-900">

    <!-- Hospital Header -->
    <header class="bg-red-700 shadow-md sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
            <h1 class="text-2xl font-bold text-white tracking-wide">🏥 Hospital Dashboard</h1>
            <nav class="flex items-center space-x-6 text-white font-medium">
                <a href="{{ route('hospital.dashboard') }}" class="hover:text-yellow-200 transition">Dashboard</a>
                <a href="{{ route('hospital.profile') }}" class="hover:text-yellow-200 transition">Profile</a>
                <a href="{{ route('hospital.bloodstock.index') }}" class="hover:text-yellow-200 transition">Blood Stock</a>
                <a href="{{ route('hospital.logout') }}"
                   onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
                   class="bg-yellow-400 text-red-700 px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition">
                   Logout
                </a>
                <form id="logout-form" action="{{ route('hospital.logout') }}" method="POST" class="hidden">
                    @csrf
                </form>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="p-6">
        @yield('content')
    </main>

    <footer class="bg-red-700 text-white py-4 mt-10 text-center">
        &copy; {{ date('Y') }} Digital Blood Bank
    </footer>

    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', () => {
        AOS.init({ duration: 900, once: true, offset: 120, easing: 'ease-out-cubic' });
      });
    </script>
</body>
</html>
