<footer class="bg-gray-900 text-gray-200 py-12 mt-10 border-t border-gray-800">
    <div class="max-w-7xl mx-auto px-6 grid grid-cols-1 md:grid-cols-4 gap-10">

        {{-- 🟩 القسم 1: نبذة وتعريف البراند --}}
        <div>
            <h2 class="text-2xl font-bold text-white mb-3">
                {{ $info->brand_name ?? 'Brand Name' }}
            </h2>
            @if ($info->tagline)
                <p class="text-sm text-gray-400 italic mb-2">{{ $info->tagline }}</p>
            @endif
            <p class="text-gray-400 text-sm leading-relaxed">
                {{ $info->description ?? 'نبذة تعريفية عن الموقع...' }}
            </p>
        </div>
        <div>
            <h3 class="text-lg font-semibold mb-4 text-white">روابط سريعة</h3>
            <ul class="space-y-2">
               @foreach ($info->quick_links ?? [] as $link)
                    <li>
                        <a href="{{ $link['url'] ?? '#' }}"
                           class="hover:text-green-400 transition-colors duration-200 flex items-center gap-2">
                            <x-heroicon-o-link class="w-4 h-4" />
                            {{ $link['title'] ?? 'رابط' }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- 🟨 القسم 3: تواصل معنا --}}
        <div>
            <h3 class="text-lg font-semibold mb-4 text-white">تواصل معنا</h3>
            <ul class="space-y-2">
                {{-- 📧 الإيميلات --}}
                @foreach ($info->emails ?? [] as $mail)
                    <li class="flex items-center gap-2">
                        <x-heroicon-o-envelope class="w-4 h-4 text-green-400" />
                        <a href="mailto:{{ $mail['email'] ?? '' }}" class="hover:text-green-400">
                            {{ $mail['label'] ?? $mail['type'] ?? 'Email' }}
                        </a>
                    </li>
                @endforeach

                {{-- ☎️ الهواتف --}}
                @foreach ($info->phones ?? [] as $phone)
                    <li class="flex items-center gap-2">
                        @php
                            $icon = match($phone['icon'] ?? 'phone') {
                                'whatsapp' => 'heroicon-o-chat-bubble-left-ellipsis',
                                'fax' => 'heroicon-o-printer',
                                default => 'heroicon-o-phone',
                            };
                        @endphp
                        <x-dynamic-component :component="$icon" class="w-4 h-4 text-green-400" />
                        <a href="tel:{{ $phone['number'] ?? '' }}" class="hover:text-green-400">
                            {{ $phone['label'] ?? $phone['number'] }}
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        {{-- 🟧 القسم 4: مواقع التواصل الاجتماعي --}}
        <div>
            <h3 class="text-lg font-semibold mb-4 text-white">تابعنا</h3>
            <div class="flex flex-wrap gap-3">
                @foreach ($info->social_links ?? [] as $platform => $url)
                    @php
                        $icons = [
                            'facebook' => 'fa-brands fa-facebook-f',
                            'instagram' => 'fa-brands fa-instagram',
                            'twitter' => 'fa-brands fa-x-twitter',
                            'linkedin' => 'fa-brands fa-linkedin-in',
                            'youtube' => 'fa-brands fa-youtube',
                        ];
                    @endphp
                    @if ($url)
                        <a href="{{ $url }}" target="_blank"
                           class="text-gray-400 hover:text-green-400 transition-colors text-xl">
                            <i class="{{ $icons[$platform] ?? 'fa-solid fa-link' }}"></i>
                        </a>
                    @endif
                @endforeach
            </div>
        </div>

    </div>

    {{-- 🟥 القسم السفلي --}}
    <div class="mt-10 text-center text-gray-500 text-sm border-t border-gray-
