<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PageberitaEdit extends Component
{
    public $idBerita;

    public $title_id;
    public $title_en;

    public $description_id;
    public $description_en;

    public $content_id;
    public $content_en;

    public $source_id;
    public $source_en;

    public $status;

    public function mount($id)
    {
        $this->idBerita = $id;

        $berita = DB::table('publikasi')
            ->where('id', $id)
            ->first();

        if (!$berita) {
            abort(404);
        }

        $source = DB::table('file_publikasi')
            ->where('publikasi_id', $id)
            ->where('type', 'source')
            ->first();

        $this->title_id = $berita->title_id;
        $this->title_en = $berita->title_en;

        $this->description_id = $berita->description_id;
        $this->description_en = $berita->description_en;

        $this->content_id = $berita->content_id;
        $this->content_en = $berita->content_en;

        $this->status = $berita->status;

        $this->source_id = $source->source_id ?? '';
        $this->source_en = $source->source_en ?? '';
    }

    public function update()
    {
        DB::table('publikasi')
            ->where('id', $this->idBerita)
            ->update([

                'title_id' => $this->title_id,
                'title_en' => $this->title_en,

                'description_id' => $this->description_id,
                'description_en' => $this->description_en,

                'content_id' => $this->content_id,
                'content_en' => $this->content_en,

                'status' => $this->status,

                'updated_at' => now(),
            ]);

        $checkSource = DB::table('file_publikasi')
            ->where('publikasi_id', $this->idBerita)
            ->where('type', 'source')
            ->first();

        if ($checkSource) {

            DB::table('file_publikasi')
                ->where('id', $checkSource->id)
                ->update([

                    'source_id' => $this->source_id,
                    'source_en' => $this->source_en,
                ]);

        } else {

            DB::table('file_publikasi')
                ->insert([

                    'publikasi_id' => $this->idBerita,

                    'type' => 'source',

                    'source_id' => $this->source_id,
                    'source_en' => $this->source_en,

                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
        }

        session()->flash('success', 'Berita berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.cms.pageberita-edit');
    }
}