<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagepublikasiIndex extends Component
{
    public $publikasi = [];

    public function mount()
    {
        $this->publikasi = DB::table('publikasi')
            ->where('category', 'publikasi')
            ->latest()
            ->get();
    }

    public function delete($id)
    {
        DB::table('publikasi')
            ->where('id', $id)
            ->delete();

        $this->publikasi = DB::table('publikasi')
            ->where('category', 'publikasi')
            ->latest()
            ->get();

        session()->flash('success', 'Publikasi berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.cms.pagepublikasi-index');
    }
}