@if ($sections->count())
<section 
    x-data="{ current: 0, total: {{ $sections->count() }} }" 
    class="relative bg-[#FAF3E0] overflow-hidden select-none">

    {{-- Slides --}}
    <div class="relative w-full min-h-[70vh] flex items-center justify-center">
        @foreach ($sections as $index => $section)
            <div 
                x-show="current === {{ $index }}" 
                x-transition.opacity.duration.700ms
                class="absolute inset-0 flex flex-col md:flex-row items-center justify-center gap-8 px-6 md:px-12 text-center md:text-left">

                {{-- Image --}}
                @if ($section->image_path)
                    <div class="w-full md:w-1/2 flex justify-center">
                        <img 
                            src="{{ Storage::url($section->image_path) }}"
                            alt="{{ $section->image_alt ?? 'Hero image' }}"
                            width="800" height="600"
                            @if ($loop->first)
                                fetchpriority="high"
                                loading="eager"
                            @else
                                loading="lazy"
                            @endif
                            decoding="async"
                            class="rounded-2xl w-full max-w-md lg:max-w-xl h-auto object-contain"
                        >
                    </div>
                @endif

                {{-- Text --}}
                <div class="w-full md:w-1/2 space-y-4">
                    @if ($section->subtitle)
                        <p class="text-indigo-600 font-semibold text-sm sm:text-base">
                            {{ $section->subtitle }}
                        </p>
                    @endif

                    <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                        {{ $section->title }}
                    </h1>

                    @if ($section->body)
                        <p class="text-base sm:text-lg text-gray-700">
                            {{ $section->body }}
                        </p>
                    @endif

                    @if ($section->cta_text && $section->cta_url)
                        <a href="{{ $section->cta_url }}"
                           class="inline-block bg-indigo-600 text-white font-semibold px-6 py-3 rounded-xl shadow hover:bg-indigo-700 transition">
                            {{ $section->cta_text }}
                        </a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>

    {{-- Dots Navigation --}}
    <div class="absolute bottom-5 left-1/2 -translate-x-1/2 flex space-x-2">
        @foreach ($sections as $index => $section)
            <button 
                class="w-3 h-3 sm:w-4 sm:h-4 rounded-full transition-all duration-300"
                :class="current === {{ $index }} ? 'bg-indigo-600 scale-110' : 'bg-gray-400'"
                @mouseenter="current = {{ $index }}"
                aria-label="Go to slide {{ $index + 1 }}">
            </button>
        @endforeach
    </div>

    {{-- Prev / Next buttons --}}
    <button 
        @click="current = (current - 1 + total) % total" 
        class="absolute left-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow transition">
        ‹
    </button>

    <button 
        @click="current = (current + 1) % total" 
        class="absolute right-3 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow transition">
        ›
    </button>
</section>
@endif
