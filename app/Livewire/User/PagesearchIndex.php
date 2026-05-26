<?php

namespace App\Livewire\User;

use Illuminate\Database\Query\Builder;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Livewire\Component;

class PagesearchIndex extends Component
{
    public string $q = '';

    protected $queryString = [
        'q' => ['except' => ''],
    ];

    public function mount()
    {
        $this->q = trim((string) request('q', $this->q));
    }

    protected function term(): string
    {
        return trim($this->q);
    }

    protected function highlight(string $text): string
    {
        $term = $this->term();

        $safe = e(strip_tags($text));

        if ($term === '') {
            return nl2br($safe);
        }

        $pattern = '/' . preg_quote($term, '/') . '/i';

        return preg_replace(
            $pattern,
            '<span class="bg-gray-200 px-1 text-gray-900">$0</span>',
            $safe
        );
    }

    protected function excerpt(?string $text, int $limit = 220): string
    {
        return Str::limit(strip_tags((string) $text), $limit);
    }

    protected function useFullText(string $term): bool
    {
        return mb_strlen($term) >= 3;
    }

    protected function applySearch(Builder $query, array $columns, string $term): Builder
    {
        if ($this->useFullText($term)) {
            $columnList = implode(',', array_map(fn ($column) => "`{$column}`", $columns));

            return $query->whereRaw(
                "MATCH ({$columnList}) AGAINST (? IN NATURAL LANGUAGE MODE)",
                [$term]
            );
        }

        return $query->where(function ($nested) use ($columns, $term) {
            foreach ($columns as $index => $column) {
                $method = $index === 0 ? 'where' : 'orWhere';
                $nested->{$method}($column, 'like', '%' . $term . '%');
            }
        });
    }

    protected function makeItem(array $data): object
    {
        return (object) $data;
    }

