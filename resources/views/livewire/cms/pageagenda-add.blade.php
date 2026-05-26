<div x-data="{ lang : 'id' }" class="mx-auto max-w-7xl px-6 py-10 lg:px-10">

    <div class="border border-gray-200 bg-white">

        {{-- header --}}
        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-5">

            <div>

                <p class="text-[30px] font-black text-gray-900">
                    Add Agenda
                </p>

                <p class="mt-1 text-[15px] font-semibold uppercase text-[#00594B]">
                    CMS Management
                </p>

            </div>

            {{-- language --}}
            <div class="flex items-center gap-2">

                <button type="button" @click="lang = 'id'" :class="
                        lang === 'id'
                            ? 'border-[#00594B] bg-[#00594B] text-white'
                            : 'border-gray-300 bg-white text-gray-700'
                    "
                    class="flex h-[42px] w-[60px] items-center justify-center border text-[14px] font-semibold uppercase">
                    ID
                </button>

                <button type="button" @click="lang = 'en'" :class="
                        lang === 'en'
                            ? 'border-[#00594B] bg-[#00594B] text-white'
                            : 'border-gray-300 bg-white text-gray-700'
                    "
                    class="flex h-[42px] w-[60px] items-center justify-center border text-[14px] font-semibold uppercase">
                    EN
                </button>

            </div>

        </div>

        {{-- form --}}
        <form wire:submit.prevent="save" class="space-y-8 px-6 py-6">

            {{-- status --}}
            <div>

                <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                    Status
                </label>

                <select wire:model="status"
                    class="h-[52px] w-full border border-gray-300 px-4 text-[15px] outline-none">

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

                <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                    Tanggal Kegiatan
                </label>

                <input type="date" wire:model="date"
                    class="h-[52px] w-full border border-gray-300 px-4 text-[15px] outline-none">

            </div>

            {{-- jenis kegiatan --}}
            <div>

                <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                    Jenis Kegiatan
                </label>

                <input type="text" wire:model="jenis_kegiatan"
                    class="h-[52px] w-full border border-gray-300 px-4 text-[15px] outline-none">

            </div>

            {{-- indonesia --}}
            <div x-show="lang === 'id'" class="space-y-8">

                {{-- title --}}
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Title
                    </label>

                    <input type="text" wire:model="title_id"
                        class="h-[52px] w-full border border-gray-300 px-4 text-[15px] outline-none">

                </div>

                {{-- description --}}
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Description
                    </label>

                    <x-tinymce id="description_id_editor" model="description_id" />

                </div>

                {{-- content --}}
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Content
                    </label>

                    <x-tinymce id="content_id_editor" model="content_id" />

                </div>

            </div>

            {{-- english --}}
            <div x-show="lang === 'en'" class="space-y-8">

                {{-- title --}}
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Title
                    </label>

                    <input type="text" wire:model="title_en"
                        class="h-[52px] w-full border border-gray-300 px-4 text-[15px] outline-none">

                </div>

                {{-- description --}}
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Description
                    </label>

                    <x-tinymce id="description_en_editor" model="description_en" />

                </div>

                {{-- content --}}
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Content
                    </label>

                    <x-tinymce id="content_en_editor" model="content_en" />

                </div>

            </div>

            {{-- submit --}}
            <div class="flex justify-end">

                <button type="submit" class="h-[52px] bg-[#00594B] px-6 text-[15px] font-semibold uppercase text-white">
                    Save Agenda
                </button>

            </div>

        </form>

    </div>

</div>