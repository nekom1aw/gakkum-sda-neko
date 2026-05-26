<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagetentangprogramIndex extends Component
{
    public $about;

    public function mount()
    {
        $this->about = DB::table('about')
            ->where('categori', 'program')
            ->first();
    }

    public function render()
    {
        return view('livewire.user.pagetentangprogram-index');
    }
}