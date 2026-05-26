<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PagepublikasiIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public function render()
    {
        $publikasi = DB::table('publikasi')
            ->where('category', 'publikasi')
            ->where('status', 'publish')
            ->latest()
            ->paginate(8);

        return view('livewire.user.pagepublikasi-index', [
            'publikasi' => $publikasi
        ]);
    }
}