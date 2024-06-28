<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Database\Events\StatementPrepared;
use Illuminate\Support\Facades\Hash;
use PharIo\Manifest\Url;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\DB;

class UsersController extends Controller
{
     /**
     * An empty index page for navigation purposes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function mendaftar(){
        return view('mendaftar');
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function datagrid()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('users');
        $crud->setSubject('Pengguna', 'Pengguna');
        $crud->columns(['name','email','password']);
        
        $crud->addFields(['name','email','password']);
        $crud->editFields(['id','name','email','password']);
        // $crud->callbackColumn('password', function ($value, $row) {
        //     if (!empty($value)) {
        //         return "<a class='btn btn-info' href='/users/" . $row->id."' target='blank'>$value</a>";
        //     } else {
        //         // Make sure that you return white space or else the cell may break on print layout
        //         return '&nbsp;';
        //     }
        // });
        // $crud->displayAs('password','jumlah');
        $crud->callbackColumn('password',function(){
            return "*********";
        });
    
        // $crud->setActionButton('Pesan', 'fa fa-user-plus', function ($row) {
        //     return 'javascript:alert("opoo")';},false);   

        $crud->callbackBeforeInsert(function ($stateParameters) {
            $stateParameters->data['password'] = Hash::make($stateParameters->data['password']);
            $stateParameters->data['slug'] = md5($stateParameters->data['name'].date("Y-m-d h:s"));
            return $stateParameters;
        });

        $crud->callbackBeforeUpdate(function ($stateParameters) {
            if($stateParameters->data['password']!=""){
                $stateParameters->data['password'] = Hash::make($stateParameters->data['password']);
            }else{
                $post12 = DB::select('SELECT * FROM users where id=?',array($stateParameters->data["id"]));
                foreach($post12 as $row){
                    $stateParameters->data['password'] =$row->password;
                }
            }
            $stateParameters->data['slug'] = md5($stateParameters->data['name'].date("Y-m-d h:s"));
            return $stateParameters;
        });
        $crud->setPrimaryKey("slug","users");
        $crud->callbackEditField('password', function ($fieldValue, $primaryKeyValue, $rowData) {
            return '<input type="password" class="form-control" name="password" value="" placeholder="Masukkan Password Baru"  />';
        });
        $crud->callbackEditField('id', function ($fieldValue, $primaryKeyValue, $rowData) {
            return '<input type="text" class="form-control" name="id" value="'.$rowData["id"].'" disabled />';
        });
        // $crud->setConfig('open_in_modal', false);
        $crud->setConfig('paging_options', [10,50,100,200]);
        $crud->setConfig('default_per_page', 10);
        // $crud->setConfig('xss_clean', true);
        $crud->displayAs('name','Nama');
        $crud->fieldType('password', 'password');
        $crud->fieldType('email', 'email');
        $crud->requiredAddFields(['name','email','password']);
        $postHapus = DB::select('SELECT * FROM users');
        $jum=0;
        foreach($postHapus as $r){
            $jum++;
        }
        if($jum==1){
            $crud->unsetDelete();
        }
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
            'judul' => "Manajemen Pengguna",
            'menu' => $postMenu,
            'aplikasi' => $postAplikasi,
            'active' => ["Pengguna",""],
            'posisi' =>0,
        ]);
        
    }

    public function registrasi(Request $request)
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);
        // $crud->setTheme('bootstrap-v4');
        $crud->setTable('users');
        $crud->setSubject('Users', 'Users');
        // $crud->columns(['name']);
        
        $crud->addFields(['name','email','password']);
        
        $crud->callbackBeforeInsert(function ($stateParameters) {
            $stateParameters->data['password'] = Hash::make($stateParameters->data['password']);
            $stateParameters->data['slug'] = md5($stateParameters->data['name']);
            return $stateParameters;
        });

        $crud->callbackBeforeUpdate(function ($stateParameters) {
            $stateParameters->data['password'] = Hash::make($stateParameters->data['password']);
            $stateParameters->data['slug'] = md5($stateParameters->data['name']);
            return $stateParameters;
        });

        $crud->where([
            'id' => -1,
        ]);
        // $crud->where([
        //     '1=? limit 3' => 1
        // ]);
        
        $crud->callbackAfterInsert(function ($stateParameters) {
            $redirectResponse = new \GroceryCrud\Core\Redirect\RedirectResponse();
            return $redirectResponse->setUrl(route('login'));
        });
        // echo $request->segment(2);
        if($request->segment(2)==""){
            return Redirect::to(route('login'));
        }

        // $crud->callbackAddField('name',function ($stateParameters){
        //     return "<input type='text' class='gc-form-input-106 form-control' style='margin-top:10px;'>";
        // });
        $crud->setConfig('open_in_modal', false);
        $crud->setConfig('actions_column_side', 'right');
        $crud->setConfig('paging_options', [3,20,50,100]);
        $crud->setConfig('default_per_page', 3);
        $crud->setConfig('publish_events', true);
        $crud->setConfig('actions_column_side', 'left');
        
        
        $crud->requiredAddFields(['name','email','password']);
        $crud->displayAs('name','Nama');
        $crud->fieldType('password', 'password');
        $crud->fieldType('email', 'email');

        //$crud->unsetColumns(['id','name','email','password','remember_token','email_verified_at','created_at','updated_at']);
        // $crud->setPrimaryKey('email','users');
        // $crud->unsetFilters();
        // $crud->unsetColumnsButton();
        // $crud->unsetPrint();
        // $crud->unsetExport();
        // $crud->unsetSettings();
        // $crud->unsetOperations();
        // $crud->unsetTools();
        // $crud->unsetCssIcons();
        // $crud->unsetSettings();
        // $crud->unsetTools();
        //$crud->unsetSearchColumns(['remember_token','email_verified_at','created_at','updated_at']);
        
        $crud->defaultOrdering('id', 'desc');

        $crud->setCsrfTokenName('_token');
        $crud->setCsrfTokenValue(csrf_token());

        $output = $crud->render();

        if ($output->isJSONResponse) {

            header('Content-Type: application/json; charset=utf-8');
            echo $output->output;
            // echo "ini lho ".$output->output;
            exit;
        }

        $css_files = $output->css_files;
        $js_files = $output->js_files;
        $output = $output->output;
        
        return view('default_template2', [
            'output' => $output,
            'css_files' => $css_files,
            'js_files' => $js_files,
            'tambahan' => "<script>window.addEventListener('gcrud.form.modal-close', () => {
                window.location.replace('". route('login') ."');
            });</script>",
            'judul' => "Registrasi",
        ]);
        
    }
    
    
}
