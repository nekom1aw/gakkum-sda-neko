<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    // home
    public function index()
    {
        return view('user.index');
    }

    public function searchIndex()
    {
        return view('user.pagesearch-index');
    }

    //agenda
    public function agendaDetail($locale, $id, $slug)
    {
        return view('user.pageagendadetail', compact(
            'id',
            'slug'
        ));
    }


    // tentang web
    public function tentangWeb()
    {
        return view('user.pagetentangweb-index');
    }

    // tentang program
    public function tentangProgram()
    {
        return view('user.pagetentangprogram-index');
    }

    // pengetahuan -> kiprah
    public function kiprahIndex()
    {
        return view('user.pagekiprah-index');
    }

    // pengetahuan -> publikasi
    public function publikasiIndex()
    {
        return view('user.pagepublikasi-index');
    }

    public function publikasiDetail($locale, $id, $slug)
    {
        return view('user.pagepublikasi-detail', compact(
            'id',
            'slug'
        ));
    }

    // pengetahuan -> berita
    public function beritaIndex()
    {
        return view('user.pageberita-index');
    }

    // pengetahuan -> analisis
    public function analisisIndex()
    {
        return view('user.pageanalisis-index');
    }

    public function analisisDetail($locale, $id, $slug)
    {
        return view('user.pageanalisis-detail', compact(
            'id',
            'slug'
        ));
    }

    // pengetahuan -> data
    public function dataIndex()
    {
        return view('user.pagedata-index');
    }

    // pengetahuan -> investigasi
    public function investigasiIndex()
    {
        return view('user.pageinvestigasi-index');
    }

    public function investigasiDetail($locale, $id, $slug)
    {
        return view('user.pageinvestigasi-detail', compact(
            'id',
            'slug'
        ));
    }

    // kegiatan -> bincang hukum
    public function bincangHukumIndex()
    {
        return view('user.pagebincanghukum-index');
    }

    public function bincangHukumDetail($locale, $id, $slug)
    {
        return view('user.pagebincanghukum-detail', compact(
            'id',
            'slug'
        ));
    }

    // kegiatan -> aktivitas
    public function aktivitasIndex()
    {
        return view('user.pageaktivitas-index');
    }

    public function aktivitasDetail($locale, $id, $slug)
    {
        return view('user.pageaktivitas-detail', compact(
            'id',
            'slug'
        ));
    }

    // sektor -> pencemaran
    public function pencemaranIndex()
    {
        return view('user.pagepencemaran-index');
    }

    // sektor -> tata ruang
    public function tataruangIndex()
    {
        return view('user.pagetataruang-index');
    }

    // sektor -> kelautan dan perikanan
    public function kelautandanperikananIndex()
    {
        return view('user.pagekelautandanperikanan-index');
    }

    // sektor -> energi dan sumber daya mineral
    public function energidansumberdayamineralIndex()
    {
        return view('user.pageenergidansumberdayamineral-index');
    }

    // sektor -> perkebunan
    public function perkebunanIndex()
    {
        return view('user.pageperkebunan-index');
    }

    // sektor -> hutan
    public function hutanIndex()
    {
        return view('user.pagehutan-index');
    }
}
