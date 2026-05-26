<div class="max-w-7xl mx-auto py-10 lg:px-10">

    {{-- section --}}
    <div class="px-6 py-16 lg:px-10">

        {{-- header --}}
        <div class="flex items-start justify-between gap-6">

            <div class="text-4xl font-bold uppercase tracking-[8px] text-[#007A63] lg:text-5xl">
                {{ app()->getLocale() === 'id' ? 'Aktivitas' : 'Activities' }}
            </div>

        </div>

        {{-- line --}}
        <div class="mt-2 h-[2px] w-full bg-[#007A63]"></div>

        {{-- grid --}}
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-20 md:grid-cols-2 lg:grid-cols-3">

            @forelse($aktivitas as $item)

                        {{-- card --}}
                        <div class="flex h-full flex-col">

                            {{-- image --}}
                            <a href="{{ route('aktivitas.detail', [
                    'locale' => app()->getLocale(),
                    'id' => $item->id,
                    'slug' => \Illuminate\Support\Str::slug(
                        app()->getLocale() === 'id'
                        ? $item->title_id
                        : $item->title_en
                    )
                ]) }}" class="block h-[260px] w-full overflow-hidden">

                                <img src="{{ asset('storage/' . (
                    app()->getLocale() === 'id'
                    ? $item->image_id
                    : $item->image_en
                )) }}" class="h-full w-full object-cover">

                            </a>

                            {{-- content --}}
                            <div class="flex flex-1 flex-col">

                                {{-- jenis dan tanggal --}}
                                <div class="mt-5 flex items-center gap-2 text-[14px] font-bold">

                                    @if(
                                                        app()->getLocale() === 'id'
                                                        ? $item->jenis_kegiatan_id
                                                        : $item->jenis_kegiatan_en
                                                    )

                                                    <div class="uppercase text-[#007A63]">

                                                        {{ app()->getLocale() === 'id'
                                        ? $item->jenis_kegiatan_id
                                        : $item->jenis_kegiatan_en }}

                                                    </div>

                                    @endif

                                    @if($item->tanggal)

                                        <div class="text-gray-400">
                                            |
                                        </div>

                                        <div class="text-red-600">

                                            {{ \Carbon\Carbon::parse($item->tanggal)->format('d-m-Y') }}

                                        </div>

                                    @endif

                                </div>

                                {{-- title --}}
                                <a href="{{ route('aktivitas.detail', [
                    'locale' => app()->getLocale(),
                    'id' => $item->id,
                    'slug' => \Illuminate\Support\Str::slug(
                        app()->getLocale() === 'id'
                        ? $item->title_id
                        : $item->title_en
                    )
                ]) }}">

                                    <div class="mt-5 h-[120px] overflow-hidden text-2xl font-bold leading-relaxed text-[#2E2E2E]">

                                        {{ app()->getLocale() === 'id'
                    ? $item->title_id
                    : $item->title_en }}

                                    </div>

                                </a>
                                
                                {{-- description --}}
                                @if(
                                                app()->getLocale() === 'id'
                                                ? $item->deskripsi_id
                                                : $item->deskripsi_en
                                            )

                                            <div class="mt-6 h-[120px] overflow-hidden text-sm leading-relaxed text-[#2E2E2E]">

                                                {!! app()->getLocale() === 'id'
                                    ? $item->deskripsi_id
                                    : $item->deskripsi_en !!}

                                            </div>

                                @endif

                            </div>

                        </div>

            @empty

                {{-- empty --}}
                <div class="col-span-3 py-20 text-center">

                    <div class="text-[24px] font-bold text-gray-900">
                        {{ app()->getLocale() === 'id' ? 'Belum Ada Aktivitas' : 'No Activities Yet' }}
                    </div>

                    <div class="mt-2 text-gray-500">
                        {{ app()->getLocale() === 'id' ? 'Belum ada data aktivitas.' : 'There is no activity data yet.' }}
                    </div>

                </div>

            @endforelse

        </div>

        {{-- pagination --}}
        @if($aktivitas->hasPages())

            <div class="mt-16">

                @include('components.pagination', [
                    'page' => $aktivitas->currentPage(),
                    'lastPage' => $aktivitas->lastPage(),
                ])

            </div>

        @endif

    </div>

</div>
