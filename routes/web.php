<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CmsController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\LanguageMiddleware;
use UniSharp\LaravelFilemanager\Lfm;
use App\Http\Middleware\Auth as MustLogin;
use App\Http\Middleware\cmslogin;
use App\Http\Controllers\PltuServiceController;


Route::get('/gakkum/login', [CmsController::class, 'login'])->name('login');



Route::fallback(function () {
    $locale = app()->getLocale();
    return redirect("/{$locale}");
});


Route::group([
    'prefix' => 'laravel-filemanager',
], function () {
    Lfm::routes();
});

Route::get('/', function () {
    $locale = app()->getLocale();
    return redirect("/{$locale}");
});



Route::pattern('locale', 'en|id');


// user routes
Route::middleware(LanguageMiddleware::class)
    ->prefix('{locale}')
    ->group(function () {

        // home
        Route::get('/', [UserController::class, 'index'])
            ->name('index');

        // search
        Route::get('/search', [UserController::class, 'searchIndex'])
            ->name('search.index');

        // tentang web
        Route::get('/tentang-web', [UserController::class, 'tentangWeb'])
            ->name('tentangweb');

        // tentang program
        Route::get('/tentang-program', [UserController::class, 'tentangProgram'])
            ->name('tentangprogram');

        //agenda
        Route::get('/agenda/detail/{id}/{slug}', [UserController::class, 'agendaDetail'])
            ->name('agenda.detail');

        // pengetahuan
        Route::prefix('pengetahuan')->group(function () {

            // kiprah
            Route::get('/kiprah', [UserController::class, 'kiprahIndex'])
                ->name('kiprah.index');

            // publikasi
            Route::get('/publikasi', [UserController::class, 'publikasiIndex'])
                ->name('publikasi.index');

            Route::get('/publikasi/detail/{id}/{slug}', [UserController::class, 'publikasiDetail'])
                ->name('publikasi.detail');

            // berita
            Route::get('/berita', [UserController::class, 'beritaIndex'])
                ->name('berita.index');

            // analisis
            Route::get('/analisis', [UserController::class, 'analisisIndex'])
                ->name('analisis.index');

            Route::get('/analisis/detail/{id}/{slug}', [UserController::class, 'analisisDetail'])
                ->name('analisis.detail');

            // data
            Route::get('/data', [UserController::class, 'dataIndex'])
                ->name('data.index');

            // investigasi
            Route::get('/investigasi', [UserController::class, 'investigasiIndex'])
                ->name('investigasi.index');

            Route::get('/investigasi/detail/{id}/{slug}', [UserController::class, 'investigasiDetail'])
                ->name('investigasi.detail');

        });

        // kegiatan
        Route::prefix('kegiatan')->group(function () {

            // bincang hukum
            Route::get('/bincang-hukum', [UserController::class, 'bincangHukumIndex'])
                ->name('bincanghukum.index');

            Route::get('/bincang-hukum/detail/{id}/{slug}', [UserController::class, 'bincangHukumDetail'])
                ->name('bincanghukum.detail');

            // aktivitas
            Route::get('/aktivitas', [UserController::class, 'aktivitasIndex'])
                ->name('aktivitas.index');

            Route::get('/aktivitas/detail/{id}/{slug}', [UserController::class, 'aktivitasDetail'])
                ->name('aktivitas.detail');

        });

        // sektor
        Route::prefix('sektor')->group(function () {

            Route::get('/pencemaran', [UserController::class, 'pencemaranIndex'])
                ->name('sektor.pencemaran.index');

            Route::get('/tata-ruang', [UserController::class, 'tataruangIndex'])
                ->name('sektor.tata-ruang.index');

            Route::get('/kelautan-dan-perikanan', [UserController::class, 'kelautandanperikananIndex'])
                ->name('sektor.kelautan-dan-perikanan.index');

            Route::get('/energi-dan-sumber-daya-mineral', [UserController::class, 'energidansumberdayamineralIndex'])
                ->name('sektor.energi-dan-sumber-daya-mineral.index');

            Route::get('/perkebunan', [UserController::class, 'perkebunanIndex'])
                ->name('sektor.perkebunan.index');

            Route::get('/hutan', [UserController::class, 'hutanIndex'])
                ->name('sektor.hutan.index');

        });

    });


