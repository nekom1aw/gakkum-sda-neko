<div x-data="{ lang : 'id' }" class="max-w-7xl mx-auto px-6 lg:px-10 py-10">

    <div class="bg-white border border-gray-200">

        {{-- header --}}
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">

            <div>

                <p class="text-[30px] font-black text-gray-900">
                    Add Aktivitas
                </p>

                <p class="mt-1 text-[15px] uppercase text-[#00594B] font-semibold">
                    CMS Management
                </p>

            </div>

            {{-- language --}}
            <div class="flex items-center gap-2">

                <button type="button" @click="lang = 'id'" :class="
                        lang === 'id'
                            ? 'bg-[#00594B] text-white border-[#00594B]'
                            : 'bg-white text-gray-700 border-gray-300'
                    "
                    class="flex h-[42px] w-[60px] items-center justify-center border text-[14px] font-semibold uppercase">
                    ID
                </button>

                <button type="button" @click="lang = 'en'" :class="
                        lang === 'en'
                            ? 'bg-[#00594B] text-white border-[#00594B]'
                            : 'bg-white text-gray-700 border-gray-300'
                    "
                    class="flex h-[42px] w-[60px] items-center justify-center border text-[14px] font-semibold uppercase">
                    EN
                </button>

            </div>

        </div>

        {{-- form --}}
        <form wire:submit.prevent="save" class="px-6 py-6 space-y-8">

            {{-- status --}}
            <div>

                <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                    Status
                </label>

                <select wire:model="status"
                    class="w-full h-[52px] border border-gray-300 px-4 text-[15px] outline-none">

                    <option value="draft">
                        Draft
                    </option>

                    <option value="publish">
                        Publish
                    </option>

                </select>

            </div>

            {{-- tanggal --}}
            <div>

                <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                    Tanggal
                </label>

                <input type="date" wire:model="tanggal"
                    class="w-full h-[52px] border border-gray-300 px-4 text-[15px] outline-none">

            </div>

            {{-- image id --}}
            <div x-show="lang === 'id'" class="space-y-4">

                <label class="block text-[14px] font-semibold uppercase text-gray-700">
                    Image ID
                </label>

                @if ($image_id)

                    <div class="w-[220px] border border-gray-200 bg-white p-3">

                        <img src="{{ $image_id->temporaryUrl() }}" class="h-[300px] w-full object-cover">

                    </div>

                @endif

                <input type="file" wire:model="image_id" class="w-full border border-gray-300 px-4 py-3 text-[14px]">

            </div>

            {{-- image en --}}
            <div x-show="lang === 'en'" class="space-y-4">

                <label class="block text-[14px] font-semibold uppercase text-gray-700">
                    Image EN
                </label>

                @if ($image_en)

                    <div class="w-[220px] border border-gray-200 bg-white p-3">

                        <img src="{{ $image_en->temporaryUrl() }}" class="h-[300px] w-full object-cover">

                    </div>

                @endif

                <input type="file" wire:model="image_en" class="w-full border border-gray-300 px-4 py-3 text-[14px]">

            </div>

            {{-- id --}}
            <div x-show="lang === 'id'" class="space-y-8">

                {{-- jenis --}}
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Jenis Kegiatan
                    </label>

                    <input type="text" wire:model="jenis_kegiatan_id"
                        class="w-full h-[52px] border border-gray-300 px-4 text-[15px] outline-none">

                </div>

                {{-- title --}}
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Title
                    </label>

                    <input type="text" wire:model="title_id"
                        class="w-full h-[52px] border border-gray-300 px-4 text-[15px] outline-none">

                </div>

                {{-- description --}}
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Description
                    </label>

                    <x-tinymce id="deskripsi_id_editor" model="deskripsi_id" />

                </div>

                {{-- content --}}
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Content
                    </label>

                    <x-tinymce id="content_id_editor" model="content_id" />

                </div>

            </div>

            {{-- en --}}
            <div x-show="lang === 'en'" class="space-y-8">

                {{-- jenis --}}
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Activity Type
                    </label>

                    <input type="text" wire:model="jenis_kegiatan_en"
                        class="w-full h-[52px] border border-gray-300 px-4 text-[15px] outline-none">

                </div>

                {{-- title --}}
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Title
                    </label>

                    <input type="text" wire:model="title_en"
                        class="w-full h-[52px] border border-gray-300 px-4 text-[15px] outline-none">

                </div>

                {{-- description --}}
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Description
                    </label>

                    <x-tinymce id="deskripsi_en_editor" model="deskripsi_en" />

                </div>

                {{-- content --}}
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Content
                    </label>

                    <x-tinymce id="content_en_editor" model="content_en" />

                </div>

            </div>

            {{-- submit --}}
            <div class="flex justify-end">

                <button type="submit" class="h-[52px] bg-[#00594B] px-6 text-[15px] font-semibold uppercase text-white">
                    Save Aktivitas
                </button>

            </div>

        </form>

    </div>

</div>