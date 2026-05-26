@extends('layouts.admin')

@section('content')
    <div class="max-w-7xl mx-auto px-6 lg:px-10 py-10">
        <div class="border-b border-[#007A63] pb-6">
            <h1 class="text-4xl font-black uppercase tracking-[6px] text-[#007A63]">
                CMS Dashboard
            </h1>

            <p class="mt-3 text-gray-600">
                Selamat datang di halaman pengelolaan konten Gakkum SDA.
            </p>
        </div>

        <div class="mt-8 grid grid-cols-1 gap-4 md:grid-cols-2 lg:grid-cols-3">
            @foreach([
                ['label' => 'Berita', 'route' => 'cms.berita.index'],
                ['label' => 'Publikasi', 'route' => 'cms.publikasi.index'],
                ['label' => 'Analisis', 'route' => 'cms.analisis.index'],
                ['label' => 'Investigasi', 'route' => 'cms.investigasi.index'],
                ['label' => 'Bincang Hukum', 'route' => 'cms.bincanghukum.index'],
                ['label' => 'Aktivitas', 'route' => 'cms.aktivitas.index'],
                ['label' => 'Pencemaran', 'route' => 'cms.sektor.pencemaran.index'],
                ['label' => 'Tata Ruang', 'route' => 'cms.sektor.tata-ruang.index'],
                ['label' => 'Kelautan dan Perikanan', 'route' => 'cms.sektor.kelautan-dan-perikanan.index'],
                ['label' => 'Energi dan Sumber Daya Mineral', 'route' => 'cms.sektor.energi-dan-sumber-daya-mineral.index'],
                ['label' => 'Perkebunan', 'route' => 'cms.sektor.perkebunan.index'],
                ['label' => 'Hutan', 'route' => 'cms.sektor.hutan.index'],
            ] as $menu)
                <a href="{{ route($menu['route'], ['locale' => app()->getLocale()]) }}"
                   class="block border border-gray-200 bg-white px-5 py-5 transition hover:border-[#007A63] hover:bg-green-50">
                    <div class="text-lg font-bold text-gray-900">
                        {{ $menu['label'] }}
                    </div>

                    <div class="mt-2 text-sm font-semibold uppercase text-[#007A63]">
                        Kelola Data
                    </div>
                </a>
            @endforeach
        </div>
    </div>
@endsection
