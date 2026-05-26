<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PageinvestigasiEdit extends Component
{
    use WithFileUploads;

    // ID
    public $id;

    // STATUS
    public $status;

    // TITLE
    public $title_id;
    public $title_en;

    // DESCRIPTION
    public $description_id;
    public $description_en;

    // CONTENT
    public $content_id;
    public $content_en;

    // IMAGE
    public $image_id;
    public $image_en;

    public $old_image_id;
    public $old_image_en;

    // SOURCE
    public $source_type = 'link';

    public $source_id;
    public $source_en;

    public $source_file_id;
    public $source_file_en;

    public function mount($id)
    {
        $this->id = $id;

        $investigasi = DB::table('publikasi')
            ->where('id', $id)
            ->where('category', 'investigasi')
            ->first();

        if (!$investigasi) {

            abort(404);
        }

        $this->status = $investigasi->status;

        $this->title_id = $investigasi->title_id;
        $this->title_en = $investigasi->title_en;

        $this->description_id = $investigasi->description_id;
        $this->description_en = $investigasi->description_en;

        $this->content_id = $investigasi->content_id;
        $this->content_en = $investigasi->content_en;

        $this->old_image_id = $investigasi->image_id;
        $this->old_image_en = $investigasi->image_en;

        // SOURCE
        $source = DB::table('file_publikasi')
            ->where('publikasi_id', $id)
            ->where('type', 'source')
            ->first();

        if ($source) {

            $this->source_id = $source->source_id;
            $this->source_en = $source->source_en;

            if ($source->file_id || $source->file_en) {

                $this->source_type = 'file';

            } else {

                $this->source_type = 'link';
            }
        }
    }

    public function update()
    {
        // IMAGE
        $imageId = $this->old_image_id;
        $imageEn = $this->old_image_en;

        if ($this->image_id) {

            $imageId = $this->image_id->store(
                'publikasi',
                'public'
            );
        }

        if ($this->image_en) {

            $imageEn = $this->image_en->store(
                'publikasi',
                'public'
            );
        }

        // UPDATE PUBLIKASI
        DB::table('publikasi')
            ->where('id', $this->id)
            ->update([

                'status' => $this->status,

                'slug_id' => Str::slug($this->title_id),
                'slug_en' => Str::slug($this->title_en),

                'image_id' => $imageId,
                'image_en' => $imageEn,

                'title_id' => $this->title_id,
                'title_en' => $this->title_en,

                'description_id' => $this->description_id,
                'description_en' => $this->description_en,

                'content_id' => $this->content_id,
                'content_en' => $this->content_en,

                'updated_at' => now(),
            ]);

        // DELETE OLD SOURCE
        DB::table('file_publikasi')
            ->where('publikasi_id', $this->id)
            ->where('type', 'source')
            ->delete();

        // CHECK SOURCE
        $hasSource =

            $this->source_id ||
            $this->source_en ||
            $this->source_file_id ||
            $this->source_file_en;

        if ($hasSource) {

            // LINK
            if ($this->source_type === 'link') {

                DB::table('file_publikasi')
                    ->insert([

                        'publikasi_id' => $this->id,

                        'type' => 'source',

                        'source_id' => $this->source_id,
                        'source_en' => $this->source_en,

                        'file_id' => null,
                        'file_en' => null,

                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);

            }

            // FILE
            else {

                $fileId = null;
                $fileEn = null;

                if ($this->source_file_id) {

                    $fileId = $this->source_file_id->store(
                        'publikasi/source',
                        'public'
                    );
                }

                if ($this->source_file_en) {

                    $fileEn = $this->source_file_en->store(
                        'publikasi/source',
                        'public'
                    );
                }

                DB::table('file_publikasi')
                    ->insert([

                        'publikasi_id' => $this->id,

                        'type' => 'source',

                        'source_id' => null,
                        'source_en' => null,

                        'file_id' => $fileId,
                        'file_en' => $fileEn,

                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
            }
        }

        session()->flash(
            'success',
            'Investigasi berhasil diupdate.'
        );

        return redirect()->route('cms.investigasi.detail', [
            'locale' => app()->getLocale(),
            'id' => $this->id
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pageinvestigasi-edit');
    }
}