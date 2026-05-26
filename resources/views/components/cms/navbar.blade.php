@php
    $locale = app()->getLocale();

    $navGroups = [
        [
            'label' => 'Pengetahuan',
            'items' => [
                ['label' => 'Kiprah', 'route' => 'cms.kiprah.index'],
                ['label' => 'Publikasi', 'route' => 'cms.publikasi.index'],
                ['label' => 'Berita', 'route' => 'cms.berita.index'],
                ['label' => 'Analisis', 'route' => 'cms.analisis.index'],
                ['label' => 'Data', 'route' => 'cms.data.index'],
                ['label' => 'Investigasi', 'route' => 'cms.investigasi.index'],
            ],
        ],
        [
            'label' => 'Kegiatan',
            'items' => [
                ['label' => 'Bincang Hukum', 'route' => 'cms.bincanghukum.index'],
                ['label' => 'Aktivitas', 'route' => 'cms.aktivitas.index'],
            ],
        ],
        [
            'label' => 'Sektor',
            'items' => [
                ['label' => 'Pencemaran', 'route' => 'cms.sektor.pencemaran.index'],
                ['label' => 'Tata Ruang', 'route' => 'cms.sektor.tata-ruang.index'],
                ['label' => 'Kelautan dan Perikanan', 'route' => 'cms.sektor.kelautan-dan-perikanan.index'],
                ['label' => 'Energi dan Sumber Daya Mineral', 'route' => 'cms.sektor.energi-dan-sumber-daya-mineral.index'],
                ['label' => 'Perkebunan', 'route' => 'cms.sektor.perkebunan.index'],
                ['label' => 'Hutan', 'route' => 'cms.sektor.hutan.index'],
            ],
        ],
    ];
@endphp

