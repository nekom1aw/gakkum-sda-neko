<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageaktivitasDetail extends Component
{
    public $id;

    public $aktivitas;

    public function mount($id)
    {
        $this->id = $id;

        $this->aktivitas = DB::table('kegiatan')
            ->where('id', $id)
            ->where('kategori', 'aktivitas')
            ->first();
    }

    public function render()
    {
        return view('livewire.cms.pageaktivitas-detail');
    }
}