<?php

namespace App\Livewire\Cms;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

class PageaboutEdit extends Component
{
    public $about;

    public $title_id;
    public $title_en;

    public $deskripsi_id;
    public $deskripsi_en;

    public $content_id;
    public $content_en;

    public $categori;

    public $isEdit = true;

    public function mount($id)
    {
        $this->about = DB::table('about')
            ->where('id', $id)
            ->first();

        abort_if(!$this->about, 404);

        $this->title_id = $this->about->title_id;
        $this->title_en = $this->about->title_en;

        $this->deskripsi_id = $this->about->deskripsi_id;
        $this->deskripsi_en = $this->about->deskripsi_en;

        $this->content_id = $this->about->content_id;
        $this->content_en = $this->about->content_en;

        $this->categori = $this->about->categori;
    }

    public function save()
    {
        DB::table('about')
            ->where('id', $this->about->id)
            ->update([
                'title_id' => $this->title_id,
                'title_en' => $this->title_en,

                'deskripsi_id' => $this->deskripsi_id,
                'deskripsi_en' => $this->deskripsi_en,

                'content_id' => $this->content_id,
                'content_en' => $this->content_en,

                'categori' => $this->categori,

                'updated_at' => now()
            ]);

        session()->flash('success', 'About updated successfully.');
    }

    public function render()
    {
        return view('livewire.cms.pageabout-edit');
    }
}