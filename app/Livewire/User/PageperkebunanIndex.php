<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PageperkebunanIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public function render()
    {
        $data = DB::table('sektor')
            ->where('category', 'perkebunan')
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        return view('livewire.user.pageperkebunan-index', [
            'data' => $data,
            'label' => 'Perkebunan',
        ]);
    }
}
