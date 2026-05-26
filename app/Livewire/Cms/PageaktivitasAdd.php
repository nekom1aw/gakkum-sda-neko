<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class PageaktivitasAdd extends Component
{
    use WithFileUploads;

    public $status = 'draft';

    public $tanggal;

    public $jenis_kegiatan_id;
    public $jenis_kegiatan_en;

    public $image_id;
    public $image_en;

    public $title_id;
    public $title_en;

    public $deskripsi_id;
    public $deskripsi_en;

    public $content_id;
    public $content_en;

    public function save()
    {
        $imageId = null;
        $imageEn = null;

        if ($this->image_id) {
            $imageId = $this->image_id->store('photos', 'public');
        }

        if ($this->image_en) {
            $imageEn = $this->image_en->store('photos', 'public');
        }

        DB::table('kegiatan')->insert([

            'kategori' => 'aktivitas',

            'jenis_kegiatan_id' => $this->jenis_kegiatan_id,
            'jenis_kegiatan_en' => $this->jenis_kegiatan_en,

            'tanggal' => $this->tanggal,

            'image_id' => $imageId,
            'image_en' => $imageEn,

            'title_id' => $this->title_id,
            'title_en' => $this->title_en,

            'deskripsi_id' => $this->deskripsi_id,
            'deskripsi_en' => $this->deskripsi_en,

            'content_id' => $this->content_id,
            'content_en' => $this->content_en,

            'status' => $this->status,

            'created_at' => now(),
            'updated_at' => now(),

        ]);

        session()->flash(
            'success',
            'Aktivitas berhasil ditambahkan.'
        );

        return redirect()->route('cms.aktivitas.index', [
            'locale' => app()->getLocale()
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pageaktivitas-add');
    }
}