<div x-data="{ lang : 'id' }" class="max-w-7xl mx-auto px-6 lg:px-10 py-10">

    <div class="bg-white border border-gray-200">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">

            <div>

                <h1 class="text-[30px] font-black text-gray-900">
                    Add Berita
                </h1>

                <p class="mt-1 text-[15px] uppercase text-[#00594B] font-semibold">
                    CMS Management
                </p>

            </div>

            <!-- LANGUAGE -->
            <div class="flex items-center gap-2">

                <!-- ID -->
                <button type="button" @click="lang = 'id'" :class="lang === 'id'
                        ? 'bg-[#00594B] text-white border-[#00594B]'
                        : 'bg-white text-gray-700 border-gray-300'"
                    class="w-[60px] h-[42px] border text-[14px] font-semibold uppercase transition-all duration-200">
                    ID
                </button>

                <!-- EN -->
                <button type="button" @click="lang = 'en'" :class="lang === 'en'
                        ? 'bg-[#00594B] text-white border-[#00594B]'
                        : 'bg-white text-gray-700 border-gray-300'"
                    class="w-[60px] h-[42px] border text-[14px] font-semibold uppercase transition-all duration-200">
                    EN
                </button>

            </div>

        </div>

        <form wire:submit="save" class="px-6 py-6 space-y-8">

            <!-- STATUS -->
            <div>

                <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                    Status
                </label>

                <select wire:model="status"
                    class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">
                    <option value="draft">Draft</option>
                    <option value="publish">Publish</option>
                </select>

            </div>

            <!-- ID -->
            <div x-show="lang === 'id'" class="space-y-8">

                <!-- TITLE -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Title
                    </label>

                    <input type="text" wire:model="title_id"
                        class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">

                    @error('title_id')

                        <p class="mt-2 text-[13px] text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                <!-- DESCRIPTION -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Description
                    </label>

                    <x-tinymce id="description_id_editor" model="description_id" />

                </div>

                <!-- SOURCE -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Source
                    </label>

                    <x-tinymce id="source_id_editor" model="source_id" />

                </div>

            </div>

            <!-- EN -->
            <div x-show="lang === 'en'" class="space-y-8">

                <!-- TITLE -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Title
                    </label>

                    <input type="text" wire:model="title_en"
                        class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">

                    @error('title_en')

                        <p class="mt-2 text-[13px] text-red-500">
                            {{ $message }}
                        </p>

                    @enderror

                </div>

                <!-- DESCRIPTION -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Description
                    </label>

                    <x-tinymce id="description_en_editor" model="description_en" />

                </div>

                <!-- SOURCE -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Source
                    </label>

                    <x-tinymce id="source_en_editor" model="source_en" />

                </div>

            </div>

            <!-- SUBMIT -->
            <div class="flex justify-end">

                <button type="submit" class="px-6 h-[52px] bg-[#00594B] text-white text-[15px] font-semibold uppercase">
                    Save Berita
                </button>

            </div>

        </form>

    </div>

</div>