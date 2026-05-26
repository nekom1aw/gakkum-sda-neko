<div x-data="{ lang : 'id' }" class="max-w-7xl mx-auto px-6 lg:px-10 py-10">

    <div class="bg-white border border-gray-200">

        <!-- HEADER -->
        <div class="flex items-center justify-between border-b border-gray-200 px-6 py-5">

            <!-- TITLE -->
            <div>

                <p class="text-[30px] font-black text-gray-900">
                    Edit Data
                </p>

                <p class="mt-1 text-[15px] font-semibold uppercase text-[#00594B]">
                    CMS Management
                </p>

            </div>

            <!-- LANGUAGE -->
            <button type="button" @click="lang = lang === 'id' ? 'en' : 'id'"
                class="h-[42px] bg-[#00594B] px-5 text-[14px] font-semibold uppercase text-white">
                <span x-text="lang === 'id' ? 'EN' : 'ID'"></span>
            </button>

        </div>

        <!-- ALERT -->
        @if(session()->has('success'))

            <div class="mx-6 mt-6 border border-green-200 bg-green-50 px-4 py-3 text-[14px] text-green-700">
                {{ session('success') }}
            </div>

        @endif

        <!-- FORM -->
        <form wire:submit.prevent="update" class="space-y-8 px-6 py-6">

            <!-- STATUS -->
            <div>

                <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                    Status
                </label>

                <select wire:model="status"
                    class="h-[52px] w-full border border-gray-300 px-4 text-[15px] outline-none focus:border-[#00594B]">

                    <option value="draft">
                        Draft
                    </option>

                    <option value="publish">
                        Publish
                    </option>

                </select>

            </div>

            <!-- ID -->
            <div x-show="lang === 'id'" class="space-y-8">

                <!-- TITLE -->
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Title
                    </label>

                    <input type="text" wire:model="title_id"
                        class="h-[52px] w-full border border-gray-300 px-4 text-[15px] outline-none focus:border-[#00594B]">

                </div>

                <!-- DESCRIPTION -->
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Description
                    </label>

                    <x-tinymce id="description_id_editor" model="description_id" />

                </div>

                <!-- CONTENT -->
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Content
                    </label>

                    <x-tinymce id="content_id_editor" model="content_id" />

                </div>

            </div>

            <!-- EN -->
            <div x-show="lang === 'en'" class="space-y-8">

                <!-- TITLE -->
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Title
                    </label>

                    <input type="text" wire:model="title_en"
                        class="h-[52px] w-full border border-gray-300 px-4 text-[15px] outline-none focus:border-[#00594B]">

                </div>

                <!-- DESCRIPTION -->
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Description
                    </label>

                    <x-tinymce id="description_en_editor" model="description_en" />

                </div>

                <!-- CONTENT -->
                <div>

                    <label class="mb-3 block text-[14px] font-semibold uppercase text-gray-700">
                        Content
                    </label>

                    <x-tinymce id="content_en_editor" model="content_en" />

                </div>

            </div>

            <!-- SUBMIT -->
            <div class="flex justify-end">

                <button type="submit" class="h-[52px] bg-[#00594B] px-6 text-[15px] font-semibold uppercase text-white">
                    Update Data
                </button>

            </div>

        </form>

    </div>

</div>