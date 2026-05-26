<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagepublikasiDetail extends Component
{
    public $id;

    public $slug;

    public $publikasi;

    public $download;

    public function mount($id, $slug)
    {
        $this->id = $id;

        $this->slug = $slug;

        $this->publikasi = DB::table('publikasi')
            ->where('id', $id)
            ->where('category', 'publikasi')
            ->where('status', 'publish')
            ->first();

        $this->download = DB::table('file_publikasi')
            ->where('publikasi_id', $id)
            ->where('type', 'download')
            ->first();
    }

    public function render()
    {
        return view('livewire.user.pagepublikasi-detail');
    }
}