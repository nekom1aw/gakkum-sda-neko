<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagepublikasiDetail extends Component
{
    public $publikasi;

    public $download;

    public function mount($id)
    {
        $this->publikasi = DB::table('publikasi')
            ->where('id', $id)
            ->where('category', 'publikasi')
            ->first();

        abort_if(!$this->publikasi, 404);

        $this->download = DB::table('file_publikasi')
            ->where('publikasi_id', $id)
            ->where('type', 'download')
            ->first();
    }

    public function render()
    {
        return view('livewire.cms.pagepublikasi-detail');
    }
}