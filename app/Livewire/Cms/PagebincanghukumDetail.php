<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagebincanghukumDetail extends Component
{
    public $id;

    public $bincanghukum;

    public function mount($id)
    {
        $this->id = $id;

        $this->bincanghukum = DB::table('kegiatan')
            ->where('id', $id)
            ->where('kategori', 'bincang-hukum')
            ->first();
    }

    public function render()
    {
        return view('livewire.cms.pagebincanghukum-detail');
    }
}