<nav x-data="{ mobileOpen: false }" class="sticky top-0 z-50 border-b border-gray-200 bg-white">
    <div class="mx-auto max-w-7xl px-4 lg:px-10">
        <div class="flex h-20 items-center justify-between gap-6">
            <a href="{{ route('cms.index', ['locale' => $locale]) }}" class="flex items-center gap-3">
                <img src="{{ asset('img/logos/logo.png') }}" alt="Gakkum SDA" class="h-12 w-auto object-contain">
                <span class="hidden text-sm font-black uppercase tracking-[3px] text-[#007A63] sm:block">
                    CMS
                </span>
            </a>

            <div class="hidden items-center gap-1 lg:flex">
                <a href="{{ route('cms.index', ['locale' => $locale]) }}"
                    class="px-4 py-2 text-sm font-bold uppercase text-[#00594B] hover:bg-gray-50">
                    Dashboard
                </a>

                <a href="{{ route('cms.about', ['locale' => $locale]) }}"
                    class="px-4 py-2 text-sm font-bold uppercase text-[#00594B] hover:bg-gray-50">
                    About
                </a>

                <a href="{{ route('cms.agenda.index', ['locale' => $locale]) }}"
                    class="px-4 py-2 text-sm font-bold uppercase text-[#00594B] hover:bg-gray-50">
                    Agenda
                </a>

                @foreach($navGroups as $group)
                    <div x-data="{ open: false }" class="relative">
                        <button type="button" @click="open = !open"
                            class="flex items-center gap-1 px-4 py-2 text-sm font-bold uppercase text-[#00594B] hover:bg-gray-50">
                            {{ $group['label'] }}
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 transition" :class="open ? 'rotate-180' : ''"
                                fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition @click.outside="open = false"
                            class="absolute left-0 top-full mt-2 w-72 border border-gray-200 bg-white py-2 shadow-xl">
                            @foreach($group['items'] as $item)
                                <a href="{{ route($item['route'], ['locale' => $locale]) }}"
                                    class="block px-5 py-2 text-sm font-semibold text-gray-700 hover:bg-green-50 hover:text-[#007A63]">
                                    {{ $item['label'] }}
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                @if(session('account_role') === 'super_admin')
                    <a href="{{ route('cms.account.index', ['locale' => $locale]) }}"
                        class="px-4 py-2 text-sm font-bold uppercase text-[#00594B] hover:bg-gray-50">
                        Account
                    </a>
                @endif
            </div>

            <div class="hidden items-center gap-3 lg:flex">
                <a href="{{ route('index', ['locale' => $locale]) }}" target="_blank"
                    class="border border-[#007A63] px-4 py-2 text-xs font-bold uppercase text-[#007A63] hover:bg-[#007A63] hover:text-white">
                    Lihat Site
                </a>

                <form method="POST" action="{{ route('cms.logout', ['locale' => $locale]) }}">
                    @csrf
                    <button type="submit" class="border border-red-500 px-4 py-2 text-xs font-bold uppercase text-red-500 hover:bg-red-500 hover:text-white">
                        Logout
                    </button>
                </form>
            </div>

            <button type="button" @click="mobileOpen = true" class="lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#00594B]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                </svg>
            </button>
        </div>
    </div>

    <div x-show="mobileOpen" x-transition.opacity @click="mobileOpen = false" class="fixed inset-0 z-40 bg-black/30 lg:hidden"></div>

    <aside x-show="mobileOpen" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed left-0 top-0 z-50 h-full w-80 overflow-y-auto border-r border-gray-200 bg-white lg:hidden">
        <div class="flex h-20 items-center justify-between border-b border-gray-200 px-5">
            <img src="{{ asset('img/logos/logo.png') }}" alt="Gakkum SDA" class="h-11 w-auto object-contain">
            <button type="button" @click="mobileOpen = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-7 w-7 text-[#00594B]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <div class="py-4">
            <a href="{{ route('cms.index', ['locale' => $locale]) }}" class="block border-b border-gray-100 px-5 py-4 text-sm font-bold uppercase text-[#00594B]">
                Dashboard
            </a>

            <a href="{{ route('cms.about', ['locale' => $locale]) }}" class="block border-b border-gray-100 px-5 py-4 text-sm font-bold uppercase text-[#00594B]">
                About
            </a>

            <a href="{{ route('cms.agenda.index', ['locale' => $locale]) }}" class="block border-b border-gray-100 px-5 py-4 text-sm font-bold uppercase text-[#00594B]">
                Agenda
            </a>

            @foreach($navGroups as $group)
                <div x-data="{ open: false }" class="border-b border-gray-100">
                    <button type="button" @click="open = !open" class="flex w-full items-center justify-between px-5 py-4 text-left">
                        <span class="text-sm font-bold uppercase text-[#00594B]">
                            {{ $group['label'] }}
                        </span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-[#00594B] transition" :class="open ? 'rotate-180' : ''"
                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                        </svg>
                    </button>

                    <div x-show="open" x-transition class="pb-3">
                        @foreach($group['items'] as $item)
                            <a href="{{ route($item['route'], ['locale' => $locale]) }}" class="block px-8 py-2 text-sm text-gray-600">
                                {{ $item['label'] }}
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            @if(session('account_role') === 'super_admin')
                <a href="{{ route('cms.account.index', ['locale' => $locale]) }}" class="block border-b border-gray-100 px-5 py-4 text-sm font-bold uppercase text-[#00594B]">
                    Account
                </a>
            @endif

            <div class="space-y-3 px-5 py-5">
                <a href="{{ route('index', ['locale' => $locale]) }}" target="_blank"
                    class="flex h-11 items-center justify-center border border-[#007A63] text-xs font-bold uppercase text-[#007A63]">
                    Lihat Site
                </a>

                <form method="POST" action="{{ route('cms.logout', ['locale' => $locale]) }}">
                    @csrf
                    <button type="submit" class="flex h-11 w-full items-center justify-center border border-red-500 text-xs font-bold uppercase text-red-500">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </aside>
</nav>
