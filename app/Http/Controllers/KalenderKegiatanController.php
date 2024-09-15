<?php

namespace App\Http\Controllers;

use App\Models\Bulan;
use Illuminate\View\View;
use App\Models\KalenderKegiatan;
use GroceryCrud\Core\GroceryCrud;
use Illuminate\Support\Facades\DB;
use Symfony\Component\VarDumper\VarDumper;

class KalenderKegiatanController extends Controller
{
    /**
     * An empty index page for navigation purposes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $kk_headers = DB::select('select * from kalender_kegiatan_header')[0];

        // Get the distinct bulan IDs from kalender_kegiatan
        $bulanIds = DB::table('kalender_kegiatan')
            ->select('id_bulan')
            ->distinct()
            ->pluck('id_bulan');

        // Fetch distinct bulan records based on the IDs
        $bulan = Bulan::whereIn('id', $bulanIds)->get();

        // Get all kalender_kegiatan grouped by bulan
        $kalenderKegiatan = KalenderKegiatan::with('bulan') // Ensure you have defined the relationship in your model
            ->whereIn('id_bulan', $bulanIds)
            ->get()
            ->groupBy('id_bulan');

        // Hitung jumlah item di setiap grup
        $jumlahDataPerBulan = $kalenderKegiatan->map(function ($group) {
            return $group->count();
        });

        return view('landing-page.informasi.kalender-kegiatan', [
            'bulan' => $bulan,
            'kalenderKegiatan' => $kalenderKegiatan,
            'jumlahDataPerBulan' => $jumlahDataPerBulan,
            'kk_headers' => $kk_headers
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
    public function kalenderKegiatanHeader()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('kalender_kegiatan_header');
        $crud->setSubject('Kalender Kegiatan Header', 'Kalender Kegiatan Header');

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
            'judul_menu' => 'Kalender Kegiatan (Header)',
            'judul_link' => ['Edit Informasi', 'Edit Kalender Kegiatan (Header)'],
            'link' => '/informasi/kalender-kegiatan'
        ]);
    }

    public function datagrid()
    {
        $database = $this->_getDatabaseConnection();
        $config = config('grocerycrud');

        $crud = new GroceryCrud($config, $database);

        $crud->setTable('kalender_kegiatan');
        $crud->setSubject('Kalender Kegiatan', 'Kalender Kegiatan');
        $crud->columns(['kegiatan', 'minggu', 'id_bulan']);
        $crud->setRelation('id_bulan', 'bulan', 'bulan');
        $crud->displayAs('id_bulan', 'Bulan');

        //tambahan
        // $crud->unsetAdd();
        $crud->unsetFilters();
        $crud->unsetColumnsButton();
        $crud->unsetPrint();
        $crud->unsetExport();
        $crud->unsetSettings();
        $crud->unsetSearchColumns(['kegiatan', 'minggu', 'id_bulan']);

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
            'judul_menu' => 'Kalender Kegiatan',
            'judul_link' => ['Edit Informasi', 'Edit Kalender Kegiatan'],
            'link' => '/informasi/kalender-kegiatan'
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
