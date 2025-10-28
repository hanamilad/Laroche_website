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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
        @include('livewire.layout.navigation')
        {{--  <livewire:header-cart />  --}}
    </header>

    <main class="py-2 px-2">
        {{ $slot }} {{-- أي محتوى جوه الـ component هيظهر هنا --}}
    </main>

    <footer class="text-center py-4">
        <livewire:site-info />
    </footer>

    @livewireScripts
    @vite('resources/js/app.js')
</body>
</html>
