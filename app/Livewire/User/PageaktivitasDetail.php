<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageaktivitasDetail extends Component
{
    public $id;

    public $slug;

    public $aktivitas;

    public $lainnya;

    public function mount($id, $slug)
    {
        $this->id = $id;

        $this->slug = $slug;

        $this->aktivitas = DB::table('kegiatan')
            ->where('id', $id)
            ->where('kategori', 'aktivitas')
            ->where('status', 'publish')
            ->first();

        $this->lainnya = DB::table('kegiatan')
            ->where('kategori', 'aktivitas')
            ->where('status', 'publish')
            ->where('id', '!=', $id)
            ->latest()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.user.pageaktivitas-detail');
    }
}