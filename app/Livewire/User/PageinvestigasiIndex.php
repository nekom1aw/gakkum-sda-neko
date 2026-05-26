<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PageinvestigasiIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public function render()
    {
        $investigasi = DB::table('publikasi')
            ->where('category', 'investigasi')
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        return view('livewire.user.pageinvestigasi-index', [
            'investigasi' => $investigasi
        ]);
    }
}