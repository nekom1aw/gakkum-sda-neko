<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PagekelautandanperikananIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public function render()
    {
        $data = DB::table('sektor')
            ->where('category', 'kelautan-dan-perikanan')
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        return view('livewire.user.pagekelautandanperikanan-index', [
            'data' => $data,
            'label' => 'Kelautan dan Perikanan',
        ]);
    }
}
 
