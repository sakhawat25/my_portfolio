@php
    $titlesArray = explode(', ', $user->titles);
    $lastTitle = array_pop($titlesArray); // Remove the last element

    $titlesString = implode(', ', $titlesArray); // Join elements with comma

    if (!empty($titlesString)) {
        $titlesString .= ' and '; // Add 'and' before the last element if there are more than one
    }

    $titlesString .= $lastTitle; // Append the last title
@endphp

<!DOCTYPE html>
<html lang="eng">

<head>
    <!-- Metas -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="keywords" content="HTML5 Template Gavi Multi-Purpose themeforest">
    <meta name="description" content="Gavi - Multi-Purpose HTML5 Template">
    <meta name="author" content="">

    <!-- Title  -->
    <title>Sakhawat Hussain</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/imgs/favicon.ico') }}">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Sora:wght@100;200;300;400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&amp;display=swap"
        rel="stylesheet">

    <!-- Plugins -->
    <link rel="stylesheet" href="{{ asset('assets/css/plugins.css') }}">

    <!-- Core Style Css -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

</head>

<body class="sub-bg" data-scroll-index="0">
    <!-- ==================== Start Loading ==================== -->
    <div class="loader-wrap">
        <svg viewBox="0 0 1000 1000" preserveAspectRatio="none">
            <path id="svg" d="M0,1005S175,995,500,995s500,5,500,5V0H0Z"></path>
        </svg>

        <div class="loader-wrap-heading">
            <div class="load-text">
                <span>L</span>
                <span>o</span>
                <span>a</span>
                <span>d</span>
                <span>i</span>
                <span>n</span>
                <span>g</span>
            </div>
        </div>
    </div>
    <!-- ==================== End Loading ==================== -->

    <div class="cursor"></div>


    <!-- ==================== Start progress-scroll-button ==================== -->
    <div class="progress-wrap cursor-pointer">
        <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>
    <!-- ==================== End progress-scroll-button ==================== -->



    <!-- ==================== Start lines ==================== -->
    <div class="lines">
        <span></span>
        <span></span>
        <span></span>
        <span></span>
        <span></span>
    </div>
    <!-- ==================== End lines ==================== -->


    <!-- ==================== Start contact button ==================== -->
    <div class="contact-fixed-butn">
        <div class="butn-presv">
            <a href="#0" class="butn butn-sm bg-white skew" data-scroll-nav="5">
                <span class="text-dark">Contact Us</span>
            </a>
        </div>
    </div>
    <!-- ==================== End contact button ==================== -->



    <!-- ==================== Start Navbar ==================== -->
    <div class="nav-top pt-30 pb-30">
        <div class="container">
            <div class="row">
                <div class="col-md-4 valign">
                    <a href="{{ route('homepage') }}" class="logo icon-img-60">
                        <span class="fs-4 fw-bold">Sakhawat.</span>
                    </a>
                </div>
                <div class="col-md-4 valign">
                    <div class="social text-center full-width">
                        @if ($user->github_link)
                            <a href="#0"><i class="fab fa-github"></i></a>
                        @endif

                        @if ($user->linkedin_link)
                            <a href="#0"><i class="fab fa-linkedin-in"></i></a>
                        @endif

                        @if ($user->twitter_link)
                            <a href="#0"><i class="fab fa-twitter"></i></a>
                        @endif

                        @if ($user->facebook_link)
                            <a href="#0"><i class="fab fa-facebook"></i></a>
                        @endif
                    </div>
                </div>
                <div class="col-md-4 valign">
                    <div class="full-width info">
                        <div class="d-flex justify-content-end">
                            <a href="mailto:abc@example.com">
                                <span class="sub-title fz-12">{{ $user->email }}</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="nav-butn">
                <span class="pe-7s-menu"></span>
            </div>
        </div>
    </div>
    <!-- ==================== End Navbar ==================== -->


    <main class="container">
        <!-- ==================== Start Intro ==================== -->
        <section class="intro-profile md-mb50">
            <div class="row rest">
                <div class="col-lg-4 box-img main-bg">
                    <div class="cont valign">
                        <div class="full-width">
                            <div class="img">
                                <img src="{{ asset('images/' . $user->image) }}" alt="">
                                <span class="icon">
                                    <img src="{{ asset('assets/imgs/header/icon1.png') }}" alt="">
                                </span>
                                <span class="icon">
                                    <img src="{{ asset('assets/imgs/header/icon2.png') }}" alt="">
                                </span>
                                <span class="icon">
                                    <img src="{{ asset('assets/imgs/header/icon4.png') }}" alt="">
                                </span>
                            </div>
                            <div class="info text-center mt-30">
                                <h5>{{ $user->first_name }} {{ $user->last_name }}</h5>
                            </div>
                            <div class="social text-center mt-20">
                                @if ($user->github_link)
                                    <a href="{{ $user->github_link }}"><i class="fab fa-github"></i></a>
                                @endif

                                @if ($user->linkedin_link)
                                    <a href="{{ $user->linkedin_link }}"><i class="fab fa-linkedin-in"></i></a>
                                @endif

                                @if ($user->twitter_link)
                                    <a href="{{ $user->twitter_link }}"><i class="fab fa-twitter"></i></a>
                                @endif

                                @if ($user->facebook_link)
                                    <a href="{{ $user->facebook_link }}"><i class="fab fa-facebook"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 content main-bg">
                    <h1>Hello, I’m <span class="main-color">{{ $user->first_name }} {{ $user->last_name }}</span>, <span class="bord">{{ $titlesString }}<i></i></span> Based in {{ $user->country }}.</h1>
                    <div class="stauts mt-80">
                        <div class="d-flex align-items-center">
                            <div class="mr-40">
                                <div class="d-flex align-items-center">
                                    <h2>2</h2>
                                    <p>Years <br> of Experance</p>
                                </div>
                            </div>
                            <div>
                                <div class="butn-presv">
                                    <a href="{{ url('files/' . $user->cv) }}" class="butn butn-md butn-bord radius-5 skew">
                                        <span>Dwonload C.V</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- ==================== End Intro ==================== -->



        <!-- ==================== Start Navbar ==================== -->
        <nav class="navbar">
            <div class="row justify-content-end rest">
                <div class="col-lg-8 rest">

                    <!-- navbar links -->
                    <ul class="navbar-nav main-bg d-flex justify-content-end">
                        <li class="nav-item">
                            <a href="{{ route('homepage') }}" data-scroll-nav="0"><span>Home</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#0" data-scroll-nav="1"><span>Services</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#0" data-scroll-nav="2"><span>About</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#0" data-scroll-nav="3"><span>Portfolio</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#0" data-scroll-nav="4"><span>Price</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#0" data-scroll-nav="5"><span>Contact</span></a>
                        </li>
                        <li class="nav-item">
                            <a href="#0" data-scroll-nav="6"><span>Blog</span></a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- ==================== End Navbar ==================== -->



        <section class="in-box">
            <!-- ==================== Start Services ==================== -->
            <div class="sec-box services section-padding bord-thin-bottom" data-scroll-index="1">
                <div class="sec-head mb-80 wow fadeInUp">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h6 class="sub-title opacity-7 mb-15">Our Services</h6>
                            <h3>Turn Information <span class="main-color">Into Actionable</span> Insights</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                        <div class="col-md-6">
                            <div class="item mb-40 wow fadeIn" data-wow-delay=".2s">
                                <span class="icon-img-70 mb-30 opacity-7">
                                    <img src="{{ asset('images/' . $service->logo) }}" alt="{{ $service->title }}">
                                </span>
                                <h6 class="text-u ls1 mb-15">{{ $service->title }}</h6>
                                <p>{{ $service->description }}</p>
                                <div class="bord-color"></div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <!-- ==================== End Services ==================== -->



            <!-- ==================== Start Skills ==================== -->
            <div class="sec-box skills section-padding bord-thin-bottom" data-scroll-index="2">
                <div class="row">
                    <div class="col-lg-4 valign">
                        <div class="sec-head md-mb80 wow fadeIn">
                            <h6 class="sub-title opacity-7 mb-15">Our Skills</h6>
                            <h3><span class="main-color">Technical Skills</span> & Achievements</h3>
                        </div>
                    </div>
                    <div class="col-lg-8">
                        <div class="row">
                            @foreach ($technicalSkills as $technicalSkill)
                                <div class="col-md-6">
                                    <div class="item mb-30">
                                        <div class="d-flex align-items-center mb-30">
                                            <div class="mr-30">
                                                <div class="img icon-img-40">
                                                    {{-- <img src="{{ asset('assets/imgs/resume/s1.png') }}" alt=""> --}}
                                                    <i class="fa fa-cogs"></i>
                                                </div>
                                            </div>
                                            <div>
                                                <h6 class="fz-18">{{ $technicalSkill->name }}</h6>
                                            </div>
                                        </div>
                                        <div class="skill-progress">
                                            <span class="progres" data-value="{{ $technicalSkill->level }}%"></span>
                                        </div>
                                        <span class="value">{{ $technicalSkill->level }}%</span>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="awards mt-100">
                    <div class="row md-marg">
                        @foreach ($certificates as $certificate)
                            @php
                                $month = \Carbon\Carbon::parse($certificate->issue_date)->month;
                                $year = \Carbon\Carbon::parse($certificate->issue_date)->year;
                            @endphp
                            <div class="col-lg-4">
                                <div class="award-item sub-bg md-mb30 wow fadeInUp" data-wow-delay=".2s">
                                    <div class="d-flex">
                                        <div>
                                            <span>{{ $month }}</span>
                                        </div>
                                        <div class="ml-auto">
                                            <span>{{ $year }}</span>
                                        </div>
                                    </div>
                                    <div class="fw-900 h4 mb-30 mt-80">
                                        {{ $certificate->provider }}
                                    </div>
                                    <h6>{{ $certificate->title }}</h6>
                                    <span class="sub-title main-color mt-10">{!! Str::limit($certificate->description, 100, '...') !!}</span>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- ==================== End Skills ==================== -->


            <!-- ==================== Start Portfolio ==================== -->
            <div class="sec-box portfolio section-padding" data-scroll-index="3">
                <div class="sec-head mb-30">
                    <div class="row">
                        <div class="col-lg-6">
                            <h6 class="sub-title opacity-7 mb-15">Our Portfolio</h6>
                            <h3>Look at my work & <br> give us <span class="main-color">your feedback</span></h3>
                        </div>
                        <div class="col-lg-6 valign">
                            <div class="go-more full-width d-flex justify-content-end">
                                <a href="works.html" class="d-flex">
                                    <span>View All Works <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 34.2 32.3" xml:space="preserve" style="stroke-width: 2;">
                                            <line x1="0" y1="16" x2="33" y2="16">
                                            </line>
                                            <line x1="17.3" y1="0.7" x2="33.2" y2="16.5">
                                            </line>
                                            <line x1="17.3" y1="31.6" x2="33.5" y2="15.4">
                                            </line>
                                        </svg></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="gallery">
                    <div class="row">
                        @foreach ($projects as $project)
                        <div class="col-lg-6 items">
                            <div class="item mt-50 wow fadeInUp" data-wow-delay=".2s">
                                <div class="img">
                                    <a href="{{ route('project-detail', $project->slug) }}">
                                        <img src="{{ asset('images/' . $project->image) }}" alt="{{ $project->title }}">
                                    </a>
                                </div>
                                <div class="cont mt-30 d-flex align-items-center">
                                    <div>
                                        <span class="tag">{{ $project->category }}</span>
                                        <h6 class="line-height-1"><a href="{{ route('project-detail', $project->slug) }}">{{ $project->title }}</a>
                                        </h6>
                                    </div>
                                    <div class="ml-auto">
                                        <div class="arrow">
                                            <a href="{{ route('project-detail', $project->slug) }}">
                                                <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                                    viewBox="0 0 34.2 32.3" xml:space="preserve"
                                                    style="stroke-width: 2;">
                                                    <line x1="0" y1="16" x2="33"
                                                        y2="16"></line>
                                                    <line x1="17.3" y1="0.7" x2="33.2"
                                                        y2="16.5"></line>
                                                    <line x1="17.3" y1="31.6" x2="33.5"
                                                        y2="15.4"></line>
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <!-- ==================== End Portfolio ==================== -->


            <!-- ==================== Start Testimonials ==================== -->
            {{-- <div class="sec-box testimonials section-padding">
                <div class="pad-left">
                    <div class="sec-head mb-80 wow fadeInUp">
                        <div class="row">
                            <div class="col-lg-7">
                                <h6 class="sub-title opacity-7 mb-15">Testimonials</h6>
                                <h3>Trusted by <span class="main-color">Hundered Clients</span></h3>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-9">
                            <div class="testim-swiper wow fadeIn" data-carousel="swiper" data-item="1"
                                data-space="30" data-speed="1000">
                                <div id="content-carousel-container-unq-testim" class="swiper-container"
                                    data-swiper="container">
                                    <div class="swiper-wrapper">
                                        <div class="swiper-slide">
                                            <div class="item d-flex">
                                                <div>
                                                    <div class="icon-img-60 mr-60">
                                                        <img src="{{ asset('assets/imgs/svg-assets/quote.png') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="cont mb-30">
                                                        <div class="d-flex align-items-center">
                                                            <div class="rate-stars fz-12">
                                                                <span class="rate main-color">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </span>
                                                                <span class="fz-12 opacity-7 ml-10">(71 Reviews)</span>
                                                            </div>
                                                        </div>
                                                        <p class="fz-20 mt-15">We have purchased well into the
                                                            thousands
                                                            of items, but this is without doubt one of the best we’ve
                                                            have
                                                            been
                                                            lucky enough to work on, the attention to detail apparent
                                                            throughout, and the delivery is impressively intuitive.</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="img">
                                                                <img src="{{ asset('assets/imgs/testim/1.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="ml-30">
                                                            <div class="info">
                                                                <h6 class="main-color">Leonard Heiser</h6>
                                                                <span class="fz-13 mt-10 opacity-8">Envato
                                                                    customer</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="item d-flex">
                                                <div>
                                                    <div class="icon-img-60 mr-60">
                                                        <img src="{{ asset('assets/imgs/svg-assets/quote.png') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="cont mb-30">
                                                        <div class="d-flex align-items-center">
                                                            <div class="rate-stars fz-12">
                                                                <span class="rate main-color">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </span>
                                                                <span class="fz-12 opacity-7 ml-10">(71 Reviews)</span>
                                                            </div>
                                                        </div>
                                                        <p class="fz-20 mt-15">We have purchased well into the
                                                            thousands
                                                            of items, but this is without doubt one of the best we’ve
                                                            have
                                                            been
                                                            lucky enough to work on, the attention to detail apparent
                                                            throughout, and the delivery is impressively intuitive.</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="img">
                                                                <img src="{{ asset('assets/imgs/testim/2.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="ml-30">
                                                            <div class="info">
                                                                <h6 class="main-color">Leonard Heiser</h6>
                                                                <span class="fz-13 mt-10 opacity-8">Envato
                                                                    customer</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide">
                                            <div class="item d-flex">
                                                <div>
                                                    <div class="icon-img-60 mr-60">
                                                        <img src="{{ asset('assets/imgs/svg-assets/quote.png') }}"
                                                            alt="">
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="cont mb-30">
                                                        <div class="d-flex align-items-center">
                                                            <div class="rate-stars fz-12">
                                                                <span class="rate main-color">
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                    <i class="fas fa-star"></i>
                                                                </span>
                                                                <span class="fz-12 opacity-7 ml-10">(71 Reviews)</span>
                                                            </div>
                                                        </div>
                                                        <p class="fz-20 mt-15">We have purchased well into the
                                                            thousands
                                                            of items, but this is without doubt one of the best we’ve
                                                            have
                                                            been
                                                            lucky enough to work on, the attention to detail apparent
                                                            throughout, and the delivery is impressively intuitive.</p>
                                                    </div>
                                                    <div class="d-flex align-items-center">
                                                        <div>
                                                            <div class="img">
                                                                <img src="{{ asset('assets/imgs/testim/3.jpg') }}"
                                                                    alt="">
                                                            </div>
                                                        </div>
                                                        <div class="ml-30">
                                                            <div class="info">
                                                                <h6 class="main-color">Leonard Heiser</h6>
                                                                <span class="fz-13 mt-10 opacity-8">Envato
                                                                    customer</span>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 d-flex align-items-end justify-content-end">
                            <div class="swiper-controls testim-controls arrow-out d-flex mr-20 ml-auto">
                                <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button"
                                    aria-label="Previous slide" aria-disabled="true">
                                    <span class="left">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.2031 10.3281L11.5781 15.9531C11.535 15.9961 11.4839 16.0303 11.4276 16.0536C11.3713 16.077 11.3109 16.089 11.25 16.089C11.1891 16.089 11.1287 16.077 11.0724 16.0536C11.0161 16.0303 10.965 15.9961 10.9219 15.9531C10.8788 15.91 10.8446 15.8588 10.8213 15.8025C10.798 15.7462 10.786 15.6859 10.786 15.6249C10.786 15.564 10.798 15.5036 10.8213 15.4473C10.8446 15.391 10.8788 15.3399 10.9219 15.2968L15.7422 10.4687H3.125C3.00068 10.4687 2.88145 10.4193 2.79354 10.3314C2.70564 10.2435 2.65625 10.1242 2.65625 9.99993C2.65625 9.87561 2.70564 9.75638 2.79354 9.66847C2.88145 9.58056 3.00068 9.53118 3.125 9.53118H15.7422L10.9219 4.70305C10.8349 4.61603 10.786 4.498 10.786 4.37493C10.786 4.25186 10.8349 4.13383 10.9219 4.0468C11.0089 3.95978 11.1269 3.91089 11.25 3.91089C11.3731 3.91089 11.4911 3.95978 11.5781 4.0468L17.2031 9.6718C17.2476 9.71412 17.2829 9.76503 17.3071 9.82143C17.3313 9.87784 17.3438 9.93856 17.3438 9.99993C17.3438 10.0613 17.3313 10.122 17.3071 10.1784C17.2829 10.2348 17.2476 10.2857 17.2031 10.3281Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </div>
                                <div class="swiper-button-next ml-50" tabindex="0" role="button"
                                    aria-label="Next slide" aria-disabled="false">
                                    <span class="right">
                                        <svg width="20" height="20" viewBox="0 0 20 20" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M17.2031 10.3281L11.5781 15.9531C11.535 15.9961 11.4839 16.0303 11.4276 16.0536C11.3713 16.077 11.3109 16.089 11.25 16.089C11.1891 16.089 11.1287 16.077 11.0724 16.0536C11.0161 16.0303 10.965 15.9961 10.9219 15.9531C10.8788 15.91 10.8446 15.8588 10.8213 15.8025C10.798 15.7462 10.786 15.6859 10.786 15.6249C10.786 15.564 10.798 15.5036 10.8213 15.4473C10.8446 15.391 10.8788 15.3399 10.9219 15.2968L15.7422 10.4687H3.125C3.00068 10.4687 2.88145 10.4193 2.79354 10.3314C2.70564 10.2435 2.65625 10.1242 2.65625 9.99993C2.65625 9.87561 2.70564 9.75638 2.79354 9.66847C2.88145 9.58056 3.00068 9.53118 3.125 9.53118H15.7422L10.9219 4.70305C10.8349 4.61603 10.786 4.498 10.786 4.37493C10.786 4.25186 10.8349 4.13383 10.9219 4.0468C11.0089 3.95978 11.1269 3.91089 11.25 3.91089C11.3731 3.91089 11.4911 3.95978 11.5781 4.0468L17.2031 9.6718C17.2476 9.71412 17.2829 9.76503 17.3071 9.82143C17.3313 9.87784 17.3438 9.93856 17.3438 9.99993C17.3438 10.0613 17.3313 10.122 17.3071 10.1784C17.2829 10.2348 17.2476 10.2857 17.2031 10.3281Z"
                                                fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <span class="icon-qoute">
                    <i class="fas fa-quote-left"></i>
                </span>
            </div> --}}
            <!-- ==================== End Testimonials ==================== -->


            <!-- ==================== Start price ==================== -->
            {{-- <div class="sec-box price section-padding" data-scroll-index="4">
                <div class="sec-head mb-80 wow fadeInUp">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 text-center">
                            <h6 class="sub-title opacity-7 mb-15">Best Pricing</h6>
                            <h3><span class="main-color">Flexible</span> Pricing Plan</h3>
                        </div>
                    </div>
                </div>
                <div class="row md-marg">
                    <div class="col-lg-4 valign">
                        <div class="item full-width md-mb50 wow fadeIn" data-wow-delay=".2s">
                            <div class="top-curv">
                                <span class="left"></span>
                                <h6 class="type">Basic</h6>
                                <span class="right"></span>
                            </div>

                            <div class="content">
                                <div class="amount d-flex align-items-end pb-50 mb-50 bord-thin-bottom">
                                    <h2 class="main-color">$19</h2>
                                    <p class="ml-20 fz-20">/ hour</p>
                                </div>
                                <div class="feat">
                                    <ul class="rest">
                                        <li><i class="fas fa-check"></i> <span>Need your wireframe</span></li>
                                        <li><i class="fas fa-check"></i> <span>Design with Figma, Framer</span></li>
                                        <li><i class="fas fa-check"></i> <span>Implement with Webflow, React,
                                                WordPress, Laravel/PHP</span></li>
                                        <li><i class="fas fa-check"></i> <span>Support 6 months</span></li>
                                    </ul>
                                </div>
                                <div class="text-center mt-50">
                                    <div class="butn-presv">
                                        <a href="#0" class="butn butn-md butn-bord radius-5 text-u full-width">
                                            <span>Get Started</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 valign">
                        <div class="item full-width md-mb50 wow fadeIn" data-wow-delay=".4s">
                            <div class="top-curv">
                                <span class="left"></span>
                                <h6 class="type">Popular</h6>
                                <span class="right"></span>
                            </div>

                            <div class="content">
                                <div class="amount d-flex align-items-end pb-50 mb-50 bord-thin-bottom">
                                    <h2 class="main-color">$39</h2>
                                    <p class="ml-20 fz-20">/ hour</p>
                                </div>
                                <div class="feat">
                                    <ul class="rest">
                                        <li><i class="fas fa-check"></i> <span>Need your wireframe</span></li>
                                        <li><i class="fas fa-check"></i> <span>Design with Figma, Framer</span></li>
                                        <li><i class="fas fa-check"></i> <span>Implement with Webflow, React,
                                                WordPress, Laravel/PHP</span></li>
                                        <li><i class="fas fa-check"></i> <span>Support 6 months</span></li>
                                        <li><i class="fas fa-check"></i> <span>Your project alway be priority</span>
                                        </li>
                                    </ul>
                                </div>
                                <div class="text-center mt-50">
                                    <div class="butn-presv">
                                        <a href="#0" class="butn butn-md butn-bord radius-5 text-u full-width">
                                            <span>Get Started</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 valign">
                        <div class="item full-width wow fadeIn" data-wow-delay=".6s">
                            <div class="top-curv">
                                <span class="left"></span>
                                <h6 class="type">Premium</h6>
                                <span class="right"></span>
                            </div>

                            <div class="content">
                                <div class="amount d-flex align-items-end pb-50 mb-50 bord-thin-bottom">
                                    <h2 class="main-color">$59</h2>
                                    <p class="ml-20 fz-20">/ hour</p>
                                </div>
                                <div class="feat">
                                    <ul class="rest">
                                        <li><i class="fas fa-check"></i> <span>Need your wireframe</span></li>
                                        <li><i class="fas fa-check"></i> <span>Design with Figma, Framer</span></li>
                                        <li><i class="fas fa-check"></i> <span>Implement with Webflow, React,
                                                WordPress, Laravel/PHP</span></li>
                                        <li><i class="fas fa-check"></i> <span>Support 6 months</span></li>
                                    </ul>
                                </div>
                                <div class="text-center mt-50">
                                    <div class="butn-presv">
                                        <a href="#0" class="butn butn-md butn-bord radius-5 text-u full-width">
                                            <span>Get Started</span>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- ==================== End price ==================== -->


            <!-- ==================== Start Contact ==================== -->
            <div class="sec-box contact section-padding bord-thin-top" data-scroll-index="5">
                <div class="row">
                    <div class="col-lg-5">
                        <div class="sec-head md-mb80 wow fadeIn">
                            <h6 class="sub-title mb-15 opacity-7">Get In Touch</h6>
                            <h2 class="fz-50">Let's bring your project to life!</h2>
                            <p class="fz-15 mt-10">Don't hesitate to reach out – I'm eager to hear from you!</p>
                            <div class="phone fz-30 fw-600 mt-30 underline">
                                <a href="#0" class="main-color">{{ $user->mobile_number }}</a>
                            </div>
                            <ul class="rest social-text d-flex mt-60">
                                @if ($user->github_link)
                                    <li class="mr-30">
                                        <a href="{{ $user->github_link }}" class="hover-this"><span class="hover-anim">Github</span></a>
                                    </li>
                                @endif

                                @if ($user->linkedin_link)
                                    <li>
                                        <a href="{{ $user->linkedin_link }}" class="hover-this"><span class="hover-anim">Linkedin</span></a>
                                    </li>
                                @endif

                                @if ($user->facebook_link)
                                    <li class="mr-30">
                                        <a href="{{ $user->facebook_link }}" class="hover-this"><span class="hover-anim">Facebook</span></a>
                                    </li>
                                @endif

                                @if ($user->twitter_link)
                                    <li class="mr-30">
                                        <a href="{{ $user->twitter_link }}" class="hover-this"><span class="hover-anim">Twitter</span></a>
                                    </li>
                                @endif
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-7 valign">
                        <div class="full-width wow fadeIn">
                            <form id="contactus-form" action="{{ route('contact-us') }}" method="POST">
                                @csrf

                                <div class="messages">
                                    <ul id="contactus-validation-list" class="list-group-item-danger">
                                    </ul>
                                </div>

                                <div class="controls row">

                                    <div class="col-lg-6">
                                        <div class="form-group mb-30">
                                            <input id="form_name" type="text" name="name" placeholder="Name"
                                                >
                                        </div>
                                    </div>

                                    <div class="col-lg-6">
                                        <div class="form-group mb-30">
                                            <input id="form_email" type="email" name="email" placeholder="Email"
                                                >
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group mb-30">
                                            <input id="form_subject" type="text" name="subject"
                                                placeholder="Subject">
                                        </div>
                                    </div>

                                    <div class="col-12">
                                        <div class="form-group">
                                            <textarea id="form_message" name="message" placeholder="Message" rows="4" ></textarea>
                                        </div>
                                        <div class="mt-30">
                                            <button id="submit-contact-btn" data-form-id="contact-form">
                                                <span class="text">Send A Message</span>
                                            </button>
                                        </div>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- ==================== End Contact ==================== -->



            <!-- ==================== Start Blog ==================== -->
            {{-- <div class="sec-box blog section-padding bord-thin-top" data-scroll-index="6">
                <div class="sec-head mb-80">
                    <div class="row">
                        <div class="col-lg-6 wow fadeInUp">
                            <h6 class="sub-title opacity-7 mb-15">Our Blog</h6>
                            <h3>Latest News & <span class="main-color">Blog</span></h3>
                        </div>
                        <div class="col-lg-6 valign">
                            <div class="go-more full-width d-flex justify-content-end">
                                <a href="blogs.html" class="d-flex">
                                    <span>View All Posts <svg class="arrow-right" xmlns="http://www.w3.org/2000/svg"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                            viewBox="0 0 34.2 32.3" xml:space="preserve" style="stroke-width: 2;">
                                            <line x1="0" y1="16" x2="33" y2="16">
                                            </line>
                                            <line x1="17.3" y1="0.7" x2="33.2" y2="16.5">
                                            </line>
                                            <line x1="17.3" y1="31.6" x2="33.5" y2="15.4">
                                            </line>
                                        </svg></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="item md-mb30 wow fadeIn" data-wow-delay=".2s">
                            <div class="img">
                                <img src="assets/imgs/blog/1.jpg" alt="">
                            </div>
                            <div class="box">
                                <div class="cont">
                                    <span class="date"><i class="fas fa-calendar-alt mr-10 main-color"></i> 6 , Aug
                                        2022</span>
                                    <h5><a href="blog-details.html">12 unique examples of portfolio websites.</a></h5>
                                </div>
                                <div class="info d-flex align-items-center">
                                    <div>
                                        <span><i class="fas fa-comments fz-12 mr-5"></i> 2 Comments</span>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="blog-details.html">Read More <svg class="ml-5" width="18"
                                                height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.2031 10.3281L11.5781 15.9531C11.535 15.9961 11.4839 16.0303 11.4276 16.0536C11.3713 16.077 11.3109 16.089 11.25 16.089C11.1891 16.089 11.1287 16.077 11.0724 16.0536C11.0161 16.0303 10.965 15.9961 10.9219 15.9531C10.8788 15.91 10.8446 15.8588 10.8213 15.8025C10.798 15.7462 10.786 15.6859 10.786 15.6249C10.786 15.564 10.798 15.5036 10.8213 15.4473C10.8446 15.391 10.8788 15.3399 10.9219 15.2968L15.7422 10.4687H3.125C3.00068 10.4687 2.88145 10.4193 2.79354 10.3314C2.70564 10.2435 2.65625 10.1242 2.65625 9.99993C2.65625 9.87561 2.70564 9.75638 2.79354 9.66847C2.88145 9.58056 3.00068 9.53118 3.125 9.53118H15.7422L10.9219 4.70305C10.8349 4.61603 10.786 4.498 10.786 4.37493C10.786 4.25186 10.8349 4.13383 10.9219 4.0468C11.0089 3.95978 11.1269 3.91089 11.25 3.91089C11.3731 3.91089 11.4911 3.95978 11.5781 4.0468L17.2031 9.6718C17.2476 9.71412 17.2829 9.76503 17.3071 9.82143C17.3313 9.87784 17.3438 9.93856 17.3438 9.99993C17.3438 10.0613 17.3313 10.122 17.3071 10.1784C17.2829 10.2348 17.2476 10.2857 17.2031 10.3281Z"
                                                    fill="currentColor"></path>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="item md-mb30 wow fadeIn" data-wow-delay=".4s">
                            <div class="img">
                                <img src="assets/imgs/blog/2.jpg" alt="">
                            </div>
                            <div class="box">
                                <div class="cont">
                                    <span class="date"><i class="fas fa-calendar-alt mr-10 main-color"></i> 6 , Aug
                                        2022</span>
                                    <h5><a href="blog-details.html">Dealing with spring allergy symptoms.</a></h5>
                                </div>
                                <div class="info d-flex align-items-center">
                                    <div>
                                        <span><i class="fas fa-comments fz-12 mr-5"></i> 2 Comments</span>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="blog-details.html">Read More <svg class="ml-5" width="18"
                                                height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.2031 10.3281L11.5781 15.9531C11.535 15.9961 11.4839 16.0303 11.4276 16.0536C11.3713 16.077 11.3109 16.089 11.25 16.089C11.1891 16.089 11.1287 16.077 11.0724 16.0536C11.0161 16.0303 10.965 15.9961 10.9219 15.9531C10.8788 15.91 10.8446 15.8588 10.8213 15.8025C10.798 15.7462 10.786 15.6859 10.786 15.6249C10.786 15.564 10.798 15.5036 10.8213 15.4473C10.8446 15.391 10.8788 15.3399 10.9219 15.2968L15.7422 10.4687H3.125C3.00068 10.4687 2.88145 10.4193 2.79354 10.3314C2.70564 10.2435 2.65625 10.1242 2.65625 9.99993C2.65625 9.87561 2.70564 9.75638 2.79354 9.66847C2.88145 9.58056 3.00068 9.53118 3.125 9.53118H15.7422L10.9219 4.70305C10.8349 4.61603 10.786 4.498 10.786 4.37493C10.786 4.25186 10.8349 4.13383 10.9219 4.0468C11.0089 3.95978 11.1269 3.91089 11.25 3.91089C11.3731 3.91089 11.4911 3.95978 11.5781 4.0468L17.2031 9.6718C17.2476 9.71412 17.2829 9.76503 17.3071 9.82143C17.3313 9.87784 17.3438 9.93856 17.3438 9.99993C17.3438 10.0613 17.3313 10.122 17.3071 10.1784C17.2829 10.2348 17.2476 10.2857 17.2031 10.3281Z"
                                                    fill="currentColor"></path>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="item wow fadeIn" data-wow-delay=".6s">
                            <div class="img">
                                <img src="assets/imgs/blog/3.jpg" alt="">
                            </div>
                            <div class="box">
                                <div class="cont">
                                    <span class="date"><i class="fas fa-calendar-alt mr-10 main-color"></i> 6 , Aug
                                        2022</span>
                                    <h5><a href="blog-details.html">Best wireframe tools for web designers.</a></h5>
                                </div>
                                <div class="info d-flex align-items-center">
                                    <div>
                                        <span><i class="fas fa-comments fz-12 mr-5"></i> 2 Comments</span>
                                    </div>
                                    <div class="ml-auto">
                                        <a href="blog-details.html">Read More <svg class="ml-5" width="18"
                                                height="18" viewBox="0 0 18 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M17.2031 10.3281L11.5781 15.9531C11.535 15.9961 11.4839 16.0303 11.4276 16.0536C11.3713 16.077 11.3109 16.089 11.25 16.089C11.1891 16.089 11.1287 16.077 11.0724 16.0536C11.0161 16.0303 10.965 15.9961 10.9219 15.9531C10.8788 15.91 10.8446 15.8588 10.8213 15.8025C10.798 15.7462 10.786 15.6859 10.786 15.6249C10.786 15.564 10.798 15.5036 10.8213 15.4473C10.8446 15.391 10.8788 15.3399 10.9219 15.2968L15.7422 10.4687H3.125C3.00068 10.4687 2.88145 10.4193 2.79354 10.3314C2.70564 10.2435 2.65625 10.1242 2.65625 9.99993C2.65625 9.87561 2.70564 9.75638 2.79354 9.66847C2.88145 9.58056 3.00068 9.53118 3.125 9.53118H15.7422L10.9219 4.70305C10.8349 4.61603 10.786 4.498 10.786 4.37493C10.786 4.25186 10.8349 4.13383 10.9219 4.0468C11.0089 3.95978 11.1269 3.91089 11.25 3.91089C11.3731 3.91089 11.4911 3.95978 11.5781 4.0468L17.2031 9.6718C17.2476 9.71412 17.2829 9.76503 17.3071 9.82143C17.3313 9.87784 17.3438 9.93856 17.3438 9.99993C17.3438 10.0613 17.3313 10.122 17.3071 10.1784C17.2829 10.2348 17.2476 10.2857 17.2031 10.3281Z"
                                                    fill="currentColor"></path>
                                            </svg></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- ==================== End Blog ==================== -->

        </section>
    </main>


    <!-- ==================== Start Footer ==================== -->
    <footer class="pb-30 pt-30">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <p class="fz-13">© 2024 All rights reserved.</p>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- ==================== End Footer ==================== -->

    <!-- jQuery -->
    <script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/jquery-migrate-3.4.0.min.js') }}"></script>

    <!-- plugins -->
    <script src="{{ asset('assets/js/plugins.js') }}"></script>

    <script src="{{ asset('assets/js/ScrollTrigger.min.js') }}"></script>

    <!-- custom scripts -->
    <script src="{{ asset('assets/js/scripts.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="{{ asset('assets/js/index.js') }}"></script>

</body>

</html>
