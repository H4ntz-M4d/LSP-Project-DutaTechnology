@extends('landing-page.layouts.layout')

@section('title', 'Ekosistem LSPTA')

@section('content')
<!-- HEADER -->
<section class="pt-8 pt-md-11">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-8">

                <!-- Heading -->
                <h1 class="display-4 text-center">
                    Alur Uji dan Skema Sertifikasi
                </h1>

                <!-- Text -->
                <p class="lead mb-7 text-center text-body-secondary">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis nec condimentum quam. Fusce pellentesque faucibus lorem at viverra. Integer at feugiat odio. In placerat euismod risus proin.
                </p>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>

<!-- detailCard  -->
<div class="modal fade" id="detailCard" tabindex="-1" role="dialog" aria-labelledby="modalSignupVerticalTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="card">

                <!-- Close -->
                <button type="button" class="btn-close text-white" data-bs-dismiss="modal" aria-label="Close"></button>

                <!-- Image -->
                <img src="{{asset('assets/img/photos/photo-7.jpg')}}" alt="..." class="card-img-top">

                <!-- Shape -->
                <div class="position-relative">
                    <div class="shape shape-bottom shape-fluid-x text-white">
                        <svg viewBox="0 0 2880 480" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd" d="M2160 0C1440 240 720 240 720 240H0v240h2880V0h-720z" fill="currentColor" />
                        </svg>
                    </div>
                </div>

                <!-- Body -->
                <div class="card-body">

                    <!-- Heading -->
                    <h2 class="mb-0 fw-bold text-center" id="modalSignupVerticalTitle">
                        Sign Up
                    </h2>

                    <!-- Text -->
                    <p class="mb-6 text-center text-body-secondary">
                        Simplify your workflow in minutes.
                    </p>

                    <!-- Form -->
                    <form class="mb-6">

                        <!-- Email -->
                        <div class="form-group">
                            <label class="visually-hidden" for="modalSignupVerticalEmail">
                                Your email
                            </label>
                            <input type="email" class="form-control" id="modalSignupVerticalEmail" placeholder="Your email">
                        </div>

                        <!-- Password -->
                        <div class="form-group mb-5">
                            <label class="visually-hidden" for="modalSignupVerticalPassword">
                                Create a password
                            </label>
                            <input type="password" class="form-control" id="modalSignupVerticalPassword" placeholder="Create a password">
                        </div>

                        <!-- Submit -->
                        <button class="btn w-100 btn-primary" type="submit">
                            Sign up
                        </button>

                    </form>

                    <!-- Text -->
                    <p class="mb-0 fs-sm text-center text-body-secondary">
                        Already have an account? <a href="./signin-illustration.html">Log in</a>.
                    </p>

                </div>

            </div>
        </div>
    </div>
</div>

<!-- SECTION -->
<section class="pt-6 pt-md-8">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-12 col-md-10 col-lg-9 col-xl-11">

                <!-- Fugure -->
                <figure class="figure mb-7">

                    <!-- Image -->
                    <img class="figure-img img-fluid rounded lift lift-lg" src="{{ asset('assets/img/photos/photo-28.jpg') }}" alt="...">

                    <!-- Caption -->
                    <figcaption class="figure-caption text-center">
                        Ekosistem LSPTA
                    </figcaption>

                </figure>

                <!-- Text -->
                <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi reiciendis odio perferendis libero saepe voluptatum fugiat dolore voluptates aut, ut quas doloremque quo ad quis ipsum molestias neque pariatur commodi.
                </p>
                <p class="mb-0">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Doloribus, quidem, earum! Quo fugiat voluptates similique quidem dolorem ex non quibusdam odio suscipit error, maiores, itaque blanditiis vel, sed, cum velit?
                </p>

            </div>
        </div> <!-- / .row -->
    </div> <!-- / .container -->
</section>
@endsection