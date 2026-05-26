<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PagepublikasiAdd extends Component
{
    use WithFileUploads;

    // status
    public $status = 'draft';

    // image
    public $image_id;
    public $image_en;

    // title
    public $title_id;
    public $title_en;

    // description
    public $description_id;
    public $description_en;

    // content
    public $content_id;
    public $content_en;

    // download
    public $download_id;
    public $download_en;

    public function save()
    {
        $this->validate([
            'title_id' => 'required',
            'title_en' => 'required',
        ]);

        $imageIdPath = null;
        $imageEnPath = null;

        // upload image id
        if ($this->image_id) {

            $imageIdPath = $this->image_id
                ->store('publikasi', 'public');
        }

        // upload image en
        if ($this->image_en) {

            $imageEnPath = $this->image_en
                ->store('publikasi', 'public');
        }

        // insert publikasi
        $publikasiId = DB::table('publikasi')->insertGetId([

            'category' => 'publikasi',

            'status' => $this->status,

            'slug_id' => Str::slug($this->title_id),
            'slug_en' => Str::slug($this->title_en),

            'image_id' => $imageIdPath,
            'image_en' => $imageEnPath,

            'title_id' => $this->title_id,
            'title_en' => $this->title_en,

            'description_id' => $this->description_id,
            'description_en' => $this->description_en,

            'content_id' => $this->content_id,
            'content_en' => $this->content_en,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // insert download link
        DB::table('file_publikasi')->insert([

            'publikasi_id' => $publikasiId,

            'type' => 'download',

            'source_id' => $this->download_id,
            'source_en' => $this->download_en,

            'created_at' => now(),
            'updated_at' => now(),
        ]);

        session()->flash('success', 'Publikasi berhasil ditambahkan.');

        return redirect()->route('cms.publikasi.index', [
            'locale' => app()->getLocale()
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pagepublikasi-add');
    }
}