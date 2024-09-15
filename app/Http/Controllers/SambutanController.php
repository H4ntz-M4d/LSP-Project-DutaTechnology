<?php

namespace App\Http\Controllers;

use GroceryCrud\Core\GroceryCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SambutanController extends Controller
{
    public function index()
    {
        $sambutan_header = DB::select('select * from sambutan_header');
        $sambutan_content = DB::select('select * from sambutan_content');
        return view('landing-page.profil.sambutan', [
            'sambutan_header' => $sambutan_header,
            'sambutan_content' => $sambutan_content
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
    public function sambutan_header()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('sambutan_header');
        $crud->setSubject('Sambutan Header', 'Sambutan Header');
        $crud->columns(['header', 'judul', 'sub_judul', 'video']);

        $rowCount = DB::table('sambutan_header')->count();
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
        $crud->unsetSearchColumns(['header', 'judul', 'sub_judul', 'video']);
        // $crud->setTexteditor(['description']);

        $crud->setFieldUploadMultiple('video', 'uploads', url('uploads') . "/");
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
            'judul_menu' => 'Sambutan (Header)',
            'judul_link' => ['Edit Profil', 'Edit Sambutan (Header)'],
            'link' => '/profil/sambutan-direktur'
        ]);
    }

    public function sambutan_content()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('sambutan_content');
        $crud->setSubject('Sambutan Content', 'Sambutan Content');
        $crud->columns(['judul', 'deskripsi', 'sub_judul', 'teks', 'image']);

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['judul', 'deskripsi', 'sub_judul', 'teks', 'image']);
        $crud->setTexteditor(['teks']);

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
            'judul_menu' => 'Sambutan (Content)',
            'judul_link' => ['Edit Profil', 'Edit Sambutan (Content)'],
            'link' => '/profil/sambutan-direktur'
        ]);
    }
}
