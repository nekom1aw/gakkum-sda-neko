<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageinvestigasiDetail extends Component
{
    public $id;

    public $investigasi;

    public $lainnya = [];

    public function mount($id)
    {
        $this->id = $id;

        $this->investigasi = DB::table('publikasi')
            ->where('id', $id)
            ->where('category', 'investigasi')
            ->first();

        $this->lainnya = DB::table('publikasi')
            ->where('category', 'investigasi')
            ->where('id', '!=', $id)
            ->latest()
            ->limit(3)
            ->get();
    }

    public function delete($id)
    {
        DB::table('publikasi')
            ->where('id', $id)
            ->delete();

        return redirect()->route('cms.investigasi.index', [
            'locale' => app()->getLocale()
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pageinvestigasi-detail');
    }
}