@extends('layouts.app')

@section('content')

<!-- Hero Section -->
<section id="home" class="relative bg-gradient-to-r from-red-700 to-red-500 text-white py-28 text-center overflow-hidden">
    <div data-aos="fade-up">
        <h2 class="text-6xl font-extrabold mb-6 tracking-wide">Donate Blood, Save Lives   </h2>
        <p class="text-xl mb-8 max-w-2xl mx-auto">A single drop of blood can be the reason behind someone’s smile. Join the mission to save lives today.</p>
        <a href="#request" 
           class="relative inline-flex items-center justify-center px-8 py-4 font-bold rounded-xl bg-white text-red-600 shadow-xl overflow-hidden transition-transform hover:scale-110">
            <span class="absolute inset-0 opacity-0 hover:opacity-20 bg-red-600 transition-opacity"></span>
            <span class="relative">Request Blood Now</span>
        </a>
    </div>
    <!-- Floating Blood Drop Animation -->
    {{-- <div class="absolute top-0 left-10 animate-bounce text-6xl opacity-30">🩸</div>
    <div class="absolute bottom-10 right-20 animate-pulse text-5xl opacity-30">🩸</div> --}}
</section>

<!-- Why Donate Section -->
<section class="max-w-7xl mx-auto py-20 px-6 text-center">
    <h3 class="text-4xl font-bold mb-14" data-aos="fade-right">Why Donate Blood?</h3>
    <div class="grid md:grid-cols-3 gap-10">
        <div class="bg-white rounded-2xl shadow-lg p-8" data-aos="zoom-in">
            <h4 class="text-xl font-semibold mb-4">💓 Save Lives</h4>
            <p class="text-gray-600">Your small contribution can save up to three lives. Every drop counts.</p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-8" data-aos="zoom-in" data-aos-delay="200">
            <h4 class="text-xl font-semibold mb-4">⚡ Quick Help</h4>
            <p class="text-gray-600">Find and request blood instantly from nearest hospitals and donors.</p>
        </div>
        <div class="bg-white rounded-2xl shadow-lg p-8" data-aos="zoom-in" data-aos-delay="400">
            <h4 class="text-xl font-semibold mb-4">🤝 Trusted Network</h4>
            <p class="text-gray-600">A verified network of hospitals and donors ensures safe transfusion.</p>
        </div>
    </div>
</section>

<!-- Blood Compatibility Section -->
<section class="relative py-20">
  <!-- Background Image -->
  <div class="absolute inset-0">
    <img src="{{ asset('images/bloodcompatibility.jpg') }}" 
         alt="Blood Compatibility Background" 
         class="w-full h-full object-cover filter blur-[1px] brightness-90">
  </div>

  <!-- Content overlay -->
  <div class="relative max-w-4xl mx-auto text-center px-6">
    <h2 class="text-4xl font-bold text-red-900   mb-8" data-aos="fade-up">🩸 Blood Donation Compatibility</h2>

    <!-- Buttons -->
    <div class="flex flex-wrap justify-center gap-3 mb-8" data-aos="zoom-in">
      <button onclick="showInfo('A+')" class="bg-red-600 bg-opacity-80 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">A+</button>
      <button onclick="showInfo('A-')" class="bg-red-600 bg-opacity-80 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">A-</button>
      <button onclick="showInfo('B+')" class="bg-red-600 bg-opacity-80 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">B+</button>
      <button onclick="showInfo('B-')" class="bg-red-600 bg-opacity-80 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">B-</button>
      <button onclick="showInfo('AB+')" class="bg-red-600 bg-opacity-80 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">AB+</button>
      <button onclick="showInfo('AB-')" class="bg-red-600 bg-opacity-80 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">AB-</button>
      <button onclick="showInfo('O+')" class="bg-red-600 bg-opacity-80 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">O+</button>
      <button onclick="showInfo('O-')" class="bg-red-600 bg-opacity-80 text-white px-4 py-2 rounded-lg shadow hover:bg-red-700 transition">O-</button>
    </div>

    <!-- Info Display Box -->
    <div id="bloodInfo" class="bg-white bg-opacity-90 p-6 rounded-xl shadow-lg text-gray-700 text-lg transition-all duration-300" data-aos="fade-up">
      <p>🔍 Select a blood group above to see donation compatibility.</p>
    </div>
  </div>
</section>


<!-- Stats Section -->
<section class="bg-gray-100 py-20">
    <div class="max-w-5xl mx-auto text-center">
        <h3 class="text-4xl font-bold mb-12" data-aos="fade-up">Our Impact So Far</h3>
        <div class="grid md:grid-cols-3 gap-10">
            <div class="p-6" data-aos="flip-left">
                <h2 class="text-5xl font-extrabold text-red-600">150+</h2>
                <p class="text-gray-600 mt-2">Registered Donors</p>
            </div>
            <div class="p-6" data-aos="flip-left" data-aos-delay="200">
                <h2 class="text-5xl font-extrabold text-red-600">20+</h2>
                <p class="text-gray-600 mt-2">Partner Hospitals</p>
            </div>
            <div class="p-6" data-aos="flip-left" data-aos-delay="400">
                <h2 class="text-5xl font-extrabold text-red-600">500+</h2>
                <p class="text-gray-600 mt-2">Units Delivered</p>
            </div>
        </div>
    </div>
