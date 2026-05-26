<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageanalisisDetail extends Component
{
    public $id;

    public $slug;

    public $analisis;

    public $lainnya;

    public function mount($id, $slug)
    {
        $this->id = $id;

        $this->slug = $slug;

        $this->analisis = DB::table('publikasi')
            ->where('id', $id)
            ->where('category', 'analisis')
            ->where('status', 'publish')
            ->first();

        $this->lainnya = DB::table('publikasi')
            ->where('category', 'analisis')
            ->where('status', 'publish')
            ->where('id', '!=', $id)
            ->latest()
            ->limit(3)
            ->get();
    }

    public function render()
    {
        return view('livewire.user.pageanalisis-detail');
    }
}