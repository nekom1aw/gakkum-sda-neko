<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageanalisisIndex extends Component
{
    public $analisis = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->analisis = DB::table('publikasi')
            ->where('category', 'analisis')
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
            'Analisis berhasil dihapus.'
        );

        $this->loadData();
    }

    public function render()
    {
        return view('livewire.cms.pageanalisis-index');
    }
}