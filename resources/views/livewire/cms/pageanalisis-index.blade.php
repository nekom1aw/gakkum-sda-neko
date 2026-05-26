<div x-data="{ showToast : true }" x-init="setTimeout(() => showToast = false, 2000)"
    class="max-w-7xl mx-auto lg:px-10 py-10">

    <!-- TOAST -->
    @if(session()->has('success'))

        <div x-show="showToast" x-transition
            class="fixed top-6 right-6 z-50 border border-green-200 bg-green-50 px-5 py-4 text-[14px] text-green-700 shadow-lg">
            {{ session('success') }}
        </div>

    @endif

    <!-- SECTION -->
    <div class="px-6 py-16 lg:px-10">

        <!-- HEADER -->
        <div class="flex items-start justify-between gap-6">

            <!-- TITLE -->
            <p class="text-xl lg:text-2xl font-bold uppercase tracking-[8px] text-[#007A63]">
                ANALISIS
            </p>

            <!-- BUTTON -->
            <a href="{{ route('cms.analisis.insert', [
    'locale' => app()->getLocale()
]) }}" class="shrink-0 inline-flex h-[40px] items-center justify-center border border-[#007A63] px-5 text-[11px] font-bold uppercase text-[#007A63]">
                Add Analisis
            </a>

        </div>

        <!-- LINE -->
        <div class="mt-2 h-[2px] w-full bg-[#007A63]"></div>

        <!-- GRID -->
        <div class="mt-4 grid grid-cols-1 items-start gap-x-4 gap-y-20 md:grid-cols-2 lg:grid-cols-3">

            @forelse($analisis as $item)

<!-- CARD -->
<div class="flex h-full w-[350px] flex-col border-b border-gray-300 pb-8">

    <!-- IMAGE -->
    <a
        href="{{ route('cms.analisis.detail', [
            'locale' => app()->getLocale(),
            'id' => $item->id
        ]) }}"
        class="block h-[260px] w-full"
    >

        <img
            src="{{ asset('storage/' . $item->image_id) }}"
            class="h-full w-full object-cover"
        >

    </a>

    <!-- CONTENT -->
    <div class="flex flex-1 flex-col">

        <!-- TITLE -->
        <a
            href="{{ route('cms.analisis.detail', [
                'locale' => app()->getLocale(),
                'id' => $item->id
            ]) }}"
        >

            <p
                class="mt-4 h-[110px] w-full overflow-hidden text-xl leading-relaxed font-bold text-[#2E2E2E]"
            >

                {{ app()->getLocale() === 'id'
                    ? $item->title_id
                    : $item->title_en }}

            </p>

        </a>

        <!-- DESCRIPTION -->
        @if(
            app()->getLocale() === 'id'
            ? $item->description_id
            : $item->description_en
        )

            <div
                class="h-[100px] w-full overflow-hidden text-sm leading-relaxed text-[#2E2E2E]"
            >

                {!! app()->getLocale() === 'id'
                    ? $item->description_id
                    : $item->description_en !!}

            </div>

        @endif

        <!-- FOOTER -->
        <div class="mt-auto flex items-center justify-between pt-6">

            <!-- STATUS -->
            @if($item->status === 'publish')

                <span
                    class="inline-flex h-[28px] items-center bg-green-100 px-3 text-[10px] font-bold uppercase tracking-[1px] text-green-700"
                >
                    Publish
                </span>

            @else

                <span
                    class="inline-flex h-[28px] items-center bg-yellow-100 px-3 text-[10px] font-bold uppercase tracking-[1px] text-yellow-700"
                >
                    Draft
                </span>

            @endif

            <!-- DELETE -->
            <button
                wire:click.prevent="delete({{ $item->id }})"
                wire:confirm="Yakin ingin menghapus analisis ini?"
                class="inline-flex h-[32px] items-center justify-center border border-red-500 px-3 text-[11px] font-semibold uppercase text-red-500 hover:bg-red-500 hover:text-white"
            >
                Delete
            </button>

        </div>

    </div>

</div>

            @empty

                <!-- EMPTY -->
                <div class="col-span-3 py-20 text-center">

                    <p class="text-[24px] font-bold text-gray-900">
                        Belum Ada Analisis
                    </p>

                    <p class="mt-2 text-gray-500">
                        Silakan tambahkan analisis baru.
                    </p>

                </div>

            @endforelse

        </div>

    </div>

</div>
