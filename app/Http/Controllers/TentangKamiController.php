<?php

namespace App\Http\Controllers;

use GroceryCrud\Core\GroceryCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TentangKamiController extends Controller
{
    public function index()
    {
        $about_header = DB::select('select * from about_header');
        $about_content = DB::select('select * from about_content');
        return view('landing-page.profil.tentang-lsp', [
            'about_header' => $about_header,
            'about_content' => $about_content
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
    public function about_header()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('about_header');
        $crud->setSubject('About Header', 'About Header');
        $crud->columns(['judul', 'sub_judul', 'tombol_text', 'yt_id']);

        $rowCount = DB::table('about_header')->count();
        if ($rowCount >= 1) {
            $crud->unsetAdd(); // Menonaktifkan tombol "Add" jika sudah ada 1 baris
        }

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['judul', 'sub_judul', 'tombol_text', 'yt_id']);
        // $crud->setTexteditor(['description']);

        // $crud->setFieldUploadMultiple('video', 'uploads', url('uploads')."/");
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
            'judul_menu' => 'Tentang Kami (Header)',
            'judul_link' => ['Edit Profil', 'Edit Tentang Kami (Header)'],
            'link' => '/profil/tentang-lsp'
        ]);
    }

    public function about_content()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('about_content');
        $crud->setSubject('About Content', 'About Content');
        $crud->columns(['heading', 'judul', 'span', 'sub_judul', 'text']);

        $rowCount = DB::table('about_content')->count();
        if ($rowCount >= 1) {
            $crud->unsetAdd(); // Menonaktifkan tombol "Add" jika sudah ada 1 baris
        }

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['heading', 'judul', 'span', 'sub_judul', 'text']);
        $crud->setTexteditor(['text']);

        // $crud->setFieldUploadMultiple('video', 'uploads', url('uploads')."/");
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
            'judul_menu' => 'Tentang Kami (Content)',
            'judul_link' => ['Edit Profil', 'Edit Tentang Kami (Content)'],
            'link' => '/profil/tentang-lsp'
        ]);
    }
}
