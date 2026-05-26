<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class PageagendaAdd extends Component
{
    public $status = 'draft';

    public $date;

    public $jenis_kegiatan;

    // indonesia
    public $title_id;
    public $description_id;
    public $content_id;

    // english
    public $title_en;
    public $description_en;
    public $content_en;

    public function save()
    {
        DB::table('agenda')->insert([

            'status' => $this->status,

            'jenis_kegiatan' => $this->jenis_kegiatan,

            'date' => $this->date,

            // indonesia
            'slug_id' => $this->title_id
                ? Str::slug($this->title_id)
                : null,

            'title_id' => $this->title_id,

            'description_id' => $this->description_id,

            'content_id' => $this->content_id,

            // english
            'slug_en' => $this->title_en
                ? Str::slug($this->title_en)
                : null,

            'title_en' => $this->title_en,

            'description_en' => $this->description_en,

            'content_en' => $this->content_en,

            'created_at' => now(),
            'updated_at' => now(),

        ]);

        session()->flash(
            'success',
            'Agenda berhasil ditambahkan.'
        );

        return redirect()->route('cms.agenda.index', [
            'locale' => app()->getLocale()
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pageagenda-add');
    }
}