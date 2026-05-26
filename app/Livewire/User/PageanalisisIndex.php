<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PageanalisisIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public function render()
    {
        $analisis = DB::table('publikasi')
            ->where('category', 'analisis')
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        return view('livewire.user.pageanalisis-index', [
            'analisis' => $analisis
        ]);
    }
}