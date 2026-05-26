<?php

namespace App\Livewire\Cms;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class PageagendaEdit extends Component
{
    public $agendaId;

    public $status;

    public $date;

    public $jenis_kegiatan;

    // indonesia
    public $title_id;
    public $description_id;
    public $content_id;

    // english
    public $title_en;
    public $description_en;
    public $content_en;

    public function mount($id)
    {
        $agenda = DB::table('agenda')
            ->where('id', $id)
            ->first();

        if (!$agenda) {

            abort(404);

        }

        $this->agendaId = $agenda->id;

        $this->status = $agenda->status;

        $this->date = $agenda->date;

        $this->jenis_kegiatan = $agenda->jenis_kegiatan;

        // indonesia
        $this->title_id = $agenda->title_id;
        $this->description_id = $agenda->description_id;
        $this->content_id = $agenda->content_id;

        // english
        $this->title_en = $agenda->title_en;
        $this->description_en = $agenda->description_en;
        $this->content_en = $agenda->content_en;
    }

    public function update()
    {
        DB::table('agenda')
            ->where('id', $this->agendaId)
            ->update([

                'status' => $this->status,

                'date' => $this->date,

                'jenis_kegiatan' => $this->jenis_kegiatan,

                // indonesia
                'slug_id' => $this->title_id
                    ? Str::slug($this->title_id)
                    : null,

                'title_id' => $this->title_id,

                'description_id' => $this->description_id,

                'content_id' => $this->content_id,

                // english
                'slug_en' => $this->title_en
                    ? Str::slug($this->title_en)
                    : null,

                'title_en' => $this->title_en,

                'description_en' => $this->description_en,

                'content_en' => $this->content_en,

                'updated_at' => now(),

            ]);

        session()->flash(
            'success',
            'Agenda berhasil diupdate.'
        );

        return redirect()->route('cms.agenda.index', [
            'locale' => app()->getLocale()
        ]);
    }

    public function render()
    {
        return view('livewire.cms.pageagenda-edit');
    }
}