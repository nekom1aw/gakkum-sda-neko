<div class="max-w-7xl mx-auto py-10 lg:px-10">

    {{-- section --}}
    <div class="px-6 py-16 lg:px-10">

        {{-- header --}}
        <div class="flex items-start justify-between gap-6">

            <div class="text-4xl font-bold uppercase tracking-[8px] text-[#007A63] lg:text-5xl">
                {{ app()->getLocale() === 'id' ? 'Bincang Hukum' : 'Legal Discussion' }}
            </div>

        </div>

        {{-- line --}}
        <div class="mt-2 h-[2px] w-full bg-[#007A63]"></div>

        {{-- grid --}}
        <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-20 md:grid-cols-2 lg:grid-cols-3">

            @forelse($data as $item)

                        {{-- card --}}
                        <div class="flex h-full flex-col">

                            {{-- image --}}
                            <a href="{{ route('bincanghukum.detail', [
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

                                {{-- title --}}
                                <a href="{{ route('bincanghukum.detail', [
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
                        {{ app()->getLocale() === 'id' ? 'Belum Ada Bincang Hukum' : 'No Legal Discussion Yet' }}
                    </div>

                    <div class="mt-2 text-gray-500">
                        {{ app()->getLocale() === 'id' ? 'Belum ada data bincang hukum.' : 'There is no legal discussion data yet.' }}
                    </div>

                </div>

            @endforelse

        </div>

        {{-- pagination --}}
        @if($data->hasPages())

            <div class="mt-16">

                @include('components.pagination', [
                    'page' => $data->currentPage(),
                    'lastPage' => $data->lastPage(),
                ])

            </div>

        @endif

    </div>

</div>
