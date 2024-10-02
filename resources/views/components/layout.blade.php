@php use Illuminate\Support\Facades\Vite; @endphp
    <!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Positions</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap"
        rel="stylesheet">
    @vite(['resources/js/app.js','resources/css/app.css'])
</head>
<body class="bg-black text-white font-hanken pb-20 ">
<div class="px-10">
    <nav class="flex justify-between items-center py-5 border-b border-white/20">
        <div>
            <a href="/">
                <img src="{{Vite::asset('resources/images/logo.svg')}}" alt="xddd">
            </a>
        </div>

        <div class="space-x-8 font-bold ">

            <a href="#" class="hover:text-blue-800">Careers</a>
            <a href="#" class="hover:text-blue-800">Salaries</a>
            <a href="#" class="hover:text-blue-800">Companies</a>
        </div>
        @auth
            <div class="flex space-x-8 font-bold">
                <a href="/jobs/create">Post a Job</a>
                <form action="/logout" method="POST">
                    @csrf
                    @method('DELETE')
                <button>Log Out</button>
                </form>
            </div>
        @endauth
        @guest()
            <div class="space-x-8 font-bold ">
            <a href="/register" class="hover:text-blue-800">Sing Up</a>
            <a href="/login" class="hover:text-blue-800">Log In</a>
            </div>
        @endguest
    </nav>
    <main class=" m-auto mt-10 max-w-[1000px]">
        {{$slot}}
    </main>
</div>

</body>
</html>
