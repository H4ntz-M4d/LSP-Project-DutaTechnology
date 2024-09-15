<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class SkkniController extends Controller
{
    /**
     * An empty index page for navigation purposes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $skkni_headers = DB::select('select * from skkni_header');
        $skkni_contents = DB::select('select * from skkni');
        return view('landing-page.sertifikasi.skkni', [
            'skkni_headers' => $skkni_headers,
            'skkni_contents' => $skkni_contents
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
    public function skkniHeader()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('skkni_header');
        $crud->setSubject('SKKNI Header', 'SKKNI Header');

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetSearchColumns(['category', 'title']);

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
            'judul_menu' => 'Standar Kompetensi Kerja Nasional Indonesia (SKKNI Header)',
            'judul_link' => ['Edit Sertifikasi', 'Edit SKKNI (Header)'],
            'link' => '/sertifikasi/skkni'
        ]);
    }

    public function datagrid()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('skkni');
        $crud->setSubject('SKKNI', 'SKKNI');

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetSearchColumns(['judul', 'deskripsi', 'gambar']);
        $crud->setTexteditor(['deskripsi']);

        $crud->setFieldUploadMultiple('gambar', 'uploads', url('uploads') . "/");

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
            'judul_menu' => 'Standar Kompetensi Kerja Nasional Indonesia (SKKNI)',
            'judul_link' => ['Edit Sertifikasi', 'Edit SKKNI'],
            'link' => '/sertifikasi/skkni'
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
