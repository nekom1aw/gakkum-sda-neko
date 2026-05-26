<div class="max-w-7xl mx-auto py-10 lg:px-10">

    {{-- section --}}
    <div class="px-6 lg:px-10">

        {{-- header --}}
        <div>

            {{-- title --}}
            <div class="text-xl font-bold uppercase tracking-[8px] text-[#007A63] lg:text-3xl">
                {{ app()->getLocale() === 'id' ? 'Berita Siaran' : 'News Releases' }}
            </div>

            {{-- line --}}
            <div class="mt-2 h-[2px] w-full bg-[#007A63]"></div>

        </div>

        {{-- grid --}}
        <div class="py-12 grid grid-cols-1 gap-x-12 gap-y-20 md:grid-cols-2 lg:grid-cols-3">

            @forelse($berita as $item)

                    {{-- card --}}
                    <div class="flex h-full flex-col">

                        {{-- title --}}
                        <div class="h-[120px] overflow-hidden text-2xl font-bold leading-relaxed text-[#2E2E2E]">

                            {{ app()->getLocale() === 'id'
                ? $item->title_id
                : $item->title_en }}

                        </div>

                        {{-- description --}}
                        @if(
                                    app()->getLocale() === 'id'
                                    ? $item->description_id
                                    : $item->description_en
                                )

                                <div class="mt-2 h-[150px] overflow-hidden text-[16px] leading-relaxed text-[#2E2E2E]">

                                    {!! app()->getLocale() === 'id'
                            ? $item->description_id
                            : $item->description_en !!}

                                </div>

                        @endif

                        {{-- source --}}
                        <div class="mt-auto py-2">

                            <div class="flex items-center gap-2">

                                <div class="text-[18px] font-semibold text-[#2E2E2E]">
                                    {{ app()->getLocale() === 'id' ? 'Sumber:' : 'Source:' }}
                                </div>

                                <div class="prose prose-sm max-w-none text-[#5B8E55] [&_a]:text-[#5B8E55] [&_a]:no-underline">

                                    {!! app()->getLocale() === 'id'
                ? $item->source_id
                : $item->source_en !!}

                                </div>

                            </div>

                        </div>

                        {{-- line --}}
                        <div class=" border-b border-gray-400"></div>

                    </div>

            @empty

                {{-- empty --}}
                <div class="col-span-3 py-20 text-center">

                        <div class="text-[24px] font-bold text-gray-900">
                        {{ app()->getLocale() === 'id' ? 'Belum Ada Berita' : 'No News Yet' }}
                    </div>

                    <div class="mt-2 text-gray-500">
                        {{ app()->getLocale() === 'id' ? 'Belum ada data berita.' : 'There is no news data yet.' }}
                    </div>

                </div>

            @endforelse

        </div>

        {{-- pagination --}}
        @if($berita->hasPages())

            <div class="mt-16">

                @include('components.pagination', [
                    'page' => $berita->currentPage(),
                    'lastPage' => $berita->lastPage(),
                ])

            </div>

        @endif

    </div>

</div>
