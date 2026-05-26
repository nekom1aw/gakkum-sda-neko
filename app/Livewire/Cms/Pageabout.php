<?php

namespace App\Livewire\Cms;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class Pageabout extends Component
{
    public $web;
    public $program;

    public function mount()
    {
        $this->web = DB::table('about')
            ->where('categori', 'web')
            ->first();

        $this->program = DB::table('about')
            ->where('categori', 'program')
            ->first();
    }

    public function render()
    {
        return view('livewire.cms.pageabout');
    }
}