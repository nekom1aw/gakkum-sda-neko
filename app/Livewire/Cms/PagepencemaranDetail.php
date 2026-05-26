<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagepencemaranDetail extends Component
{
    public $pencemaran;

    public function mount($id)
    {
        $this->pencemaran = DB::table('sektor')
            ->where('id', $id)
            ->where('category', 'pencemaran')
            ->first();

        abort_if(!$this->pencemaran, 404);
    }

    public function render()
    {
        return view('livewire.cms.pagepencemaran-detail');
    }
}
