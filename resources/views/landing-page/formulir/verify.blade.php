@extends('landing-page.formulir.registration-layouts.layout')
@section('title', 'Verify')

@section('content')

<section class="py-8 py-md-11 bg-gradient-light-white">
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div id="kt_app_content" class="app-content flex-column-fluid">
            <!--begin::Content container-->
            <div id="kt_app_content_container" class="app-container container-xxl">

                <!--begin::Basic info-->
                <div class="card mb-5 mb-xl-10">
                    <!--begin::Card header-->
                    <div class="card-header border-0 cursor-pointer" role="button"
                        data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details"
                        aria-expanded="true" aria-controls="kt_account_profile_details">
                        <!--begin::Card title-->
                        <div class="card-title m-0">
                            <h3 class="fw-bold m-0">Verify Data</h3>
                        </div>
                        <!--end::Card title-->
                    </div>
                    <!--begin::Card header-->
                    <!--begin::Content-->
                    <div id="kt_account_settings_profile_details" class="collapse show">
                        <!--begin::Form-->
                        <form id="kt_account_profile_details_form" class="form">
                            <!--begin::Card body-->
                            <div class="card-body border-top p-9">
                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label
                                        class="col-lg-4 col-form-label required fw-semibold fs-6">Nama</label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="text" name="company"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="Nama Lengkap" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">NIM</span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <input type="tel" name="phone"
                                            class="form-control form-control-lg form-control-solid"
                                            placeholder="NIM" />
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->

                                <!--begin::Input group-->
                                <div class="row mb-6">
                                    <!--begin::Label-->
                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                        <span class="required">Jurusan</span>
                                        <span class="ms-1" data-bs-toggle="tooltip"
                                            title="Country of origination">
                                            <i
                                                class="ki-duotone ki-information-5 text-gray-500 fs-6">
                                                <span class="path1"></span>
                                                <span class="path2"></span>
                                                <span class="path3"></span>
                                            </i>
                                        </span>
                                    </label>
                                    <!--end::Label-->
                                    <!--begin::Col-->
                                    <div class="col-lg-8 fv-row">
                                        <select name="country" aria-label="Select a Country"
                                            data-control="select2"
                                            data-placeholder="Pilih Jurusan"
                                            class="form-select form-select-solid form-select-lg fw-semibold">
                                            <option value="">Pilih Jurusan</option>
                                            @foreach ($jenjangProdi as $prodi)
                                                <option value="{{ $prodi }}">
                                                    {{ $prodi }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!--end::Col-->
                                </div>
                                <!--end::Input group-->
                            </div>
                            <!--end::Card body-->
                            <!--begin::Actions-->
                            <div class="card-footer d-flex justify-content-end py-6 px-9">
                                <button type="reset"
                                    class="btn btn-light btn-active-light-primary me-2">Discard</button>
                                <button type="submit" class="btn btn-primary"
                                    id="kt_account_profile_details_submit">Verify</button>
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
        <!--end::Wrapper-->
    </div>
</section>
@endsection
