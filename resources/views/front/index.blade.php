@extends('front.layouts.master')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5 wow fadeIn" data-wow-delay="0.1s">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('assets/front/img/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">We Will Keep You
                                An Awesome Look</h1>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i
                                    class="fa fa-map-marker-alt text-primary me-3"></i>{{ \App\Models\Setting::getByKey('address','content') }}</h4>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i
                                    class="fa fa-phone-alt text-primary me-3"></i>{{ \App\Models\Setting::getByKey('phone','content') }}</h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('assets/front/img/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex align-items-center justify-content-center text-start">
                        <div class="mx-sm-5 px-5" style="max-width: 900px;">
                            <h1 class="display-2 text-white text-uppercase mb-4 animated slideInDown">Luxury Haircut at
                                Affordable Price</h1>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i
                                    class="fa fa-map-marker-alt text-primary me-3"></i>{{ \App\Models\Setting::getByKey('address','content') }}</h4>
                            <h4 class="text-white text-uppercase mb-4 animated slideInDown"><i
                                    class="fa fa-phone-alt text-primary me-3"></i>{{ \App\Models\Setting::getByKey('phone','content') }}</h4>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Carousel End -->


    <!-- About Start -->
    <div id="about-us" class="container-xxl py-5">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="d-flex flex-column">
                        <img class="img-fluid w-75 align-self-end" src="{{ asset('assets/front/img/about.jpg') }}"
                             alt="">
                        <div class="w-50 bg-secondary p-5" style="margin-top: -25%;">
                            <h1 class="text-uppercase text-primary mb-3">25 Years</h1>
                            <h2 class="text-uppercase mb-0">Experience</h2>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <p class="d-inline-block bg-secondary text-primary py-1 px-4">About Us</p>
                    <h1 class="text-uppercase mb-4">More Than Just A Haircut. Learn More About Us!</h1>
                    <p>Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet diam et eos. Clita
                        erat ipsum et lorem et sit, sed stet lorem sit clita duo justo magna dolore erat amet</p>
                    <p class="mb-4">Stet no et lorem dolor et diam, amet duo ut dolore vero eos. No stet est diam rebum
                        amet diam ipsum. Clita clita labore, dolor duo nonumy clita sit at, sed sit sanctus dolor
                        eos.</p>
                    <div class="row g-4">
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3">Since 1990</h3>
                            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                                diam et eos.</p>
                        </div>
                        <div class="col-md-6">
                            <h3 class="text-uppercase mb-3">1000+ clients</h3>
                            <p class="mb-0">Tempor erat elitr rebum at clita. Diam dolor diam ipsum sit. Aliqu diam amet
                                diam et eos.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div id="services" class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">{{ \App\Models\Setting::getByKey('services','title') }}</p>
                <h1 class="text-uppercase">{{ \App\Models\Setting::getByKey('services','content') }}</h1>
            </div>
            <div class="row g-4">
                @foreach($services as $service)
                    <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item position-relative overflow-hidden bg-secondary d-flex h-100 p-5 ps-0">
                            <div class="bg-dark d-flex flex-shrink-0 align-items-center justify-content-center"
                                 style="width: 60px; height: 60px;">
                                <img class="img-fluid" src="{{ asset('assets/front/img/haircut.png') }}" alt="">
                            </div>
                            <div class="ps-4">
                                <h3 class="text-uppercase mb-3">{{ $service->name }}</h3>
                                <p>{{ $service->description }}</p>
                                <span class="text-uppercase text-primary">From ${{ $service->price }}</span>
                            </div>
                            <a class="btn btn-square" href=""><i class="fa fa-plus text-primary"></i></a>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Service End -->


    <!-- Price Start -->
    <div id="price" class="container-xxl py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                        <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">{{ \App\Models\Setting::getByKey('price-plan','title') }}</p>
                        <h1 class="text-uppercase mb-4">{{ \App\Models\Setting::getByKey('price-plan','content') }}</h1>
                        <div>
                            @foreach($services as $service)
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">{{ $service->name }}</h6>
                                    <span class="text-uppercase text-primary">${{ $service->price }}</span>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="h-100">
                        <img class="img-fluid h-100"
                             src="{{ \App\Models\Setting::getImage('price-plan') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Price End -->


    <!-- Team Start -->
    <div id="team" class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">{{ \App\Models\Setting::getByKey('our-barber','title') }}</p>
                <h1 class="text-uppercase">{{ \App\Models\Setting::getByKey('our-barber','content') }}</h1>
            </div>
            <div class="row g-4">
                @foreach($stylists as $stylist)
                    <div class="col-lg-3 col-md-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="team-item">
                            <div class="team-img position-relative overflow-hidden">
                                <img class="img-fluid" width="300px" height="300px"
                                     src="{{ $stylist->getFirstMediaUrl('stylist_image','home_preview') }}" alt="">
                                <div class="team-social">
                                    <a class="btn btn-square" href=""><i class="fab fa-facebook-f"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-twitter"></i></a>
                                    <a class="btn btn-square" href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                            <div class="bg-secondary text-center p-4">
                                <h5 class="text-uppercase">{{ $stylist->name }}</h5>
                                <span class="text-primary">{{ $stylist->specialization->name }}</span>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- Team End -->


    <!-- Working Hours Start -->
    <div id="open" class="container-xxl py-5">
        <div class="container">
            <div class="row g-0">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="h-100">
                        <img class="img-fluid h-100" src="{{ \App\Models\Setting::getImage('working-hours') }}" alt="">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="bg-secondary h-100 d-flex flex-column justify-content-center p-5">
                        <p class="d-inline-flex bg-dark text-primary py-1 px-4 me-auto">{{ \App\Models\Setting::getByKey('working-hours', 'title') }}</p>
                        <h1 class="text-uppercase mb-4">{{ \App\Models\Setting::getByKey('working-hours', 'content') }}</h1>
                        <div>
                            @foreach(\App\Models\WorkingHour::workingDays() as $workDay)
                                <div class="d-flex justify-content-between border-bottom py-2">
                                    <h6 class="text-uppercase mb-0">{{ $workDay->day }}</h6>
                                    <span class="text-uppercase">{{ $workDay->from }} - {{ $workDay->to }}</span>
                                </div>
                            @endforeach
                            <div class="d-flex justify-content-between py-2">
                                <h6 class="text-uppercase mb-0">{{ implode(' / ', App\Models\WorkingHour::offDays()) }}</h6>
                                <span class="text-uppercase text-primary">Closed</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Working Hours End -->


    <!-- Testimonial Start -->
    <div id="testimonial" class="container-xxl py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 wow fadeInUp" data-wow-delay="0.1s" style="max-width: 600px;">
                <p class="d-inline-block bg-secondary text-primary py-1 px-4">Testimonial</p>
                <h1 class="text-uppercase">What Our Clients Say!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel wow fadeInUp" data-wow-delay="0.1s">
                <div class="testimonial-item text-center"
                     data-dot="<img class='img-fluid' src='{{ asset('assets/front/img/testimonial-1.jpg') }}' alt=''>">
                    <h4 class="text-uppercase">Client Name</h4>
                    <p class="text-primary">Profession</p>
                    <span class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</span>
                </div>
                <div class="testimonial-item text-center"
                     data-dot="<img class='img-fluid' src='{{ asset('assets/front/img/testimonial-2.jpg') }}' alt=''>">
                    <h4 class="text-uppercase">Client Name</h4>
                    <p class="text-primary">Profession</p>
                    <span class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</span>
                </div>
                <div class="testimonial-item text-center"
                     data-dot="<img class='img-fluid' src='{{ asset('assets/front/img/testimonial-3.jpg') }}' alt=''>">
                    <h4 class="text-uppercase">Client Name</h4>
                    <p class="text-primary">Profession</p>
                    <span class="fs-5">Clita clita tempor justo dolor ipsum amet kasd amet duo justo duo duo labore sed sed. Magna ut diam sit et amet stet eos sed clita erat magna elitr erat sit sit erat at rebum justo sea clita.</span>
                </div>
            </div>
        </div>
    </div>
    <!-- Testimonial End -->
@endsection
