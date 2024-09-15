@extends('landing-page.layouts.layout')

@section('title', 'Lembaga Sertifikasi Profesi Teknik Akutansi')

@section('content')
<section>
  <!-- WELCOME -->
  <section class="border-bottom">
    <div class="container">
      <div class="row align-items-stretch">
        <div class="col-12 col-md-6 offset-md-1 order-md-2">

          <!-- Slider (mobile) -->
          <div class="d-md-none img-cover" data-flickity='{"imagesLoaded": true, "wrapAround": true, "prevNextButtons": false, "pageDots": false}'>
            <div class="w-100">

              <!-- Image -->
              <img src="assets/img/covers/cover-12.jpg" alt="..." class="img-fluid">

            </div>
            <div class="w-100">

              <!-- Image -->
              <img src="assets/img/covers/cover-2.jpg" alt="..." class="img-fluid">

            </div>
          </div>

          <!-- Slider -->
          <div class="position-relative h-100 vw-50 d-none d-md-block" data-aos="fade-left">

            <!-- Slider -->
            <div class="flickity-button-bottom flickity-button-white h-100 w-100" data-flickity='{"imagesLoaded": true, "setGallerySize": false, "wrapAround": true, "pageDots": false}'>
              <div class="w-100 h-100 bg-cover" style="background-image: url(assets/img/covers/cover-9.jpg);"></div>
              <div class="w-100 h-100 bg-cover" style="background-image: url(assets/img/covers/cover-2.jpg);"></div>
            </div>

            <!-- Shape -->
            <div class="shape shape-start shape-fluid-y svg-shim text-white">
              <svg viewBox="0 0 100 1544" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M0 0h100v386l-50 772v386H0V0z" fill="currentColor"/></svg>              </div>

          </div>

        </div>
        <div class="col-12 col-md-5 py-8 py-md-14 order-md-1" data-aos="fade-right">

          <!-- Heading -->
          <h1 class="display-3">
            Ada Yang Bisa Kami  <span class="text-success">Bantu ?</span>
          </h1>

          <!-- Text -->
          <p class="lead text-body-secondary mb-6 mb-md-8">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsa nam quod nemo.
          </p>


        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->
  </section>

  <!-- FEATURES -->
  <section class="py-8 py-md-11 bg-light">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8 text-center">

          <!-- Heading -->
          <h2>
            <span class="text-primary">Frequently Ask Question</span>
          </h2>

          <!-- Text -->
          <p class="fs-lg text-body-secondary mb-7 mb-md-9 px-md-9">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Nemo dignissimos quas eum atque totam nam ullam, qui ab magni itaque impedit sequi suscipit dolore,
          </p>

        </div>
      </div> <!-- / .row -->
      <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">

          <!-- Card (Pertanyaan)-->
          <div class="accordion" id="featuresAccordion">
            <div class="accordion-item">

              <!-- Button -->
              <div class="accordion-button btn btn-primary" role="button" data-bs-toggle="collapse" data-bs-target="#featuresOne" aria-expanded="true" aria-controls="featuresOne">
                <div class="me-auto">

                  <!-- Title -->
                  <p class="fw-bold mb-0" id="featuresOneHeading">
                    Pertanyaan
                  </p>
                </div>
              </div>

              <!-- Collapse -->
              <div class="accordion-collapse collapse show" id="featuresOne" aria-labelledby="featuresOneHeading" data-bs-parent="#featuresAccordion">
                <div class="accordion-body">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat!
                  </p>
                
                </div>
              </div>

            </div>
            <div class="accordion-item">

              <!-- Button -->
              <div class="accordion-button collapsed btn btn-primary" role="button" data-bs-toggle="collapse" data-bs-target="#featuresTwo" aria-expanded="false" aria-controls="featuresTwo">
                <div class="me-auto">

                  <!-- Title -->
                  <p class="fw-bold mb-0" id="featuresTwoHeading">
                    Pertanyaan
                  </p>
                </div>

              </div>

              <!-- Collapse -->
              <div class="accordion-collapse collapse " id="featuresTwo" aria-labelledby="featuresTwoHeading" data-bs-parent="#featuresAccordion">
                <div class="accordion-body">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat!
                  </p>
                </div>
              </div>

            </div>
            <div class="accordion-item">

              <!-- Button -->
              <div class="accordion-button collapsed btn btn-primary" role="button" data-bs-toggle="collapse" data-bs-target="#featuresThree" aria-expanded="false" aria-controls="featuresThree">
                <div class="me-auto">

                  <!-- Title -->
                  <p class="fw-bold mb-0" id="featuresThreeHeading">
                    Pertanyaan
                  </p>
                </div>

              </div>

              <!-- Collapse -->
              <div class="accordion-collapse collapse" id="featuresThree" aria-labelledby="featuresThreeHeading" data-bs-parent="#featuresAccordion">
                <div class="accordion-body">
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat! Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt rerum minima a possimus, amet perferendis, temporibus obcaecati pariatur. Reprehenderit magnam necessitatibus vel culpa provident quas nesciunt sunt aut cupiditate fugiat!
                  </p>
                </div>
              </div>

            </div>
          </div>

        </div>
      </div> <!-- / .row -->
    </div> <!-- / .container -->
  </section>




@endsection
