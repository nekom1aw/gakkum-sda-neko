<div x-data="{ lang : 'id' }" class="max-w-7xl mx-auto px-6 lg:px-10 py-10">
    <div class="bg-white border border-gray-200">
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">
            <div>
                <h1 class="text-[30px] font-black text-gray-900">Edit {{ $label }}</h1>
                <p class="mt-1 text-[15px] uppercase text-[#00594B] font-semibold">CMS Management</p>
            </div>
            <button type="button" @click="lang = lang === 'id' ? 'en' : 'id'" class="px-5 h-[42px] bg-[#00594B] text-white text-[14px] font-semibold uppercase">
                <span x-text="lang === 'id' ? 'EN' : 'ID'"></span>
            </button>
        </div>

        @if(session()->has('success'))
            <div class="mx-6 mt-6 border border-green-200 bg-green-50 px-4 py-3 text-[14px] text-green-700">
                {{ session('success') }}
            </div>
        @endif

        <form wire:submit.prevent="update" class="px-6 py-6 space-y-8">
            <div>
                <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">Status</label>
                <select wire:model="status" class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">
                    <option value="draft">Draft</option>
                    <option value="publish">Publish</option>
                </select>
            </div>

            @foreach(['id', 'en'] as $lang)
                <div x-show="lang === '{{ $lang }}'" class="space-y-8">
                    <div>
                        <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">Title</label>
                        <input type="text" wire:model.live="title_{{ $lang }}" class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">
                        @error('title_' . $lang)
                            <p class="mt-2 text-[13px] text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">Description</label>
                        <x-tinymce id="{{ $editorPrefix }}_edit_description_{{ $lang }}_editor" model="description_{{ $lang }}" />
                    </div>
                    <div>
                        <label class="block mb-3 text-[14px] font-semibold uppercase text-gray-700">Source</label>
                        <x-tinymce id="{{ $editorPrefix }}_edit_source_{{ $lang }}_editor" model="source_{{ $lang }}" />
                    </div>
                </div>
            @endforeach

            <div class="flex justify-end">
                <button type="submit" class="px-6 h-[52px] bg-[#00594B] text-white text-[15px] font-semibold uppercase">Save Changes</button>
            </div>
        </form>
    </div>
</div>
