<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagepencemaranAdd extends Component
{
    public $status = 'draft';

    public $title_id;
    public $title_en;

    public $description_id;
    public $description_en;

    public $source_id;
    public $source_en;

    public function save()
    {
        $this->validate([
            'title_id' => 'required',
            'title_en' => 'required',
        ]);

        DB::table('sektor')->insert([
            'category' => 'pencemaran',
            'status' => $this->status,
            'title_id' => $this->title_id,
            'title_en' => $this->title_en,
            'description_id' => $this->description_id,
            'description_en' => $this->description_en,
            'source_id' => $this->source_id,
            'source_en' => $this->source_en,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flash('success', 'Pencemaran berhasil ditambahkan.');

        return redirect()->route('cms.sektor.pencemaran.index', [
            'locale' => app()->getLocale(),
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pagepencemaran-add');
    }
}
