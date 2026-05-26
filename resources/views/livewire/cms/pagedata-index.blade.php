<div class="bg-white py-10">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <!-- HEADER -->
        <div class="flex items-center justify-between gap-6">

            <!-- TITLE -->
            <p class="text-[34px] lg:text-[48px] font-black uppercase tracking-[8px] text-[#007A63]">
                Peta Sebaran
            </p>

        </div>

        <!-- LINE -->
        <div class="mt-6 h-[2px] w-full bg-[#007A63]"></div>

        <!-- TAB -->
        <!-- TAB + ACTION -->
        <div x-data="{ tab : 'kasus' }" class="mt-14">

            <!-- TOP -->
            <div class="flex items-center justify-between gap-6">

                <!-- TAB -->
                <div class="flex flex-wrap items-center gap-4">

                    <!-- KASUS -->
                    <button @click="tab = 'kasus'" :class="
                    tab === 'kasus'
                    ? 'bg-red-600 text-white border-red-600'
                    : 'bg-white text-red-600 border-red-600'
                " class="inline-flex h-[52px] items-center justify-center border px-6 text-[14px] font-bold uppercase transition-all duration-200">
                        Sebaran Kasus
                    </button>

                    <!-- AHLI -->
                    <button @click="tab = 'ahli'" :class="
                    tab === 'ahli'
                    ? 'bg-[#007A63] text-white border-[#007A63]'
                    : 'bg-white text-[#007A63] border-[#007A63]'
                " class="inline-flex h-[52px] items-center justify-center border px-6 text-[14px] font-bold uppercase transition-all duration-200">
                        Sebaran Ahli
                    </button>

                </div>

                <!-- EDIT -->
                <a x-show="tab === 'kasus'" href="{{ route('cms.data.edit', [
    'locale' => app()->getLocale(),
    'id' => $kasus?->id
]) }}"
                    class="inline-flex h-[52px] shrink-0 items-center justify-center border border-black px-6 text-[14px] font-bold uppercase transition-all duration-200 hover:bg-black hover:text-white">
                    Edit Data
                </a>

                <a x-show="tab === 'ahli'" href="{{ route('cms.data.edit', [
    'locale' => app()->getLocale(),
    'id' => $ahli?->id
]) }}"
                    class="inline-flex h-[52px] shrink-0 items-center justify-center border border-black px-6 text-[14px] font-bold uppercase transition-all duration-200 hover:bg-black hover:text-white">
                    Edit Data
                </a>

            </div>

            <!-- KASUS -->
            <div x-show="tab === 'kasus'" x-transition class="mt-14">

                @if($kasus)

                            <!-- TITLE -->
                            <p class="text-[32px] font-black text-[#007A63]">

                                {{ app()->getLocale() === 'id'
                    ? $kasus->title_id
                    : $kasus->title_en }}

                            </p>

                            <!-- DESCRIPTION -->
                            @if(
                                        app()->getLocale() === 'id'
                                        ? $kasus->description_id
                                        : $kasus->description_en
                                    )

                                    <div class="prose mt-8 max-w-none leading-[2] text-[#2E2E2E]">

                                        {!! app()->getLocale() === 'id'
                                ? $kasus->description_id
                                : $kasus->description_en !!}

                                    </div>

                            @endif

                            <!-- CONTENT -->
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

            <!-- AHLI -->
            <div x-show="tab === 'ahli'" x-transition class="mt-14">

                @if($ahli)

                            <!-- TITLE -->
                            <p class="text-[32px] font-black text-[#007A63]">

                                {{ app()->getLocale() === 'id'
                    ? $ahli->title_id
                    : $ahli->title_en }}

                            </p>

                            <!-- DESCRIPTION -->
                            @if(
                                        app()->getLocale() === 'id'
                                        ? $ahli->description_id
                                        : $ahli->description_en
                                    )

                                    <div class="prose mt-8 max-w-none leading-[2] text-[#2E2E2E]">

                                        {!! app()->getLocale() === 'id'
                                ? $ahli->description_id
                                : $ahli->description_en !!}

                                    </div>

                            @endif

                            <!-- CONTENT -->
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
