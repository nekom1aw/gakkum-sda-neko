<div class="mx-auto max-w-6xl px-4 py-10 sm:px-6 lg:px-8 lg:py-12">

    <div>

        {{-- title --}}
        <div
            class="text-[24px] font-bold uppercase leading-relaxed tracking-[2px] text-[#007A63] sm:text-[28px] lg:text-3xl">

            {{ app()->getLocale() === 'id'
    ? $about->title_id
    : $about->title_en }}

        </div>

        {{-- line --}}
        <div class="mt-4 h-[2px] w-full bg-[#007A63]"></div>

        {{-- content --}}
        <div
            class="prose prose-sm sm:prose lg:prose-lg mt-6 max-w-none break-words text-[15px] leading-relaxed text-gray-700">

            {!! app()->getLocale() === 'id'
    ? $about->content_id
    : $about->content_en !!}

        </div>

    </div>

</div>