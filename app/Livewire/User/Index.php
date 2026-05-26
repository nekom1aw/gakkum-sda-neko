<?php

namespace App\Livewire\User;

use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $publikasi;
    public $berita;
    public $agenda;
    public $bincang;
    public $aktivitas;

    public function mount()
    {
        $this->publikasi = DB::table('publikasi')
            ->where('category', 'publikasi')
            ->where('status', 'publish')
            ->latest()
            ->first();

        $this->berita = DB::table('publikasi')
            ->where('category', 'berita')
            ->where('status', 'publish')
            ->latest()
            ->limit(4)
            ->get()
            ->map(function ($item) {

                $source = DB::table('file_publikasi')
                    ->where('publikasi_id', $item->id)
                    ->where('type', 'source')
                    ->first();

                $item->source_link = null;
                $item->source_text = null;

                if ($source && $source->source_id) {

                    preg_match('/href="([^"]+)"/', $source->source_id, $link);

                    preg_match('/>(.*?)</', $source->source_id, $text);

                    $item->source_link = $link[1] ?? '#';

                    $item->source_text = strip_tags($source->source_id);
                }

                return $item;
            });

        $this->agenda = DB::table('agenda')
            ->where('status', 'publish')
            ->latest()
            ->limit(3)
            ->get();

        $this->bincang = DB::table('kegiatan')
            ->where('kategori', 'bincang-hukum')
            ->latest()
            ->limit(4)
            ->get();

        $this->aktivitas = DB::table('kegiatan')
            ->where('kategori', 'aktivitas')
            ->latest()
            ->limit(6)
            ->get();
    }

    public function render()
    {
        return view('livewire.user.index');
    }
}