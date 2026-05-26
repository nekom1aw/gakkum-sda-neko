<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class PageaccountIndex extends Component
{
    public $accounts = [];
    public $selectedAccount = null;
    public bool $showDetailModal = false;
    public string $detailMode = 'detail';
    public bool $showAddModal = false;
    public bool $showUnlockModal = false;
    public bool $passwordVisible = false;
    public string $nama = '';
    public string $email = '';
    public string $password = '';
    public string $role = 'admin';
    public string $status = 'Y';
    public string $unlockPassword = '';

    public function mount()
    {
        abort_unless(session('account_role') === 'super_admin', 403);

        $this->loadData();
        $this->passwordVisible = (bool) session('account_password_visible', false);
    }

    public function loadData()
    {
        $this->accounts = DB::table('accounts')
            ->orderByDesc('created_at')
            ->get();
    }

    public function resetForm()
    {
        $this->nama = '';
        $this->email = '';
        $this->password = '';
        $this->role = 'admin';
        $this->status = 'Y';
    }

    public function resetUnlockForm()
    {
        $this->unlockPassword = '';
    }

    public function openAddModal()
    {
        $this->resetForm();
        $this->showAddModal = true;
    }

    public function openDetail($id)
    {
        $this->selectedAccount = DB::table('accounts')->where('id', $id)->first();

        abort_if(!$this->selectedAccount, 404);

        $this->detailMode = 'detail';
        $this->showDetailModal = true;
    }

    public function closeDetailModal()
    {
        $this->showDetailModal = false;
        $this->detailMode = 'detail';
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openEditDetail()
    {
        if (!$this->selectedAccount) {
            return;
        }

        $this->nama = $this->selectedAccount->nama ?? '';
        $this->email = $this->selectedAccount->email ?? '';
        $this->role = $this->selectedAccount->role ?? 'admin';
        $this->status = $this->selectedAccount->status ?? 'Y';
        $this->password = '';
        $this->detailMode = 'edit';
    }

    public function cancelEditDetail()
    {
        $this->detailMode = 'detail';
        $this->resetErrorBag();
        $this->resetValidation();
        $this->password = '';
    }

    public function closeAddModal()
    {
        $this->showAddModal = false;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function openUnlockModal()
    {
        $this->resetUnlockForm();
        $this->showUnlockModal = true;
    }

    public function closeUnlockModal()
    {
        $this->showUnlockModal = false;
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function unlockPasswords()
    {
        $this->validate([
            'unlockPassword' => 'required|min:6',
        ]);

        $account = DB::table('accounts')->where('id', session('account_id'))->first();

        if (!$account || !Hash::check($this->unlockPassword, $account->password)) {
            $this->addError('unlockPassword', 'Password super admin salah.');
            return;
        }

        session()->put('account_password_visible', true);
        $this->passwordVisible = true;
        $this->showUnlockModal = false;
        $this->resetUnlockForm();

        session()->flash('success', 'Password akun berhasil dibuka.');
    }

    public function hidePasswords()
    {
        session()->forget('account_password_visible');
        $this->passwordVisible = false;
        $this->resetUnlockForm();
        $this->closeUnlockModal();

        session()->flash('success', 'Password akun disembunyikan.');
    }

    public function save()
    {
        $this->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts,email',
            'password' => 'required|min:6',
            'role' => 'required|in:super_admin,admin',
            'status' => 'required|in:Y,N',
        ]);

        DB::table('accounts')->insert([
            'nama' => $this->nama,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'password_text' => $this->password,
            'role' => $this->role,
            'status' => $this->status,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flash('success', 'Account berhasil ditambahkan.');

        $this->closeAddModal();
        $this->loadData();
    }

    public function updateSelectedAccount()
    {
        if (!$this->selectedAccount) {
            return;
        }

        $this->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:accounts,email,' . $this->selectedAccount->id,
            'password' => 'nullable|min:6',
            'role' => 'required|in:super_admin,admin',
            'status' => 'required|in:Y,N',
        ]);

        $payload = [
            'nama' => $this->nama,
            'email' => $this->email,
            'role' => $this->role,
            'status' => $this->status,
            'updated_at' => now(),
        ];

        if (filled($this->password)) {
            $payload['password'] = Hash::make($this->password);
            $payload['password_text'] = $this->password;
        }

        DB::table('accounts')
            ->where('id', $this->selectedAccount->id)
            ->update($payload);

        session()->flash('success', 'Account berhasil diupdate.');

        $this->loadData();
        $this->selectedAccount = DB::table('accounts')->where('id', $this->selectedAccount->id)->first();
        $this->detailMode = 'detail';
        $this->password = '';
    }

    public function render()
    {
        return view('livewire.cms.pageaccount-index');
    }
}
