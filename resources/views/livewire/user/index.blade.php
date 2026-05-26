<div class="text-[#202020]">

    <!-- HEADER -->
    <section class="relative bg-cover bg-center text-white" @style([
        "background-image: url('" . asset('img/51929712390_e2384f1bf9_c.jpg') . "')"
    ])>

        <div class="absolute inset-0 bg-black/40"></div>

        <div class="relative mx-auto flex max-w-7xl items-center px-4 py-12 sm:px-6 lg:px-8">

            <div class="grid w-full items-center gap-10 lg:grid-cols-12">

                {{-- left --}}
                <div class="self-start pt-48 lg:col-span-8">

                    <div class="lg:pl-10">

                        <div
                            class="text-2xl font-black uppercase leading-relaxed tracking-widest drop-shadow-md sm:text-3xl">
                            GAKKUM SDA
                        </div>

                        <div
                            class="mt-8 max-w-4xl text-3xl font-black uppercase leading-relaxed drop-shadow-md sm:text-4xl lg:text-4xl">
                            Peningkatan Kapasitas Penegakan Hukum Sumber Daya Alam
                        </div>

                    </div>

                </div>

                {{-- right --}}
                <div class="mx-auto w-full max-w-[360px] bg-[#00594B]/70 p-5 text-center shadow-2xl lg:col-span-4">

                    {{-- title --}}
                    <div class="text-4xl font-bold uppercase tracking-[10px] text-white drop-shadow-md">
                        {{ app()->getLocale() === 'id' ? 'Publikasi' : 'Publication' }}
                    </div>

                    @if($publikasi)

                                        {{-- wrapper --}}
                                        <div class=" mt-2 bg-white/10 p-4">

                                            {{-- image --}}
                                            <a href="#">

                                                <div>

                                                    <img class="mx-auto w-[280px] object-contain"
                                                src="{{ asset('storage/' . (
                                                    app()->getLocale() === 'id'
                                                        ? ($publikasi->image_id ?? $publikasi->image_en)
                                                        : ($publikasi->image_en ?? $publikasi->image_id)
                                                )) }}"
                                                        alt="{{ app()->getLocale() === 'id'
                                                            ? ($publikasi->title_id ?? $publikasi->title_en)
                                                            : ($publikasi->title_en ?? $publikasi->title_id) }}">

                                                </div>

                                            </a>

                                        </div>

                                        {{-- title publikasi --}}
                                        <div
                                            class="mx-auto mt-5 max-w-[280px] text-[17px] font-black leading-snug text-white drop-shadow-md">
                                            {{ app()->getLocale() === 'id'
                                                ? ($publikasi->title_id ?? $publikasi->title_en)
                                                : ($publikasi->title_en ?? $publikasi->title_id) }}
                                        </div>

                                        {{-- button --}}
                                        <a href="{{ route('publikasi.detail', [
                            'locale' => app()->getLocale(),
                            'id' => $publikasi->id,
                            'slug' => \Illuminate\Support\Str::slug(
                                app()->getLocale() === 'id'
                                ? $publikasi->title_id
                                : $publikasi->title_en
                            )
                        ]) }}"
                                            class="mt-5 inline-flex h-[56px] w-full items-center justify-center border-[4px] border-green-700 bg-white text-[20px] font-black text-green-700 shadow-md transition hover:bg-green-50">
                                            {{ app()->getLocale() === 'id' ? 'Selengkapnya' : 'Read More' }}
                                        </a>

                    @endif

                </div>

            </div>

        </div>

    </section>

    <!-- BERITA & AGENDA -->
    <section class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">

        <div class="grid gap-10 lg:grid-cols-12">

            {{-- berita --}}
            <div class="border-r-0 border-gray-300 lg:col-span-9 lg:border-r lg:pr-10">

                {{-- title --}}
                <div>

                    <a href="{{ route('berita.index', [
    'locale' => app()->getLocale()
]) }}" class="text-[26px] font-bold uppercase tracking-[5px] text-[#12876A]">
                        {{ app()->getLocale() === 'id' ? 'Berita' : 'News' }}
                    </a>

                </div>

                {{-- list berita --}}
                <div class="mt-14 grid gap-x-10 gap-y-10 sm:grid-cols-2">

                    @foreach($berita as $item)

                                        <article>

                                            {{-- title --}}
                                            <h2 class="text-[20px] font-bold leading-snug">

                                                <a href="{{ $item->source_link }}" target="_blank" class="hover:text-[#12876A]">
                                                    {{ app()->getLocale() === 'id'
                            ? $item->title_id
                            : ($item->title_en ?? $item->title_id)
                                            }}
                                                </a>

                                            </h2>

                                            {{-- desc --}}
                                            <p class="mt-5 text-[15px] leading-relaxed text-gray-700">

                                                {!! \Illuminate\Support\Str::limit(
                            strip_tags(
                                app()->getLocale() === 'id'
                                ? $item->description_id
                                : ($item->description_en ?? $item->description_id)
                            ),
                            150
                        ) !!}

                                            </p>

                                            {{-- source --}}
                                            @if($item->source_text)

                                                <p class="mt-5 text-[15px]">

                                                    <span class="font-bold text-black">
                                                        {{ app()->getLocale() === 'id' ? 'Sumber:' : 'Source:' }}
                                                    </span>

                                                    <a href="{{ $item->source_link }}" target="_blank"
                                                        class="font-bold text-[#12876A] no-underline hover:underline">
                                                        {{ $item->source_text }}
                                                    </a>

                                                </p>

                                            @endif

                                        </article>

                    @endforeach

                </div>

            </div>

            {{-- agenda --}}
            <aside class="lg:col-span-3">

                {{-- title --}}
                    <h2 class="text-[26px] font-bold uppercase tracking-[5px] text-[#12876A]">
                        {{ app()->getLocale() === 'id' ? 'Agenda' : 'Agenda' }}
                    </h2>

                {{-- content --}}
                <div class="mt-14 space-y-5">

                    @foreach($agenda as $item)

                                        <div class="border-b border-gray-300 pb-4">

                                            {{-- meta --}}
                                            <p class="text-[13px] font-bold text-[#12876A]">

                                                @if($item->date)

                                                    {{ \Carbon\Carbon::parse($item->date)->format('d-M-y') }}

                                                @endif

                                                <span class="text-black">||</span>

                                                {{ $item->jenis_kegiatan }}

                                            </p>

                                            {{-- title --}}
                                            <a href="{{ route('agenda.detail', [
                            'locale' => app()->getLocale(),
                            'id' => $item->id,
                            'slug' => \Illuminate\Support\Str::slug(
                                app()->getLocale() === 'id'
                                ? ($item->title_id ?? 'agenda')
                                : ($item->title_en ?? $item->title_id ?? 'agenda')
                            )
                        ]) }}">
                                                {{ app()->getLocale() === 'id'
                                                    ? ($item->title_id ?? $item->title_en ?? 'agenda')
                                                    : ($item->title_en ?? $item->title_id ?? 'agenda') }}
                                            </a>

                                        </div>

                    @endforeach

                </div>

            </aside>

        </div>

    </section>

    <!-- BINCANG HUKUM -->
    <section class="bg-[#F3F3F3] py-12">

        <div class="mx-auto max-w-6xl px-4 sm:px-6 lg:px-8">

            {{-- title --}}
            <h2 class="text-center text-[34px] font-black uppercase tracking-[2px] text-[#12876A]">

                <a href="{{ route('bincanghukum.index', [
    'locale' => app()->getLocale()
]) }}" class="no-underline">
                    {{ app()->getLocale() === 'id' ? 'Bincang Hukum' : 'Legal Discussion' }}
                </a>

            </h2>

            <div class="mt-10 grid gap-8 lg:grid-cols-12">

                @if($bincang->count())

                                {{-- utama --}}
                                <article class="lg:col-span-9">

                                    <a href="{{ route('bincanghukum.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $bincang[0]->id,
                        'slug' => \Illuminate\Support\Str::slug(
                            app()->getLocale() === 'id'
                            ? ($bincang[0]->title_id ?? 'bincang-hukum')
                            : ($bincang[0]->title_en ?? $bincang[0]->title_id ?? 'bincang-hukum')
                        )
                    ]) }}">

                                        <img class="w-full border border-gray-300 bg-white p-1"
                                            src="{{ asset('storage/' . (
                                                app()->getLocale() === 'id'
                                                    ? ($bincang[0]->image_id ?? $bincang[0]->image_en)
                                                    : ($bincang[0]->image_en ?? $bincang[0]->image_id)
                                            )) }}"
                                            alt="{{ app()->getLocale() === 'id'
                                                ? ($bincang[0]->title_id ?? $bincang[0]->title_en)
                                                : ($bincang[0]->title_en ?? $bincang[0]->title_id) }}">

                                    </a>

                                    <p class="mt-4 text-center text-[14px] font-bold uppercase tracking-[2px] text-[#12876A]">

                                        {{ app()->getLocale() === 'id'
                                            ? \Carbon\Carbon::parse($bincang[0]->tanggal)->translatedFormat('F Y')
                                            : \Carbon\Carbon::parse($bincang[0]->tanggal)->translatedFormat('F Y') }}

                                    </p>

                                    <h3 class="mt-3 text-center text-[32px] font-bold leading-tight">

                                        <a href="{{ route('bincanghukum.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $bincang[0]->id,
                        'slug' => \Illuminate\Support\Str::slug(
                            app()->getLocale() === 'id'
                            ? ($bincang[0]->title_id ?? 'bincang-hukum')
                            : ($bincang[0]->title_en ?? $bincang[0]->title_id ?? 'bincang-hukum')
                        )
                    ]) }}" class="text-black no-underline hover:text-[#12876A]">
                                            {{ app()->getLocale() === 'id'
                                                ? ($bincang[0]->title_id ?? $bincang[0]->title_en)
                                                : ($bincang[0]->title_en ?? $bincang[0]->title_id) }}
                                        </a>

                                    </h3>

                                    <p class="mx-auto mt-8 max-w-3xl text-center text-[17px] leading-relaxed text-gray-700">

                                        {!! \Illuminate\Support\Str::limit(
                        strip_tags(
                            app()->getLocale() === 'id'
                                ? ($bincang[0]->deskripsi_id ?? $bincang[0]->deskripsi_en)
                                : ($bincang[0]->deskripsi_en ?? $bincang[0]->deskripsi_id)
                        ),
                        200
                    ) !!}

                                    </p>

                                </article>

                                {{-- sidebar --}}
                                <aside class="space-y-7 lg:col-span-3">

                                    @foreach($bincang->skip(1) as $item)

                                                    <article>

                                                        <a href="{{ route('bincanghukum.detail', [
                                            'locale' => app()->getLocale(),
                                            'id' => $item->id,
                                            'slug' => \Illuminate\Support\Str::slug(
                                                app()->getLocale() === 'id'
                                                ? ($item->title_id ?? 'bincang-hukum')
                                                : ($item->title_en ?? $item->title_id ?? 'bincang-hukum')
                                            )
                                        ]) }}">

                                                            <img class="w-full border border-gray-300 bg-white p-1"
                                                                src="{{ asset('storage/' . (
                                                                    app()->getLocale() === 'id'
                                                                        ? ($item->image_id ?? $item->image_en)
                                                                        : ($item->image_en ?? $item->image_id)
                                                                )) }}"
                                                                alt="{{ app()->getLocale() === 'id'
                                                                    ? ($item->title_id ?? $item->title_en)
                                                                    : ($item->title_en ?? $item->title_id) }}">

                                                        </a>

                                                        <p class="mt-2 text-[13px] font-bold text-[#12876A]">

                                                            {{ \Carbon\Carbon::parse($item->tanggal)->translatedFormat('F Y') }}

                                                        </p>

                                                        <h3 class="mt-2 text-[18px] font-bold leading-snug">

                                                            <a href="{{ route('bincanghukum.detail', [
                                            'locale' => app()->getLocale(),
                                            'id' => $item->id,
                                            'slug' => \Illuminate\Support\Str::slug(
                                                app()->getLocale() === 'id'
                                                ? ($item->title_id ?? 'bincang-hukum')
                                                : ($item->title_en ?? $item->title_id ?? 'bincang-hukum')
                                            )
                                        ]) }}" class="text-black no-underline hover:text-[#12876A]">
                                                                {{ app()->getLocale() === 'id'
                                                                    ? ($item->title_id ?? $item->title_en)
                                                                    : ($item->title_en ?? $item->title_id) }}
                                                            </a>

                                                        </h3>

                                                    </article>

                                    @endforeach

                                </aside>

                @endif

            </div>

        </div>

    </section>

    <!-- AKTIVITAS -->
    <section class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">

        {{-- title --}}
        <div>

            <a href="{{ route('aktivitas.index', [
    'locale' => app()->getLocale()
]) }}" class="text-[30px] font-black uppercase tracking-[5px] text-[#12876A] no-underline">
                {{ app()->getLocale() === 'id' ? 'Aktivitas' : 'Activities' }}
            </a>

            <hr class="mt-3 border-t-4 border-[#12876A]">

        </div>

        {{-- content --}}
        <div class="mt-14 grid gap-x-8 gap-y-10 sm:grid-cols-2 lg:grid-cols-3">

            @foreach($aktivitas as $item)

                        <article>

                            {{-- image --}}
                            <a href="{{ route('aktivitas.detail', [
                    'locale' => app()->getLocale(),
                    'id' => $item->id,
                    'slug' => \Illuminate\Support\Str::slug(
                        app()->getLocale() === 'id'
                        ? ($item->title_id ?? 'aktivitas')
                        : ($item->title_en ?? $item->title_id ?? 'aktivitas')
                    )
                ]) }}">

                            <img class="mb-4 h-[230px] w-full object-cover"
                                src="{{ asset('storage/' . (
                                    app()->getLocale() === 'id'
                                        ? ($item->image_id ?? $item->image_en)
                                        : ($item->image_en ?? $item->image_id)
                                )) }}"
                                alt="{{ app()->getLocale() === 'id'
                                    ? ($item->title_id ?? $item->title_en)
                                    : ($item->title_en ?? $item->title_id) }}">

                            </a>

                            {{-- meta --}}
                            <div class="text-[13px]">

                                <span class="font-bold text-[#12876A]">
                                {{ app()->getLocale() === 'id'
                                    ? ($item->jenis_kegiatan_id ?? $item->kategori)
                                    : ($item->jenis_kegiatan_en ?? $item->kategori) }}
                                </span>

                                <span>|</span>

                                <span>
                                    {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}
                                </span>

                            </div>

                            {{-- title --}}
                            <h3 class="mt-3 min-h-[72px] text-[20px] font-bold leading-snug">

                                <a href="{{ route('aktivitas.detail', [
                    'locale' => app()->getLocale(),
                    'id' => $item->id,
                    'slug' => \Illuminate\Support\Str::slug(
                        app()->getLocale() === 'id'
                        ? ($item->title_id ?? 'aktivitas')
                        : ($item->title_en ?? $item->title_id ?? 'aktivitas')
                    )
                ]) }}" class="text-black no-underline hover:text-[#12876A]">
                                    {{ app()->getLocale() === 'id'
                                        ? ($item->title_id ?? $item->title_en)
                                        : ($item->title_en ?? $item->title_id) }}
                                </a>

                            </h3>

                            {{-- desc --}}
                            <p class="mt-4 text-[15px] leading-relaxed text-gray-700">

                                {!! \Illuminate\Support\Str::limit(
                    strip_tags(
                        app()->getLocale() === 'id'
                            ? ($item->deskripsi_id ?? $item->deskripsi_en)
                            : ($item->deskripsi_en ?? $item->deskripsi_id)
                    ),
                    120
                ) !!}

                            </p>

                        </article>

            @endforeach

        </div>

    </section>

    <!-- PETA SEBARAN -->
    <section class="mx-auto mt-12 max-w-6xl px-4 py-12 pb-16 sm:px-6 lg:px-8">

        <div class="row" id="actif">

            <div class="col-lg-12">

                <h3 class="text-center text-[34px] font-black uppercase tracking-[3px] text-[#12876A]">

                        <a class="no-underline" href="{{ route('data.index', [
    'locale' => app()->getLocale()
]) }}">
                        {{ app()->getLocale() === 'id' ? 'PETA SEBARAN' : 'DISTRIBUTION MAP' }}
                    </a>

                </h3>

            </div>

        </div>

        <div x-data="{ tab : 'kasus' }" class="mt-14">

            {{-- tab --}}
            <div class="border-b-[20px] border-[#ECECEC]">

                <div class="flex items-end gap-4">

                    {{-- kasus --}}
                    <button type="button" @click="tab = 'kasus'" :class="
                        tab === 'kasus'
                            ? 'bg-red-600'
                            : 'bg-red-500'
                    " class="px-7 py-4 text-[18px] font-black uppercase text-white">
                        {{ app()->getLocale() === 'id' ? 'Sebaran Kasus' : 'Case Distribution' }}
                    </button>

                    {{-- ahli --}}
                    <button type="button" @click="tab = 'ahli'" :class="
                        tab === 'ahli'
                            ? 'bg-green-700'
                            : 'bg-green-600'
                    " class="px-7 py-4 text-[18px] font-black uppercase text-white">
                        {{ app()->getLocale() === 'id' ? 'Sebaran Ahli' : 'Expert Distribution' }}
                    </button>

                </div>

            </div>

            {{-- kasus --}}
            <div x-show="tab === 'kasus'" class="pt-10">

                <a href="{{ route('data.index', [
    'locale' => app()->getLocale()
]) }}">

                    <img class="w-full object-contain" src="{{ asset('upload/peta.png') }}" alt="Peta Sebaran">

                </a>

                <div class="mt-8 text-center">

                    <a href="{{ route('data.index', [
    'locale' => app()->getLocale()
]) }}" class="inline-flex bg-red-600 px-7 py-3 text-[22px] text-white transition hover:bg-red-700">
                        {{ app()->getLocale() === 'id' ? 'Lihat Selengkapnya' : 'See More' }}
                    </a>

                </div>

            </div>

            {{-- ahli --}}
            <div x-show="tab === 'ahli'" class="py-20 text-center text-[18px] text-gray-500">
                {{ app()->getLocale() === 'id' ? 'Data Sebaran Ahli.' : 'Expert distribution data.' }}
            </div>

        </div>

    </section>

</div>
