<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Digital Blood Bank</title>
    <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css">
    @vite(['resources/css/app.css','resources/js/app.js'])
</head>
<body class="bg-gray-50 font-sans text-gray-900">
    
    <!-- Navbar -->
    <header class="bg-red-600 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto flex justify-between items-center p-4">
            <!-- Logo -->
            <h1 class="text-2xl font-bold text-white tracking-wide">🩸 Digital Blood Bank</h1>

            <!-- Navigation -->
            <nav class="flex items-center space-x-4 md:space-x-6 text-white font-medium">
                
                <!-- Profile (if patient logged in) -->
                @if(auth('patient')->check())
                    <a href="{{ route('patient.profile') }}" class="hover:text-yellow-200 transition">👤 Profile</a>
                @endif

                <!-- Home Dropdown -->
                <div class="relative">
                    <button id="homeMenuButton" class="hover:text-yellow-200 transition flex items-center focus:outline-none">
                        Home ▾
                    </button>
                    <div id="homeDropdown" class="hidden absolute bg-white text-red-600 rounded-lg shadow-lg mt-2 min-w-[180px] z-50">
                        <a href="{{ url('/') }}" class="block px-4 py-2 hover:bg-red-100">Home</a>
                        <a href="#vision" class="block px-4 py-2 hover:bg-red-100">Vision & Mission</a>
                        <a href="#about" class="block px-4 py-2 hover:bg-red-100">About Us</a>
                    </div>
                </div>

                <!-- Blood Bank Dropdown -->
                <div class="relative">
                    <button id="bloodBankButton" class="hover:text-yellow-200 transition flex items-center focus:outline-none">
                        Blood Bank ▾
                    </button>
                    <div id="bloodBankDropdown" class="hidden absolute bg-white text-red-600 rounded-lg shadow-lg mt-2 min-w-[180px] z-50">
                        <a href="{{ route('hospital.login') }}" class="block px-4 py-2 hover:bg-red-100">Login</a>
                        <a href="{{ route('hospital.register') }}" class="block px-4 py-2 hover:bg-red-100">Register</a>
                    </div>
                </div>

                <!-- Other Links -->
                <a href="{{ url('/blood-availability') }}" class="hover:text-yellow-200 transition">Blood Availability</a>
                {{-- <a href="#donors" class="hover:text-yellow-200 transition">Donors</a> --}}
                <a href="{{ url('/requestBlood') }}" class="hover:text-yellow-200 transition">Request Blood</a>

                <!-- Emergency Button -->
                <a href="#contact" class="bg-white text-red-600 px-4 py-2 rounded-lg shadow-md hover:scale-105 transition">
                    Emergency
                </a>

                <!-- Authentication -->
                @if(auth('patient')->check())
                    <form method="POST" action="{{route('auth.logout')}}">
                        @csrf
                        <button type="submit" class="bg-yellow-400 text-red-700 px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition">Logout</button>
                    </form>
                @else
                    <a href="{{ route('auth.login') }}" class="bg-yellow-400 text-red-700 px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition">Login</a>
                    <a href="{{ route('auth.register') }}" class="bg-yellow-400 text-red-700 px-4 py-2 rounded-lg shadow-md hover:bg-yellow-500 transition">Register</a>
                @endif

            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main>
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-red-700 text-white py-6 mt-10 text-center">
        <p>&copy; {{ date('Y') }} Digital Blood Bank | Save Lives ❤️</p>
    </footer>

<script src="https://unpkg.com/aos@next/dist/aos.js"></script>
<script>
  document.addEventListener('DOMContentLoaded', () => {
    AOS.init({ duration: 900, once: true, offset: 120, easing: 'ease-out-cubic' });
  });
</script>

<script>
    // Dropdown toggles
    const homeButton = document.getElementById("homeMenuButton");
    const homeDropdown = document.getElementById("homeDropdown");
    homeButton.addEventListener("click", () => homeDropdown.classList.toggle("hidden"));

    const bankButton = document.getElementById("bloodBankButton");
    const bankDropdown = document.getElementById("bloodBankDropdown");
    bankButton.addEventListener("click", () => bankDropdown.classList.toggle("hidden"));

    // Close dropdowns if clicked outside
    window.addEventListener("click", (e) => {
        if (!homeButton.contains(e.target) && !homeDropdown.contains(e.target)) homeDropdown.classList.add("hidden");
        if (!bankButton.contains(e.target) && !bankDropdown.contains(e.target)) bankDropdown.classList.add("hidden");
    });
</script>

<script>
    const menuButton = document.getElementById("menuButton");
    const menuDropdown = document.getElementById("menuDropdown");

    menuButton.addEventListener("click", () => {
        menuDropdown.classList.toggle("hidden");
    });

    // Optional: Close dropdown if clicked outside
    window.addEventListener("click", (e) => {
        if (!menuButton.contains(e.target) && !menuDropdown.contains(e.target)) {
            menuDropdown.classList.add("hidden");
        }
    });
</script>

<!-- Blood comp. Script -->
<script>
  const bloodCompatibility = {
    "A+": "Can donate to: A+, AB+ <br> Can receive from: A+, A-, O+, O-",
    "A-": "Can donate to: A+, A-, AB+, AB- <br> Can receive from: A-, O-",
    "B+": "Can donate to: B+, AB+ <br> Can receive from: B+, B-, O+, O-",
    "B-": "Can donate to: B+, B-, AB+, AB- <br> Can receive from: B-, O-",
    "AB+": "Universal Recipient <br> Can donate to: AB+ only <br> Can receive from: All groups",
    "AB-": "Can donate to: AB+, AB- <br> Can receive from: A-, B-, AB-, O-",
    "O+": "Can donate to: O+, A+, B+, AB+ <br> Can receive from: O+, O-",
    "O-": "Universal Donor <br> Can donate to: All groups <br> Can receive from: O- only"
  };

  function showInfo(group) {
    document.getElementById("bloodInfo").innerHTML = `
      <h3 class="text-2xl font-bold text-red-600 mb-2">${group} Compatibility</h3>
      <p>${bloodCompatibility[group]}</p>
    `;
  }
</script>

</body>
</html>
