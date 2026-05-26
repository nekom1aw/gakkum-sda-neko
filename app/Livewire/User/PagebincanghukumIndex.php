<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PagebincanghukumIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public function render()
    {
        $data = DB::table('kegiatan')
            ->where('kategori', 'bincang-hukum')
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        return view('livewire.user.pagebincanghukum-index', [
            'data' => $data
        ]);
    }
}