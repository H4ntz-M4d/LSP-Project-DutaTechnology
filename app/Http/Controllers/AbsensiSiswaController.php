<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Database\Events\StatementPrepared;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Url;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class AbsensiSiswaController extends Controller
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
    public function kelolaAbsensiSiswa(){
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);
        // $crud->setTheme('bootstrap-v4');
        $crud->setTable('vsiswa');
        $crud->setSubject('Absensi Siswa', 'Absensi Siswa');
        $crud->columns(['nis','siswa','nip','guru','kode_mapel','mapel','kalender_absensi','nama_keterangan']);
        $crud->setPrimaryKey('id_absensi','vsiswa');
        
        $crud->addFields(['nis','nip','kode_mapel','kalender_absensi','nama_keterangan']);
        $crud->editFields(['nis','nip','kode_mapel','kalender_absensi','nama_keterangan']);
        $crud->requiredFields(['nis','nip','kode_mapel','kalender_absensi','nama_keterangan']);
        $crud->callbackColumn('siswa',function ($value, $row){
            $post = DB::select('SELECT * FROM siswa where nis=?',array($row->nis));
            $nama=NULL;
            foreach($post as $r){
                $nama=$r->nama;
            }
            return $nama;
        });
        $crud->callbackColumn('guru',function ($value, $row){
            $post = DB::select('SELECT * FROM guru where nip=?',array($row->nip));
            $nama=NULL;
            foreach($post as $r){
                $nama=$r->nama;
            }
            return $nama;
        });
        $crud->callbackColumn('mapel',function ($value, $row){
            $post = DB::select('SELECT * FROM mapel where kode_mapel=?',array($row->kode_mapel));
            $nama=NULL;
            foreach($post as $r){
                $nama=$r->nama_mapel;
            }
            return $nama;
        });
        $crud->callbackEditField('nis',function($value,$row){
            $post = DB::select('SELECT * FROM siswa where nis=?',array($value));
            foreach($post as $r){
                $nama=$r->nama;
            }
            return "<input type='text' id='nis' name='nis' class='form-control' value='".$value."' disabled>".$nama;
        });
        $crud->callbackEditField('nip',function($value,$row){
            $post = DB::select('SELECT * FROM guru where nip=?',array($value));
            foreach($post as $r){
                $nama=$r->nama;
            }
            return "<input type='text' id='nip' name='nip' class='form-control' value='".$value."' disabled>".$nama;
        });
        $crud->callbackEditField('kode_mapel',function($value,$row){
            $post = DB::select('SELECT * FROM mapel where kode_mapel=?',array($value));
            foreach($post as $r){
                $nama=$r->nama_mapel;
            }
            return "<input type='text' id='kode_mapel' name='kode_mapel' class='form-control' value='".$value."' disabled>".$nama;
        });
        $crud->callbackBeforeUpdate(function ($stateParameters) {
            $hasil=null;
            if($stateParameters->data['nama_keterangan']=="Hadir"){
                $hasil="01";
            }else if($stateParameters->data['nama_keterangan']=="Sakit"){
                $hasil="02";
            }else if($stateParameters->data['nama_keterangan']=="Izin"){
                $hasil="04";
            }else if($stateParameters->data['nama_keterangan']=="Alpha"){
                $hasil="05";
            }
            $stateParameters->data['kode_keterangan'] = $hasil;
            return $stateParameters;
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

        $crud->unsetSearchColumns(['siswa','guru','mapel']);
        // $crud->setPrimaryKey('slug','aplikasi');
        // $crud->unsetFilters();
        // $crud->unsetColumnsButton();
        // $crud->unsetPrint();
        // $crud->unsetExport();
        // $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetAdd();
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
            'judul' => "Manajemen Absensi Siswa",
            'menu' => $postMenu,
            'aplikasi' => $postAplikasi,
            'active' => ["Absensi","Siswa"],
            'posisi' =>0,
        ]);
        // "<script>window.addEventListener('gcrud.form.modal-close', () => {
        //         window.location.replace('". route('crudsiswa') ."');
        //     });</script>"
    }
    
}
