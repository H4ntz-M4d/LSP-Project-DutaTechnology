<?php

namespace App\Http\Controllers;

use GroceryCrud\Core\GroceryCrud;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visi_content = DB::select('select * from visi_content');
        return view('landing-page.profil.visi-misi', [
            'visi_content' => $visi_content
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
    public function visi_content()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('visi_content');
        $crud->setSubject('Visi Misi Content', 'Visi Misi Content');
        $crud->columns(['judul', 'sub_judul', 'text']);

        $rowCount = DB::table('visi_content')->count();
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
        $crud->unsetSearchColumns(['judul', 'sub_judul', 'text']);
        $crud->setTexteditor(['sub_judul', 'text']);

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
            'judul_menu' => 'Visi Misi',
            'judul_link' => ['Edit Profil', 'Edit Visi Misi'],
            'link' => '/profil/visi-misi'
        ]);
    }
}
