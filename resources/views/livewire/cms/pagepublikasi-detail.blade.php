<div class="bg-white py-20">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <!-- HEADER -->
        <div class="flex items-center justify-between gap-6 mb-4">

            <div class="flex items-center gap-4">

                <!-- LABEL -->
                <span class="text-[14px] uppercase tracking-[3px] font-bold text-[#007A63]">
                    Publication
                </span>

                <!-- STATUS -->
                @if($publikasi->status === 'publish')

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

            <!-- EDIT -->
            <a href="{{ route('cms.publikasi.edit', [
    'locale' => app()->getLocale(),
    'id' => $publikasi->id
]) }}"
                class="shrink-0 inline-flex items-center gap-2 border border-black px-4 h-[38px] text-[12px] font-semibold uppercase hover:bg-black hover:text-white transition-all duration-200">

                <svg xmlns="http://www.w3.org/2000/svg" class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">

                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5h2m-1 0v14m7-7H5" />

                </svg>

                Edit

            </a>

        </div>

        <!-- LINE -->
        <div class="mb-14 w-full h-[2px] bg-[#007A63]"></div>

        <!-- CONTENT -->
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-14">

            <!-- LEFT -->
            <div class="lg:col-span-4">

                <!-- IMAGE -->
                <div class="shadow-[6px_7px_5px_#d9d9d9]">

                    <img src="{{ asset('storage/' . (
    app()->getLocale() === 'id'
    ? $publikasi->image_id
    : $publikasi->image_en
)) }}" alt="{{ app()->getLocale() === 'id'
    ? $publikasi->title_id
    : $publikasi->title_en }}" class="w-full object-cover">

                </div>

                <!-- DOWNLOAD TITLE -->
                <div class="pt-8">

                    <p class="text-[20px] text-gray-500 font-bold uppercase">
                        Download PDF:
                    </p>

                </div>

                <!-- DOWNLOAD BUTTON -->
                <div class="grid grid-cols-2 gap-4 mt-5">

                    <!-- ID -->
                    @if($download?->source_id)

                        <a href="{{ $download->source_id }}" target="_blank"
                            class="h-[52px] border border-[#007A63] text-[#007A63] text-[14px] font-bold uppercase flex items-center justify-center hover:bg-[#007A63] hover:text-white transition-all duration-200">
                            Indonesia
                        </a>

                    @endif

                    <!-- EN -->
                    @if($download?->source_en)

                        <a href="{{ $download->source_en }}" target="_blank"
                            class="h-[52px] border border-[#007A63] text-[#007A63] text-[14px] font-bold uppercase flex items-center justify-center hover:bg-[#007A63] hover:text-white transition-all duration-200">
                            English
                        </a>

                    @endif

                </div>

            </div>

            <!-- RIGHT -->
            <div class="lg:col-span-8">

                <!-- TITLE -->
                <h1 class="text-[34px] lg:text-[42px] font-black text-[#007A63] leading-[1.2]">

                    {{ app()->getLocale() === 'id'
    ? $publikasi->title_id
    : $publikasi->title_en }}

                </h1>

                <!-- DESCRIPTION -->
                @if(
                                app()->getLocale() === 'id'
                                ? $publikasi->description_id
                                : $publikasi->description_en
                            )

                            <div class="mt-8 prose max-w-none text-[18px] leading-[2] text-gray-700">

                                {!! app()->getLocale() === 'id'
                    ? $publikasi->description_id
                    : $publikasi->description_en !!}

                            </div>

                @endif

                <!-- CONTENT -->
                <div class="mt-10 prose max-w-none leading-[2]">

                    {!! app()->getLocale() === 'id'
    ? $publikasi->content_id
    : $publikasi->content_en !!}

                </div>

            </div>

        </div>

    </div>

</div>