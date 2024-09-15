<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Berita;
use Illuminate\View\View;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class BeritaController extends Controller
{
    /**
     * An empty index page for navigation purposes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        // Use the query builder to retrieve paginated results
        $berita_headers = DB::select('select * from berita_header');
        
        $berita_contents = DB::table('berita')
            ->orderBy('created_at', 'desc')
            ->paginate(3); // 3 items per page

        return view('landing-page.informasi.berita', [
            'berita_headers' => $berita_headers,
            'berita_contents' => $berita_contents
        ]);
    }

    public function singleBerita(Berita $berita): View
    {
        return view('landing-page.informasi.detail-berita', ['berita' => $berita]);
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

    public function beritaHeader()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('berita_header');
        $crud->setSubject('Berita Header', 'Berita Header');

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetSearchColumns(['category', 'title', 'sub_title', 'description']);

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
            'judul_menu' => 'Berita Header',
            'judul_link' => ['Edit Informasi', 'Edit Berita'],
            'link' => '/informasi/berita'
        ]);
    }

    public function datagrid()
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
        $crud->unsetSearchColumns(['judul', 'deskripsi', 'gambar', 'created_at', 'updated_at']);
        $crud->displayAs('created_at', 'Dibuat pada');
        $crud->displayAs('updated_at', 'Diubah pada');
        $crud->setTexteditor(['deskripsi']);

        $crud->setFieldUploadMultiple('gambar', 'uploads', url('uploads') . "/");

        $crud->setCsrfTokenName('_token');
        $crud->setCsrfTokenValue(csrf_token());

        $crud->callbackBeforeInsert(function ($stateParameters) {

            $current_time = Carbon::now();
            $stateParameters->data['created_at'] = $current_time->format('Y/m/d H:i:s');
            $stateParameters->data['updated_at'] = $current_time->format('Y/m/d H:i:s');

            return $stateParameters;
        });

        $crud->callbackBeforeUpdate(function ($stateParameters) {

            $stateParameters->data['updated_at'] = Carbon::now()->format('Y/m/d H:i:s');

            return $stateParameters;
        });

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
            'judul_menu' => 'Berita',
            'judul_link' => ['Edit Informasi', 'Edit Berita'],
            'link' => '/informasi/berita'
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
