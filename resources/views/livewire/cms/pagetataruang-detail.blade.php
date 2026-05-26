<div class="bg-white py-20">
    <div class="max-w-7xl mx-auto px-6 lg:px-10">
        <div class="flex items-center justify-between gap-6 mb-4">
            <div class="flex items-center gap-4">
                <span class="text-[14px] uppercase tracking-[3px] font-bold text-[#007A63]">
                    Tata Ruang
                </span>

                @if($tataruang->status === 'publish')
                    <span
                        class="px-3 h-[28px] inline-flex items-center bg-green-100 text-green-700 text-[11px] font-bold uppercase">
                        Publish
                    </span>
                @else
                    <span
                        class="px-3 h-[28px] inline-flex items-center bg-yellow-100 text-yellow-700 text-[11px] font-bold uppercase">
                        Draft
                    </span>
                @endif
            </div>

            <a href="{{ route('cms.sektor.tata-ruang.edit', [
                'locale' => app()->getLocale(),
                'id' => $tataruang->id,
            ]) }}"
                class="shrink-0 inline-flex items-center border border-black px-4 h-[38px] text-[12px] font-semibold uppercase hover:bg-black hover:text-white transition-all duration-200">
                Edit
            </a>
        </div>

        <div class="mb-14 w-full h-[2px] bg-[#007A63]"></div>

        <div class="max-w-4xl">
            <h1 class="text-[34px] lg:text-[42px] font-black text-[#007A63] leading-[1.2]">
                {{ app()->getLocale() === 'id' ? $tataruang->title_id : $tataruang->title_en }}
            </h1>

            @if(app()->getLocale() === 'id' ? $tataruang->description_id : $tataruang->description_en)
                <div class="mt-8 prose max-w-none text-[18px] leading-[2] text-gray-700">
                    {!! app()->getLocale() === 'id' ? $tataruang->description_id : $tataruang->description_en !!}
                </div>
            @endif

            @php($source = app()->getLocale() === 'id' ? $tataruang->source_id : $tataruang->source_en)

            @if($source)
                <div class="mt-10 border-t border-gray-200 pt-6">
                    <p class="text-[14px] font-bold uppercase text-gray-500">
                        Sumber
                    </p>

                    <a href="{{ $source }}" target="_blank" class="mt-2 inline-block text-[#007A63] font-semibold hover:underline">
                        {{ $source }}
                    </a>
                </div>
            @endif
        </div>
    </div>
</div>
