<div class="mx-auto max-w-7xl px-6 py-10 lg:px-10">

    @if($agenda)

        <div class="bg-white">

            {{-- header --}}
            <div class="border-gray-200 px-8 py-6">

                <div class="flex items-start justify-between gap-6">

                    <div>

                        <h1 class="text-[64px] font-black leading-none text-[#202020]">
                            {{ app()->getLocale() === 'id'
                                ? ($agenda->title_id ?? $agenda->title_en)
                                : ($agenda->title_en ?? $agenda->title_id) }}
                        </h1>

                    </div>

                </div>

            </div>

            {{-- content --}}
            <div class="px-8 py-10">

                {{-- image --}}
                @if($agenda->image_id)

                    <div class="mb-10">

                        <img src="{{ asset('storage/' . $agenda->image_id) }}" alt="{{ app()->getLocale() === 'id'
                            ? ($agenda->title_id ?? $agenda->title_en)
                            : ($agenda->title_en ?? $agenda->title_id) }}"
                            class="w-full border border-gray-200 object-cover">

                    </div>

                @endif

                {{-- description --}}
                @if($agenda->description_id)

                    <div class="prose prose-lg max-w-none text-[#303030]">

                        {!! app()->getLocale() === 'id'
                            ? ($agenda->description_id ?? $agenda->description_en)
                            : ($agenda->description_en ?? $agenda->description_id) !!}

                    </div>

                @endif

                {{-- informasi --}}
                <div class="mt-12 space-y-4 text-[18px] leading-relaxed text-[#202020]">

                    {{-- tanggal --}}
                    <div class="flex flex-wrap items-start gap-3">

                        <div class="min-w-[180px] font-semibold">
                            {{ app()->getLocale() === 'id' ? 'Hari/Tanggal' : 'Date' }}
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
                            {{ app()->getLocale() === 'id' ? 'Jenis Kegiatan' : 'Activity Type' }}
                        </div>

                        <div>
                            : {{ app()->getLocale() === 'id'
                                ? ($agenda->jenis_kegiatan_id ?? $agenda->jenis_kegiatan ?? '-')
                                : ($agenda->jenis_kegiatan_en ?? $agenda->jenis_kegiatan ?? '-') }}
                        </div>

                    </div>

                </div>

                {{-- content --}}
                @if($agenda->content_id)

                    <div class="prose prose-lg mt-12 max-w-none text-[#303030]">

                        {!! app()->getLocale() === 'id'
                            ? ($agenda->content_id ?? $agenda->content_en)
                            : ($agenda->content_en ?? $agenda->content_id) !!}

                    </div>

                @endif

            </div>

        </div>

    @endif

</div>
