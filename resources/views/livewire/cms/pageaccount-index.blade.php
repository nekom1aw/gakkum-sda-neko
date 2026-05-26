<div x-data="{ showToast: true }" x-init="setTimeout(() => showToast = false, 2000)"
    class="mx-auto max-w-7xl py-10 lg:px-10">

    <div class="mb-6 flex items-center justify-between gap-4">
        <div>
            <h1 class="text-[24px] font-bold text-black">
                Account
            </h1>

            <p class="mt-1 text-[14px] text-gray-500">
                Data akun CMS
            </p>
        </div>

        <div class="flex items-center gap-3">
            @if($passwordVisible)
                <button type="button" wire:click="hidePasswords"
                    class="inline-flex h-[40px] items-center justify-center border border-gray-300 px-5 text-[11px] font-bold uppercase text-gray-700">
                    Sembunyikan Password
                </button>
            @else
                <button type="button" wire:click="openUnlockModal"
                    class="inline-flex h-[40px] items-center justify-center border border-gray-300 px-5 text-[11px] font-bold uppercase text-gray-700">
                    Lihat Password
                </button>
            @endif

            <button type="button" wire:click="openAddModal"
                class="inline-flex h-[40px] items-center justify-center border border-[#007A63] px-5 text-[11px] font-bold uppercase text-[#007A63]">
                Add Account
            </button>
        </div>
    </div>

    @if (session()->has('success'))
        <div x-show="showToast" x-transition
            class="mb-6 border border-green-200 bg-green-50 px-4 py-3 text-[13px] text-green-700">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-hidden border border-gray-200 bg-white">
        <div class="grid grid-cols-12 border-b border-gray-200 bg-[#F9F9F9]">
            <div class="col-span-1 px-4 py-3 text-[11px] font-bold uppercase text-black">
                No
            </div>

            <div class="col-span-5 px-4 py-3 text-[11px] font-bold uppercase text-black">
                Nama
            </div>

            <div class="col-span-2 px-4 py-3 text-[11px] font-bold uppercase text-black">
                Role
            </div>

            <div class="col-span-4 px-4 py-3 text-[11px] font-bold uppercase text-black">
                Password
            </div>
        </div>

        @forelse ($accounts as $item)
            <button type="button" wire:click="openDetail({{ $item->id }})"
                class="grid w-full grid-cols-12 border-b border-gray-200 text-left transition hover:bg-gray-50">
                <div class="col-span-1 px-4 py-4 text-[13px] text-black">
                    {{ $loop->iteration }}
                </div>

                <div class="col-span-5 px-4 py-4">
                    <div class="text-[13px] font-semibold leading-relaxed text-black">
                        {{ $item->nama ?? '-' }}
                    </div>
                    <div class="mt-1 text-[12px] text-gray-500">
                        {{ $item->email ?? '-' }}
                    </div>
                </div>

                <div class="col-span-2 px-4 py-4">
                    @if($item->role === 'super_admin')
                        <div class="inline-flex border border-green-200 bg-green-50 px-3 py-1 text-[10px] font-bold uppercase text-green-700">
                            Super Admin
                        </div>
                    @else
                        <div class="inline-flex border border-blue-200 bg-blue-50 px-3 py-1 text-[10px] font-bold uppercase text-blue-700">
                            Admin
                        </div>
                    @endif
                </div>

                <div class="col-span-4 px-4 py-4 text-[13px] text-black">
                    @if($passwordVisible)
                        <span class="font-semibold">
                            {{ $item->password_text ?? '-' }}
                        </span>
                    @else
                        <span class="font-semibold tracking-[3px]">
                            ********
                        </span>
                    @endif
                </div>
            </button>
        @empty
            <div class="px-4 py-10 text-center text-[13px] text-gray-500">
                Data account belum tersedia.
            </div>
        @endforelse
    </div>

    @if($showDetailModal && $selectedAccount)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 px-4" wire:click.self="closeDetailModal">
            <div class="w-full max-w-2xl border border-gray-200 bg-white p-6">
                <div class="mb-6 flex items-start justify-between gap-4">
                    <div>
                        <h2 class="text-[24px] font-black text-gray-900">
                            {{ $detailMode === 'edit' ? 'Edit Account' : 'Detail Account' }}
                        </h2>
                        <p class="mt-1 text-[13px] text-gray-500">
                            {{ $detailMode === 'edit' ? 'Ubah data akun CMS.' : 'Data akun CMS secara lengkap.' }}
                        </p>
                    </div>

                    <button type="button" wire:click="closeDetailModal" class="text-[18px] font-bold text-gray-500">
                        x
                    </button>
                </div>

                @if($detailMode === 'detail')
                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Nama</label>
                            <input type="text" value="{{ $selectedAccount->nama ?? '-' }}" readonly class="h-[48px] w-full border border-gray-300 bg-gray-50 px-4 text-[15px] outline-none">
                        </div>
                        <div>
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Email</label>
                            <input type="text" value="{{ $selectedAccount->email ?? '-' }}" readonly class="h-[48px] w-full border border-gray-300 bg-gray-50 px-4 text-[15px] outline-none">
                        </div>
                        <div>
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Role</label>
                            <input type="text" value="{{ $selectedAccount->role ?? '-' }}" readonly class="h-[48px] w-full border border-gray-300 bg-gray-50 px-4 text-[15px] outline-none">
                        </div>
                        <div>
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Status</label>
                            <input type="text" value="{{ $selectedAccount->status ?? '-' }}" readonly class="h-[48px] w-full border border-gray-300 bg-gray-50 px-4 text-[15px] outline-none">
                        </div>
                        <div class="md:col-span-2">
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Password</label>
                            <input type="text" value="{{ $passwordVisible ? ($selectedAccount->password_text ?? '-') : '********' }}" readonly class="h-[48px] w-full border border-gray-300 bg-gray-50 px-4 text-[15px] outline-none">
                        </div>
                    </div>

                    <div class="mt-6 flex justify-end gap-3">
                        <button type="button" wire:click="closeDetailModal" class="h-[46px] border border-gray-300 px-5 text-[12px] font-bold uppercase text-gray-700">
                            Tutup
                        </button>
                        <button type="button" wire:click="openEditDetail" class="h-[46px] border border-[#00594B] px-5 text-[12px] font-bold uppercase text-[#00594B]">
                            Edit
                        </button>
                    </div>
                @else
                    <form wire:submit.prevent="updateSelectedAccount" class="space-y-5">
                        <div class="grid gap-5 md:grid-cols-2">
                            <div>
                                <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Nama</label>
                                <input type="text" wire:model="nama" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                                @error('nama') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Email</label>
                                <input type="email" wire:model="email" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                                @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Password Baru</label>
                                <input type="text" wire:model="password" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                                <p class="mt-2 text-xs text-gray-500">Kosongkan jika tidak ingin mengubah password.</p>
                                @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div>
                                <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Role</label>
                                <select wire:model="role" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                                    <option value="admin">Admin</option>
                                    <option value="super_admin">Super Admin</option>
                                </select>
                                @error('role') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                            <div class="md:col-span-2">
                                <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Status</label>
                                <select wire:model="status" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                                    <option value="Y">Aktif</option>
                                    <option value="N">Nonaktif</option>
                                </select>
                                @error('status') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        <div class="flex justify-end gap-3 pt-2">
                            <button type="button" wire:click="cancelEditDetail" class="h-[46px] border border-gray-300 px-5 text-[12px] font-bold uppercase text-gray-700">
                                Batal
                            </button>
                            <button type="submit" class="h-[46px] bg-[#00594B] px-5 text-[12px] font-bold uppercase text-white">
                                Update Account
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    @endif

    @if($showAddModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 px-4" wire:click.self="closeAddModal">
            <div class="w-full max-w-2xl border border-gray-200 bg-white p-6">
                <div class="mb-6 flex items-start justify-between gap-4">
                    <div>
                        <h2 class="text-[24px] font-black text-gray-900">Add Account</h2>
                        <p class="mt-1 text-[13px] text-gray-500">Buat akun CMS baru.</p>
                    </div>

                    <button type="button" wire:click="closeAddModal" class="text-[18px] font-bold text-gray-500">
                        x
                    </button>
                </div>

                <form wire:submit.prevent="save" class="space-y-5">
                    <div class="grid gap-5 md:grid-cols-2">
                        <div>
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Nama</label>
                            <input type="text" wire:model="nama" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                            @error('nama') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Email</label>
                            <input type="email" wire:model="email" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                            @error('email') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Password</label>
                            <input type="text" wire:model="password" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                            @error('password') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div>
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Role</label>
                            <select wire:model="role" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                                <option value="admin">Admin</option>
                                <option value="super_admin">Super Admin</option>
                            </select>
                            @error('role') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                        <div class="md:col-span-2">
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Status</label>
                            <select wire:model="status" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                                <option value="Y">Aktif</option>
                                <option value="N">Nonaktif</option>
                            </select>
                            @error('status') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>
                    </div>

                    <div class="flex justify-end gap-3 pt-2">
                        <button type="button" wire:click="closeAddModal" class="h-[46px] border border-gray-300 px-5 text-[12px] font-bold uppercase text-gray-700">
                            Batal
                        </button>
                        <button type="submit" class="h-[46px] bg-[#00594B] px-5 text-[12px] font-bold uppercase text-white">
                            Save Account
                        </button>
                    </div>
                </form>
            </div>
        </div>
    @endif

    @if($showUnlockModal)
        <div class="fixed inset-0 z-50 flex items-center justify-center bg-black/40 px-4" wire:click.self="closeUnlockModal">
            <div class="w-full max-w-md border border-gray-200 bg-white p-6">
                <div class="mb-6 flex items-start justify-between gap-4">
                    <div>
                        <h2 class="text-[24px] font-black text-gray-900">
                            {{ $passwordVisible ? 'Sembunyikan Password' : 'Lihat Password' }}
                        </h2>
                        <p class="mt-1 text-[13px] text-gray-500">
                            Masukkan password super admin untuk membuka password akun.
                        </p>
                    </div>

                    <button type="button" wire:click="closeUnlockModal" class="text-[18px] font-bold text-gray-500">
                        x
                    </button>
                </div>

                @if($passwordVisible)
                    <div class="rounded border border-green-200 bg-green-50 px-4 py-3 text-[13px] text-green-700">
                        Password akun sedang terlihat. Klik tombol di atas untuk menyembunyikan kembali.
                    </div>
                @else
                    <form wire:submit.prevent="unlockPasswords" class="space-y-5">
                        <div>
                            <label class="mb-2 block text-[13px] font-semibold uppercase text-gray-700">Password Super Admin</label>
                            <input type="password" wire:model="unlockPassword" class="h-[48px] w-full border border-gray-300 px-4 text-[15px] outline-none">
                            @error('unlockPassword') <p class="mt-2 text-sm text-red-600">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex justify-end gap-3 pt-2">
                            <button type="button" wire:click="closeUnlockModal" class="h-[46px] border border-gray-300 px-5 text-[12px] font-bold uppercase text-gray-700">
                                Batal
                            </button>
                            <button type="submit" class="h-[46px] bg-[#00594B] px-5 text-[12px] font-bold uppercase text-white">
                                Buka
                            </button>
                        </div>
                    </form>
                @endif
            </div>
        </div>
    @endif
</div>
