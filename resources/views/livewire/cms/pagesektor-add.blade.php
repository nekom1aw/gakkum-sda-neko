<div x-data="{ lang : 'id' }" class="max-w-7xl mx-auto px-6 lg:px-10 py-10">
    <div class="bg-white border border-gray-200">
        <div class="flex items-center justify-between px-6 py-5 border-b border-gray-200">
            <div>
                <h1 class="text-[30px] font-black text-gray-900">Add {{ $label }}</h1>
                <p class="mt-1 text-[15px] uppercase text-[#00594B] font-semibold">CMS Management</p>
            </div>
            <div class="flex items-center gap-2">
                <button type="button" @click="lang = 'id'" :class="lang === 'id' ? 'bg-[#00594B] text-white border-[#00594B]' : 'bg-white text-gray-700 border-gray-300'" class="w-[60px] h-[42px] border text-[14px] font-semibold uppercase transition-all duration-200">ID</button>
                <button type="button" @click="lang = 'en'" :class="lang === 'en' ? 'bg-[#00594B] text-white border-[#00594B]' : 'bg-white text-gray-700 border-gray-300'" class="w-[60px] h-[42px] border text-[14px] font-semibold uppercase transition-all duration-200">EN</button>
            </div>
        </div>

        <form wire:submit="save" class="px-6 py-6 space-y-8">
            <div>
                <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">Status</label>
                <select wire:model="status" class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">
                    <option value="draft">Draft</option>
                    <option value="publish">Publish</option>
                </select>
            </div>

            @foreach(['id', 'en'] as $lang)
                <div x-show="lang === '{{ $lang }}'" class="space-y-8">
                    <div>
                        <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">Title</label>
                        <input type="text" wire:model="title_{{ $lang }}" class="w-full border border-gray-300 px-4 h-[52px] text-[15px] outline-none focus:border-[#00594B]">
                        @error('title_' . $lang)
                            <p class="mt-2 text-[13px] text-red-500">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">Description</label>
                        <x-tinymce id="{{ $editorPrefix }}_description_{{ $lang }}_editor" model="description_{{ $lang }}" />
                    </div>
                    <div>
                        <label class="block text-[14px] font-semibold uppercase text-gray-700 mb-3">Source</label>
                        <x-tinymce id="{{ $editorPrefix }}_source_{{ $lang }}_editor" model="source_{{ $lang }}" />
                    </div>
                </div>
            @endforeach

            <div class="flex justify-end">
                <button type="submit" class="px-6 h-[52px] bg-[#00594B] text-white text-[15px] font-semibold uppercase">
                    Save {{ $label }}
                </button>
            </div>
        </form>
    </div>
</div>
