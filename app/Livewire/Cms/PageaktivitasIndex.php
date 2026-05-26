<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageaktivitasIndex extends Component
{
    public $data = [];

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->data = DB::table('kegiatan')
            ->where('kategori', 'aktivitas')
            ->orderBy('tanggal', 'desc')
            ->get();
    }

    public function delete($id)
    {
        DB::table('kegiatan')
            ->where('id', $id)
            ->delete();

        session()->flash(
            'success',
            'Aktivitas berhasil dihapus.'
        );

        $this->getData();
    }

    public function render()
    {
        return view('livewire.cms.pageaktivitas-index');
    }
}