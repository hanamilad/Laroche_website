<div>
    @if ($sections->count())
        <section 
            x-data="{ current: 0, total: {{ $sections->count() }} }" 
            class="relative bg-[rgb(250,243,224)] overflow-hidden">

            {{-- Slides --}}
            <div class="relative w-full sm:h-screen lg:h-[50vh]">
                @foreach ($sections as $index => $section)
                    <div 
                        x-show="current === {{ $index }}" 
                        x-transition 
                        @mouseenter="current = {{ $index }}" {{-- لما يمرر بالموس --}}
                        class="absolute inset-0 flex flex-col md:flex-row items-center justify-center px-4 sm:px-8 lg:px-12 py-8 md:py-12 gap-6 lg:gap-10 cursor-pointer">

                        {{-- صورة --}}
                        @if ($section->image_path)
                            <div class="w-full md:w-1/2 flex justify-center bg-transparent">
                                <img src="{{ Storage::url($section->image_path) }}"
                                     alt="{{ $section->image_alt }}"
                                     class="rounded-2xl shadow-none w-full max-w-md lg:max-w-xl h-auto max-h-[80vh] object-contain bg-transparent">
                            </div>
                        @endif

                        {{-- النصوص --}}
                        <div class="w-full md:w-1/2 text-center md:text-left space-y-4">
                            @if ($section->subtitle)
                                <p class="text-indigo-600 font-semibold text-sm sm:text-base lg:text-lg">
                                    {{ $section->subtitle }}
                                </p>
                            @endif

                            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight">
                                {{ $section->title }}
                            </h1>

                            @if ($section->body)
                                <p class="text-base sm:text-lg lg:text-xl text-gray-700">
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

            {{-- Dots Indicators --}}
            <div class="absolute bottom-4 sm:bottom-6 left-1/2 transform -translate-x-1/2 flex space-x-2">
                @foreach ($sections as $index => $section)
                    <button 
                        class="w-3 h-3 sm:w-4 sm:h-4 rounded-full transition"
                        :class="current === {{ $index }} ? 'bg-indigo-600' : 'bg-gray-400'"
                        @mouseenter="current = {{ $index }}"> {{-- يتحرك عند hover --}}
                    </button>
                @endforeach
            </div>

            {{-- Controls --}}
            <button 
                @click="current = (current - 1 + total) % total" 
                class="absolute left-2 sm:left-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow">
                ‹
            </button>
            <button 
                @click="current = (current + 1) % total" 
                class="absolute right-2 sm:right-4 top-1/2 -translate-y-1/2 bg-white/90 hover:bg-white text-gray-800 p-3 rounded-full shadow">
                ›
            </button>
        </section>
    @endif
</div>
