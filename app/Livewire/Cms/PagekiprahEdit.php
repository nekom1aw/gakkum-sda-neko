<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\Component;
use Livewire\WithFileUploads;

class PagekiprahEdit extends Component
{
    use WithFileUploads;

    public $kiprahId;

    // image upload
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

    public function mount($id)
    {
        $kiprah = DB::table('publikasi')
            ->where('id', $id)
            ->where('category', 'kiprah')
            ->first();

        abort_if(!$kiprah, 404);

        $this->kiprahId = $kiprah->id;

        // old image
        $this->old_image_id = $kiprah->image_id;
        $this->old_image_en = $kiprah->image_en;

        // title
        $this->title_id = $kiprah->title_id;
        $this->title_en = $kiprah->title_en;

        // description
        $this->description_id = $kiprah->description_id;
        $this->description_en = $kiprah->description_en;

        // content
        $this->content_id = $kiprah->content_id;
        $this->content_en = $kiprah->content_en;
    }

    public function save()
    {
        $this->validate([
            'title_id' => 'required',
            'title_en' => 'required',
        ]);

        // default old image
        $imageIdPath = $this->old_image_id;
        $imageEnPath = $this->old_image_en;

        // upload image id
        if ($this->image_id instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {

            $imageIdPath = $this->image_id->store('kiprah', 'public');
        }

        // upload image en
        if ($this->image_en instanceof \Livewire\Features\SupportFileUploads\TemporaryUploadedFile) {

            $imageEnPath = $this->image_en->store('kiprah', 'public');
        }

        DB::table('publikasi')
            ->where('id', $this->kiprahId)
            ->update([

                // always publish
                'status' => 'publish',

                // slug
                'slug_id' => Str::slug($this->title_id),
                'slug_en' => Str::slug($this->title_en),

                // image
                'image_id' => $imageIdPath,
                'image_en' => $imageEnPath,

                // title
                'title_id' => $this->title_id,
                'title_en' => $this->title_en,

                // description
                'description_id' => $this->description_id,
                'description_en' => $this->description_en,

                // content
                'content_id' => $this->content_id,
                'content_en' => $this->content_en,

                'updated_at' => now(),
            ]);

        // refresh old image
        $this->old_image_id = $imageIdPath;
        $this->old_image_en = $imageEnPath;

        session()->flash('success', 'Kiprah berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.cms.pagekiprah-edit');
    }
}