<!-- NAVBAR -->
<div x-data="{
        mobileMenu:false
    }" class="w-full">
    <header class="fixed top-0 left-0 z-50 w-full bg-white border-b border-gray-200">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- ================= DESKTOP ================= -->
            <div class="hidden lg:flex items-center justify-between h-[88px]">

                <!-- Logo -->
                <a href="/" class="shrink-0">
                    <img src="{{ asset('img/logos/logo.png') }}" alt="Logo" class="w-[145px] object-contain">
                </a>

                <!-- Menu -->
                <div class="flex items-center gap-4">

                    <!-- Tentang -->
                    <div x-data="{ open:false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center gap-1 text-[15px] font-bold uppercase tracking-wide text-[#00594B]">
                            {{ __('Tentang') }}

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition duration-300"
                                :class="open ? 'rotate-180' : 'rotate-0'" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>
                        <div x-show="open" x-transition @click.outside="open = false"
                            class="absolute top-full left-0 w-[220px] border border-gray-200 bg-white shadow-xl">

                            <a href="{{ route('tentangweb', [
    'locale' => app()->getLocale()
]) }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Tentang Web') }}
                            </a>

                            <a href="{{ route('tentangprogram', [
    'locale' => app()->getLocale()
]) }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Tentang Program') }}
                            </a>

                        </div>
                    </div>

                    <!-- Pengetahuan -->
                    <div x-data="{ open:false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center gap-1 text-[15px] font-bold uppercase tracking-wide text-[#00594B]">
                            {{ __('Pengetahuan') }}

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition duration-300"
                                :class="open ? 'rotate-180' : 'rotate-0'" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition @click.outside="open = false"
                            class="absolute top-full left-0 mt-2 w-[140px] border border-gray-200 bg-white shadow-xl">

                            <a href="{{ route('kiprah.index', [
    'locale' => app()->getLocale()
]) }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Kiprah') }}
                            </a>

                            <a href="{{ route('publikasi.index', [
    'locale' => app()->getLocale()
]) }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Publikasi') }}
                            </a>

                            <a href="{{ route('berita.index', [
    'locale' => app()->getLocale()
]) }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Berita') }}
                            </a>

                            <a href="{{ route('analisis.index', [
    'locale' => app()->getLocale()
]) }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Analisis') }}
                            </a>

                            <a href="{{ route('data.index', [
    'locale' => app()->getLocale()
]) }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Data') }}
                            </a>

                            <a href="{{ route('investigasi.index', [
    'locale' => app()->getLocale()
]) }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Investigasi') }}
                            </a>

                        </div>
                    </div>

                    <!-- Kegiatan -->
                    <div x-data="{ open:false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center gap-1 text-[15px] font-bold uppercase tracking-wide text-[#00594B]">
                            {{ __('Kegiatan') }}

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition duration-300"
                                :class="open ? 'rotate-180' : 'rotate-0'" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition @click.outside="open = false"
                            class="absolute top-full left-0 mt-2 w-[160px] border border-gray-200 bg-white shadow-xl">

                            <a href="{{ route('bincanghukum.index', [
    'locale' => app()->getLocale()
]) }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Bincang Hukum') }}
                            </a>

                            <a href="{{ route('aktivitas.index', [
    'locale' => app()->getLocale()
]) }}" class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Aktivitas') }}
                            </a>

                        </div>
                    </div>

                    <!-- Sektor -->
                    <div x-data="{ open:false }" class="relative">
                        <button @click="open = !open"
                            class="flex items-center gap-1 text-[15px] font-bold uppercase tracking-wide text-[#00594B]">
                            {{ __('Sektor') }}

                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 transition duration-300"
                                :class="open ? 'rotate-180' : 'rotate-0'" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                            </svg>
                        </button>

                        <div x-show="open" x-transition @click.outside="open = false"
                            class="absolute top-full left-0 mt-2 w-[320px] border border-gray-200 bg-white shadow-xl">
                            <a href="{{ route('sektor.pencemaran.index', ['locale' => app()->getLocale()]) }}"
                                class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Pencemaran') }}
                            </a>

                            <a href="{{ route('sektor.tata-ruang.index', ['locale' => app()->getLocale()]) }}"
                                class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Tata Ruang') }}
                            </a>

                            <a href="{{ route('sektor.kelautan-dan-perikanan.index', ['locale' => app()->getLocale()]) }}"
                                class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Kelautan dan Perikanan') }}
                            </a>

                            <a href="{{ route('sektor.energi-dan-sumber-daya-mineral.index', ['locale' => app()->getLocale()]) }}"
                                class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Energi dan Sumber Daya Mineral') }}
                            </a>

                            <a href="{{ route('sektor.perkebunan.index', ['locale' => app()->getLocale()]) }}"
                                class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Perkebunan') }}
                            </a>

                            <a href="{{ route('sektor.hutan.index', ['locale' => app()->getLocale()]) }}"
                                class="block px-5 py-2 text-sm text-gray-700 hover:bg-gray-50">
                                {{ __('Hutan') }}
                            </a>
                        </div>
                    </div>

                    <!-- Language -->
                    <div class="flex items-center gap-2">

                        {{-- ID --}}
                        <a href="{{ route(
    Route::currentRouteName(),
    array_merge(
        request()->route()->parameters(),
        ['locale' => 'id']
    )
) }}" class="text-[15px] font-semibold text-[#00594B]">
                            ID
                        </a>

                        <span class="text-gray-400">|</span>

                        {{-- EN --}}
                        <a href="{{ route(
    Route::currentRouteName(),
    array_merge(
        request()->route()->parameters(),
        ['locale' => 'en']
    )
) }}" class="text-[15px] font-semibold text-[#00594B]">
                            EN
                        </a>

                    </div>

                    <!-- Search -->
                    <form action="{{ route('search.index', ['locale' => app()->getLocale()]) }}" method="GET"
                        x-data="{ searchOpen: false }" class="relative flex items-center gap-3">
                        <button type="button" @click="searchOpen = !searchOpen" class="flex items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#00594B]" fill="none"
                                viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.4">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M21 21l-4.35-4.35m1.85-5.15a7 7 0 11-14 0a7 7 0 0114 0z" />
                            </svg>
                        </button>

                        <div x-show="searchOpen" x-transition @click.outside="searchOpen = false"
                            class="absolute left-[40px] top-1/2 -translate-y-1/2">
                            <div class="flex items-center gap-2">
                                <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ app()->getLocale() === 'id' ? 'Cari...' : 'Search...' }}"
                                    class="w-[210px] border-0 border-b border-gray-300 bg-transparent px-1 py-1 text-[15px] text-gray-700 placeholder:text-gray-400 outline-none focus:border-[#00594B]">
                                <button type="submit" class="text-[12px] font-bold uppercase text-[#00594B]">
                                    {{ app()->getLocale() === 'id' ? 'Cari' : 'Search' }}
                                </button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>

            <!-- ================= MOBILE & TABLET ================= -->
            <div class="flex lg:hidden items-center justify-between h-[78px] relative">

                <!-- LEFT -->
                <div class="w-[60px] flex items-center">
                    <button @click="mobileMenu = true" class="flex items-center justify-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-8 h-8 text-[#00594B]" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                    </button>
                </div>

                <!-- CENTER -->
                <div class="absolute left-1/2 -translate-x-1/2">
                    <a href="/">
                        <img src="{{ asset('img/logos/logo.png') }}" class="w-[120px] object-contain">
                    </a>
                </div>
                <!-- RIGHT -->
                <div class="w-[60px] flex items-center justify-end gap-1">

                    <a href="{{ url('en' . request()->getPathInfo()) }}" class="text-sm font-semibold text-[#00594B]">
                        EN
                    </a>

                    <span class="text-gray-400">|</span>

                    <a href="{{ url('id' . request()->getPathInfo()) }}" class="text-sm font-semibold text-[#00594B]">
                        ID
                    </a>

                </div>

            </div>

        </div>
    </header>

    <!-- Overlay -->
    <div x-show="mobileMenu" x-transition.opacity @click="mobileMenu = false"
        class="fixed inset-0 z-40 bg-black/30 lg:hidden"></div>

    <!-- Sidebar -->
    <div x-show="mobileMenu" x-transition:enter="transition ease-out duration-300"
        x-transition:enter-start="-translate-x-full" x-transition:enter-end="translate-x-0"
        x-transition:leave="transition ease-in duration-200" x-transition:leave-start="translate-x-0"
        x-transition:leave-end="-translate-x-full"
        class="fixed top-0 left-0 z-50 h-full w-[300px] bg-white border-r border-gray-200 lg:hidden overflow-y-auto">

        <!-- Header -->
        <div class="flex items-center justify-between h-[78px] px-5 border-b border-gray-200">

            <img src="{{ asset('img/logos/logo.png') }}" class="w-[110px]">

            <button @click="mobileMenu = false">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-7 h-7 text-[#00594B]" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor" stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>

        </div>

        <!-- Mobile Menu -->
        <div class="py-4">

            <form action="{{ route('search.index', ['locale' => app()->getLocale()]) }}" method="GET"
                class="border-b border-gray-100 px-5 py-4">
                <div class="flex items-center gap-2">
                    <input type="text" name="q" value="{{ request('q') }}" placeholder="{{ app()->getLocale() === 'id' ? 'Cari...' : 'Search...' }}"
                        class="h-[44px] w-full border border-gray-300 px-4 text-[14px] outline-none">
                    <button type="submit" class="h-[44px] border border-[#00594B] px-4 text-[12px] font-bold uppercase text-[#00594B]">
                        {{ app()->getLocale() === 'id' ? 'Cari' : 'Search' }}
                    </button>
                </div>
            </form>

            <!-- Tentang -->
            <div x-data="{ open:false }" x-effect="if(!mobileMenu) open = false" @click.outside="open = false"
                class="border-b border-gray-100">

                <button @click="open = !open" class="w-full flex items-center justify-between px-5 py-4">
                    <span class="text-[15px] font-bold uppercase text-[#00594B]">
                        Tentang
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#00594B] transition duration-300"
                        :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <div x-show="open" x-transition class="pb-3">
                    <a href="{{ route('tentangweb', ['locale' => app()->getLocale()]) }}" class="block px-8 py-2 text-sm text-gray-600">
                        {{ __('Tentang Web') }}
                    </a>

                    <a href="{{ route('tentangprogram', ['locale' => app()->getLocale()]) }}" class="block px-8 py-2 text-sm text-gray-600">
                        {{ __('Tentang Program') }}
                    </a>
                </div>

            </div>

            <!-- Pengetahuan -->
            <div x-data="{ open:false }" x-effect="if(!mobileMenu) open = false" @click.outside="open = false"
                class="border-b border-gray-100">

                <button @click="open = !open" class="w-full flex items-center justify-between px-5 py-4">
                    <span class="text-[15px] font-bold uppercase text-[#00594B]">
                        {{ __('Pengetahuan') }}
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#00594B] transition duration-300"
                        :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <div x-show="open" x-transition class="pb-3">
                     <a href="{{ route('kiprah.index', ['locale' => app()->getLocale()]) }}" class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Kiprah') }}
                    </a>
                    <a href="{{ route('publikasi.index', ['locale' => app()->getLocale()]) }}" class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Publikasi') }}
                    </a>

                    <a href="{{ route('berita.index', ['locale' => app()->getLocale()]) }}" class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Berita') }}
                    </a>

                    <a href="{{ route('analisis.index', ['locale' => app()->getLocale()]) }}" class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Analisis') }}
                    </a>
                     <a href="{{ route('data.index', ['locale' => app()->getLocale()]) }}" class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Data') }}
                    </a>
                     <a href="{{ route('investigasi.index', ['locale' => app()->getLocale()]) }}" class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Investigasi') }}
                    </a>
                </div>

            </div>

            <!-- Kegiatan -->
            <div x-data="{ open:false }" x-effect="if(!mobileMenu) open = false" @click.outside="open = false"
                class="border-b border-gray-100">

                <button @click="open = !open" class="w-full flex items-center justify-between px-5 py-4">
                    <span class="text-[15px] font-bold uppercase text-[#00594B]">
                        {{ __('Kegiatan') }}
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#00594B] transition duration-300"
                        :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <div x-show="open" x-transition class="pb-3">
                    <a href="{{ route('bincanghukum.index', ['locale' => app()->getLocale()]) }}" class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Bincang Hukum') }}
                    </a>

                    <a href="{{ route('aktivitas.index', ['locale' => app()->getLocale()]) }}" class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Aktivitas') }}
                    </a>
                </div>

            </div>

            <!-- Sektor -->
            <div x-data="{ open:false }" x-effect="if(!mobileMenu) open = false" @click.outside="open = false"
                class="border-b border-gray-100">

                <button @click="open = !open" class="w-full flex items-center justify-between px-5 py-4">
                    <span class="text-[15px] font-bold uppercase text-[#00594B]">
                        {{ __('Sektor') }}
                    </span>

                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 text-[#00594B] transition duration-300"
                        :class="open ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                    </svg>
                </button>

                <div x-show="open" x-transition class="pb-3">
                    <a href="{{ route('sektor.pencemaran.index', ['locale' => app()->getLocale()]) }}"
                        class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Pencemaran') }}
                    </a>

                    <a href="{{ route('sektor.tata-ruang.index', ['locale' => app()->getLocale()]) }}"
                        class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Tata Ruang') }}
                    </a>

                    <a href="{{ route('sektor.kelautan-dan-perikanan.index', ['locale' => app()->getLocale()]) }}"
                        class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Kelautan dan Perikanan') }}
                    </a>

                    <a href="{{ route('sektor.energi-dan-sumber-daya-mineral.index', ['locale' => app()->getLocale()]) }}"
                        class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Energi dan Sumber Daya Mineral') }}
                    </a>

                    <a href="{{ route('sektor.perkebunan.index', ['locale' => app()->getLocale()]) }}"
                        class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Perkebunan') }}
                    </a>

                    <a href="{{ route('sektor.hutan.index', ['locale' => app()->getLocale()]) }}"
                        class="block px-8 py-2 text-[14px] text-gray-600">
                        {{ __('Hutan') }}
                    </a>
                </div>

            </div>

        </div>

    </div>

    <div class="h-[78px] lg:h-[88px]"></div>
</div>
