<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PageenergidansumberdayamineralIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public function render()
    {
        $data = DB::table('sektor')
            ->where('category', 'energi-dan-sumber-daya-mineral')
            ->where('status', 'publish')
            ->latest()
            ->paginate(6);

        return view('livewire.user.pageenergidansumberdayamineral-index', [
            'data' => $data,
            'label' => 'Energi dan Sumber Daya Mineral',
        ]);
    }
}
