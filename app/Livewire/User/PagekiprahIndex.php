<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagekiprahIndex extends Component
{
    public $kiprah;

    public function mount()
    {
        $this->kiprah = DB::table('publikasi')
            ->where('category', 'kiprah')
            ->where('status', 'publish')
            ->latest()
            ->first();
    }

    public function render()
    {
        return view('livewire.user.pagekiprah-index');
    }
}