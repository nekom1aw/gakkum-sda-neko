<div x-data="{
        showToast : true,
        openDelete : false,
        deleteId : null
    }" x-init="setTimeout(() => showToast = false, 2000)" class="mx-auto max-w-7xl py-10 lg:px-10">

    {{-- header --}}
    <div class="mb-6 flex items-center justify-between gap-4">

        <div>

            <h1 class="text-[24px] font-bold text-black">
                Agenda
            </h1>

            <p class="mt-1 text-[14px] text-gray-500">
                Data agenda kegiatan
            </p>

        </div>

        {{-- add --}}
        <a href="{{ route('cms.agenda.insert', [
    'locale' => app()->getLocale()
]) }}"
            class="inline-flex h-[40px] shrink-0 items-center justify-center border border-[#007A63] px-5 text-[11px] font-bold uppercase text-[#007A63]">
            Add Agenda
        </a>

    </div>

    {{-- alert --}}
    @if (session()->has('success'))

        <div x-show="showToast" x-transition
            class="mb-6 border border-green-200 bg-green-50 px-4 py-3 text-[13px] text-green-700">
            {{ session('success') }}
        </div>

    @endif

    {{-- table --}}
    <div class="overflow-hidden border border-gray-200 bg-white">

        {{-- head --}}
        <div class="grid grid-cols-12 border-b border-gray-200 bg-[#F9F9F9]">

            <div class="col-span-1 px-4 py-3 text-[11px] font-bold uppercase text-black">
                No
            </div>

            <div class="col-span-4 px-4 py-3 text-[11px] font-bold uppercase text-black">
                Title
            </div>

            <div class="col-span-2 px-4 py-3 text-[11px] font-bold uppercase text-black">
                Tanggal
            </div>

            <div class="col-span-2 px-4 py-3 text-[11px] font-bold uppercase text-black">
                Status
            </div>

            <div class="col-span-2 px-4 py-3 text-[11px] font-bold uppercase text-black">
                Jenis
            </div>

            <div class="col-span-1 px-4 py-3 text-[11px] font-bold uppercase text-black">
                Option
            </div>

        </div>

        {{-- body --}}
        @forelse ($data as $item)

                <a href="{{ route('cms.agenda.detail', [
                'locale' => app()->getLocale(),
                'id' => $item->id
            ]) }}" class="grid grid-cols-12 border-b border-gray-200 transition hover:bg-gray-50">

                    {{-- no --}}
                    <div class="col-span-1 px-4 py-4 text-[13px] text-black">
                        {{ $loop->iteration }}
                    </div>

                    {{-- title --}}
                    <div class="col-span-4 px-4 py-4">

                        <div class="text-[13px] font-semibold leading-relaxed text-black">
                            {{ $item->title_id ?? '-' }}
                        </div>

                    </div>

                    {{-- tanggal --}}
                    <div class="col-span-2 px-4 py-4 text-[13px] text-black">

                        @if($item->date)

                            {{ \Carbon\Carbon::parse($item->date)->format('d F Y') }}

                        @else

                            -

                        @endif

                    </div>

                    {{-- status --}}
                    <div class="col-span-2 px-4 py-4">

                        @if($item->status == 'publish')

                            <div
                                class="inline-flex border border-green-200 bg-green-50 px-3 py-1 text-[10px] font-bold uppercase text-green-700">
                                Publish
                            </div>

                        @else

                            <div
                                class="inline-flex border border-yellow-200 bg-yellow-50 px-3 py-1 text-[10px] font-bold uppercase text-yellow-700">
                                Draft
                            </div>

                        @endif

                    </div>

                    {{-- jenis --}}
                    <div class="col-span-2 px-4 py-4 text-[13px] text-black">
                        {{ $item->jenis_kegiatan ?? '-' }}
                    </div>

                    {{-- option --}}
                    <div class="col-span-1 px-4 py-4">

                        {{-- delete --}}
                        <button type="button" @click.prevent="
                                    openDelete = true;
                                    deleteId = {{ $item->id }};
                                "
                            class="inline-flex h-[32px] items-center justify-center border border-red-200 bg-red-50 px-4 text-[11px] font-bold uppercase text-red-700">
                            Delete
                        </button>

                    </div>

                </a>

        @empty

            <div class="px-4 py-10 text-center text-[13px] text-gray-500">
                Data agenda belum tersedia.
            </div>

        @endforelse

    </div>

    {{-- modal delete --}}
    <div x-show="openDelete" x-transition.opacity
        class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 px-4">

        <div @click.away="openDelete = false" class="w-full max-w-md border border-gray-200 bg-white p-6">

            <h2 class="text-[20px] font-bold text-black">
                Hapus Agenda
            </h2>

            <p class="mt-3 text-[14px] leading-relaxed text-gray-600">
                Yakin ingin menghapus agenda ini?
            </p>

            <div class="mt-6 flex items-center justify-end gap-3">

                {{-- cancel --}}
                <button type="button" @click="openDelete = false"
                    class="inline-flex h-[42px] items-center justify-center border border-gray-300 px-5 text-[12px] font-bold uppercase text-gray-700">
                    Cancel
                </button>

                {{-- delete --}}
                <button type="button" wire:click="delete(deleteId)" @click="openDelete = false"
                    class="inline-flex h-[42px] items-center justify-center border border-red-600 bg-red-600 px-5 text-[12px] font-bold uppercase text-white">
                    Delete
                </button>

            </div>

        </div>

    </div>

</div>