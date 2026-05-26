<div class="mx-auto max-w-7xl px-6 py-10 lg:px-10">

    @if($agenda)

        <div class="border border-gray-200 bg-white">

            {{-- header --}}
            <div class="border-b border-gray-200 px-8 py-6">

                <div class="flex items-start justify-between gap-6">

                    <div>

                        <h1 class="text-[64px] font-black leading-none text-[#202020]">
                            {{ $agenda->title_id }}
                        </h1>

                        <div class="mt-5 flex items-center gap-3">

                            {{-- status --}}
                            @if($agenda->status == 'publish')

                                <div class="inline-flex border border-green-200 bg-green-50 px-4 py-2 text-[11px] font-bold uppercase text-green-700">
                                    Publish
                                </div>

                            @else

                                <div class="inline-flex border border-yellow-200 bg-yellow-50 px-4 py-2 text-[11px] font-bold uppercase text-yellow-700">
                                    Draft
                                </div>

                            @endif

                            {{-- jenis kegiatan --}}
                            <div class="inline-flex border border-gray-200 bg-gray-50 px-4 py-2 text-[11px] font-bold uppercase text-gray-700">
                                {{ $agenda->jenis_kegiatan ?? '-' }}
                            </div>

                        </div>

                    </div>

                    {{-- button --}}
                    <a
                        href="{{ route('cms.agenda.edit', [
                            'locale' => app()->getLocale(),
                            'id' => $agenda->id
                        ]) }}"
                        class="inline-flex h-[46px] shrink-0 items-center justify-center border border-[#00594B] px-6 text-[12px] font-bold uppercase text-[#00594B]"
                    >
                        Edit Agenda
                    </a>

                </div>

            </div>

            {{-- content --}}
            <div class="px-8 py-10">

                {{-- image --}}
                @if($agenda->image_id)

                    <div class="mb-10">

                        <img
                            src="{{ asset('storage/' . $agenda->image_id) }}"
                            alt="{{ $agenda->title_id }}"
                            class="w-full border border-gray-200 object-cover"
                        >

                    </div>

                @endif

                {{-- description --}}
                @if($agenda->description_id)

                    <div class="prose prose-lg max-w-none text-[#303030]">

                        {!! $agenda->description_id !!}

                    </div>

                @endif

                {{-- informasi --}}
                <div class="mt-12 space-y-4 text-[18px] leading-relaxed text-[#202020]">

                    {{-- tanggal --}}
                    <div class="flex flex-wrap items-start gap-3">

                        <div class="min-w-[180px] font-semibold">
                            Hari/Tanggal
                        </div>

                        <div>
                            :

                            @if($agenda->date)

                                {{ \Carbon\Carbon::parse($agenda->date)->translatedFormat('l, d F Y') }}

                            @else

                                -

                            @endif

                        </div>

                    </div>

                    {{-- jenis --}}
                    <div class="flex flex-wrap items-start gap-3">

                        <div class="min-w-[180px] font-semibold">
                            Jenis Kegiatan
                        </div>

                        <div>
                            : {{ $agenda->jenis_kegiatan ?? '-' }}
                        </div>

                    </div>

                </div>

                {{-- content --}}
                @if($agenda->content_id)

                    <div class="prose prose-lg mt-12 max-w-none text-[#303030]">

                        {!! $agenda->content_id !!}

                    </div>

                @endif

            </div>

        </div>

    @endif

</div>