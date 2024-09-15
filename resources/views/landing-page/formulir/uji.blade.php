@extends('landing-page.formulir.registration-layouts.layout')

@section('title', 'Registrasi')

@section('content')
    <!--begin::Content wrapper-->
    <div class="d-flex flex-column flex-column-fluid">
        <!--begin::Content-->
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">
                <!--begin::Navbar-->
                <div class="card card-flush mb-9 mt-9" id="kt_user_profile_panel">
                    {{-- <!--begin::Hero nav-->
                                    <div class="card-header rounded-top bgi-size-cover size-h-200px"
                                        style="background-position: 100% 50%; background-image:url('assets/media/misc/profile-head-bg.jpg')">
                                    </div>
                                    <!--end::Hero nav--> --}}
                    <!--begin::Hero nav-->
                    <div class="card-header rounded-top bgi-size-cover size-h-200px"
                        style="background-position: 100% 50%; background-color: #4087c4">
                    </div>
                    <!--end::Hero nav-->
                    <!--begin::Body-->
                    <div class="card-body">
                        <!--begin::Details-->
                        <div class="m-0">
                            <!--begin: Pic-->
                            <div class="d-flex flex-stack align-items-end pb-0">
                                <div class="symbol symbol-125px symbol-lg-150px symbol-fixed position-relative mt-n3">
                                    {{-- <img src="assets/media/avatars/300-3.jpg" alt="image"
                                            class="border border-white border-4" style="border-radius: 20px" /> --}}
                                    {{-- <div
                                            class="position-absolute translate-middle bottom-0 start-100 ms-n1 mb-9 bg-success rounded-circle h-15px w-15px">
                                        </div> --}}
                                </div>
                            </div>
                            <!--end::Pic-->
                            <!--begin::Info-->
                            <div class="d-flex flex-stack flex-wrap align-items-end">
                                <!--begin::User-->
                                <div class="d-flex flex-column">
                                    <!--begin::Name-->
                                    <div class="d-flex align-items-center mb-2">
                                        <h1 class="text-gray-800 text-hover-primary fs-2 fw-bolder me-1">
                                            Registrasi User
                                        </h1>
                                    </div>
                                    <!--end::Name-->
                                    <!--begin::Text-->
                                    <span class="fw-bold text-gray-600 fs-6 mb-2 d-block">
                                        FR.APL.01. FORMULIR PERMOHONAN SERTIFIKASI KOMPETENSI</span>
                                    <!--end::Text-->
                                </div>
                                <!--end::User-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Details-->
                    </div>
                </div>
                <!--end::Navbar-->
                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_account_profile_details" aria-expanded="true"
                        aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Bagian 1 : Rincian Data Pemohon Sertifikasi</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <form id="kt_sign_in_form" action="{{ route('registrasi.store') }}" method="POST">
                            @csrf
                            <div class="card-body border-top p-9">
                                <!-- Display success or error messages -->
                                @if (session('success'))
                                    <div class="alert alert-success">
                                        {{ session('success') }}
                                    </div>
                                @endif
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <h5 class="fw-bold m-0">A. Data Pribadi</h5>
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="nama" autocomplete="off"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="{{ old('nama') }}" />
                                                <!--end::Col-->
                                                @error('nama')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="nama">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">No.
                                                KTP / NIK /
                                                PASSPORT
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="ktp_nik_passport" autocomplete="off"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="{{ old('ktp_nik_passport') }}" />
                                                @error('ktp_nik_passport')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="ktp_nik_passport">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tempat
                                                Lahir
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="tempat_lahir"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="{{ old('tempat_lahir') }}" />
                                                @error('tempat_lahir')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="tempat_lahir">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Tanggal
                                                Lahir
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="date" name="tanggal_lahir"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="{{ old('tanggal_lahir') }}" />
                                                @error('tanggal_lahir')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="tanggal_lahir">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">Jenis Kelamin</span>
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Jenis Kelamin">
                                                    <i class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                        <span class="path1"></span>
                                                        <span class="path2"></span>
                                                        <span class="path3"></span>
                                                    </i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <select id="jenis_kelamin" name="jenis_kelamin"
                                                    aria-label="Pilih jenis kelamin" data-control="select2"
                                                    data-placeholder="Pilih jenis kelamin"
                                                    class="form-select form-select-solid form-select-lg fw-semibold">
                                                    <option value="">Pilih jenis kelamin</option>
                                                    <option value="LK"
                                                        {{ old('jenis_kelamin') == 'LK' ? 'selected' : '' }}>
                                                        Laki-laki
                                                    </option>
                                                    <option value="PR"
                                                        {{ old('jenis_kelamin') == 'PR' ? 'selected' : '' }}>
                                                        Perempuan
                                                    </option>
                                                </select>

                                                @error('jenis_kelamin')
                                                    <small id="jenis_kelamin_error" class="form-text text-danger error-message"
                                                        data-for="jenis_kelamin">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!-- Provinsi -->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">Provinsi</span>
                                            </label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="provinsi" id="provinsi" aria-label="Pilih Provinsi"
                                                    data-control="select2" data-placeholder="Pilih Provinsi"
                                                    class="form-select form-select-solid form-select-lg fw-semibold">
                                                    <option value="">Pilih Provinsi</option>
                                                    @foreach ($provinces as $province)
                                                        <option value="{{ $province['name'] }}"
                                                            data-id="{{ $province['id'] }}"
                                                            {{ old('provinsi') == $province['name'] ? 'selected' : '' }}>
                                                            {{ $province['name'] }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                                @error('provinsi')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="provinsi">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6" id="kabupaten-container" style="display: none;">
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">Kabupaten</span>
                                            </label>
                                            <div class="col-lg-8 fv-row">
                                                <select name="kabupaten" id="kabupaten" aria-label="Pilih Kabupaten"
                                                    data-control="select2" data-placeholder="Pilih Kabupaten"
                                                    class="form-select form-select-solid form-select-lg fw-semibold">
                                                    <option value="">Pilih Kabupaten</option>
                                                </select>
                                                @error('kabupaten')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="kabupaten">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Alamat
                                                Rumah
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="alamat_rumah"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="{{ old('alamat_rumah') }}" />
                                                @error('alamat_rumah')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="alamat_rumah">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kode
                                                Pos
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="kode_pos_pribadi"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="{{ old('kode_pos_pribadi') }}" />
                                                @error('kode_pos_pribadi')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="kode_pos_pribadi">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nomor
                                                Telepon
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="nomor_telepon_pribadi"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="{{ old('nomor_telepon_pribadi') }}" />
                                                @error('nomor_telepon_pribadi')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="nomor_telepon_pribadi">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Email
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="email" name="email_pribadi"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="{{ old('email_pribadi') }}" />
                                                @error('email_pribadi')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="email_pribadi">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kualifikasi
                                                /
                                                Pendidikan
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="pendidikan"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="{{ old('pendidikan') }}" />
                                                @error('pendidikan')
                                                    <small class="form-text text-danger error-message"
                                                        data-for="pendidikan">{{ $message }}</small>
                                                @enderror
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <h5 class="fw-bold m-0">B. Data Pekerjaan Sekarang</h5>
                                    <!--begin::Card body-->
                                    <div class="card-body p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Perusahaan
                                                /
                                                Lembaga
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="lembaga"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Jabatan
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="jabatan"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Alamat
                                                Kantor
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="alamat-kantor"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Kode
                                                Pos
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="kode-pos-kantor"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Nomor
                                                Telepon
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="nomor-telepon-kantor"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Fax
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="fax"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--begin::Input group-->
                                        <div class="row mb-6">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">Email
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8 fv-row">
                                                <input type="text" name="email-kantor"
                                                    class="form-control form-control-lg form-control-solid" placeholder=""
                                                    value="" />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card body-->
                                </div>
                            </div>
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset" class="btn btn-light btn-active-light-primary me-2">Hapus</button>
                                <button type="submit" class="btn btn-primary">
                                    {{-- <button type="submit" id="kt_sign_in_submit" class="btn btn-primary"> --}}
                                    <!--begin::Indicator label-->
                                    <span class="indicator-label">Simpan</span>
                                    <!--end::Indicator label-->
                                    <!--begin::Indicator progress-->
                                    <span class="indicator-progress">Please wait...
                                        <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                    <!--end::Indicator progress-->
                                </button>
                            </div>
                            <!--end::Actions-->
                        </form>
                        <!--end::Form-->
                    </div>
                    <!--end::Content-->
                </div>
                <!--end::Basic info-->
            </div>
            <!--end::Content container-->
        </div>
        <!--end::Content-->
    </div>
    <!--end::Content wrapper-->
@endsection
