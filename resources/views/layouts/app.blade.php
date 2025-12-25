<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        {{-- ✅ تحسين SEO و Social --}}
        <meta name="description" content="مرحبًا بك في {{ config('app.name', 'Laravel') }}. أسرع وأخف تجربة ممكنة.">
        <meta property="og:title" content="{{ config('app.name', 'Laravel') }}">
        <meta property="og:description" content="استمتع بأداء عالي وسرعة تحميل محسّنة.">
        <meta property="og:type" content="website">
        <meta property="og:locale" content="ar_AR">

        {{-- ✅ تحسين الاتصال بالخدمات الخارجية --}}
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

        {{-- ✅ خطوط أسرع وأكثر ثباتاً --}}
        <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@400;500;700&display=swap" rel="stylesheet">

        {{-- ✅ Preload لأهم الملفات --}}
        {{-- <link rel="preload" as="style" href="{{ mix('css/app.css', 'public') }}"> --}}
        {{-- <link rel="preload" as="script" href="{{ mix('js/app.js', 'public') }}"> --}}

        {{-- ✅ التحميل الفعلي --}}
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- ✅ تحسين مظهر الخطوط --}}
        <style>
            body {
                font-family: 'Tajawal', sans-serif;
                -webkit-font-smoothing: antialiased;
            }
        </style>
    </head>

    <body class="font-sans antialiased bg-gray-100 dark:bg-gray-900">
        <div class="min-h-screen flex flex-col">
            {{-- ✅ شريط التنقل --}}
            <livewire:layout.navigation />

            {{-- ✅ عنوان الصفحة --}}
            @if (isset($header))
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            {{-- ✅ المحتوى الرئيسي --}}
            <main class="flex-1">
                {{ $slot }}
            </main>
        </div>
    </body>
</html>


