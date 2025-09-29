<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My E-Commerce</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100">
    <header>
        @include('livewire.layout.navigation')
        {{--  <livewire:header-cart />  --}}
    </header>

    <main class="py-2 px-2">
        {{ $slot }} {{-- أي محتوى جوه الـ component هيظهر هنا --}}
    </main>

    <footer class="text-center py-4">
        &copy; 2025 My E-Commerce
    </footer>

    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
