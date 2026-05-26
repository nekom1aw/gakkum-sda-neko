<div class="max-w-7xl mx-auto py-10 lg:px-10">

    {{-- section --}}
    <div class="px-6 py-16 lg:px-10">

        {{-- header --}}
        <div>

            {{-- title --}}
            <div class="text-4xl font-bold uppercase tracking-[8px] text-[#007A63] lg:text-5xl">
                {{ app()->getLocale() === 'id' ? 'Publikasi' : 'Publication' }}
            </div>

            {{-- line --}}
            <div class="mt-6 h-[2px] w-full bg-[#007A63]"></div>

        </div>

        {{-- grid --}}
        <div class="mt-16 grid grid-cols-2 gap-x-10 gap-y-16 md:grid-cols-3 lg:grid-cols-4">

            @forelse($publikasi as $item)

                {{-- card --}}
                <a
                    href="{{ route('publikasi.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $item->id,
                        'slug' => \Illuminate\Support\Str::slug(
                            app()->getLocale() === 'id'
                                ? $item->title_id
                                : $item->title_en
                        )
                    ]) }}"
                    class="group block"
                >

                    {{-- image --}}
                    <div class="relative overflow-hidden">

                        <img
                            src="{{ asset('storage/' . (
                                app()->getLocale() === 'id'
                                    ? $item->image_id
                                    : $item->image_en
                            )) }}"
                            class="w-full object-cover"
                        >

                        {{-- hover --}}
                        <div
                            class="absolute inset-0 bg-white opacity-0 transition-all duration-300 group-hover:opacity-20"
                        ></div>

                    </div>

                </a>

            @empty

                {{-- empty --}}
                <div class="col-span-4 py-20 text-center">

                    <div class="text-[24px] font-bold text-gray-900">
                        {{ app()->getLocale() === 'id' ? 'Belum Ada Publikasi' : 'No Publications Yet' }}
                    </div>

                    <div class="mt-2 text-gray-500">
                        {{ app()->getLocale() === 'id' ? 'Belum ada data publikasi.' : 'There is no publication data yet.' }}
                    </div>

                </div>

            @endforelse

        </div>

        {{-- pagination --}}
        @if($publikasi->hasPages())

            <div class="mt-16">

                @include('components.pagination', [
                    'page' => $publikasi->currentPage(),
                    'lastPage' => $publikasi->lastPage(),
                ])

            </div>

        @endif

    </div>

</div>
