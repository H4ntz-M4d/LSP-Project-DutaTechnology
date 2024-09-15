<?php

namespace App\Http\Controllers;

use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Symfony\Component\VarDumper\VarDumper;

class AlurUjiDanSkemaSertifikasiController extends Controller
{
    /**
     * An empty index page for navigation purposes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $au_ss_headers = DB::select('select * from alur_uji_header');
        $au_ss_contents = DB::select('select * from alur_uji_dan_skema_sertifikasi');
        return view('landing-page.sertifikasi.alur-uji-dan-skema-sertifikasi', [
            'au_ss_headers' => $au_ss_headers,
            'au_ss_contents' => $au_ss_contents
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
    public function alurUjiHeader()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('alur_uji_header');
        $crud->setSubject('Alur Uji dan Skema Sertifikasi Header', 'Alur Uji dan Skema Sertifikasi Header');

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
            'judul_menu' => 'Alur Uji dan Skema Sertifikasi (Header)',
            'judul_link' => ['Edit Sertifikasi', 'Edit Alur dan Skema Sertifikasi (Header)'],
            'link' => '/sertifikasi/alur-uji-dan-skema-sertifikasi'
        ]);
    }

    public function datagrid()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('alur_uji_dan_skema_sertifikasi');
        $crud->setSubject('Alur Uji dan Skema Sertifikasi', 'Alur Uji dan Skema Sertifikasi');

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetSearchColumns(['judul', 'deskripsi', 'gambar']);
        $crud->setTexteditor(['description']);

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
            'judul_menu' => 'Alur Uji dan Skema Sertifikasi',
            'judul_link' => ['Edit Sertifikasi', 'Edit Alur dan Skema Sertifikasi'],
            'link' => '/sertifikasi/alur-uji-dan-skema-sertifikasi'
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
