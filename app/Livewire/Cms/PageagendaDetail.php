<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageagendaDetail extends Component
{
    public $agenda;

    public function mount($id)
    {
        $this->agenda = DB::table('agenda')
            ->where('id', $id)
            ->first();
    }

    public function render()
    {
        return view('livewire.cms.pageagenda-detail');
    }
}