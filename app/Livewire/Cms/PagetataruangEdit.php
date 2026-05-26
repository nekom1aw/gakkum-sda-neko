<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PagetataruangEdit extends Component
{
    public $idTataruang;

    public $title_id;
    public $title_en;

    public $description_id;
    public $description_en;

    public $source_id;
    public $source_en;

    public $status;

    public function mount($id)
    {
        $this->idTataruang = $id;

        $tataruang = DB::table('sektor')
            ->where('id', $id)
            ->where('category', 'tata-ruang')
            ->first();

        abort_if(!$tataruang, 404);

        $this->title_id = $tataruang->title_id;
        $this->title_en = $tataruang->title_en;
        $this->description_id = $tataruang->description_id;
        $this->description_en = $tataruang->description_en;
        $this->status = $tataruang->status;
        $this->source_id = $tataruang->source_id ?? '';
        $this->source_en = $tataruang->source_en ?? '';
    }

    public function update()
    {
        $this->validate([
            'title_id' => 'required',
            'title_en' => 'required',
        ]);

        DB::table('sektor')
            ->where('id', $this->idTataruang)
            ->where('category', 'tata-ruang')
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

        session()->flash('success', 'Tata ruang berhasil diperbarui.');
    }

    public function render()
    {
        return view('livewire.cms.pagetataruang-edit');
    }
}
