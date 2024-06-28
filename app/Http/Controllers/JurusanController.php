<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Database\Events\StatementPrepared;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Url;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class JurusanController extends Controller
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
    public function kelolaJurusan(){
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);
        // $crud->setTheme('bootstrap-v4');
        $crud->setTable('jurusan');
        $crud->setSubject('Jurusan', 'Jurusan');
        $crud->columns(['kode_jurusan','nama_jurusan']);
        
        $crud->addFields(['kode_jurusan','nama_jurusan']);
        $crud->editFields(['kode_jurusan','nama_jurusan']);
        $crud->requiredFields(['kode_jurusan','nama_jurusan']);
        // $crud->callbackBeforeInsert(function ($stateParameters) {
        //     $stateParameters->data['siswa_password'] = password_hash($stateParameters->data['nama'], PASSWORD_DEFAULT);
        //     return $stateParameters;
        // });
        // $crud->callbackAddField('kode_kelas',function ($stateParameters){
        //     $data="<select class='form-control' id='kode_kelas' name='kode_kelas'><option value=''>-</option>";
        //     $postKelas = DB::select('SELECT * FROM kelas');
        //     foreach($postKelas as $row){
        //         $data.="<option value='".$row->kode_kelas."'>".$row->nama_kelas."</option>";
        //     }
        //     $data.="</select>";
        //     return $data;
        // });
        // $crud->callbackAddField('kode_jurusan',function ($stateParameters){
        //     $data="<select class='form-control' id='kode_jurusan' name='kode_jurusan'><option value=''>-</option>";
        //     $postKelas = DB::select('SELECT * FROM jurusan');
        //     foreach($postKelas as $row){
        //         $data.="<option value='".$row->kode_jurusan."'>".$row->nama_jurusan."</option>";
        //     }
        //     $data.="</select>";
        //     return $data;
        // });
        $crud->callbackEditField('kode_jurusan',function ($value, $row){
            return "<input type='text' id='kode_jurusan' name='kode_jurusan' class='form-control' value='".$value."' disabled>";
        });
        $crud->setConfig('actions_column_side', 'right');
        $crud->setConfig('paging_options', [10,50,100,200]);
        $crud->setConfig('default_per_page', 10);
        $crud->setConfig('publish_events', true);
        $crud->setConfig('actions_column_side', 'left');
        
        
        // $crud->requiredAddFields(['nama','copyright','logo']);
        // $crud->displayAs('name','Nama');
        // $crud->fieldType('password', 'password');
        // $crud->fieldType('email', 'email');

        //$crud->unsetColumns(['id','name','email','password','remember_token','email_verified_at','created_at','updated_at']);
        // $crud->setPrimaryKey('slug','aplikasi');
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        // $crud->unsetDelete();
        // $crud->unsetAdd();
        // $crud->unsetSearchColumns(['nama','copyright','logo']);
        $crud->setFieldUpload('logo', 'uploads', url('uploads')."/");
        $crud->setCsrfTokenName('_token');
        $crud->setCsrfTokenValue(csrf_token());

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
            'judul' => "Manajemen Jurusan",
            'menu' => $postMenu,
            'aplikasi' => $postAplikasi,
            'active' => ["Master","Jurusan"],
            'posisi' =>0,
        ]);
        // "<script>window.addEventListener('gcrud.form.modal-close', () => {
        //         window.location.replace('". route('crudsiswa') ."');
        //     });</script>"
    }
    
}
