<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PagepublikasiEdit extends Component
{
    use WithFileUploads;

    public $publikasiId;

    // status
    public $status;

    // image
    public $image_id;
    public $image_en;

    // old image
    public $old_image_id;
    public $old_image_en;

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

    public function mount($id)
    {
        $publikasi = DB::table('publikasi')
            ->where('id', $id)
            ->where('category', 'publikasi')
            ->first();

        abort_if(!$publikasi, 404);

        $download = DB::table('file_publikasi')
            ->where('publikasi_id', $id)
            ->where('type', 'download')
            ->first();

        $this->publikasiId = $publikasi->id;

        // status
        $this->status = $publikasi->status;

        // old image
        $this->old_image_id = $publikasi->image_id;
        $this->old_image_en = $publikasi->image_en;

        // title
        $this->title_id = $publikasi->title_id;
        $this->title_en = $publikasi->title_en;

        // description
        $this->description_id = $publikasi->description_id;
        $this->description_en = $publikasi->description_en;

        // content
        $this->content_id = $publikasi->content_id;
        $this->content_en = $publikasi->content_en;

        // download
        $this->download_id = $download?->source_id;
        $this->download_en = $download?->source_en;
    }

    public function save()
    {
        $this->validate([
            'title_id' => 'required',
            'title_en' => 'required',
        ]);

        $imageIdPath = $this->old_image_id;
        $imageEnPath = $this->old_image_en;

        // upload image id
        if ($this->image_id instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {

            $imageIdPath = $this->image_id
                ->store('publikasi', 'public');
        }

        // upload image en
        if ($this->image_en instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {

            $imageEnPath = $this->image_en
                ->store('publikasi', 'public');
        }

        // update publikasi
        DB::table('publikasi')
            ->where('id', $this->publikasiId)
            ->update([

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

                'updated_at' => now(),
            ]);

        // check download
        $checkDownload = DB::table('file_publikasi')
            ->where('publikasi_id', $this->publikasiId)
            ->where('type', 'download')
            ->first();

        if ($checkDownload) {

            DB::table('file_publikasi')
                ->where('id', $checkDownload->id)
                ->update([

                    'source_id' => $this->download_id,
                    'source_en' => $this->download_en,

                    'updated_at' => now(),
                ]);

        } else {

            DB::table('file_publikasi')->insert([

                'publikasi_id' => $this->publikasiId,

                'type' => 'download',

                'source_id' => $this->download_id,
                'source_en' => $this->download_en,

                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        session()->flash('success', 'Publikasi berhasil diperbarui.');

        return redirect()->route('cms.publikasi.detail', [
            'locale' => app()->getLocale(),
            'id' => $this->publikasiId
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pagepublikasi-edit');
    }
}