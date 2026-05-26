<div class="max-w-7xl mx-auto py-10 lg:px-10">

    {{-- section --}}
    <div class="px-6 py-16 lg:px-10">

        {{-- header --}}
        <div class="flex items-start justify-between gap-6">

            {{-- title --}}
            <div class="text-xl font-bold uppercase tracking-[8px] text-[#007A63] lg:text-2xl">
                {{ app()->getLocale() === 'id' ? 'Analisis' : 'Analysis' }}
            </div>

        </div>

        {{-- line --}}
        <div class="mt-2 h-[2px] w-full bg-[#007A63]"></div>

        {{-- grid --}}
        <div class="mt-10 grid grid-cols-1 gap-x-4 gap-y-20 md:grid-cols-2 lg:grid-cols-3">

            @forelse($analisis as $item)

                        {{-- card --}}
                        <div class="w-full">

                            {{-- image --}}
                            <a href="{{ route('analisis.detail', [
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

                            {{-- title --}}
                            <a href="{{ route('analisis.detail', [
                    'locale' => app()->getLocale(),
                    'id' => $item->id,
                    'slug' => \Illuminate\Support\Str::slug(
                        app()->getLocale() === 'id'
                        ? $item->title_id
                        : $item->title_en
                    )
                ]) }}">

                                <div class="mt-5 text-[24px] font-bold leading-relaxed text-[#2E2E2E]">

                                    {{ app()->getLocale() === 'id'
                    ? $item->title_id
                    : $item->title_en }}

                                </div>

                            </a>

                            {{-- description --}}
                            @if(
                                        app()->getLocale() === 'id'
                                        ? $item->description_id
                                        : $item->description_en
                                    )

                                    <div class="mt-8 text-sm leading-relaxed text-[#2E2E2E]">

                                        {!! app()->getLocale() === 'id'
                                ? $item->description_id
                                : $item->description_en !!}

                                    </div>

                            @endif

                        </div>

            @empty

                {{-- empty --}}
                <div class="col-span-3 py-20 text-center">

                    <div class="text-[24px] font-bold text-gray-900">
                        {{ app()->getLocale() === 'id' ? 'Belum Ada Analisis' : 'No Analysis Yet' }}
                    </div>

                    <div class="mt-2 text-gray-500">
                        {{ app()->getLocale() === 'id' ? 'Belum ada data analisis.' : 'There is no analysis data yet.' }}
                    </div>

                </div>

            @endforelse

        </div>

        {{-- pagination --}}
        @if($analisis->hasPages())

            <div class="mt-16">

                @include('components.pagination', [
                    'page' => $analisis->currentPage(),
                    'lastPage' => $analisis->lastPage(),
                ])

            </div>

        @endif

    </div>

</div>