</section>

<!-- Vision & Mission Section -->
<section id="vision" class="bg-gray-50 py-20">
    <div class="max-w-6xl mx-auto px-6">
        <h3 class="text-4xl font-bold text-center mb-14" data-aos="fade-up">Our Vision & Mission</h3>
        
        <div class="grid md:grid-cols-2 gap-10">
            
            <!-- Vision Card -->
            <div class="bg-white rounded-2xl shadow-lg p-10 hover:shadow-2xl transition" data-aos="fade-right">
                <h4 class="text-2xl font-bold text-red-600 mb-4"> Our Vision</h4>
                <p class="text-gray-700 leading-relaxed">
                    To build a nation where <strong>no patient dies due to lack of blood</strong>.  
                    Our vision is to create a <em>digital bridge</em> connecting hospitals, donors,  
                    and patients instantly through technology.  
                    We aspire to make blood availability <strong>fast, transparent, and reliable</strong>  
                    across every city and rural area.  
                </p>
            </div>
            
            <!-- Mission Card -->
            <div class="bg-white rounded-2xl shadow-lg p-10 hover:shadow-2xl transition" data-aos="fade-left" data-aos-delay="200">
                <h4 class="text-2xl font-bold text-red-600 mb-4"> Our Mission</h4>
                <p class="text-gray-700 leading-relaxed">
                    Our mission is to <strong>empower communities</strong> by:  
                    <ul class="list-disc list-inside mt-3 text-left text-gray-700">
                        <li>Creating a <strong>real-time digital blood bank</strong> system accessible 24/7.</li>
                        <li>Encouraging <strong>voluntary blood donation</strong> by spreading awareness.</li>
                        <li>Partnering with <strong>hospitals and NGOs</strong> for reliable blood stock updates.</li>
                        <li>Ensuring <strong>safe transfusions</strong> with verified donors and hospitals.</li>
                        <li>Leveraging <strong>technology & data</strong> to predict and prevent shortages.</li>
                    </ul>
                </p>
            </div>
            
        </div>
    </div>
</section>



<!-- How It Works Section -->
<section class="py-20 bg-gradient-to-r from-white to-red-50">
  <div class="max-w-6xl mx-auto text-center px-6">
    <h2 class="text-4xl font-bold text-red-700 mb-12" data-aos="fade-up">🩸 How It Works</h2>
    <div class="grid grid-cols-1 md:grid-cols-4 gap-8">

      <!-- Step 1 -->
      <div class="bg-white p-6 shadow-lg rounded-xl hover:shadow-2xl transition" data-aos="zoom-in" data-aos-delay="100">
        <h3 class="text-xl font-semibold text-red-600 mb-3">1️⃣ Register</h3>
        <p class="text-gray-600">Create your donor or patient account in just a few steps.</p>
      </div>

      <!-- Step 2 -->
      <div class="bg-white p-6 shadow-lg rounded-xl hover:shadow-2xl transition" data-aos="zoom-in" data-aos-delay="200">
        <h3 class="text-xl font-semibold text-red-600 mb-3">2️⃣ Request</h3>
        <p class="text-gray-600">Patients can request blood during emergencies through the platform.</p>
      </div>

      <!-- Step 3 -->
      <div class="bg-white p-6 shadow-lg rounded-xl hover:shadow-2xl transition" data-aos="zoom-in" data-aos-delay="300">
        <h3 class="text-xl font-semibold text-red-600 mb-3">3️⃣ Connect</h3>
        <p class="text-gray-600">Nearby donors and hospitals are notified instantly.</p>
      </div>

      <!-- Step 4 -->
      <div class="bg-white p-6 shadow-lg rounded-xl hover:shadow-2xl transition" data-aos="zoom-in" data-aos-delay="400">
        <h3 class="text-xl font-semibold text-red-600 mb-3">4️⃣ Save Lives</h3>
        <p class="text-gray-600">Blood is donated safely, ensuring timely help to patients.</p>
      </div>

    </div>
  </div>
</section>


<!-- Final Call to Action -->
<section class="bg-gradient-to-r from-red-700 to-red-500 text-white py-20 text-center">
    <h3 class="text-4xl font-extrabold mb-6" data-aos="fade-up">Become a Donor Today!</h3>
    <p class="mb-8 text-lg" data-aos="fade-up" data-aos-delay="200">Join our mission and help those in need with your donation.</p>
    <a href="/login" 
       class="bg-white text-red-600 px-8 py-4 rounded-xl font-semibold shadow-lg hover:scale-110 transition" 
       data-aos="zoom-in" data-aos-delay="400">
        Register as Donor
    </a>
</section>

@endsection
