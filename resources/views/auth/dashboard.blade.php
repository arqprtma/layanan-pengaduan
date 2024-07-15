<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {{-- @vite('resources/css/app.css') --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">
    <div class="flex">
        <!-- Sidebar -->
        <aside class="hidden lg:block bg-gray-800 text-white w-64 space-y-6 h-screen flex flex-col justify-between">
            <div class="p-4">
                <h2 class="text-2xl font-bold">Menu</h2>
            </div>
            <nav>
                <ul class="space-y-2">
                    <li>
                        <a href="{{ route('dashboard') }}" class="block p-4 hover:bg-gray-700">Dashboard</a>
                    </li>
                    <li>
                        <a href="{{ route('pengaduan') }}" class="block p-4 hover:bg-gray-700">Pengaduan</a>
                    </li>
                    <!-- Tambahkan menu lain sesuai kebutuhan -->
                </ul>
            </nav>
        </aside>

        <!-- Content Area -->
        <main class="flex-1">
            <div class="navbar bg-slate-600 w-full h-[80px]" style="background-color: gray">
                <div class="flex justify-between items-center py-4 px-6">
                    <div class="judul text-white text-lg lg:pt-3 pt-2">Selamat Datang, {{$user->name}}</div>
                    
                    <!-- Hamburger button for mobile -->
                    <div class="lg:hidden">
                        <button id="menu-button" class="text-white focus:outline-none">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
                            </svg>
                        </button>
                    </div>
                    <!-- Menu -->
                    <div id="menu" class="hidden lg:flex gap-4 w-full lg:w-auto lg:pt-3 pt-2 text-white">
                        <a href="{{route('logout')}}" class="block lg:inline-block">Logout</a>
                    </div>
                </div>
                <!-- Mobile menu -->
                <div id="mobile-menu" class="lg:hidden hidden px-6 py-4 bg-slate-600 text-white">
                    <a href="{{ route('dashboard') }}" class="block p-3 hover:bg-gray-700">Dashboard</a>
                    <a href="{{ route('pengaduan') }}" class="block p-3 hover:bg-gray-700">Pengaduan</a>
                    <a href="{{route('logout')}}" class="block py-2 p-3 hover:bg-red-700">Logout</a>
                </div>
            </div>
            
            {{-- Card Section --}}
            <div class="container mx-auto mt-10 p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Card 1: Banyak Pengaduan -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-4 text-slate-700">Total Pengaduan</h2>
                        <p class="text-gray-700 text-3xl">{{ $totalPengaduan }}</p>
                    </div>
                    <!-- Card 2: Pengaduan yang Diverifikasi -->
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h2 class="text-2xl font-bold mb-4 text-slate-700">Pengaduan Diverifikasi</h2>
                        <p class="text-gray-700 text-3xl">{{ $totalPengaduanDiverifikasi }}</p>
                    </div>
                </div>
            </div>

            <!-- Hero Section -->
            <div class="hero flex flex-col lg:flex-row justify-evenly items-center mt-4 lg:mt-10 px-6 lg:px-20 space-y-6 lg:space-y-0 lg:space-x-10">
                <div class="images flex justify-center lg:justify-end">
                    <img src="/images/hero.png" width="300px" alt="">
                </div>
                <div class="description max-w-lg lg:text-left">
                    <h1 class="text-3xl font-bold mb-4">Dashboard Masyarakat</h1>
                    <p class="text-gray-700">Selamat datang di Dashboard Masyarakat. Di sini, Anda dapat mengajukan pengaduan tentang berbagai masalah yang Anda temui di sekitar lingkungan Anda. Kami siap membantu Anda untuk menyelesaikan setiap permasalahan dengan cepat dan efisien.</p>
                </div>
            </div>

        </main>
    </div>

    <script>
        document.getElementById('menu-button').addEventListener('click', function () {
            var mobileMenu = document.getElementById('mobile-menu');
            if (mobileMenu.classList.contains('hidden')) {
                mobileMenu.classList.remove('hidden');
            } else {
                mobileMenu.classList.add('hidden');
            }
        });
    </script>
</body>
</html>
