<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SkemaSertifikasiController extends Controller
{
    /**
     * An empty index page for navigation purposes.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request): View
    {
        $sertifikasi = DB::select('select * from struktur_header_ss');
        $modal = DB::select('select * from struktur_modal_ss');

        return view('landing-page.sertifikasi.skema-sertifikasi', ["skema" => $sertifikasi, "modal" => $modal]);
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
    public function topLandingPage()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('struktur_header_ss');
        $crud->setSubject('Skema Sertifikasi', 'Skema Sertifikasi');
        $crud->columns(['judul']);
        // $crud->mapColumn('skema', 'id');
        // $crud->callbackColumn('skema', function ($value, $row) {
        //     $d = DB::select("select * from struktur_modal_ss where id_header=?", array($value));
        //     $data = "";
        //     foreach ($d as $r) {
        //         $data = $data . $r->judul_modal . "<br>";
        //     }
        //     return $data;
        // });

        // $crud->callbackEditField('judul', function ($fieldValue, $primaryKeyValue, $rowData) {
        //     return "<input type='text' class='form-control' name='judul' value='" . $fieldValue . "'>
        //     <iframe style='border:1px solid #cccccc;border-radius:10px;margin-top:5px;' src='" . url('/skema-sertifikasi-modal?id_header=') . $primaryKeyValue . "' height='300px' width='100%' title='Iframe Example'></iframe>
        // ";
        // });

        //tambahan
        $crud->unsetAdd();
        $crud->unsetEditFields(['deskripsi', 'gambar']);
        $crud->setConfig('actions_column_side', 'right');
        // $crud->setConfig('open_in_modal',false);
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['judul', 'deskripsi', 'gambar']);
        // $crud->columns(['judul']);
        $crud->requiredFields(['judul']);
        // $crud->setActionButton('Avatar', 'fa fa-user', function ($row) {
        //     return '#/avatar/' . $row->id;
        // }, false);
        // $crud->editFields(['judul','deskripsi']);
        // $crud->setTexteditor(['deskripsi']);
        // $crud->setFieldUploadMultiple('gambar', 'uploads', url('uploads')."/");

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
            'judul_menu' => 'Skema Sertifikasi',
            'judul_link' => ['Edit Sertifikasi', 'Edit Skema Sertifikasi'],
            'link' => '/sertifikasi/skema-sertifikasi'
        ]);
    }

    public function modalLandingPage()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('struktur_modal_ss');
        $crud->setSubject('Skema Sertifikasi Modal', 'Skema Sertifikasi Modal');

        //tambahan
        // $crud->unsetAdd();
        $crud->setConfig('actions_column_side', 'right');
        // $crud->setConfig('open_in_modal',false);
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['judul_modal', 'sub_judul_modal', 'isi_modal']);
        // $crud->columns(['judul']);
        $crud->requiredFields(['judul_modal']);
        // $crud->editFields(['judul']);
        $crud->setTexteditor(['isi_modal']);
        // $crud->setFieldUploadMultiple('gambar', 'uploads', url('uploads')."/");

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
            'judul_menu' => 'Skema Sertifikasi Modal',
            'judul_link' => ['Edit Sertifikasi', 'Edit Skema Sertifikasi Modal'],
            'link' => '/sertifikasi/skema-sertifikasi'
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
