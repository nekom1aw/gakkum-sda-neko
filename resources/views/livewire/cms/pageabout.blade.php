<div x-data="{
        webOpen:false,
        programOpen:false
    }" class="max-w-7xl mx-auto px-6 lg:px-10 py-10 space-y-6">

    <!-- ABOUT WEB -->
    <div class="bg-white border border-gray-200">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">

            <button @click="webOpen = !webOpen" class="flex-1 flex items-center justify-between text-left">
                <div>
                    <p class="text-[13px] font-semibold uppercase tracking-[2px] text-[#00594B]">
                        About Web
                    </p>

                    <h2 class="mt-2 text-[28px] font-bold text-gray-900">
                        {{ $web->title_id ?? '-' }}
                    </h2>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#00594B] transition duration-300"
                    :class="webOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>

            <!-- Edit Button -->
            @if($web)

                <a href="{{ route('cms.about.edit', ['locale' => app()->getLocale(), 'id' => $web->id]) }}"
                    class="ml-4 px-4 py-2 bg-[#00594B] text-white text-[14px] font-semibold uppercase">
                    Edit
                </a>

            @endif

        </div>

        <!-- Content -->
        <div x-show="webOpen" x-transition class="px-6 py-6">

            <p class="text-[16px] leading-[1.8] text-gray-600">
                {{ $web->deskripsi_id ?? '-' }}
            </p>

            <div class="mt-6 border-t border-gray-100 pt-6">
                <div class="prose max-w-none text-gray-700">
                    {!! $web->content_id ?? '-' !!}
                </div>
            </div>

        </div>

    </div>

    <!-- ABOUT PROGRAM -->
    <div class="bg-white border border-gray-200">

        <!-- Header -->
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">

            <button @click="programOpen = !programOpen" class="flex-1 flex items-center justify-between text-left">
                <div>
                    <p class="text-[13px] font-semibold uppercase tracking-[2px] text-[#00594B]">
                        About Program
                    </p>

                    <h2 class="mt-2 text-[28px] font-bold text-gray-900">
                        {{ $program->title_id ?? '-' }}
                    </h2>
                </div>

                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-[#00594B] transition duration-300"
                    :class="programOpen ? 'rotate-180' : ''" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                    stroke-width="2.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m19.5 8.25-7.5 7.5-7.5-7.5" />
                </svg>
            </button>

            <!-- Edit Button -->
            @if($program)

                <a href="{{ route('cms.about.edit', ['locale' => app()->getLocale(), 'id' => $program->id]) }}"
                    class="ml-4 px-4 py-2 bg-[#00594B] text-white text-[14px] font-semibold uppercase">
                    Edit
                </a>

            @endif

        </div>

        <!-- Content -->
        <div x-show="programOpen" x-transition class="px-6 py-6">

            <p class="text-[16px] leading-[1.8] text-gray-600">
                {{ $program->deskripsi_id ?? '-' }}
            </p>

            <div class="mt-6 border-t border-gray-100 pt-6">
                <div class="prose max-w-none text-gray-700">
                    {!! $program->content_id ?? '-' !!}
                </div>
            </div>

        </div>

    </div>

</div>