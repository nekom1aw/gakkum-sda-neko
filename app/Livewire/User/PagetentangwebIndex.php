<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagetentangwebIndex extends Component
{
    public $about;

    public function mount()
    {
        $this->about = DB::table('about')
            ->where('categori', 'web')
            ->first();
    }

    public function render()
    {
        return view('livewire.user.pagetentangweb-index');
    }
}