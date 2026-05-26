<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagepencemaranEdit extends Component
{
    public $idPencemaran;

    public $title_id;
    public $title_en;

    public $description_id;
    public $description_en;

    public $source_id;
    public $source_en;

    public $status;

    public function mount($id)
    {
        $this->idPencemaran = $id;

        $pencemaran = DB::table('sektor')
            ->where('id', $id)
            ->where('category', 'pencemaran')
            ->first();

        abort_if(!$pencemaran, 404);

        $this->title_id = $pencemaran->title_id;
        $this->title_en = $pencemaran->title_en;
        $this->description_id = $pencemaran->description_id;
        $this->description_en = $pencemaran->description_en;
        $this->status = $pencemaran->status;
        $this->source_id = $pencemaran->source_id ?? '';
        $this->source_en = $pencemaran->source_en ?? '';
    }

    public function update()
    {
        $this->validate([
            'title_id' => 'required',
            'title_en' => 'required',
        ]);

        DB::table('sektor')
            ->where('id', $this->idPencemaran)
            ->where('category', 'pencemaran')
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

        session()->flash('success', 'Pencemaran berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.cms.pagepencemaran-edit');
    }
}
