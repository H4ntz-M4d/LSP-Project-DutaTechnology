<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use GroceryCrud\Core\GroceryCrud;
use Symfony\Component\VarDumper\VarDumper;

class HeaderController extends Controller
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

    private function _getDatabaseConnection() {
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

        $crud->setTable('header');
        $crud->setSubject('Header', 'Header');

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetDelete();
        $crud->unsetSearchColumns(['judul','deskripsi','gambar']);

        $crud->setFieldUploadMultiple('gambar', 'uploads', url('uploads')."/");

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

        return view('default_template', [
            'output' => $output,
            'js_files' => $js_files
        ]);
    }
    
    public function login()
    {
        $postMenu = DB::select('SELECT * FROM migrations');
        foreach($postMenu as $r){
            var_dump($r->migration);
        }
    }
}