<div x-data="{ showToast: true }" x-init="setTimeout(() => showToast = false, 2000)"
    class="max-w-7xl mx-auto px-6 lg:px-10 py-10">

    <!-- TOAST -->
    @if(session()->has('success'))

        <div x-show="showToast" x-transition
            class="fixed top-6 right-6 z-50 border border-green-200 bg-green-50 px-5 py-4 text-green-700 text-[14px] shadow-lg">
            {{ session('success') }}
        </div>

    @endif

    <!-- HEADER -->
    <div class="flex items-center justify-between mb-8">

        <div>

            <h1 class="text-[32px] font-black text-gray-900">
                Publikasi
            </h1>

            <p class="mt-1 text-[15px] uppercase text-[#00594B] font-semibold">
                CMS Management
            </p>

        </div>

        <!-- ADD -->
        <a href="{{ route('cms.publikasi.insert', [
    'locale' => app()->getLocale()
]) }}"
            class="inline-flex items-center gap-3 bg-[#00594B] text-white px-6 h-[52px] text-[14px] font-semibold uppercase hover:opacity-90 transition-all duration-200">

            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">

                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />

            </svg>

            Add Publikasi

        </a>

    </div>

    <!-- TABLE -->
    <div class="border border-gray-200 overflow-hidden">

        <table class="w-full">

            <thead class="bg-[#F9F9F9] border-b border-gray-200">

                <tr>

                    <th class="px-6 py-4 text-left text-[13px] font-bold uppercase text-gray-600">
                        Image
                    </th>

                    <th class="px-6 py-4 text-left text-[13px] font-bold uppercase text-gray-600">
                        Title
                    </th>

                    <th class="px-6 py-4 text-left text-[13px] font-bold uppercase text-gray-600">
                        Status
                    </th>

                    <th class="px-6 py-4 text-left text-[13px] font-bold uppercase text-gray-600">
                        Created
                    </th>

                    <th class="px-6 py-4 text-right text-[13px] font-bold uppercase text-gray-600">
                        Action
                    </th>

                </tr>

            </thead>

            <tbody>

                @forelse($publikasi as $item)

                                <tr onclick="window.location='{{ route('cms.publikasi.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $item->id
                    ]) }}'"
                                    class="border-b border-gray-200 hover:bg-gray-50 cursor-pointer transition-all duration-150">

                                    <!-- IMAGE -->
                                    <td class="px-6 py-5 w-[140px]">

                                        <img src="{{ asset('storage/' . $item->image_id) }}" alt="{{ $item->title_id }}"
                                            class="w-[100px] h-[70px] object-cover border border-gray-200">

                                    </td>

                                    <!-- TITLE -->
                                    <td class="px-6 py-5">

                                        <h2 class="text-[16px] font-bold text-gray-900">
                                            {{ $item->title_id }}
                                        </h2>

                                        <p class="mt-1 text-[14px] text-gray-500">
                                            {{ $item->slug_id }}
                                        </p>

                                    </td>

                                    <!-- STATUS -->
                                    <td class="px-6 py-5">

                                        @if($item->status == 'publish')

                                            <span
                                                class="inline-flex items-center px-3 h-[34px] bg-green-100 text-green-700 text-[12px] font-bold uppercase">
                                                Publish
                                            </span>

                                        @else

                                            <span
                                                class="inline-flex items-center px-3 h-[34px] bg-yellow-100 text-yellow-700 text-[12px] font-bold uppercase">
                                                Draft
                                            </span>

                                        @endif

                                    </td>

                                    <!-- CREATED -->
                                    <td class="px-6 py-5 text-[14px] text-gray-600">

                                        {{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}

                                    </td>

                                    <!-- ACTION -->
                                    <td class="px-6 py-5">

                                        <div class="flex items-center justify-end">

                                            <!-- DELETE -->
                                            <button wire:click.stop="delete({{ $item->id }})"
                                                wire:confirm="Yakin ingin menghapus publikasi ini?"
                                                class="border border-red-500 text-red-500 px-4 h-[40px] inline-flex items-center text-[13px] font-semibold uppercase hover:bg-red-500 hover:text-white">
                                                Delete
                                            </button>

                                        </div>

                                    </td>

                                </tr>

                @empty

                    <tr>

                        <td colspan="5" class="px-6 py-20 text-center">

                            <h2 class="text-[24px] font-bold text-gray-900">
                                Belum Ada Publikasi
                            </h2>

                            <p class="mt-2 text-gray-500">
                                Silakan tambahkan publikasi baru.
                            </p>

                        </td>

                    </tr>

                @endforelse

            </tbody>

        </table>

    </div>

</div>