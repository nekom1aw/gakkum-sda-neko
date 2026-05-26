<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagedataIndex extends Component
{
    public $kasus;

    public $ahli;

    public function mount()
    {
        $this->kasus = DB::table('publikasi')
            ->where('category', 'data')
            ->where('slug_id', 'sebaran-kasus')
            ->where('status', 'publish')
            ->latest()
            ->first();

        $this->ahli = DB::table('publikasi')
            ->where('category', 'data')
            ->where('slug_id', 'sebaran-ahli')
            ->where('status', 'publish')
            ->latest()
            ->first();
    }

    public function render()
    {
        return view('livewire.user.pagedata-index');
    }
}