<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Pageagendadetail extends Component
{
    public $agenda;

    public $id;
    public $slug;

    public function mount($id, $slug)
    {
        $this->id = $id;

        $this->slug = $slug;

        $this->agenda = DB::table('agenda')

            ->where('id', $id)

            ->where(function ($query) use ($slug) {

                $query->where('slug_id', $slug)
                    ->orWhere('slug_en', $slug);

            })

            ->where('status', 'publish')

            ->first();

        abort_if(!$this->agenda, 404);
    }

    public function render()
    {
        $relatedAgenda = DB::table('agenda')

            ->where('status', 'publish')

            ->where('id', '!=', $this->agenda->id)

            ->latest()

            ->limit(4)

            ->get();

        return view('livewire.user.pageagendadetail', [

            'relatedAgenda' => $relatedAgenda,

        ]);
    }
}