<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageagendaIndex extends Component
{
    public $data = [];

    public function mount()
    {
        $this->getData();
    }

    public function getData()
    {
        $this->data = DB::table('agenda')
            ->orderBy('date', 'desc')
            ->get();
    }

    public function delete($id)
    {
        DB::table('agenda')
            ->where('id', $id)
            ->delete();

        session()->flash(
            'success',
            'Agenda berhasil dihapus.'
        );

        $this->getData();
    }

    public function render()
    {
        return view('livewire.cms.pageagenda-index');
    }
}