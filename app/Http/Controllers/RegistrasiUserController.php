<?php

namespace App\Http\Controllers;

use App\Models\RegistrasiUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class RegistrasiUserController extends Controller
{
    public function create()
    {
        // URL API
        $urlProvinces = 'https://wilayah.id/api/provinces.json';

        // Mengambil data dari API
        $response = Http::get($urlProvinces);

        // Memeriksa apakah permintaan berhasil
        if ($response->successful()) {
            $data = $response->json();
            $provinces = [];

            // Mengambil ID dan nama provinsi dari data API
            foreach ($data['data'] as $item) {
                // ucfirst(strtolower($item['name']));
                $provinces[] = [
                    'id' => $item['code'],
                    'name' => $item['name']
                ];
            }

            // Mengembalikan view dengan data provinsi
            return view('landing-page.formulir.uji', [
                'judul_menu' => 'Account',
                'provinces' => $provinces
            ]);
        }

        // Jika API gagal, kembalikan view dengan pesan error
        return view('landing-page.formulir.uji', [
            'judul_menu' => 'Account',
            'provinces' => [],
            'error' => 'Gagal mengambil data dari API'
        ]);
    }

    public function getKabupaten($provinsiId)
    {
        // URL API untuk kabupaten berdasarkan ID provinsi
        $url = "https://wilayah.id/api/regencies/{$provinsiId}.json";

        // Mengambil data dari API
        $response = Http::get($url);

        if ($response->successful()) {
            $data = $response->json();
            $kabupaten = [];
            // Mengambil ID dan nama provinsi dari data API
            foreach ($data['data'] as $item) {
                // ucfirst(strtolower($item['name']));
                $kabupaten[] = [
                    'id' => $item['code'],
                    'name' => $item['name']
                ];
            }
            return response()->json($kabupaten); // Mengembalikan data kabupaten dalam format JSON
        }

        return response()->json([], 500); // Jika gagal, kembalikan respon kosong
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'ktp_nik_passport' => 'required|string|max:50',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:LK,PR',
            'provinsi' => 'required|string|max:100',
            'kabupaten' => 'required|string|max:100',
            'alamat_rumah' => 'required|string',
            'kode_pos_pribadi' => 'required|string|max:10',
            'nomor_telepon_pribadi' => 'required|string|max:20',
            'email_pribadi' => 'required|string|email|max:255',
            'pendidikan' => 'required|string|max:255',
            'lembaga' => 'nullable|string|max:255',
            'jabatan' => 'nullable|string|max:255',
            'alamat_kantor' => 'nullable|string',
            'kode_pos_kantor' => 'nullable|string|max:10',
            'nomor_telepon_kantor' => 'nullable|string|max:20',
            'fax' => 'nullable|string|max:20',
            'email_kantor' => 'nullable|string|email|max:255',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'nama.string' => 'Nama harus berupa teks.',
            'nama.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'ktp_nik_passport.required' => 'Nomor KTP / NIK / Passport wajib diisi.',
            'ktp_nik_passport.string' => 'Nomor KTP / NIK / Passport harus berupa teks.',
            'ktp_nik_passport.max' => 'Nomor KTP / NIK / Passport tidak boleh lebih dari 50 karakter.',
            'tempat_lahir.required' => 'Tempat lahir wajib diisi.',
            'tempat_lahir.string' => 'Tempat lahir harus berupa teks.',
            'tempat_lahir.max' => 'Tempat lahir tidak boleh lebih dari 255 karakter.',
            'tanggal_lahir.required' => 'Tanggal lahir wajib diisi.',
            'tanggal_lahir.date' => 'Tanggal lahir harus berupa tanggal yang valid.',
            'jenis_kelamin.required' => 'Jenis kelamin wajib dipilih.',
            'jenis_kelamin.in' => 'Jenis kelamin yang dipilih tidak valid.',
            'provinsi.required' => 'Provinsi wajib dipilih.',
            'provinsi.string' => 'Provinsi harus berupa teks.',
            'provinsi.max' => 'Provinsi tidak boleh lebih dari 100 karakter.',
            'kabupaten.required' => 'Kabupaten wajib dipilih.',
            'kabupaten.string' => 'Kabupaten harus berupa teks.',
            'kabupaten.max' => 'Kabupaten tidak boleh lebih dari 100 karakter.',
            'alamat_rumah.required' => 'Alamat rumah wajib diisi.',
            'alamat_rumah.string' => 'Alamat rumah harus berupa teks.',
            'kode_pos_pribadi.required' => 'Kode pos pribadi wajib diisi.',
            'kode_pos_pribadi.string' => 'Kode pos pribadi harus berupa teks.',
            'kode_pos_pribadi.max' => 'Kode pos pribadi tidak boleh lebih dari 10 karakter.',
            'nomor_telepon_pribadi.required' => 'Nomor telepon pribadi wajib diisi.',
            'nomor_telepon_pribadi.string' => 'Nomor telepon pribadi harus berupa teks.',
            'nomor_telepon_pribadi.max' => 'Nomor telepon pribadi tidak boleh lebih dari 20 karakter.',
            'email_pribadi.required' => 'Email pribadi wajib diisi.',
            'email_pribadi.string' => 'Email pribadi harus berupa teks.',
            'email_pribadi.email' => 'Email pribadi harus berupa email yang valid.',
            'email_pribadi.max' => 'Email pribadi tidak boleh lebih dari 255 karakter.',
            'pendidikan.required' => 'Pendidikan wajib diisi.',
            'pendidikan.string' => 'Pendidikan harus berupa teks.',
            'pendidikan.max' => 'Pendidikan tidak boleh lebih dari 255 karakter.',
            'lembaga.string' => 'Lembaga harus berupa teks.',
            'lembaga.max' => 'Lembaga tidak boleh lebih dari 255 karakter.',
            'jabatan.string' => 'Jabatan harus berupa teks.',
            'jabatan.max' => 'Jabatan tidak boleh lebih dari 255 karakter.',
            'alamat_kantor.string' => 'Alamat kantor harus berupa teks.',
            'kode_pos_kantor.string' => 'Kode pos kantor harus berupa teks.',
            'kode_pos_kantor.max' => 'Kode pos kantor tidak boleh lebih dari 10 karakter.',
            'nomor_telepon_kantor.string' => 'Nomor telepon kantor harus berupa teks.',
            'nomor_telepon_kantor.max' => 'Nomor telepon kantor tidak boleh lebih dari 20 karakter.',
            'fax.string' => 'Fax harus berupa teks.',
            'fax.max' => 'Fax tidak boleh lebih dari 20 karakter.',
            'email_kantor.string' => 'Email kantor harus berupa teks.',
            'email_kantor.email' => 'Email kantor harus berupa email yang valid.',
            'email_kantor.max' => 'Email kantor tidak boleh lebih dari 255 karakter.',
        ]);

        RegistrasiUser::create($request->all());

        return redirect()->route('verify')->with('success', 'Post created successfully.');
    }
}
