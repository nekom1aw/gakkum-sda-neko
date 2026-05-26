<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PageinvestigasiAdd extends Component
{
    use WithFileUploads;

    // STATUS
    public $status = 'draft';

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

    // SOURCE
    public $source_type = 'link';

    public $source_id;
    public $source_en;

    public $source_file_id;
    public $source_file_en;

    public function save()
    {
        // IMAGE
        $imageId = null;
        $imageEn = null;

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

        // PUBLIKASI
        $publikasiId = DB::table('publikasi')
            ->insertGetId([

                'category' => 'investigasi',

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

                'created_at' => now(),
                'updated_at' => now(),
            ]);

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

                        'publikasi_id' => $publikasiId,

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

                        'publikasi_id' => $publikasiId,

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
            'investigasi berhasil ditambahkan.'
        );

        return redirect()->route('cms.investigasi.index', [
            'locale' => app()->getLocale()
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pageinvestigasi-add');
 
        }
}