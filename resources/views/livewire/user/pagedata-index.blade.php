<div class="bg-white py-10">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        {{-- header --}}
        <div class="flex items-center justify-between gap-6">

            {{-- title --}}
            <div class="text-[34px] font-black uppercase tracking-[8px] text-[#007A63] lg:text-[48px]">
                Peta Sebaran
            </div>

        </div>

        {{-- line --}}
        <div class="mt-6 h-[2px] w-full bg-[#007A63]"></div>

        {{-- tab --}}
        <div x-data="{ tab : 'kasus' }" class="mt-14">

            {{-- top --}}
            <div class="flex flex-wrap items-center gap-4">

                {{-- kasus --}}
                <button
                    @click="tab = 'kasus'"
                    :class="
                        tab === 'kasus'
                        ? 'bg-red-600 text-white border-red-600'
                        : 'bg-white text-red-600 border-red-600'
                    "
                    class="inline-flex h-[52px] items-center justify-center border px-6 text-[14px] font-bold uppercase transition-all duration-200"
                >
                    Sebaran Kasus
                </button>

                {{-- ahli --}}
                <button
                    @click="tab = 'ahli'"
                    :class="
                        tab === 'ahli'
                        ? 'bg-[#007A63] text-white border-[#007A63]'
                        : 'bg-white text-[#007A63] border-[#007A63]'
                    "
                    class="inline-flex h-[52px] items-center justify-center border px-6 text-[14px] font-bold uppercase transition-all duration-200"
                >
                    Sebaran Ahli
                </button>

            </div>

            {{-- kasus --}}
            <div x-show="tab === 'kasus'" x-transition class="mt-14">

                @if($kasus)

                    {{-- title --}}
                    <div class="text-[32px] font-black text-[#007A63]">

                        {{ app()->getLocale() === 'id'
                            ? $kasus->title_id
                            : $kasus->title_en }}

                    </div>

                    {{-- description --}}
                    @if(
                        app()->getLocale() === 'id'
                        ? $kasus->description_id
                        : $kasus->description_en
                    )

                        <div class="prose prose-lg mt-8 max-w-none leading-[2] text-[#2E2E2E]">

                            {!! app()->getLocale() === 'id'
                                ? $kasus->description_id
                                : $kasus->description_en !!}

                        </div>

                    @endif

                    {{-- content --}}
                    @if(
                        app()->getLocale() === 'id'
                        ? $kasus->content_id
                        : $kasus->content_en
                    )

                        <div class="mt-10">

                            {!! app()->getLocale() === 'id'
                                ? $kasus->content_id
                                : $kasus->content_en !!}

                        </div>

                    @endif

                @endif

            </div>

            {{-- ahli --}}
            <div x-show="tab === 'ahli'" x-transition class="mt-14">

                @if($ahli)

                    {{-- title --}}
                    <div class="text-[32px] font-black text-[#007A63]">

                        {{ app()->getLocale() === 'id'
                            ? $ahli->title_id
                            : $ahli->title_en }}

                    </div>

                    {{-- description --}}
                    @if(
                        app()->getLocale() === 'id'
                        ? $ahli->description_id
                        : $ahli->description_en
                    )

                        <div class="prose prose-lg mt-8 max-w-none leading-[2] text-[#2E2E2E]">

                            {!! app()->getLocale() === 'id'
                                ? $ahli->description_id
                                : $ahli->description_en !!}

                        </div>

                    @endif

                    {{-- content --}}
                    @if(
                        app()->getLocale() === 'id'
                        ? $ahli->content_id
                        : $ahli->content_en
                    )

                        <div class="mt-10">

                            {!! app()->getLocale() === 'id'
                                ? $ahli->content_id
                                : $ahli->content_en !!}

                        </div>

                    @endif

                @endif

            </div>

        </div>

    </div>

</div>