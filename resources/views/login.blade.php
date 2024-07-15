<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    {{-- @vite('resources/css/app.css') --}}
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

</head>
<body class="bg-gray-200 flex items-center justify-center h-screen">
    <div class="w-full lg:max-w-sm max-w-xs">
        <form class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4" action="{{route('login-proses')}}" method="post">
            @csrf
            <img src="/images/login.png" alt="">
            <div class="mb-4">
                <label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email Address</label>
                <input id="email" type="email" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="mb-6">
                <label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password</label>
                <input id="password" type="password" name="password" required autocomplete="current-password"
                       class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
            </div>
            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded focus:outline-none focus:shadow-outline">
                    Sign In
                </button>  
            </div> 
            <div class="register mt-5 text-[14px] text-center lg:text-lg text-sm">
            <a class="">kamu belum punya akun ? </a><span><a href="{{route('register')}}" class="text-black hover:text-[blue] underline">Daftar disini </a></span>
            </div>
            <div class="text-center text-center mt-3 lg:text-lg text-sm">
            <a href="{{ route('home') }}" class="underline">Kembali ke Halaman Utama</a>
            </div>
        </form>
    </div>
</body>
</html>