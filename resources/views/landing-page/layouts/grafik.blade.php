<div class="container">
    <section class="py-6 py-md-8 " data-aos="fade-up" data-aos-delay="100">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-8 text-center">
                @foreach ($berita_headers as $item)
                    <!-- Badge -->
                    <span class="badge rounded-pill text-bg-primary-subtle mb-3">
                        <span class="h6 text-uppercase">{{ $item->category }}</span>
                    </span>

                    <!-- Heading -->
                    <h1>
                        Grafik LSP <br>
                        Polinema
                    </h1>
                @endforeach
            </div>
        </div>
        <div class="container" style="border-radius: 20px; background-color:rgb(236, 238, 255)">
            <div class="card card-flush h-lg-100">
                <!--begin::Body-->
                <div class="card-body pt-10 px-0">
                    <!--begin::Chart-->
                    <div id="kt_charts_widget_1" class="min-h-auto ps-4 pe-6 mb-3" style="height: 350px"></div>
                    <!--end::Chart-->
                </div>
                <!--end::Body-->
            </div>

        </div>
    </section>
</div>

<script>
    var hostUrl = "asset/";
</script>
<!--begin::Global Javascript Bundle(mandatory for all pages)-->
<script src="asset/plugins/global/plugins.bundle.js"></script>
<script src="asset/js/scripts.bundle.js"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Vendors Javascript(used for this page only)-->
<script src="asset/plugins/custom/datatables/datatables.bundle.js"></script>
<!--end::Vendors Javascript-->
<!--begin::Custom Javascript(used for this page only)-->
<script src="asset/js/custom/account/settings/signin-methods.js"></script>
<script src="asset/js/custom/account/settings/profile-details.js"></script>
<script src="asset/js/custom/account/settings/deactivate-account.js"></script>
<script src="asset/js/custom/pages/user-profile/general.js"></script>
<script src="asset/js/widgets.bundle.js"></script>
<!-- tambahan -->
<script src="asset/js/sideBarActive.js"></script>
<!-- tambahan -->
<script src="asset/js/custom/apps/chat/chat.js"></script>
<script src="asset/js/custom/utilities/modals/upgrade-plan.js"></script>
<script src="asset/js/custom/utilities/modals/create-campaign.js"></script>
<script src="asset/js/custom/utilities/modals/two-factor-authentication.js"></script>
<script src="asset/js/custom/utilities/modals/users-search.js"></script>
