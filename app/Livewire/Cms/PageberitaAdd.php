<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class PageberitaAdd extends Component
{
    // status
    public $status = 'draft';

    // title
    public $title_id;
    public $title_en;

    // description
    public $description_id;
    public $description_en;

    // source
    public $source_id;
    public $source_en;

    public function save()
    {
        $this->validate([
            'title_id' => 'required',
            'title_en' => 'required',
        ]);

        // insert berita
        $beritaId = DB::table('publikasi')->insertGetId([

            'category' => 'berita',

            'status' => $this->status,

            'slug_id' => Str::slug($this->title_id),
            'slug_en' => Str::slug($this->title_en),

            'title_id' => $this->title_id,
            'title_en' => $this->title_en,

            'description_id' => $this->description_id,
            'description_en' => $this->description_en,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // insert source
        DB::table('file_publikasi')->insert([

            'publikasi_id' => $beritaId,

            'type' => 'source',

            'source_id' => $this->source_id,
            'source_en' => $this->source_en,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flash('success', 'Berita berhasil ditambahkan.');

        return redirect()->route('cms.berita.index', [
            'locale' => app()->getLocale()
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pageberita-add');
    }
}