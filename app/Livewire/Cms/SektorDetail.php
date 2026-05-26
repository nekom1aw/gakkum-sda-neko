<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

abstract class SektorDetail extends Component
{
    public $item;

    protected string $category;
    protected string $label;
    protected string $routeName;

    public function mount($id)
    {
        $this->item = DB::table('sektor')
            ->where('id', $id)
            ->where('category', $this->category)
            ->first();

        abort_if(!$this->item, 404);
    }

    public function render()
    {
        return view('livewire.cms.pagesektor-detail', [
            'label' => $this->label,
            'routeName' => $this->routeName,
        ]);
    }
}
