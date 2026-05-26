<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PageaktivitasIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public function render()
    {
        $aktivitas = DB::table('kegiatan')
            ->where('kategori', 'aktivitas')
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        return view('livewire.user.pageaktivitas-index', [
            'aktivitas' => $aktivitas
        ]);
    }
}