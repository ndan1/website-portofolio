@extends('navbar')
@section('container')
    <div class="container px-5 my-5">
        <div class="text-center mb-5">
            <h1 class="display-5 fw-bolder mb-0"><span class="text-gradient d-inline">Projects</span></h1>
        </div>
        <div class="row gx-5 justify-content-center">
            <div class="col-lg-11 col-xl-9 col-xxl-10">
                <!-- Project Section-->
                <section>
                    <!-- Project Card 1-->
                    <div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5">
                            <div class="row align-items-center gx-5">
                                <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                    <img class="project-img" src="project1.png" alt="">
                                </div>
                                <div class="col-lg-8"><h1>Website Company Page</h1><div>During my internship coding test, I created a landing page project for the company "FoodNow". This website is used to promote the FoodNow application. This website was created with HTML, CSS, and JavaScript without using any framework/library.</div></div>
                            </div>
                        </div>
                    </div>
                    <!-- Project Card 2-->
                    <div class="card shadow border-0 rounded-4 mb-5">
                        <div class="card-body p-5">
                            <div class="row align-items-center gx-5">
                                <div class="col text-center text-lg-start mb-4 mb-lg-0">
                                    <img class="project-img" src="project2.png" alt="">
                                </div>
                                <div class="col-lg-8"><h1>Mobile Apps UI</h1><div>During college, my team created a UI display for a mobile-based e-learning application, and this application was used to help run our business idea, namely "Sekolahku".</div></div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
@stop
