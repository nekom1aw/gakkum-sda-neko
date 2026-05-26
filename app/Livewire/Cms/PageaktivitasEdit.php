<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class PageaktivitasEdit extends Component
{
    use WithFileUploads;

    public $id;

    public $status;

    public $tanggal;

    public $jenis_kegiatan_id;
    public $jenis_kegiatan_en;

    public $old_image_id;
    public $old_image_en;

    public $image_id;
    public $image_en;

    public $title_id;
    public $title_en;

    public $deskripsi_id;
    public $deskripsi_en;

    public $content_id;
    public $content_en;

    public function mount($id)
    {
        $this->id = $id;

        $data = DB::table('kegiatan')
            ->where('id', $id)
            ->where('kategori', 'aktivitas')
            ->first();

        $this->status = $data->status;

        $this->tanggal = $data->tanggal;

        $this->jenis_kegiatan_id = $data->jenis_kegiatan_id;
        $this->jenis_kegiatan_en = $data->jenis_kegiatan_en;

        $this->old_image_id = $data->image_id;
        $this->old_image_en = $data->image_en;

        $this->title_id = $data->title_id;
        $this->title_en = $data->title_en;

        $this->deskripsi_id = $data->deskripsi_id;
        $this->deskripsi_en = $data->deskripsi_en;

        $this->content_id = $data->content_id;
        $this->content_en = $data->content_en;
    }

    public function update()
    {
        $imageId = $this->old_image_id;
        $imageEn = $this->old_image_en;

        if ($this->image_id) {
            $imageId = $this->image_id->store('photos', 'public');
        }

        if ($this->image_en) {
            $imageEn = $this->image_en->store('photos', 'public');
        }

        DB::table('kegiatan')
            ->where('id', $this->id)
            ->update([

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

                'updated_at' => now(),

            ]);

        session()->flash(
            'success',
            'Aktivitas berhasil diupdate.'
        );

        return redirect()->route('cms.aktivitas.detail', [
            'locale' => app()->getLocale(),
            'id' => $this->id
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pageaktivitas-edit');
    }
}