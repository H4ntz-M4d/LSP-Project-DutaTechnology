<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $banner = DB::select('select * from banner');
        $partners = DB::select('select * from partners');
        $berita_headers = DB::select('select * from berita_header');
        $berita_card = DB::table('berita')
            ->orderBy('created_at', 'desc')
            ->limit(3)
            ->get();
        $pengumuman = DB::select('select * from pengumuman');
        $list_pengumuman = DB::select('select * from list_pengumuman');
        return view('landing-page.home', [
            'banner' => $banner,
            'partners' => $partners,
            'berita_headers' => $berita_headers,
            'berita_card' => $berita_card,
            'pengumuman' => $pengumuman,
            'list_pengumuman' => $list_pengumuman
        ]);
    }

    private function _getDatabaseConnection()
    {
        $databaseConnection = config('database.default');
        $databaseConfig = config('database.connections.' . $databaseConnection);


        return [
            'adapter' => [
                'driver' => 'Pdo_Mysql',
                'host' => $databaseConfig['host'],
                'database' => $databaseConfig['database'],
                'username' => $databaseConfig['username'],
                'password' => $databaseConfig['password'],
                'charset' => 'utf8'
            ]
        ];
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function banner()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('banner');
        $crud->setSubject('Banner', 'Banner');
        $crud->columns(['heading', 'paragraph', 'description', 'image']);

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['heading', 'paragraph', 'description', 'image']);
        // $crud->setTexteditor(['description']);

        $crud->setFieldUploadMultiple('image', 'uploads', url('uploads') . "/");
        // $crud->displayAs('image', 'image(850 x 850px)');

        $crud->setCsrfTokenName('_token');
        $crud->setCsrfTokenValue(csrf_token());

        $output = $crud->render();

        if ($output->isJSONResponse) {

            header('Content-Type: application/json; charset=utf-8');
            echo $output->output;
            exit;
        }

        $js_files = $output->js_files;
        $output = $output->output;

        return view('admin.landing-page.edit-landings', [
            'output' => $output,
            'js_files' => $js_files,
            'judul_menu' => 'Home (Banner)',
            'judul_link' => ['Edit Home', 'Banner'],
            'link' => '/home'
        ]);
    }

    public function partners()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('partners');
        $crud->setSubject('Partners', 'Partners');

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        // $crud->unsetDelete();
        $crud->unsetSearchColumns(['images']);
        // $crud->setTexteditor(['description']);

        $crud->setFieldUploadMultiple('images', 'uploads', url('uploads') . "/");
        // $crud->displayAs('image', 'image(850 x 850px)');

        $crud->setCsrfTokenName('_token');
        $crud->setCsrfTokenValue(csrf_token());

        $output = $crud->render();

        if ($output->isJSONResponse) {

            header('Content-Type: application/json; charset=utf-8');
            echo $output->output;
            exit;
        }

        $js_files = $output->js_files;
        $output = $output->output;

        return view('admin.landing-page.edit-landings', [
            'output' => $output,
            'js_files' => $js_files,
            'judul_menu' => 'Home (Partners)',
            'judul_link' => ['Edit Home', 'Partners'],
            'link' => '/home'
        ]);
    }
    public function berita()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('berita');
        $crud->setSubject('Berita', 'Berita');

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['span', 'title', 'sub_title', 'text']);
        // $crud->setTexteditor(['description']);

        // $crud->setFieldUploadMultiple('images', 'uploads', url('uploads')."/");
        // $crud->displayAs('image', 'image(850 x 850px)');

        $crud->setCsrfTokenName('_token');
        $crud->setCsrfTokenValue(csrf_token());

        $output = $crud->render();

        if ($output->isJSONResponse) {

            header('Content-Type: application/json; charset=utf-8');
            echo $output->output;
            exit;
        }

        $js_files = $output->js_files;
        $output = $output->output;

        return view('admin.landing-page.edit-landings', [
            'output' => $output,
            'js_files' => $js_files,
            'judul_menu' => 'Home (Berita)',
            'judul_link' => ['Edit Home', 'Berita'],
            'link' => '/home'
        ]);
    }

    public function berita_card()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('berita_card');
        $crud->setSubject('Berita Card', 'Berita Card');

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['judul', 'text', 'image']);
        // $crud->setTexteditor(['description']);

        $crud->setFieldUploadMultiple('image', 'uploads', url('uploads') . "/");
        // $crud->displayAs('image', 'image(850 x 850px)');

        $crud->setCsrfTokenName('_token');
        $crud->setCsrfTokenValue(csrf_token());

        $output = $crud->render();

        if ($output->isJSONResponse) {

            header('Content-Type: application/json; charset=utf-8');
            echo $output->output;
            exit;
        }

        $js_files = $output->js_files;
        $output = $output->output;

        return view('admin.landing-page.edit-landings', [
            'output' => $output,
            'js_files' => $js_files,
            'judul_menu' => 'Home (Berita Card)',
            'judul_link' => ['Edit Home', 'Berita Card'],
            'link' => '/home'
        ]);
    }

    public function pengumuman()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('pengumuman');
        $crud->setSubject('Pengumuman', 'Pengumuman');

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['heading', 'judul', 'deskripsi', 'image']);
        // $crud->setTexteditor(['description']);

        $crud->setFieldUploadMultiple('image', 'uploads', url('uploads') . "/");
        // $crud->displayAs('image', 'image(850 x 850px)');

        $crud->setCsrfTokenName('_token');
        $crud->setCsrfTokenValue(csrf_token());

        $output = $crud->render();

        if ($output->isJSONResponse) {

            header('Content-Type: application/json; charset=utf-8');
            echo $output->output;
            exit;
        }

        $js_files = $output->js_files;
        $output = $output->output;

        return view('admin.landing-page.edit-landings', [
            'output' => $output,
            'js_files' => $js_files,
            'judul_menu' => 'Home (Pengumuman)',
            'judul_link' => ['Edit Home', 'Pengumuman'],
            'link' => '/home'
        ]);
    }

    public function list_pengumuman()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('list_pengumuman');
        $crud->setSubject('List Pengumuman', 'List Pengumuman');
        $crud->columns(['judul', 'sub_judul', 'deskripsi']);

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['judul', 'sub_judul', 'deskripsi']);
        $crud->setTexteditor(['deskripsi']);

        // $crud->setFieldUploadMultiple('image', 'uploads', url('uploads')."/");
        // $crud->displayAs('image', 'image(850 x 850px)');

        $crud->setCsrfTokenName('_token');
        $crud->setCsrfTokenValue(csrf_token());

        $output = $crud->render();

        if ($output->isJSONResponse) {

            header('Content-Type: application/json; charset=utf-8');
            echo $output->output;
            exit;
        }

        $js_files = $output->js_files;
        $output = $output->output;

        return view('admin.landing-page.edit-landings', [
            'output' => $output,
            'js_files' => $js_files,
            'judul_menu' => 'Home (List Pengumuman)',
            'judul_link' => ['Edit Home', 'List Pengumuman'],
            'link' => '/home'
        ]);
    }

    public function login()
    {
        $postMenu = DB::select('SELECT * FROM migrations');
        foreach ($postMenu as $r) {
            var_dump($r->migration);
        }
    }
}
