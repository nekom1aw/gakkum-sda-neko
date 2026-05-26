<div x-data="{ lang : 'id' }" class="max-w-7xl mx-auto px-6 lg:px-10 py-10">

    <div class="bg-white border border-gray-200">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">

            <div>

                <h1 class="text-[30px] font-black text-gray-900">
                    Edit Berita
                </h1>

                <p class="mt-1 text-[15px] uppercase text-[#00594B] font-semibold">
                    CMS Management
                </p>

            </div>

            <!-- LANGUAGE -->
            <button
                type="button"
                @click="lang = lang === 'id' ? 'en' : 'id'"
                class="px-5 h-[42px] bg-[#00594B] text-white text-[14px] font-semibold uppercase"
            >
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
        <form wire:submit.prevent="update" class="px-6 py-6 space-y-8">

            <!-- STATUS -->
            <div>

                <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                    Status
                </label>

                <select
                    wire:model="status"
                    class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]"
                >
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

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Title
                    </label>

                    <input
                        type="text"
                        wire:model.live="title_id"
                        class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]"
                    >

                </div>

                <!-- DESCRIPTION -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Description
                    </label>

                    <x-tinymce
                        id="description_id_editor"
                        model="description_id"
                    />

                </div>

                <!-- SOURCE -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Source
                    </label>

                    <input
                        type="text"
                        wire:model="source_id"
                        class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]"
                    >

                </div>

            </div>

            <!-- EN -->
            <div x-show="lang === 'en'" class="space-y-8">

                <!-- TITLE -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Title
                    </label>

                    <input
                        type="text"
                        wire:model.live="title_en"
                        class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]"
                    >

                </div>

                <!-- DESCRIPTION -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Description
                    </label>

                    <x-tinymce
                        id="description_en_editor"
                        model="description_en"
                    />

                </div>

                <!-- SOURCE -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Source
                    </label>

                    <input
                        type="text"
                        wire:model="source_en"
                        class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]"
                    >

                </div>

            </div>

            <!-- SUBMIT -->
            <div class="flex justify-end">

                <button
                    type="submit"
                    class="px-6 h-[52px] bg-[#00594B] text-white text-[15px] font-semibold uppercase"
                >
                    Save Changes
                </button>

            </div>

        </form>

    </div>

</div>