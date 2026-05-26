<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageinvestigasiDetail extends Component
{
    public $id;

    public $slug;

    public $investigasi;

    public $lainnya;

    public function mount($id, $slug)
    {
        $this->id = $id;

        $this->slug = $slug;

        $this->investigasi = DB::table('publikasi')
            ->where('id', $id)
            ->where('category', 'investigasi')
            ->where('status', 'publish')
            ->first();

        $this->lainnya = DB::table('publikasi')
            ->where('category', 'investigasi')
            ->where('status', 'publish')
            ->where('id', '!=', $id)
            ->latest()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.user.pageinvestigasi-detail');
    }
}