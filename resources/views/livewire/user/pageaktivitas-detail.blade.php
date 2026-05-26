<div class="leading-relaxed">

    {{-- top section --}}
    <div class="w-full bg-[#E9E9E9]">

        <div class="max-w-7xl mx-auto px-6 lg:px-24">

            {{-- hero image --}}
            <div class="w-full overflow-hidden">

                <img src="{{ asset('storage/' . (
    app()->getLocale() === 'id'
    ? $aktivitas->image_id
    : $aktivitas->image_en
)) }}" alt="{{ app()->getLocale() === 'id'
    ? $aktivitas->title_id
    : $aktivitas->title_en }}" class="h-[780px] w-full object-cover">

            </div>

            {{-- header --}}
            <div class="py-6">

                {{-- jenis --}}
                @if(
                                app()->getLocale() === 'id'
                                ? $aktivitas->jenis_kegiatan_id
                                : $aktivitas->jenis_kegiatan_en
                            )

                            <div class="text-[13px] font-bold uppercase tracking-[2px] text-[#007A63]">

                                {{ app()->getLocale() === 'id'
                    ? $aktivitas->jenis_kegiatan_id
                    : $aktivitas->jenis_kegiatan_en }}

                            </div>

                @endif

                {{-- title --}}
                <div class="mt-3 max-w-5xl text-[28px] font-extrabold text-[#007A63] lg:text-[34px]">

                    {{ app()->getLocale() === 'id'
    ? $aktivitas->title_id
    : $aktivitas->title_en }}

                </div>

                {{-- tanggal --}}
                @if($aktivitas->tanggal)

                    <div class="mt-4 text-[14px] uppercase tracking-[1px] text-gray-500">

                        {{ \Carbon\Carbon::parse($aktivitas->tanggal)->format('d F Y') }}

                    </div>

                @endif

                {{-- description --}}
                @if(
                                app()->getLocale() === 'id'
                                ? $aktivitas->deskripsi_id
                                : $aktivitas->deskripsi_en
                            )

                            <div class="mt-6 text-[16px] italic leading-relaxed text-[#2E2E2E]">

                                {!! app()->getLocale() === 'id'
                    ? $aktivitas->deskripsi_id
                    : $aktivitas->deskripsi_en !!}

                            </div>

                @endif

            </div>

        </div>

    </div>

    {{-- content --}}
    <div class="max-w-2xl mx-auto px-6 py-16 lg:px-0">

        <div class="prose prose-lg max-w-none leading-relaxed">

            {!! app()->getLocale() === 'id'
    ? $aktivitas->content_id
    : $aktivitas->content_en !!}

        </div>

    </div>

    {{-- lainnya --}}
    @if($lainnya->count())

        <div class="max-w-7xl mx-auto px-6 pb-24 lg:px-24">

            {{-- header --}}
            <div class="flex items-center gap-4">

                <div class="text-[16px] font-bold uppercase tracking-[3px] text-[#007A63]">
                    {{ app()->getLocale() === 'id' ? 'Aktivitas Lainnya' : 'More Activities' }}
                </div>

                <div class="h-[2px] flex-1 bg-[#007A63]"></div>

            </div>

            {{-- grid --}}
            <div class="mt-14 grid grid-cols-1 gap-x-12 gap-y-20 md:grid-cols-2 lg:grid-cols-3">

                @foreach($lainnya as $item)

                        <a href="{{ route('aktivitas.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $item->id,
                        'slug' => \Illuminate\Support\Str::slug(
                            app()->getLocale() === 'id'
                            ? $item->title_id
                            : $item->title_en
                        )
                    ]) }}" class="block">

                            {{-- image --}}
                            <div class="h-[240px] w-full overflow-hidden">

                                <img src="{{ asset('storage/' . (
                        app()->getLocale() === 'id'
                        ? $item->image_id
                        : $item->image_en
                    )) }}" class="h-full w-full object-cover">

                            </div>

                            {{-- title --}}
                            <div class="mt-6 text-[24px] font-bold leading-[1.2] text-[#2E2E2E]">

                                {{ app()->getLocale() === 'id'
                        ? $item->title_id
                        : $item->title_en }}

                            </div>

                        </a>

                @endforeach

            </div>

        </div>

    @endif

</div>