    protected function collectResults(): Collection
    {
        $term = $this->term();

        if ($term === '') {
            return collect();
        }

        $results = collect();

        $aboutRows = $this->applySearch(
            DB::table('about'),
            ['title_id', 'title_en', 'deskripsi_id', 'deskripsi_en', 'content_id', 'content_en'],
            $term
        )->get();

        foreach ($aboutRows as $item) {
            $type = app()->getLocale() === 'id' ? 'Tentang' : 'About';
            $label = $item->categori === 'program'
                ? (app()->getLocale() === 'id' ? 'Tentang Program' : 'About Program')
                : (app()->getLocale() === 'id' ? 'Tentang Web' : 'About Web');

            $results->push($this->makeItem([
                'type' => $type,
                'category' => $label,
                'title' => app()->getLocale() === 'id'
                    ? ($item->title_id ?? $item->title_en ?? '-')
                    : ($item->title_en ?? $item->title_id ?? '-'),
                'description' => $this->excerpt(app()->getLocale() === 'id'
                    ? ($item->content_id ?? $item->content_en)
                    : ($item->content_en ?? $item->content_id)),
                'title_html' => $this->highlight(app()->getLocale() === 'id'
                    ? ($item->title_id ?? $item->title_en ?? '-')
                    : ($item->title_en ?? $item->title_id ?? '-')),
                'description_html' => $this->highlight($this->excerpt(app()->getLocale() === 'id'
                    ? ($item->content_id ?? $item->content_en)
                    : ($item->content_en ?? $item->content_id))),
                'url' => route($item->categori === 'program' ? 'tentangprogram' : 'tentangweb', [
                    'locale' => app()->getLocale(),
                ]),
            ]));
        }

        $agendaRows = $this->applySearch(
            DB::table('agenda')->where('status', 'publish'),
            ['title_id', 'title_en', 'description_id', 'description_en', 'content_id', 'content_en', 'jenis_kegiatan'],
            $term
        )->latest('date')->get();

        foreach ($agendaRows as $item) {
            $title = app()->getLocale() === 'id'
                ? ($item->title_id ?? $item->title_en ?? '-')
                : ($item->title_en ?? $item->title_id ?? '-');

            $results->push($this->makeItem([
                'type' => app()->getLocale() === 'id' ? 'Agenda' : 'Agenda',
                'category' => app()->getLocale() === 'id'
                    ? ($item->jenis_kegiatan ?? 'Agenda')
                    : ($item->jenis_kegiatan ?? 'Agenda'),
                'title' => $title,
                'description' => $this->excerpt(app()->getLocale() === 'id'
                    ? ($item->description_id ?? $item->description_en ?? $item->content_id ?? $item->content_en)
                    : ($item->description_en ?? $item->description_id ?? $item->content_en ?? $item->content_id)),
                'title_html' => $this->highlight($title),
                'description_html' => $this->highlight($this->excerpt(app()->getLocale() === 'id'
                    ? ($item->description_id ?? $item->description_en ?? $item->content_id ?? $item->content_en)
                    : ($item->description_en ?? $item->description_id ?? $item->content_en ?? $item->content_id))),
                'url' => route('agenda.detail', [
                    'locale' => app()->getLocale(),
                    'id' => $item->id,
                    'slug' => Str::slug($title),
                ]),
            ]));
        }

        $publikasiRows = $this->applySearch(
            DB::table('publikasi')->where('status', 'publish'),
            ['title_id', 'title_en', 'description_id', 'description_en', 'content_id', 'content_en'],
            $term
        )->latest('id')->get();

        foreach ($publikasiRows as $item) {
            $typeMap = [
                'kiprah' => app()->getLocale() === 'id' ? 'Kiprah' : 'Impact',
                'publikasi' => app()->getLocale() === 'id' ? 'Publikasi' : 'Publication',
                'berita' => app()->getLocale() === 'id' ? 'Berita' : 'News',
                'analisis' => app()->getLocale() === 'id' ? 'Analisis' : 'Analysis',
                'investigasi' => app()->getLocale() === 'id' ? 'Investigasi' : 'Investigation',
                'data' => app()->getLocale() === 'id' ? 'Data' : 'Data',
            ];

            $results->push($this->makeItem([
                'type' => $typeMap[$item->category] ?? $item->category,
                'category' => $typeMap[$item->category] ?? $item->category,
                'title' => app()->getLocale() === 'id'
                    ? ($item->title_id ?? $item->title_en ?? '-')
                    : ($item->title_en ?? $item->title_id ?? '-'),
                'description' => $this->excerpt(app()->getLocale() === 'id'
                    ? ($item->description_id ?? $item->description_en ?? $item->content_id ?? $item->content_en)
                    : ($item->description_en ?? $item->description_id ?? $item->content_en ?? $item->content_id)),
                'title_html' => $this->highlight(app()->getLocale() === 'id'
                    ? ($item->title_id ?? $item->title_en ?? '-')
                    : ($item->title_en ?? $item->title_id ?? '-')),
                'description_html' => $this->highlight($this->excerpt(app()->getLocale() === 'id'
                    ? ($item->description_id ?? $item->description_en ?? $item->content_id ?? $item->content_en)
                    : ($item->description_en ?? $item->description_id ?? $item->content_en ?? $item->content_id))),
                'url' => match ($item->category) {
                    'kiprah' => route('kiprah.index', ['locale' => app()->getLocale()]),
                    'publikasi' => route('publikasi.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $item->id,
                        'slug' => Str::slug(app()->getLocale() === 'id'
                            ? ($item->title_id ?? $item->title_en ?? 'publikasi')
                            : ($item->title_en ?? $item->title_id ?? 'publikasi')),
                    ]),
                    'berita' => route('berita.index', ['locale' => app()->getLocale()]),
                    'analisis' => route('analisis.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $item->id,
                        'slug' => Str::slug(app()->getLocale() === 'id'
                            ? ($item->title_id ?? $item->title_en ?? 'analisis')
                            : ($item->title_en ?? $item->title_id ?? 'analisis')),
                    ]),
                    'investigasi' => route('investigasi.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $item->id,
                        'slug' => Str::slug(app()->getLocale() === 'id'
                            ? ($item->title_id ?? $item->title_en ?? 'investigasi')
                            : ($item->title_en ?? $item->title_id ?? 'investigasi')),
                    ]),
                    'data' => route('data.index', ['locale' => app()->getLocale()]),
                    default => route('index', ['locale' => app()->getLocale()]),
                },
            ]));
        }

        $kegiatanRows = $this->applySearch(
            DB::table('kegiatan')->where('status', 'publish'),
            ['title_id', 'title_en', 'deskripsi_id', 'deskripsi_en', 'content_id', 'content_en', 'jenis_kegiatan_id', 'jenis_kegiatan_en'],
            $term
        )->latest('id')->get();

        foreach ($kegiatanRows as $item) {
            $labelMap = [
                'bincang-hukum' => app()->getLocale() === 'id' ? 'Bincang Hukum' : 'Legal Discussion',
                'aktivitas' => app()->getLocale() === 'id' ? 'Aktivitas' : 'Activities',
            ];

            $results->push($this->makeItem([
                'type' => $labelMap[$item->kategori] ?? $item->kategori,
                'category' => $labelMap[$item->kategori] ?? $item->kategori,
                'title' => app()->getLocale() === 'id'
                    ? ($item->title_id ?? $item->title_en ?? '-')
                    : ($item->title_en ?? $item->title_id ?? '-'),
                'description' => $this->excerpt(app()->getLocale() === 'id'
                    ? ($item->deskripsi_id ?? $item->deskripsi_en ?? $item->content_id ?? $item->content_en)
                    : ($item->deskripsi_en ?? $item->deskripsi_id ?? $item->content_en ?? $item->content_id)),
                'title_html' => $this->highlight(app()->getLocale() === 'id'
                    ? ($item->title_id ?? $item->title_en ?? '-')
                    : ($item->title_en ?? $item->title_id ?? '-')),
                'description_html' => $this->highlight($this->excerpt(app()->getLocale() === 'id'
                    ? ($item->deskripsi_id ?? $item->deskripsi_en ?? $item->content_id ?? $item->content_en)
                    : ($item->deskripsi_en ?? $item->deskripsi_id ?? $item->content_en ?? $item->content_id))),
                'url' => match ($item->kategori) {
                    'bincang-hukum' => route('bincanghukum.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $item->id,
                        'slug' => Str::slug(app()->getLocale() === 'id'
                            ? ($item->title_id ?? $item->title_en ?? 'bincang-hukum')
                            : ($item->title_en ?? $item->title_id ?? 'bincang-hukum')),
                    ]),
                    'aktivitas' => route('aktivitas.detail', [
                        'locale' => app()->getLocale(),
                        'id' => $item->id,
                        'slug' => Str::slug(app()->getLocale() === 'id'
                            ? ($item->title_id ?? $item->title_en ?? 'aktivitas')
                            : ($item->title_en ?? $item->title_id ?? 'aktivitas')),
                    ]),
                    default => route('index', ['locale' => app()->getLocale()]),
                },
            ]));
        }

        $sectorMap = [
            'pencemaran' => app()->getLocale() === 'id' ? 'Pencemaran' : 'Pollution',
            'tata-ruang' => app()->getLocale() === 'id' ? 'Tata Ruang' : 'Spatial Planning',
            'kelautan-dan-perikanan' => app()->getLocale() === 'id' ? 'Kelautan dan Perikanan' : 'Marine and Fisheries',
            'energi-dan-sumber-daya-mineral' => app()->getLocale() === 'id' ? 'Energi dan Sumber Daya Mineral' : 'Energy and Mineral Resources',
            'perkebunan' => app()->getLocale() === 'id' ? 'Perkebunan' : 'Plantations',
            'hutan' => app()->getLocale() === 'id' ? 'Hutan' : 'Forest',
        ];

        $sectorRows = $this->applySearch(
            DB::table('sektor')->where('status', 'publish'),
            ['title_id', 'title_en', 'description_id', 'description_en', 'source_id', 'source_en'],
            $term
        )->latest('id')->get();

        foreach ($sectorRows as $item) {
            $results->push($this->makeItem([
                'type' => app()->getLocale() === 'id' ? 'Sektor' : 'Sector',
                'category' => $sectorMap[$item->category] ?? $item->category,
                'title' => app()->getLocale() === 'id'
                    ? ($item->title_id ?? $item->title_en ?? '-')
                    : ($item->title_en ?? $item->title_id ?? '-'),
                'description' => $this->excerpt(app()->getLocale() === 'id'
                    ? ($item->description_id ?? $item->description_en)
                    : ($item->description_en ?? $item->description_id)),
                'title_html' => $this->highlight(app()->getLocale() === 'id'
                    ? ($item->title_id ?? $item->title_en ?? '-')
                    : ($item->title_en ?? $item->title_id ?? '-')),
                'description_html' => $this->highlight($this->excerpt(app()->getLocale() === 'id'
                    ? ($item->description_id ?? $item->description_en)
                    : ($item->description_en ?? $item->description_id))),
                'url' => match ($item->category) {
                    'pencemaran' => route('sektor.pencemaran.index', ['locale' => app()->getLocale()]),
                    'tata-ruang' => route('sektor.tata-ruang.index', ['locale' => app()->getLocale()]),
                    'kelautan-dan-perikanan' => route('sektor.kelautan-dan-perikanan.index', ['locale' => app()->getLocale()]),
                    'energi-dan-sumber-daya-mineral' => route('sektor.energi-dan-sumber-daya-mineral.index', ['locale' => app()->getLocale()]),
                    'perkebunan' => route('sektor.perkebunan.index', ['locale' => app()->getLocale()]),
                    'hutan' => route('sektor.hutan.index', ['locale' => app()->getLocale()]),
                    default => route('index', ['locale' => app()->getLocale()]),
                },
            ]));
        }

        return $results;
    }

    public function render()
    {
        return view('livewire.user.pagesearch-index', [
            'results' => $this->collectResults(),
        ]);
    }
}
