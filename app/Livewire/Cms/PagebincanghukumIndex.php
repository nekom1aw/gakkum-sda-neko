<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagebincanghukumIndex extends Component
{
    public $data = [];

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->data = DB::table('kegiatan')
            ->where('kategori', 'bincang-hukum')
            ->orderBy('id', 'desc')
            ->get();
    }

    public function delete($id)
    {
        DB::table('kegiatan')
            ->where('id', $id)
            ->delete();

        $this->getData();
    }

    public function render()
    {
        return view('livewire.cms.pagebincanghukum-index');
    }
}