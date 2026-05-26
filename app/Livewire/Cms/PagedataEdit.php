<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagedataEdit extends Component
{
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

    public function mount($id)
    {
        $data = DB::table('publikasi')
            ->where('id', $id)
            ->where('category', 'data')
            ->first();

        if (!$data) {

            abort(404);
        }

        $this->id = $data->id;

        $this->status = $data->status;

        $this->title_id = $data->title_id;
        $this->title_en = $data->title_en;

        $this->description_id = $data->description_id;
        $this->description_en = $data->description_en;

        $this->content_id = $data->content_id;
        $this->content_en = $data->content_en;
    }

    public function update()
    {
        DB::table('publikasi')
            ->where('id', $this->id)
            ->update([

                'status' => $this->status,

                'title_id' => $this->title_id,
                'title_en' => $this->title_en,

                'description_id' => $this->description_id,
                'description_en' => $this->description_en,

                'content_id' => $this->content_id,
                'content_en' => $this->content_en,

                'updated_at' => now(),
            ]);

        session()->flash(
            'success',
            'Data berhasil diupdate.'
        );

        return redirect()->route('cms.data.index', [
            'locale' => app()->getLocale()
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pagedata-edit');
    }
}