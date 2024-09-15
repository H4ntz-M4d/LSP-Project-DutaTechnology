<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Http\Request;
use Illuminate\View\View;

class tempat_uji_kompeten_controller extends Controller
{
    /**
     * An empty index page for navigation purposes.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Request $request): View
    {
        // Mengambil data header
        $header = DB::select('select * from judul_tempat_uk');

        // Query dasar untuk mengambil semua data dari tabel_tempat_uk
        $query = DB::table('tabel_tempat_uk');

        // Jika ada request 'search', tambahkan kondisi pencarian
        if ($request->has('search')) {
            $search = $request->input('search');
            $query->where('nama_tuk', 'like', '%' . $search . '%')
                ->orWhere('alamat', 'like', '%' . $search . '%');
        }

        // Menjalankan query dan mengambil hasilnya
        $tabel = $query->paginate(10);

        // Mengembalikan view dengan data header dan tabel
        return view('landing-page.sertifikasi.tempat-uji-kompetensi', [
            "header" => $header,
            "tabel" => $tabel
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
    public function topLandingPage()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('judul_tempat_uk');
        $crud->setSubject('Judul Tempat Uji Komtensi', 'Judul Tempat Uji Komtensi');

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
        $crud->unsetSearchColumns(['judul', 'deskripsi', 'gambar']);
        $crud->columns(['judul']);
        $crud->requiredFields(['judul']);
        $crud->editFields(['judul']);
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
            'judul_menu' => 'Tempat Uji Kompetensi (Header)',
            'judul_link' => ['Edit Sertifikasi', 'Edit Tempat Uji Kompetensi (Header)'],
            'link' => '/sertifikasi/tempat-uji'
        ]);
    }

    public function tableLandingPage()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('tabel_tempat_uk');
        $crud->setSubject('Tempat Uji Kompetensi', 'Tempat Uji Kompetensi');

        //tambahan
        // $crud->unsetAdd();
        $crud->setConfig('actions_column_side', 'right');
        // $crud->setConfig('open_in_modal',false);
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        // $crud->unsetDelete();
        // $crud->unsetSearchColumns(['nama_tuk','deskripsi','gambar']);
        // $crud->columns(['nama_tuk']);
        $crud->requiredFields(['nama_tuk']);
        // $crud->editFields(['nama_tuk']);
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
            'judul_menu' => 'Tempat Uji Kompetensi (Table)',
            'judul_link' => ['Edit Sertifikasi', 'Edit Tempat Uji Kompetensi (Table)'],
            'link' => '/sertifikasi/tempat-uji'
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