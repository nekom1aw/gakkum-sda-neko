<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

abstract class SektorIndex extends Component
{
    public $items = [];

    protected string $category;
    protected string $label;
    protected string $routeName;

    public function mount()
    {
        $this->loadData();
    }

    public function loadData()
    {
        $this->items = DB::table('sektor')
            ->where('category', $this->category)
            ->latest('created_at')
            ->get();
    }

    public function delete($id)
    {
        DB::table('sektor')
            ->where('id', $id)
            ->where('category', $this->category)
            ->delete();

        $this->loadData();

        session()->flash('success', $this->label . ' berhasil dihapus.');
    }

    public function render()
    {
        return view('livewire.cms.pagesektor-index', [
            'label' => $this->label,
            'routeName' => $this->routeName,
        ]);
    }
}
