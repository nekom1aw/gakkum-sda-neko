<div class="mx-auto max-w-7xl py-10 lg:px-10">

    <div class="px-6 py-10 lg:px-10">

        <div class="flex items-start justify-between gap-6">
            <div class="text-4xl font-bold uppercase tracking-[8px] text-[#007A63] lg:text-5xl">
                {{ $label }}
            </div>
        </div>

        <div class="mt-2 h-[2px] w-full bg-[#007A63]"></div>

        <div class="mt-10 grid grid-cols-1 gap-x-10 gap-y-10 md:grid-cols-2 lg:grid-cols-3">
            @forelse($data as $item)
                <article class="flex h-full flex-col border-b-2 border-gray-500 pb-7">
                    <div class="flex flex-1 flex-col">
                        <h2 class="min-h-[88px] overflow-hidden text-xl font-bold leading-relaxed text-[#2E2E2E]">
                            {{ app()->getLocale() === 'id' ? $item->title_id : $item->title_en }}
                        </h2>

                        @if(app()->getLocale() === 'id' ? $item->description_id : $item->description_en)
                            <div class="mt-2 h-[96px] overflow-hidden text-lg leading-relaxed text-[#2E2E2E]">
                                {!! app()->getLocale() === 'id' ? $item->description_id : $item->description_en !!}
                            </div>
                        @endif

                        @php($source = app()->getLocale() === 'id' ? $item->source_id : $item->source_en)

                        @if($source)
                            <div class="mt-2 flex items-start gap-1 text-md leading-relaxed text-[#2E2E2E]">
                            <span class="shrink-0 font-bold">
                                {{ app()->getLocale() === 'id' ? 'Sumber:' : 'Source:' }}
                            </span>
                                <span class="min-w-0 font-bold text-[#007A63]">
                                    {!! $source !!}
                                </span>
                            </div>
                        @endif
                    </div>
                </article>
            @empty
                <div class="col-span-3 py-20 text-center">
                        <div class="text-[24px] font-bold text-gray-900">
                        {{ app()->getLocale() === 'id' ? 'Belum Ada' : 'No' }} {{ $label }}
                    </div>

                    <div class="mt-2 text-gray-500">
                        {{ app()->getLocale() === 'id' ? 'Belum ada data' : 'There is no data for' }} {{ strtolower($label) }}.
                    </div>
                </div>
            @endforelse
        </div>

        @if($data->hasPages())
            <div class="mt-12">
                @include('components.pagination', [
                    'page' => $data->currentPage(),
                    'lastPage' => $data->lastPage(),
                ])
            </div>
        @endif

    </div>

</div>
