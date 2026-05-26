<div x-data="{ showToast: true }" x-init="setTimeout(() => showToast = false, 2000)"
    class="max-w-7xl mx-auto px-6 lg:px-10 py-10">
    @if(session()->has('success'))
        <div x-show="showToast" x-transition
            class="fixed top-6 right-6 z-50 border border-green-200 bg-green-50 px-5 py-4 text-[14px] text-green-700 shadow-lg">
            {{ session('success') }}
        </div>
    @endif

    <div class="px-6 py-20 lg:px-10">
        <div class="flex items-start justify-between gap-6">
            <h1 class="text-[34px] lg:text-[48px] font-black uppercase tracking-[8px] text-[#007A63]">
                {{ $label }}
            </h1>

            <a href="{{ route($routeName . '.insert', ['locale' => app()->getLocale()]) }}"
                class="shrink-0 inline-flex h-[40px] items-center justify-center border border-[#007A63] px-5 text-[11px] font-bold uppercase text-[#007A63] transition-all duration-200 hover:bg-[#007A63] hover:text-white">
                Add {{ $label }}
            </a>
        </div>

        <div class="h-[2px] w-full bg-[#007A63]"></div>

        <div class="mt-8 grid grid-cols-1 gap-x-14 gap-y-4 md:grid-cols-2 lg:grid-cols-3">
            @forelse($items as $item)
                <div class="flex flex-col border-b border-gray-500 pb-6">
                    <div class="h-[120px] overflow-hidden">
                        <a href="{{ route($routeName . '.detail', ['locale' => app()->getLocale(), 'id' => $item->id]) }}"
                            class="block">
                            <p class="text-2xl leading-relaxed font-black hover:text-[#007A63]">
                                {{ app()->getLocale() === 'id' ? $item->title_id : $item->title_en }}
                            </p>
                        </a>
                    </div>

                    @if(app()->getLocale() === 'id' ? $item->description_id : $item->description_en)
                        <div class="mt-4 h-[80px] overflow-hidden">
                            <div class="text-xs leading-relaxed text-[#2E2E2E]">
                                {!! app()->getLocale() === 'id' ? $item->description_id : $item->description_en !!}
                            </div>
                        </div>
                    @endif

                    <div class="mt-2 h-[40px] flex items-center gap-2 text-[16px]">
                        <span class="font-bold text-black">Sumber:</span>
                        @php($source = app()->getLocale() === 'id' ? $item->source_id : $item->source_en)
                        @if($source)
                            <a href="{{ $source }}" target="_blank" class="font-bold text-[#6D9B63] hover:underline">
                                {{ $source }}
                            </a>
                        @else
                            <span class="font-bold text-gray-400">-</span>
                        @endif
                    </div>

                    <div class="mt-2 flex items-center justify-between gap-4">
                        <span
                            class="inline-flex h-[28px] items-center px-3 text-[10px] font-bold uppercase tracking-[1px] {{ $item->status === 'publish' ? 'bg-green-100 text-green-700' : 'bg-yellow-100 text-yellow-700' }}">
                            {{ $item->status === 'publish' ? 'Publish' : 'Draft' }}
                        </span>

                        <div class="flex items-center gap-2">
                            <a href="{{ route($routeName . '.edit', ['locale' => app()->getLocale(), 'id' => $item->id]) }}"
                                class="inline-flex h-[32px] items-center justify-center border border-black px-3 text-[11px] font-semibold uppercase transition-all duration-200 hover:bg-black hover:text-white">
                                Edit
                            </a>

                            <button wire:click="delete({{ $item->id }})" wire:confirm="Yakin ingin menghapus data ini?"
                                class="inline-flex h-[32px] items-center justify-center border border-red-500 px-3 text-[11px] font-semibold uppercase text-red-500 transition-all duration-200 hover:bg-red-500 hover:text-white">
                                Delete
                            </button>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-3 py-20 text-center">
                    <p class="text-[24px] font-bold text-gray-900">
                        Belum Ada {{ $label }}
                    </p>
                    <p class="mt-2 text-gray-500">
                        Silakan tambahkan data baru.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
</div>
