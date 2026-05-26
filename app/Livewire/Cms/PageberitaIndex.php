<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageberitaIndex extends Component
{
    public $berita = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->berita = DB::table('publikasi')
            ->where('category', 'berita')
            ->latest('created_at')
            ->get()
            ->map(function ($item) {

                $source = DB::table('file_publikasi')
                    ->where('publikasi_id', $item->id)
                    ->where('type', 'source')
                    ->first();

                $item->source_id = $source->source_id ?? null;
                $item->source_en = $source->source_en ?? null;

                return $item;
            });
    }

    public function delete($id)
    {
        DB::table('file_publikasi')
            ->where('publikasi_id', $id)
            ->delete();

        DB::table('publikasi')
            ->where('id', $id)
            ->delete();

        $this->loadData();

        session()->flash('success', 'Berita berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.cms.pageberita-index');
    }
}