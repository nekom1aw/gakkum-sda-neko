<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagebincanghukumDetail extends Component
{
    public $id;

    public $slug;

    public $bincanghukum;

    public $lainnya;

    public function mount($id, $slug)
    {
        $this->id = $id;

        $this->slug = $slug;

        $this->bincanghukum = DB::table('kegiatan')
            ->where('id', $id)
            ->where('kategori', 'bincang-hukum')
            ->where('status', 'publish')
            ->first();

        $this->lainnya = DB::table('kegiatan')
            ->where('kategori', 'bincang-hukum')
            ->where('status', 'publish')
            ->where('id', '!=', $id)
            ->latest()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.user.pagebincanghukum-detail');
    }
}