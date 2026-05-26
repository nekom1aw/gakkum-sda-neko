<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagepencemaranIndex extends Component
{
    public $pencemaran = [];

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->pencemaran = DB::table('sektor')
            ->where('category', 'pencemaran')
            ->latest('created_at')
            ->get();
    }

    public function delete($id)
    {
        DB::table('sektor')
            ->where('id', $id)
            ->where('category', 'pencemaran')
            ->delete();

        $this->loadData();

        session()->flash('success', 'Pencemaran berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.cms.pagepencemaran-index');
    }
}
