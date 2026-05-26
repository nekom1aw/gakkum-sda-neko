<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PagetataruangIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public function render()
    {
        $data = DB::table('sektor')
            ->where('category', 'tata-ruang')
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        return view('livewire.user.pagetataruang-index', [
            'data' => $data,
            'label' => 'Tata Ruang',
        ]);
    }
}
