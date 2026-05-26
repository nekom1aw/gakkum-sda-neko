<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex items-center justify-between gap-6 mb-4">
            <div class="flex items-center gap-4">
                <span class="text-[14px] uppercase tracking-[3px] font-bold text-[#007A63]">{{ $label }}</span>
                <span class="px-3 h-[28px] inline-flex items-center text-[11px] font-bold uppercase {{ $item->status === 'publish' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                    {{ $item->status === 'publish' ? 'Publish' : 'Draft' }}
                </span>
            </div>
            <a href="{{ route($routeName . '.edit', ['locale' => app()->getLocale(), 'id' => $item->id]) }}"
                class="shrink-0 inline-flex items-center border border-black px-4 h-[38px] text-[12px] font-semibold uppercase hover:bg-black hover:text-white transition-all duration-200">
                Edit
            </a>
        </div>

        <div class="mb-14 w-full h-[2px] bg-[#007A63]"></div>

        <div class="max-w-4xl">
            <h1 class="text-[34px] lg:text-[42px] font-black text-[#007A63] leading-[1.2]">
                {{ app()->getLocale() === 'id' ? $item->title_id : $item->title_en }}
            </h1>

            @if(app()->getLocale() === 'id' ? $item->description_id : $item->description_en)
                <div class="mt-8 prose max-w-none text-[18px] leading-[2] text-gray-700">
                    {!! app()->getLocale() === 'id' ? $item->description_id : $item->description_en !!}
                </div>
            @endif

            @php($source = app()->getLocale() === 'id' ? $item->source_id : $item->source_en)
            @if($source)
                <div class="mt-10 border-t border-gray-200 pt-6">
                    <p class="text-[14px] font-bold uppercase text-gray-500">Sumber</p>
                    <a href="{{ $source }}" target="_blank" class="mt-2 inline-block text-[#007A63] font-semibold hover:underline">
                        {{ $source }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
