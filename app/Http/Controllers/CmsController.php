<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CmsController extends Controller
{
    public function logout()
    {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();

        return redirect()->to('/');
    }
    public function mapInput()
    {
        return view('cms.map-input');
    }
    public function index()
    {
        return view('cms.pageindex');
    }

    // login
    public function login()
    {
        return view('cms.pagelogin');
    }

    // agenda
    public function agendaIndex()
    {
        return view('cms.pageagenda-index');
    }

    public function agendaInsert()
    {
        return view('cms.pageagenda-add');
    }

    public function agendaEdit($locale, $id)
    {
        return view('cms.pageagenda-edit', compact('id'));
    }

    public function agendaDetail($locale, $id)
    {
        return view('cms.pageagenda-detail', compact('id'));
    }

    //about
    public function About()
    {
        return view('cms.pageabout');
    }

    //about edit
    public function aboutEdit($locale, $id)
    {
        return view('cms.pageabout-edit', compact('id'));
    }

    // pengetahuan -> kiprah
    public function kiprahIndex()
    {
        return view('cms.pagekiprah-index');
    }
    public function kiprahEdit($locale, $id)
    {
        return view('cms.pagekiprah-edit', compact('id'));
    }

    // pengetahuan -> publikasi
    public function publikasiIndex()
    {
        return view('cms.pagepublikasi-index');
    }
    public function publikasiInsert()
    {
        return view('cms.pagepublikasi-add');
    }
    public function publikasiEdit($locale, $id)
    {
        return view('cms.pagepublikasi-edit', compact('id'));
    }
    public function publikasiDetail($locale, $id)
    {
        return view('cms.pagepublikasi-detail', compact('id'));
    }

    // pengetahuan -> berita
    public function beritaIndex()
    {
        return view('cms.pageberita-index');
    }
    public function beritaInsert()
    {
        return view('cms.pageberita-add');
    }
    public function beritaEdit($locale, $id)
    {
        return view('cms.pageberita-edit', compact('id'));
    }

    // penegtahuan -> analisis
    public function analisisIndex()
    {
        return view('cms.pageanalisis-index');
    }
    public function analisisInsert()
    {
        return view('cms.pageanalisis-add');
    }
    public function analisisEdit($locale, $id)
    {
        return view('cms.pageanalisis-edit', compact('id'));
    }
    public function analisisDetail($locale, $id)
    {
        return view('cms.pageanalisis-detail', compact('id'));
    }

    // pengetahuan -> kiprah
    public function dataIndex()
    {
        return view('cms.pagedata-index');
    }
    public function dataEdit($locale, $id)
    {
        return view('cms.pagedata-edit', compact('id'));
    }

    // penegtahuan -> investigasi
    public function investigasiIndex()
    {
        return view('cms.pageinvestigasi-index');
    }
    public function investigasiInsert()
    {
        return view('cms.pageinvestigasi-add');
    }
    public function investigasiEdit($locale, $id)
    {
        return view('cms.pageinvestigasi-edit', compact('id'));
    }
    public function investigasiDetail($locale, $id)
    {
        return view('cms.pageinvestigasi-detail', compact('id'));
    }



    // kegiatan -> bincang hukum
    public function bincanghukumIndex()
    {
        return view('cms.pagebincanghukum-index');
    }

    public function bincanghukumInsert()
    {
        return view('cms.pagebincanghukum-add');
    }

    public function bincanghukumEdit($locale, $id)
    {
        return view('cms.pagebincanghukum-edit', compact('id'));
    }

    public function bincanghukumDetail($locale, $id)
    {
        return view('cms.pagebincanghukum-detail', compact('id'));
    }


    // kegiatan -> aktivitas
    public function aktivitasIndex()
    {
        return view('cms.pageaktivitas-index');
    }

    public function aktivitasAdd()
    {
        return view('cms.pageaktivitas-add');
    }

    public function aktivitasEdit($locale, $id)
    {
        return view('cms.pageaktivitas-edit', compact('id'));
    }

    public function aktivitasDetail($locale, $id)
    {
        return view('cms.pageaktivitas-detail', compact('id'));
    }


    // sektor -> pencemaran
    public function pencemaranIndex()
    {
        return view('cms.pagepencemaran-index');
    }

    public function pencemaranInsert()
    {
        return view('cms.pagepencemaran-add');
    }

    public function pencemaranEdit($locale, $id)
    {
        return view('cms.pagepencemaran-edit', compact('id'));
    }

    public function pencemaranDetail($locale, $id)
    {
        return view('cms.pagepencemaran-detail', compact('id'));
    }

    // sektor -> tata ruang
    public function tataruangIndex()
    {
        return view('cms.pagetataruang-index');
    }

    public function tataruangInsert()
    {
        return view('cms.pagetataruang-add');
    }

    public function tataruangEdit($locale, $id)
    {
        return view('cms.pagetataruang-edit', compact('id'));
    }

    public function tataruangDetail($locale, $id)
    {
        return view('cms.pagetataruang-detail', compact('id'));
    }

    // sektor -> kelautan dan perikanan
    public function kelautandanperikananIndex()
    {
        return view('cms.pagekelautandanperikanan-index');
    }

    public function kelautandanperikananInsert()
    {
        return view('cms.pagekelautandanperikanan-add');
    }

    public function kelautandanperikananEdit($locale, $id)
    {
        return view('cms.pagekelautandanperikanan-edit', compact('id'));
    }

    public function kelautandanperikananDetail($locale, $id)
    {
        return view('cms.pagekelautandanperikanan-detail', compact('id'));
    }

    // sektor -> energi dan sumber daya mineral
    public function energidansumberdayamineralIndex()
    {
        return view('cms.pageenergidansumberdayamineral-index');
    }

    public function energidansumberdayamineralInsert()
    {
        return view('cms.pageenergidansumberdayamineral-add');
    }

    public function energidansumberdayamineralEdit($locale, $id)
    {
        return view('cms.pageenergidansumberdayamineral-edit', compact('id'));
    }

    public function energidansumberdayamineralDetail($locale, $id)
    {
        return view('cms.pageenergidansumberdayamineral-detail', compact('id'));
    }

    // sektor -> perkebunan
    public function perkebunanIndex()
    {
        return view('cms.pageperkebunan-index');
    }

    public function perkebunanInsert()
    {
        return view('cms.pageperkebunan-add');
    }

    public function perkebunanEdit($locale, $id)
    {
        return view('cms.pageperkebunan-edit', compact('id'));
    }

    public function perkebunanDetail($locale, $id)
    {
        return view('cms.pageperkebunan-detail', compact('id'));
    }

    // sektor -> hutan
    public function hutanIndex()
    {
        return view('cms.pagehutan-index');
    }

    public function hutanInsert()
    {
        return view('cms.pagehutan-add');
    }

    public function hutanEdit($locale, $id)
    {
        return view('cms.pagehutan-edit', compact('id'));
    }

    public function hutanDetail($locale, $id)
    {
        return view('cms.pagehutan-detail', compact('id'));
    }



    //////////////////////////////////

    //account
    public function accountIndex()
    {
        abort_unless(session('account_role') === 'super_admin', 403);

        return view('cms.pageaccount-index');
    }

    //Ngopini
    public function ngopiniIndex()
    {
        return view("cms.pageindexngopini");
    }

    public function ngopiniInsert()
    {
        return view("cms.pageinsertngopini");
    }
    public function ngopiniEdit($locale, $id)
    {
        return view("cms.pageeditngopini", compact('id'));
    }

    //Aktivitas
    public function activityIndex()
    {
        return view("cms.pageindexaktivitas");
    }

    public function activityInsert()
    {
        return view("cms.pageinsertaktivitas");
    }
    public function activityEdit($locale, $id)
    {
        return view("cms.pageeditaktivitas", compact('id'));
    }

    //background
    //background -> coalcrowd
    public function coalcrowdIndex()
    {
        return view('cms.page-index-coalcrowd');
    }
    public function coalcrowdInsert()
    {
        return view('cms.page-insert-coalcrowd');
    }
    public function coalcrowdEdit($locale, $id)
    {

        return view('cms.page-edit-coalcrowd', compact('id'));
    }

    //background -> coalpermit
    public function coalpermitIndex()
    {
        return view('cms.page-index-coal-permit');
    }

    //background -> regulation
    public function regulationIndex()
    {
        return view('cms.page-index-regulation');
    }
    public function regulationInsert()
    {
        return view('cms.page-insert-regulation');
    }
    public function regulationEdit($locale, $id)
    {

        return view('cms.page-edit-regulation', compact('id'));
    }

    //background -> benchmark price
    public function benchmarkpriceIndex()
    {
        return view('cms.page-index-benchmark-price');
    }

    //background -> coal production
    public function coalproductionIndex()
    {
        return view('cms.page-index-coal-production');
    }

    //background -> coal consumption
    public function coalconsumptionIndex()
    {
        return view('cms.page-index-coal-consumption');
    }
    //background -> mining and deforestation
    public function mininganddeforestationIndex()
    {
        return view('cms.page-index-mining-and-deforestation');
    }

    //coal-ruption -> cases 
    public function casesIndex()
    {
        return view('cms.page-index-cases');
    }
    public function casesInsert()
    {
        return view('cms.page-insert-cases');
    }
    public function casesEdit($locale, $id)
    {

        return view('cms.page-edit-cases', compact('id'));
    }

    //action
    public function actionIndex()
    {
        return view('cms.pageindexaction');
    }
    public function actionInsert()
    {
        return view('cms.pageinsertaction');
    }
    public function actionEdit($locale, $id)
    {

        return view('cms.pageeditaction', compact('id'));
    }
    public function actionPreview($locale, $id)
    {

        return view('cms.pageriviewaction', compact('id'));
    }

    //data -> resource
    public function resourceIndex()
    {
        return view('cms.pageindexresource');
    }
    public function resourceInsert()
    {
        return view('cms.pageinsertresource');
    }
    public function resourceEdit($locale, $id)
    {

        return view('cms.pageeditresource', compact('id'));
    }

    //data Check-pltu
    public function checkpltuIndex()
    {
        return view('cms.page-index-check-pltu');
    }
    public function checkpltuDetail($locale, $id)
    {
        return view('cms.page-detail-check-pltu', compact('id'));
    }


    public function checkpltuInsert()
    {
        return view('cms.page-insert-check-pltu');
    }

    public function checkpltuEdit($locale, $id)
    {
        return view('cms.pageeditcheckpltu', compact('id'));
    }

    public function detailpltuInsert()
    {
        return view('cms.pageinsertdetailpltu');
    }


}
