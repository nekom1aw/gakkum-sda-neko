<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageanalisisDetail extends Component
{
    public $id;

    public $analisis;

    public $lainnya = [];

    public function mount($id)
    {
        $this->id = $id;

        $this->analisis = DB::table('publikasi')
            ->where('id', $id)
            ->where('category', 'analisis')
            ->first();

        $this->lainnya = DB::table('publikasi')
            ->where('category', 'analisis')
            ->where('id', '!=', $id)
            ->latest()
            ->limit(3)
            ->get();
    }

    public function delete($id)
    {
        DB::table('publikasi')
            ->where('id', $id)
            ->delete();

        return redirect()->route('cms.analisis.index', [
            'locale' => app()->getLocale()
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pageanalisis-detail');
    }
}