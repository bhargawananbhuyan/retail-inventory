<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    @vite('resources/css/app.css')
</head>

<body>
    @if (session('success'))
        <div id="toast" class="fixed top-5 left-0 w-full grid place-items-center">
            <div class="max-w-xs mx-auto text-sm p-2 bg-green-500 text-white rounded">
                {{ session('success') }}
            </div>
        </div>
    @endif

    <div class="text-sm sm:text-base min-h-screen flex flex-col">
        @include('inc.header')
        <hr>
        <main class="flex-grow container py-8">
            @yield('main')
        </main>
        <hr>
        @include('inc.footer')
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const toast = document.getElementById('toast');
            toast.style.display = 'block';
            setTimeout(() => {
                toast.style.display = 'none'
            }, 2000);
        });
    </script>
</body>

</html>
