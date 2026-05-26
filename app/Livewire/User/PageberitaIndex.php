<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithPagination;

class PageberitaIndex extends Component
{
    use WithPagination;

    protected $paginationTheme = 'custom';

    public function render()
    {
        $berita = DB::table('publikasi')

            ->leftJoin('file_publikasi', function ($join) {

                $join->on('publikasi.id', '=', 'file_publikasi.publikasi_id')
                    ->where('file_publikasi.type', 'source');

            })

            ->where('publikasi.category', 'berita')
            ->where('publikasi.status', 'publish')

            ->select(
                'publikasi.*',
                'file_publikasi.source_id',
                'file_publikasi.source_en'
            )

            ->latest('publikasi.id')
            ->paginate(6);

        return view('livewire.user.pageberita-index', [
            'berita' => $berita
        ]);
    }
}