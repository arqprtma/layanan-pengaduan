<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Layanan Pengaduan</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        /* Background Parallax */
        body {
            background-image: url('/images/background.jpg');
            background-attachment: fixed;
            background-size: cover;
            background-position: center;
            font-family: 'Roboto', sans-serif;
            color: #333;
        }

        /* Navbar Styling */
        .navbar {
            background-color: rgba(0, 0, 0, 0.8);
        }

        .judul {
            font-size: 1.5rem;
        }

        .menu-link {
            margin-right: 1rem;
            font-size: 1.1rem;
        }

        .menu-link:hover {
            text-decoration: underline;
        }

        /* Hero Section Styling */
        .hero {
            padding: 4rem 2rem;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 10px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .hero-image {
            width: 300px;
        }

        .description {
            max-width: 600px;
        }

        @media (min-width: 768px) {
            .hero {
                padding: 6rem 4rem;
            }
        }
    </style>
</head>
<body>
    <div class="navbar bg-slate-600 w-full h-[80px] fixed top-0 z-50">
        <div class="flex justify-between items-center py-4 px-6">
            <div class="judul text-white text-lg lg:pt-3 pt-2">Layanan Pengaduan</div>
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
                <a href="{{ route('login') }}" class="menu-link">Login</a>
                <a href="{{ route('register') }}" class="menu-link">Register</a>
            </div>
        </div>
        <!-- Mobile menu -->
        <div id="mobile-menu" class="lg:hidden hidden px-6 py-4 bg-slate-600 text-white">
            <a href="{{ route('login') }}" class="block py-2 hover:bg-gray-700 p-3">Login</a>
            <a href="{{ route('register') }}" class="block py-2 hover:bg-gray-700 p-3">Register</a>
        </div>
    </div>

    <div class="hero flex flex-col lg:flex-row justify-evenly items-center mt-20 lg:mt-40 px-6 lg:px-20 space-y-6 lg:space-y-0 lg:space-x-10">
        <div class="images flex justify-center lg:justify-end">
            <img src="/images/hero.png" class="hero-image" alt="Hero Image">
        </div>
        <div class="description max-w-lg lg:text-left">
            <h1 class="text-3xl font-bold mb-4">Selamat Datang di Layanan Pengaduan</h1>
            <p class="text-gray-700">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eget purus sit amet risus consequat scelerisque. Nulla facilisi. Vivamus eu rutrum velit, a molestie elit. Etiam ut ligula nec nunc semper malesuada. Proin id nulla eu risus maximus lacinia. In hac habitasse platea dictumst. Donec accumsan libero eget mi dictum fermentum.</p>
        </div>
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
