<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

abstract class SektorEdit extends Component
{
    public $idData;
    public $title_id;
    public $title_en;
    public $description_id;
    public $description_en;
    public $source_id;
    public $source_en;
    public $status;

    protected string $category;
    protected string $label;
    protected string $editorPrefix;

    public function mount($id)
    {
        $this->idData = $id;

        $data = DB::table('sektor')
            ->where('id', $id)
            ->where('category', $this->category)
            ->first();

        abort_if(!$data, 404);

        $this->title_id = $data->title_id;
        $this->title_en = $data->title_en;
        $this->description_id = $data->description_id;
        $this->description_en = $data->description_en;
        $this->status = $data->status;
        $this->source_id = $data->source_id ?? '';
        $this->source_en = $data->source_en ?? '';
    }

    public function update()
    {
        $this->validate([
            'title_id' => 'required',
            'title_en' => 'required',
        ]);

        DB::table('sektor')
            ->where('id', $this->idData)
            ->where('category', $this->category)
            ->update([
                'title_id' => $this->title_id,
                'title_en' => $this->title_en,
                'description_id' => $this->description_id,
                'description_en' => $this->description_en,
                'source_id' => $this->source_id,
                'source_en' => $this->source_en,
                'status' => $this->status,
                'updated_at' => now(),
            ]);

        session()->flash('success', $this->label . ' berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.cms.pagesektor-edit', [
            'label' => $this->label,
            'editorPrefix' => $this->editorPrefix,
        ]);
    }
}
