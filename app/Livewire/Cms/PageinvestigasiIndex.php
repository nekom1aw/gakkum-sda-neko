<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageinvestigasiIndex extends Component
{
    public $investigasi = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->investigasi = DB::table('publikasi')
            ->where('category', 'investigasi')
            ->latest('created_at')
            ->get();
    }

    public function delete($id)
    {
        DB::table('publikasi')
            ->where('id', $id)
            ->delete();

        session()->flash(
            'success',
            'Investigasi berhasil dihapus.'
        );

        $this->loadData();
    }

    public function render()
    {
        return view('livewire.cms.pageinvestigasi-index');
    }
}