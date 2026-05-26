<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagetataruangIndex extends Component
{
    public $tataruang = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->tataruang = DB::table('sektor')
            ->where('category', 'tata-ruang')
            ->latest('created_at')
            ->get();
    }

    public function delete($id)
    {
        DB::table('sektor')
            ->where('id', $id)
            ->where('category', 'tata-ruang')
            ->delete();

        $this->loadData();

        session()->flash('success', 'Tata ruang berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.cms.pagetataruang-index');
    }
}