//CMS Routes
Route::middleware(LanguageMiddleware::class)
    ->prefix('{locale}/cms')
    ->name('cms.')
    ->middleware([
        LanguageMiddleware::class,
        cmslogin::class . ':admin,super_admin'
    ])
    ->group(function () {

        Route::post('/logout', [CmsController::class, 'logout'])->name('logout');

        // Index
        Route::get('/', [CmsController::class, 'Index'])
            ->name('index');

        // Account
        Route::get('/account', [CmsController::class, 'accountIndex'])
            ->middleware(cmslogin::class . ':super_admin')
            ->name('account.index');

        // agenda
        Route::get('/agenda', [CmsController::class, 'agendaIndex'])
            ->name('agenda.index');

        Route::get('/agenda/insert', [CmsController::class, 'agendaInsert'])
            ->name('agenda.insert');

        Route::get('/agenda/edit/{id}', [CmsController::class, 'agendaEdit'])
            ->name('agenda.edit');

        Route::get('/agenda/detail/{id}', [CmsController::class, 'agendaDetail'])
            ->name('agenda.detail');


        // About
        Route::get('/about', [CmsController::class, 'About'])
            ->name('about');
        Route::get('/about/edit/{id}', [CmsController::class, 'aboutEdit'])
            ->name('about.edit');

        // pengetahuan
        // kiprah
        Route::get('/pengetahuan/kiprah', [CmsController::class, 'kiprahIndex'])
            ->name('kiprah.index');
        Route::get('/pengetahuan/kiprah/edit/{id}', [CmsController::class, 'kiprahEdit'])
            ->name('kiprah.edit');

        // publikasi
        Route::get('/pengetahuan/publikasi', [CmsController::class, 'publikasiIndex'])
            ->name('publikasi.index');
        Route::get('/pengetahuan/publikasi/insert', [CmsController::class, 'publikasiInsert'])
            ->name('publikasi.insert');
        Route::get('/pengetahuan/publikasi/edit/{id}', [CmsController::class, 'publikasiEdit'])
            ->name('publikasi.edit');
        Route::get('/pengetahuan/publikasi/detail/{id}', [CmsController::class, 'publikasiDetail'])
            ->name('publikasi.detail');

        // berita
        Route::get('/pengetahuan/berita', [CmsController::class, 'beritaIndex'])
            ->name('berita.index');
        Route::get('/pengetahuan/berita/insert', [CmsController::class, 'beritaInsert'])
            ->name('berita.insert');
        Route::get('/pengetahuan/berita/edit/{id}', [CmsController::class, 'beritaEdit'])
            ->name('berita.edit');

        // analisis
        Route::get('/pengetahuan/analisis', [CmsController::class, 'analisisIndex'])
            ->name('analisis.index');
        Route::get('/pengetahuan/analisis/insert', [CmsController::class, 'analisisInsert'])
            ->name('analisis.insert');
        Route::get('/pengetahuan/analisis/edit/{id}', [CmsController::class, 'analisisEdit'])
            ->name('analisis.edit');
        Route::get('/pengetahuan/analisis/detail/{id}', [CmsController::class, 'analisisDetail'])
            ->name('analisis.detail');

        //data
        // kiprah
        Route::get('/pengetahuan/data', [CmsController::class, 'dataIndex'])
            ->name('data.index');
        Route::get('/pengetahuan/data/edit/{id}', [CmsController::class, 'dataEdit'])
            ->name('data.edit');

        // investigasi
        Route::get('/pengetahuan/investigasi', [CmsController::class, 'investigasiIndex'])
            ->name('investigasi.index');
        Route::get('/pengetahuan/investigasi/insert', [CmsController::class, 'investigasiInsert'])
            ->name('investigasi.insert');
        Route::get('/pengetahuan/investigasi/edit/{id}', [CmsController::class, 'investigasiEdit'])
            ->name('investigasi.edit');
        Route::get('/pengetahuan/investigasi/detail/{id}', [CmsController::class, 'investigasiDetail'])
            ->name('investigasi.detail');




        //KEGIATAN -> BINCANG HUKUM
        Route::get('/kegiatan/bincang-hukum', [CmsController::class, 'bincanghukumIndex'])
            ->name('bincanghukum.index');

        Route::get('/kegiatan/bincang-hukum/add', [CmsController::class, 'bincanghukumInsert'])
            ->name('bincanghukum.add');

        Route::get('/kegiatan/bincang-hukum/edit/{id}', [CmsController::class, 'bincanghukumEdit'])
            ->name('bincanghukum.edit');

        Route::get('/kegiatan/bincang-hukum/detail/{id}', [CmsController::class, 'bincanghukumDetail'])
            ->name('bincanghukum.detail');

        // kegiatan -> aktivitas
        Route::get('/kegiatan/aktivitas', [CmsController::class, 'aktivitasIndex'])
            ->name('aktivitas.index');

        Route::get('/kegiatan/aktivitas/add', [CmsController::class, 'aktivitasAdd'])
            ->name('aktivitas.add');

        Route::get('/kegiatan/aktivitas/edit/{id}', [CmsController::class, 'aktivitasEdit'])
            ->name('aktivitas.edit');

        Route::get('/kegiatan/aktivitas/detail/{id}', [CmsController::class, 'aktivitasDetail'])
            ->name('aktivitas.detail');


        // sektor -> pencemaran
        Route::get('/sektor/pencemaran', [CmsController::class, 'pencemaranIndex'])
            ->name('sektor.pencemaran.index');
        Route::get('/sektor/pencemaran/insert', [CmsController::class, 'pencemaranInsert'])
            ->name('sektor.pencemaran.insert');
        Route::get('/sektor/pencemaran/edit/{id}', [CmsController::class, 'pencemaranEdit'])
            ->name('sektor.pencemaran.edit');
        Route::get('/sektor/pencemaran/detail/{id}', [CmsController::class, 'pencemaranDetail'])
            ->name('sektor.pencemaran.detail');

        // sektor -> tata ruang
        Route::get('/sektor/tata-ruang', [CmsController::class, 'tataruangIndex'])
            ->name('sektor.tata-ruang.index');
        Route::get('/sektor/tata-ruang/insert', [CmsController::class, 'tataruangInsert'])
            ->name('sektor.tata-ruang.insert');
        Route::get('/sektor/tata-ruang/edit/{id}', [CmsController::class, 'tataruangEdit'])
            ->name('sektor.tata-ruang.edit');
        Route::get('/sektor/tata-ruang/detail/{id}', [CmsController::class, 'tataruangDetail'])
            ->name('sektor.tata-ruang.detail');

        // sektor -> kelautan dan perikanan
        Route::get('/sektor/kelautan-dan-perikanan', [CmsController::class, 'kelautandanperikananIndex'])
            ->name('sektor.kelautan-dan-perikanan.index');
        Route::get('/sektor/kelautan-dan-perikanan/insert', [CmsController::class, 'kelautandanperikananInsert'])
            ->name('sektor.kelautan-dan-perikanan.insert');
        Route::get('/sektor/kelautan-dan-perikanan/edit/{id}', [CmsController::class, 'kelautandanperikananEdit'])
            ->name('sektor.kelautan-dan-perikanan.edit');
        Route::get('/sektor/kelautan-dan-perikanan/detail/{id}', [CmsController::class, 'kelautandanperikananDetail'])
            ->name('sektor.kelautan-dan-perikanan.detail');

        // sektor -> energi dan sumber daya mineral
        Route::get('/sektor/energi-dan-sumber-daya-mineral', [CmsController::class, 'energidansumberdayamineralIndex'])
            ->name('sektor.energi-dan-sumber-daya-mineral.index');
        Route::get('/sektor/energi-dan-sumber-daya-mineral/insert', [CmsController::class, 'energidansumberdayamineralInsert'])
            ->name('sektor.energi-dan-sumber-daya-mineral.insert');
        Route::get('/sektor/energi-dan-sumber-daya-mineral/edit/{id}', [CmsController::class, 'energidansumberdayamineralEdit'])
            ->name('sektor.energi-dan-sumber-daya-mineral.edit');
        Route::get('/sektor/energi-dan-sumber-daya-mineral/detail/{id}', [CmsController::class, 'energidansumberdayamineralDetail'])
            ->name('sektor.energi-dan-sumber-daya-mineral.detail');

        // sektor -> perkebunan
        Route::get('/sektor/perkebunan', [CmsController::class, 'perkebunanIndex'])
            ->name('sektor.perkebunan.index');
        Route::get('/sektor/perkebunan/insert', [CmsController::class, 'perkebunanInsert'])
            ->name('sektor.perkebunan.insert');
        Route::get('/sektor/perkebunan/edit/{id}', [CmsController::class, 'perkebunanEdit'])
            ->name('sektor.perkebunan.edit');
        Route::get('/sektor/perkebunan/detail/{id}', [CmsController::class, 'perkebunanDetail'])
            ->name('sektor.perkebunan.detail');

        // sektor -> hutan
        Route::get('/sektor/hutan', [CmsController::class, 'hutanIndex'])
            ->name('sektor.hutan.index');
        Route::get('/sektor/hutan/insert', [CmsController::class, 'hutanInsert'])
            ->name('sektor.hutan.insert');
        Route::get('/sektor/hutan/edit/{id}', [CmsController::class, 'hutanEdit'])
            ->name('sektor.hutan.edit');
        Route::get('/sektor/hutan/detail/{id}', [CmsController::class, 'hutanDetail'])
            ->name('sektor.hutan.detail');
        ////////////////////////////////////////////////////////////////////////
    
    });
