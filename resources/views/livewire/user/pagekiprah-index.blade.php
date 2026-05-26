<div class="leading-relaxed">

    {{-- top section --}}
    <div class="w-full bg-[#E9E9E9]">

        <div class="max-w-7xl mx-auto px-6 lg:px-24 py-12">

            {{-- hero image --}}
            <div class="w-full overflow-hidden">

                <img
                    src="{{ asset('storage/' . (
                        app()->getLocale() === 'id'
                            ? $kiprah->image_id
                            : $kiprah->image_en
                    )) }}"
                    alt="{{ app()->getLocale() === 'id'
                        ? $kiprah->title_id
                        : $kiprah->title_en }}"
                    class="h-[780px] w-full object-cover"
                >

            </div>

            {{-- header --}}
            <div class="py-6">

                {{-- title --}}
                <div class="max-w-5xl text-[28px] font-extrabold text-[#007A63] lg:text-[34px]">

                    {{ app()->getLocale() === 'id'
                        ? $kiprah->title_id
                        : $kiprah->title_en }}

                </div>

                {{-- description --}}
                @if(
                    app()->getLocale() === 'id'
                    ? $kiprah->description_id
                    : $kiprah->description_en
                )

                    <div class="mt-6 text-[16px] italic leading-relaxed text-[#2E2E2E]">

                        {!! app()->getLocale() === 'id'
                            ? $kiprah->description_id
                            : $kiprah->description_en !!}

                    </div>

                @endif

            </div>

        </div>

    </div>

    {{-- content --}}
    <div class="max-w-2xl mx-auto px-6 py-16 lg:px-0">

        <div class="prose prose-lg max-w-none leading-relaxed">

            {!! app()->getLocale() === 'id'
                ? $kiprah->content_id
                : $kiprah->content_en !!}

        </div>

    </div>

</div>