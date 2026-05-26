<?php

namespace App\Livewire\Cms;

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
            ->first();

        $this->ahli = DB::table('publikasi')
            ->where('category', 'data')
            ->where('slug_id', 'sebaran-ahli')
            ->first();
    }

    public function render()
    {
        return view('livewire.cms.pagedata-index');
    }
}