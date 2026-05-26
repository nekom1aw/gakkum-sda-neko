<div class="mx-auto max-w-6xl px-4 py-12 sm:px-6 lg:px-8">
    <div class="border-t border-b border-gray-200 py-10">
        <form method="GET" action="{{ route('search.index', ['locale' => app()->getLocale()]) }}" class="flex items-center gap-4">
            <input type="text" name="q" value="{{ $q }}" placeholder="{{ app()->getLocale() === 'id' ? 'Cari di website...' : 'Search the website...' }}"
                class="h-[48px] w-full max-w-2xl border border-gray-300 px-4 text-[16px] outline-none focus:border-[#00594B]">

            <button type="submit" class="h-[48px] border border-[#00594B] px-5 text-[12px] font-bold uppercase text-[#00594B]">
                {{ app()->getLocale() === 'id' ? 'Cari' : 'Search' }}
            </button>
        </form>

        @if(trim($q) === '')
            <div class="mt-10 text-[18px] text-gray-500">
                {{ app()->getLocale() === 'id' ? 'Masukkan kata kunci untuk mencari konten website.' : 'Enter a keyword to search the website content.' }}
            </div>
        @else
            <div class="mt-10 flex items-center justify-between gap-4">
                <h1 class="text-[28px] font-black text-black">
                    {{ app()->getLocale() === 'id' ? 'Hasil pencarian' : 'Search results' }}
                </h1>
                <div class="text-[14px] text-gray-500">
                    "{{ $q }}" - {{ $results->count() }} {{ app()->getLocale() === 'id' ? 'hasil' : 'results' }}
                </div>
            </div>

            <div class="mt-8 space-y-8">
                @forelse($results as $item)
                    <article class="border-t border-b border-gray-200 py-8">
                        <div class="flex flex-wrap items-center gap-3">
                            <div class="border border-blue-200 bg-blue-50 px-4 py-2">
                                <span class="text-[13px] font-semibold text-blue-700">
                                    {{ $item->type }}
                                </span>
                            </div>

                            <div class="border border-green-200 bg-green-50 px-4 py-2">
                                <span class="text-[13px] font-semibold text-green-700">
                                    {{ $item->category }}
                                </span>
                            </div>
                        </div>

                        <a href="{{ $item->url }}" class="mt-6 block">
                            <h2 class="text-[30px] font-black leading-snug text-black">
                                {!! $item->title_html !!}
                            </h2>
                        </a>

                        <p class="mt-5 text-[22px] leading-[1.8] text-gray-500">
                            {!! $item->description_html !!}
                        </p>
                    </article>
                @empty
                    <div class="border-t border-b border-gray-200 py-12 text-[18px] text-gray-500">
                        {{ app()->getLocale() === 'id' ? 'Tidak ada hasil yang cocok.' : 'No matching results found.' }}
                    </div>
                @endforelse
            </div>
        @endif
    </div>
</div>
