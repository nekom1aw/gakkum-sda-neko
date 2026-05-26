<div class="bg-white py-20">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        {{-- header --}}
        <div class="mb-4 flex items-center gap-4">

            {{-- label --}}
            <div class="text-[14px] font-bold uppercase tracking-[3px] text-[#007A63]">
                {{ app()->getLocale() === 'id' ? 'Publikasi' : 'Publication' }}
            </div>

        </div>

        {{-- line --}}
        <div class="mb-14 h-[2px] w-full bg-[#007A63]"></div>

        {{-- content --}}
        <div class="grid grid-cols-1 gap-14 lg:grid-cols-12">

            {{-- left --}}
            <div class="lg:col-span-4">

                {{-- image --}}
                <div class="shadow-[6px_7px_5px_#d9d9d9]">

                    <img
                        src="{{ asset('storage/' . (
                            app()->getLocale() === 'id'
                                ? ($publikasi->image_id ?? $publikasi->image_en)
                                : ($publikasi->image_en ?? $publikasi->image_id)
                        )) }}"
                        alt="{{ app()->getLocale() === 'id'
                            ? ($publikasi->title_id ?? $publikasi->title_en)
                            : ($publikasi->title_en ?? $publikasi->title_id) }}"
                        class="w-full object-cover"
                    >

                </div>

                {{-- download title --}}
                <div class="pt-8">

                    <div class="text-[20px] font-bold uppercase text-gray-500">
                        {{ app()->getLocale() === 'id' ? 'Unduh PDF:' : 'Download PDF:' }}
                    </div>

                </div>

                {{-- download button --}}
                <div class="mt-5 grid grid-cols-2 gap-4">

                    {{-- id --}}
                    @if($download?->source_id)

                        <a
                            href="{{ $download->source_id }}"
                            target="_blank"
                            class="flex h-[52px] items-center justify-center border border-[#007A63] text-[14px] font-bold uppercase text-[#007A63] transition-all duration-200 hover:bg-[#007A63] hover:text-white"
                        >
                            Indonesia
                        </a>

                    @endif

                    {{-- en --}}
                    @if($download?->source_en)

                        <a
                            href="{{ $download->source_en }}"
                            target="_blank"
                            class="flex h-[52px] items-center justify-center border border-[#007A63] text-[14px] font-bold uppercase text-[#007A63] transition-all duration-200 hover:bg-[#007A63] hover:text-white"
                        >
                            English
                        </a>

                    @endif

                </div>

            </div>

            {{-- right --}}
            <div class="lg:col-span-8">

                {{-- title --}}
                <div class="text-[34px] font-black leading-[1.2] text-[#007A63] lg:text-[42px]">

                    {{ app()->getLocale() === 'id'
                        ? $publikasi->title_id
                        : $publikasi->title_en }}

                </div>

                {{-- description --}}
                @if(
                    app()->getLocale() === 'id'
                    ? $publikasi->description_id
                    : $publikasi->description_en
                )

                    <div class="prose mt-8 max-w-none text-[18px] leading-[2] text-gray-700">

                        {!! app()->getLocale() === 'id'
                            ? $publikasi->description_id
                            : $publikasi->description_en !!}

                    </div>

                @endif

                {{-- content --}}
                <div class="prose mt-10 max-w-none leading-[2]">

                    {!! app()->getLocale() === 'id'
                        ? $publikasi->content_id
                        : $publikasi->content_en !!}

                </div>

            </div>

        </div>

    </div>

</div>
