<div x-data="{ lang : 'id' }" class="max-w-7xl mx-auto px-6 lg:px-10 py-10">

    <div class="bg-white border border-gray-200">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">

            <div>

                <h1 class="text-[30px] font-black text-gray-900">
                    Add Analisis
                </h1>

                <p class="mt-1 text-[15px] uppercase text-[#00594B] font-semibold">
                    CMS Management
                </p>

            </div>

            <!-- LANGUAGE -->
      <!-- SWITCH -->
<div class="flex items-center gap-2">

    {{-- ID --}}
    <button
        type="button"
        @click="lang = 'id'"
        :class="
            lang === 'id'
                ? 'bg-[#00594B] text-white border-[#00594B]'
                : 'bg-white text-[#00594B] border-gray-300'
        "
        class="h-[42px] px-5 border text-[14px] font-semibold uppercase transition"
    >
        ID
    </button>

    {{-- EN --}}
    <button
        type="button"
        @click="lang = 'en'"
        :class="
            lang === 'en'
                ? 'bg-[#00594B] text-white border-[#00594B]'
                : 'bg-white text-[#00594B] border-gray-300'
        "
        class="h-[42px] px-5 border text-[14px] font-semibold uppercase transition"
    >
        EN
    </button>

</div>

        </div>

        <!-- ALERT -->
        @if(session()->has('success'))

            <div class="mx-6 mt-6 border border-green-200 bg-green-50 px-4 py-3 text-[14px] text-green-700">
                {{ session('success') }}
            </div>

        @endif

        <!-- FORM -->
        <form wire:submit.prevent="save" class="px-6 py-6 space-y-8">

            <!-- STATUS -->
            <div>

                <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                    Status
                </label>

                <select wire:model="status"
                    class="w-full h-[52px] border border-gray-300 px-4 text-[15px] outline-none focus:border-[#00594B]">
                    <option value="draft">
                        Draft
                    </option>

                    <option value="publish">
                        Publish
                    </option>

                </select>

            </div>

            <!-- IMAGE ID -->
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

            <!-- IMAGE EN -->
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

            <!-- SOURCE TYPE -->
            <div>

                <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                    Source Type
                </label>

                <select wire:model.live="source_type"
                    class="w-full h-[52px] border border-gray-300 px-4 text-[15px] outline-none focus:border-[#00594B]">
                    <option value="link">
                        Link
                    </option>

                    <option value="file">
                        File
                    </option>

                </select>

                <p class="mt-2 text-[13px] text-gray-500">
                    Source optional.
                </p>

            </div>

            <!-- ID -->
            <div x-show="lang === 'id'" class="space-y-8">

                <!-- TITLE -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Title
                    </label>

                    <input type="text" wire:model="title_id"
                        class="w-full h-[52px] border border-gray-300 px-4 text-[15px] outline-none focus:border-[#00594B]">

                </div>

                <!-- DESCRIPTION -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Description
                    </label>

                    <x-tinymce id="description_id_editor" model="description_id" />

                </div>

                <!-- CONTENT -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Content
                    </label>

                    <x-tinymce id="content_id_editor" model="content_id" />

                </div>

                <!-- SOURCE -->
                @if($source_type === 'link')

                    <div>

                        <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                            Source
                        </label>

                        <x-tinymce id="source_id_editor" model="source_id" />

                    </div>

                @else

                    <div>

                        <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                            Source File
                        </label>

                        <input type="file" wire:model="source_file_id"
                            class="w-full border border-gray-300 px-4 py-3 text-[14px]">

                    </div>

                @endif

            </div>

            <!-- EN -->
            <div x-show="lang === 'en'" class="space-y-8">

                <!-- TITLE -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Title
                    </label>

                    <input type="text" wire:model="title_en"
                        class="w-full h-[52px] border border-gray-300 px-4 text-[15px] outline-none focus:border-[#00594B]">

                </div>

                <!-- DESCRIPTION -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Description
                    </label>

                    <x-tinymce id="description_en_editor" model="description_en" />

                </div>

                <!-- CONTENT -->
                <div>

                    <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                        Content
                    </label>

                    <x-tinymce id="content_en_editor" model="content_en" />

                </div>

                <!-- SOURCE -->
                @if($source_type === 'link')

                    <div>

                        <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                            Source
                        </label>

                        <x-tinymce id="source_en_editor" model="source_en" />

                    </div>

                @else

                    <div>

                        <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">
                            Source File
                        </label>

                        <input type="file" wire:model="source_file_en"
                            class="w-full border border-gray-300 px-4 py-3 text-[14px]">

                    </div>

                @endif

            </div>

            <!-- SUBMIT -->
            <div class="flex justify-end">

                <button type="submit" class="h-[52px] bg-[#00594B] px-6 text-[15px] font-semibold uppercase text-white">
                    Save Analisis
                </button>

            </div>

        </form>

    </div>

</div>