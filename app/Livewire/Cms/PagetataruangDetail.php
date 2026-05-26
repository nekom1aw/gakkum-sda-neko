<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagetataruangDetail extends Component
{
    public $tataruang;

    public function mount($id)
    {
        $this->tataruang = DB::table('sektor')
            ->where('id', $id)
            ->where('category', 'tata-ruang')
            ->first();

        abort_if(!$this->tataruang, 404);
    }

    public function render()
    {
        return view('livewire.cms.pagetataruang-detail');
    }
}
