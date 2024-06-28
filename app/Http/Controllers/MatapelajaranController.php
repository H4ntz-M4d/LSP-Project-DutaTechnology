<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Database\Events\StatementPrepared;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Url;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class MatapelajaranController extends Controller
{
    
    //
    public function index()
    {
        //
    }

    private function _getDatabaseConnection() {
        $databaseConnection = config('database.default');
        $databaseConfig = config('database.connections.' . $databaseConnection);


        return [
            'adapter' => [
                'driver' => 'Pdo_Mysql',
                'database' => $databaseConfig['database'],
                'username' => $databaseConfig['username'],
                'password' => $databaseConfig['password'],
                'host' => $databaseConfig['host'],
                'charset' => 'utf8'
            ]
        ];
    }
    public function kelolaMatapelajaran(){
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);
        // $crud->setTheme('bootstrap-v4');
        $crud->setTable('mapel');
        $crud->setSubject('Mata Pelajaran', 'Mata Pelajaran');
        $crud->columns(['kode_mapel','nama_mapel']);
        
        $crud->addFields(['kode_mapel','nama_mapel']);
        $crud->editFields(['kode_mapel','nama_mapel']);
        $crud->requiredFields(['kode_mapel','nama_mapel']);
        $crud->callbackEditField('kode_mapel',function ($value, $row){
            return "<input type='text' id='kode_mapel' name='kode_mapel' class='form-control' value='".$value."' disabled>";
        });
        $crud->setConfig('paging_options', [10,50,100,200]);
        $crud->setConfig('default_per_page', 10);
        $crud->setConfig('publish_events', true);
        $crud->setConfig('actions_column_side', 'left');
        $crud->setCsrfTokenName('_token');
        $crud->setCsrfTokenValue(csrf_token());
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $output = $crud->render();

        if ($output->isJSONResponse) {

            header('Content-Type: application/json; charset=utf-8');
            echo $output->output;
            exit;
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;
        // untuk menu
        $postMenu = DB::select('SELECT * FROM menus');
        //  untuk aplikasi
        $postAplikasi = DB::select('SELECT * FROM aplikasi');

        return view('default_template3', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'tambahan' => "",
            'judul' => "Manajemen Mata Pelajaran",
            'menu' => $postMenu,
            'aplikasi' => $postAplikasi,
            'active' => ["Master","Mata Pelajaran"],
            'posisi' =>0,
        ]);
        // "<script>window.addEventListener('gcrud.form.modal-close', () => {
        //         window.location.replace('". route('crudsiswa') ."');
        //     });</script>"
    }
    
}
