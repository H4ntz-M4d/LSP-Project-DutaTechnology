<?php

namespace App\Http\Controllers;

use Illuminate\View\View;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class StrukturOrganisasiController extends Controller
{
    /**
     * An empty index page for navigation purposes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $so_headers = DB::select('select * from struktur_organisasi_header');
        $so_contents = DB::select('select * from struktur_organisasi');
        return view('landing-page.profil.struktur-organisasi', [
            'so_headers' => $so_headers,
            'so_contents' => $so_contents
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
    public function strukturOrganisasiHeader()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('struktur_organisasi_header');
        $crud->setSubject('Struktur Organisasi Header', 'Struktur Organisasi Header');

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
            'judul_menu' => 'Struktur Organisasi (Header)',
            'judul_link' => ['Edit Profile', 'Edit Struktur Organisasi (Header)'],
            'link' => '/profil/struktur-organisasi'
        ]);
    }

    public function datagrid()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('struktur_organisasi');
        $crud->setSubject('Struktur Organisasi', 'Struktur Organisasi');

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
            'judul_menu' => 'Struktur Organisasi',
            'judul_link' => ['Edit Profile', 'Edit Struktur Organisasi'],
            'link' => '/profil/struktur-organisasi'
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
