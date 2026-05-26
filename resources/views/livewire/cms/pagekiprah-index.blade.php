<div class="leading-relaxed">

    {{-- TOP SECTION --}}
    <div class="bg-[#E9E9E9] w-full">

        <div class="max-w-7xl mx-auto px-6 lg:px-24">

            {{-- HERO IMAGE --}}
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
                    class="w-full h-[780px] object-cover"
                >

            </div>

            {{-- HEADER --}}
            <div class="py-4">

                {{-- TITLE --}}
                <p class="text-[28px] lg:text-[34px] font-extrabold text-[#007A63] max-w-5xl">

                    {{ app()->getLocale() === 'id'
                        ? $kiprah->title_id
                        : $kiprah->title_en }}

                </p>

                {{-- DESCRIPTION --}}
                @if(
                    app()->getLocale() === 'id'
                        ? $kiprah->description_id
                        : $kiprah->description_en
                )

                    <div class="">

                        <div class="text-[16px] italic text-[#2E2E2E]">

                            {!! app()->getLocale() === 'id'
                                ? $kiprah->description_id
                                : $kiprah->description_en !!}

                        </div>

                    </div>

                @endif

                {{-- ACTION --}}
                <div class="mt-8">

                    <a
                        href="{{ route('cms.kiprah.edit', [
                            'locale' => app()->getLocale(),
                            'id' => $kiprah->id
                        ]) }}"
                        class="inline-flex items-center gap-3 border border-black px-6 h-[52px] text-[14px] font-semibold uppercase hover:bg-black hover:text-white transition-all duration-200"
                    >

                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-4 h-4"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                        >

                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                stroke-width="2"
                                d="M11 5h2m-1 0v14m7-7H5"
                            />

                        </svg>

                        Edit Content

                    </a>

                </div>

            </div>

        </div>

    </div>

    {{-- CONTENT --}}
    <div class="max-w-2xl mx-auto px-6 lg:px-0 py-16">

        <div class="prose max-w-none leading-relaxed">

            {!! app()->getLocale() === 'id'
                ? $kiprah->content_id
                : $kiprah->content_en !!}

        </div>

    </div>

</div>