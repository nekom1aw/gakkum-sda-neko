<div x-data="{ lang : 'id' }" class="max-w-7xl mx-auto px-6 lg:px-10 py-10">

    <div class="bg-white border border-gray-200">

        <!-- HEADER -->
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">

            <div>

                <h1 class="text-[30px] font-black text-gray-900">
                    Add Publikasi
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

            <div class="mx-6 mt-6 border border-green-200 bg-green-50 px-4 py-3 text-green-700 text-[14px]">
                {{ session('success') }}
            </div>

        @endif

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

            <!-- IMAGE ID -->
            <div x-show="lang === 'id'" class="space-y-4">

                <label class="block text-[14px] font-semibold uppercase text-gray-700">
                    Image ID
                </label>

                @if ($image_id)

                    <div class="w-[220px] border border-gray-200 bg-white p-3">

                        <img src="{{ $image_id->temporaryUrl() }}" class="w-full h-[300px] object-cover">

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

                        <img src="{{ $image_en->temporaryUrl() }}" class="w-full h-[300px] object-cover">

                    </div>

                @endif

                <input type="file" wire:model="image_en" class="w-full border border-gray-300 px-4 py-3 text-[14px]">

            </div>

            <!-- ID -->
            <div x-show="lang === 'id'" class="space-y-8">

                <!-- TITLE -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Title
                    </label>

                    <input type="text" wire:model.live="title_id"
                        class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">

                </div>

                <!-- SLUG -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Slug
                    </label>

                    <input type="text" value="{{ \Illuminate\Support\Str::slug($title_id) }}" readonly
                        class="w-full border border-gray-200 bg-gray-100 px-4 h-[52px] text-[15px]">

                </div>

                <!-- DOWNLOAD -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Download Link
                    </label>

                    <input type="text" wire:model="download_id" placeholder="https://..."
                        class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">

                </div>

                <!-- DESCRIPTION -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Description
                    </label>

                    <x-tinymce id="description_id_editor" model="description_id" />

                </div>

                <!-- CONTENT -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Content
                    </label>

                    <x-tinymce id="content_id_editor" model="content_id" />

                </div>

            </div>

            <!-- EN -->
            <div x-show="lang === 'en'" class="space-y-8">

                <!-- TITLE -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Title
                    </label>

                    <input type="text" wire:model.live="title_en"
                        class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">

                </div>

                <!-- SLUG -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Slug
                    </label>

                    <input type="text" value="{{ \Illuminate\Support\Str::slug($title_en) }}" readonly
                        class="w-full border border-gray-200 bg-gray-100 px-4 h-[52px] text-[15px]">

                </div>

                <!-- DOWNLOAD -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Download Link
                    </label>

                    <input type="text" wire:model="download_en" placeholder="https://..."
                        class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">

                </div>

                <!-- DESCRIPTION -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Description
                    </label>

                    <x-tinymce id="description_en_editor" model="description_en" />

                </div>

                <!-- CONTENT -->
                <div>

                    <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">
                        Content
                    </label>

                    <x-tinymce id="content_en_editor" model="content_en" />

                </div>

            </div>

            <!-- SUBMIT -->
            <div class="flex justify-end">

                <button type="submit" class="px-6 h-[52px] bg-[#00594B] text-white text-[15px] font-semibold uppercase">
                    Save Publikasi
                </button>

            </div>

        </form>

    </div>

</div>