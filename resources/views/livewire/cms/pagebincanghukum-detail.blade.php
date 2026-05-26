<div class="leading-relaxed">

    {{-- top section --}}
    <div class="bg-[#E9E9E9] w-full">

        <div class="max-w-7xl mx-auto px-6 lg:px-24">

            {{-- hero image --}}
            <div class="w-full overflow-hidden">

                <img src="{{ asset('storage/' . (
    app()->getLocale() === 'id'
    ? $bincanghukum->image_id
    : $bincanghukum->image_en
)) }}" alt="{{ app()->getLocale() === 'id'
    ? $bincanghukum->title_id
    : $bincanghukum->title_en }}" class="w-full h-[780px] object-cover">

            </div>

            {{-- header --}}
            <div class="py-4">

                {{-- jenis --}}
                @if(
                                app()->getLocale() === 'id'
                                ? $bincanghukum->jenis_kegiatan_id
                                : $bincanghukum->jenis_kegiatan_en
                            )

                            <p class="text-[13px] font-bold uppercase tracking-[2px] text-[#007A63]">
                                {{ app()->getLocale() === 'id'
                    ? $bincanghukum->jenis_kegiatan_id
                    : $bincanghukum->jenis_kegiatan_en }}
                            </p>

                @endif

                {{-- title --}}
                <p class="mt-3 text-[28px] lg:text-[34px] font-extrabold text-[#007A63] max-w-5xl">

                    {{ app()->getLocale() === 'id'
    ? $bincanghukum->title_id
    : $bincanghukum->title_en }}

                </p>

                {{-- tanggal --}}
                @if($bincanghukum->tanggal)

                    <p class="mt-4 text-[14px] uppercase tracking-[1px] text-gray-500">
                        {{ \Carbon\Carbon::parse($bincanghukum->tanggal)->format('d F Y') }}
                    </p>

                @endif

                {{-- description --}}
                @if(
                                app()->getLocale() === 'id'
                                ? $bincanghukum->deskripsi_id
                                : $bincanghukum->deskripsi_en
                            )

                            <div class="mt-6">

                                <div class="text-[16px] italic text-[#2E2E2E]">

                                    {!! app()->getLocale() === 'id'
                    ? $bincanghukum->deskripsi_id
                    : $bincanghukum->deskripsi_en !!}

                                </div>

                            </div>

                @endif

                {{-- action --}}
                <div class="mt-8">

                    <a href="{{ route('cms.bincanghukum.edit', [
    'locale' => app()->getLocale(),
    'id' => $bincanghukum->id
]) }}"
                        class="inline-flex items-center gap-3 border border-black px-6 h-[52px] text-[14px] font-semibold uppercase hover:bg-black hover:text-white transition-all duration-200">

                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
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

    {{-- content --}}
    <div class="max-w-2xl mx-auto px-6 lg:px-0 py-16">

        <div class="prose max-w-none leading-relaxed">

            {!! app()->getLocale() === 'id'
    ? $bincanghukum->content_id
    : $bincanghukum->content_en !!}

        </div>

    </div>

</div>