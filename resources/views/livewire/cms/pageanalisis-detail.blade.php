<div class="leading-relaxed">

    <!-- TOP SECTION -->
    <div class="w-full bg-[#E9E9E9]">

        <div class="max-w-7xl mx-auto px-6 lg:px-24">

            <!-- HERO IMAGE -->
            <div class="w-full overflow-hidden">

                <img src="{{ asset('storage/' . (
    app()->getLocale() === 'id'
    ? $analisis->image_id
    : $analisis->image_en
)) }}" alt="{{ app()->getLocale() === 'id'
    ? $analisis->title_id
    : $analisis->title_en }}" class="h-[600px] w-full object-cover">

            </div>

            <!-- HEADER -->
            <div class="py-4">

                <!-- STATUS -->
                <div class="mb-6 flex items-center gap-3">

                    <span class="text-[13px] font-bold uppercase tracking-[3px] text-[#007A63]">
                        Analisis
                    </span>

                    @if($analisis->status === 'publish')

                        <span
                            class="inline-flex h-[28px] items-center bg-green-100 px-3 text-[11px] font-bold uppercase text-green-700">
                            Publish
                        </span>

                    @else

                        <span
                            class="inline-flex h-[28px] items-center bg-yellow-100 px-3 text-[11px] font-bold uppercase text-yellow-700">
                            Draft
                        </span>

                    @endif

                </div>

                <!-- TITLE -->
                <p class="max-w-5xl text-[28px] font-extrabold text-[#007A63] lg:text-[34px]">

                    {{ app()->getLocale() === 'id'
    ? $analisis->title_id
    : $analisis->title_en }}

                </p>

                <!-- DESCRIPTION -->
                @if(
                                app()->getLocale() === 'id'
                                ? $analisis->description_id
                                : $analisis->description_en
                            )

                            <div class="mt-5">

                                <div class="text-[16px] italic text-[#2E2E2E]">

                                    {!! app()->getLocale() === 'id'
                    ? $analisis->description_id
                    : $analisis->description_en !!}

                                </div>

                            </div>

                @endif

                <!-- ACTION -->
                <div class="mt-8 flex items-center gap-4">

                    <!-- EDIT -->
                    <a href="{{ route('cms.analisis.edit', [
    'locale' => app()->getLocale(),
    'id' => $analisis->id
]) }}"
                        class="inline-flex h-[52px] items-center gap-3 border border-black px-6 text-[14px] font-semibold uppercase transition-all duration-200 hover:bg-black hover:text-white">

                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">

                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M11 5h2m-1 0v14m7-7H5" />

                        </svg>

                        Edit Content

                    </a>

                </div>

            </div>

        </div>

    </div>

    <!-- CONTENT -->
    <div class="max-w-2xl mx-auto px-6 py-16 lg:px-0">

        <div class="prose max-w-none leading-relaxed">

            {!! app()->getLocale() === 'id'
    ? $analisis->content_id
    : $analisis->content_en !!}

        </div>

    </div>

    <!-- ANALISIS LAINNYA -->
    @if($lainnya->count())

        <div class="max-w-7xl mx-auto px-6 lg:px-24 pb-24">

            <!-- HEADER -->
            <div class="flex items-center gap-4">

                <p class="text-[16px] font-bold uppercase tracking-[3px] text-[#007A63]">
                    Analisis Lainnya
                </p>

                <div class="h-[2px] flex-1 bg-[#007A63]"></div>

            </div>

            <!-- GRID -->
            <div class="mt-14 grid grid-cols-1 gap-x-12 gap-y-20 md:grid-cols-2 lg:grid-cols-3">

                @foreach($lainnya as $item)

                        <!-- CARD -->
                        <a href="{{ route('cms.analisis.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $item->id
                    ]) }}" class="block">

                            <!-- IMAGE -->
                            <div class="h-[240px] w-full overflow-hidden">

                                <img src="{{ asset('storage/' . $item->image_id) }}" class="h-full w-full object-cover">

                            </div>

                            <!-- TITLE -->
                            <p class="mt-6 text-[24px] leading-[1.2] font-bold text-[#2E2E2E]">

                                {{ app()->getLocale() === 'id'
                        ? $item->title_id
                        : $item->title_en }}

                            </p>

                        </a>

                @endforeach

            </div>

        </div>

    @endif

</div>