<div class="leading-relaxed">

    {{-- top section --}}
    <div class="w-full bg-[#E9E9E9]">

        <div class="max-w-7xl mx-auto px-6 lg:px-24 py-12">

            {{-- hero image --}}
            <div class="w-full overflow-hidden">

                <img
                    src="{{ asset('storage/' . (
                        app()->getLocale() === 'id'
                            ? $investigasi->image_id
                            : $investigasi->image_en
                    )) }}"
                    alt="{{ app()->getLocale() === 'id'
                        ? $investigasi->title_id
                        : $investigasi->title_en }}"
                    class="h-[600px] w-full object-cover"
                >

            </div>

            {{-- header --}}
            <div class="py-6">

                {{-- title --}}
                <div class="mt-5 max-w-5xl text-[28px] font-extrabold text-[#007A63] lg:text-[34px]">

                    {{ app()->getLocale() === 'id'
                        ? $investigasi->title_id
                        : $investigasi->title_en }}

                </div>

                {{-- description --}}
                @if(
                    app()->getLocale() === 'id'
                    ? $investigasi->description_id
                    : $investigasi->description_en
                )

                    <div class="mt-5 max-w-4xl text-[16px] italic leading-relaxed text-[#2E2E2E]">

                        {!! app()->getLocale() === 'id'
                            ? $investigasi->description_id
                            : $investigasi->description_en !!}

                    </div>

                @endif

            </div>

        </div>

    </div>

    {{-- content --}}
    <div class="max-w-3xl mx-auto px-6 py-16">

        <div class="prose prose-lg max-w-none leading-relaxed">

            {!! app()->getLocale() === 'id'
                ? $investigasi->content_id
                : $investigasi->content_en !!}

        </div>

    </div>

    {{-- investigasi lainnya --}}
    @if($lainnya->count())

        <div class="max-w-7xl mx-auto px-6 pb-24 lg:px-24">

            {{-- header --}}
            <div class="flex items-center gap-4">

                <div class="text-[16px] font-bold uppercase tracking-[3px] text-[#007A63]">
                    {{ app()->getLocale() === 'id' ? 'Investigasi Lainnya' : 'More Investigations' }}
                </div>

                <div class="h-[2px] flex-1 bg-[#007A63]"></div>

            </div>

            {{-- grid --}}
            <div class="mt-14 grid grid-cols-1 gap-x-12 gap-y-20 md:grid-cols-2 lg:grid-cols-3">

                @foreach($lainnya as $item)

                    {{-- card --}}
                    <a
                        href="{{ route('investigasi.detail', [
                            'locale' => app()->getLocale(),
                            'id' => $item->id,
                            'slug' => \Illuminate\Support\Str::slug(
                                app()->getLocale() === 'id'
                                    ? $item->title_id
                                    : $item->title_en
                            )
                        ]) }}"
                        class="block"
                    >

                        {{-- image --}}
                        <div class="h-[240px] w-full overflow-hidden">

                            <img
                                src="{{ asset('storage/' . (
                                    app()->getLocale() === 'id'
                                        ? $item->image_id
                                        : $item->image_en
                                )) }}"
                                class="h-full w-full object-cover"
                            >

                        </div>

                        {{-- title --}}
                        <div class="mt-6 text-[24px] font-bold leading-[1.2] text-[#2E2E2E]">

                            {{ app()->getLocale() === 'id'
                                ? $item->title_id
                                : $item->title_en }}

                        </div>

                    </a>

                @endforeach

            </div>

        </div>

    @endif

</div>
