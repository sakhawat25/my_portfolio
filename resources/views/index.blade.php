<!DOCTYPE html>
<html lang="en">

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <meta name="description" content="Name of your web site">
    <meta name="author" content="askthemes">

    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <title>Erling</title>

    <!-- STYLES -->
    <link
        href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Syne:wght@400;500;600;700;800&amp;display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Archivo+Black&amp;display=swap" rel="stylesheet">

    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/plugins.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/modalboxes.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/custom.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/form.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/main.css') }}" />
    <!-- /STYLES -->

</head>

<body>

    <!-- PRELOADER -->
    <div id="preloader">
        <div class="loader_line"></div>
    </div>
    <!-- /PRELOADER -->

    <!-- WRAPPER ALL -->
    <div class="erling_tm_all_wrap w-full h-auto clear-both relative">

        <!-- MOBILE MENU -->
        <div
            class="erling_tm_mobile_menu hidden middle:block w-full h-auto fixed top-0 left-0 z-[10] transition-all duration-300">
            <div class="mobile_menu_inner w-full h-auto clear-both float-left bg-white pt-[10px] px-[20px] pb-[10px]">
                <div class="mobile_in w-full h-auto clear-both flex items-center justify-between">
                    <div class="logo">
                        <a href="#"><img class="max-w-[90px] max-h-[70px]" src="assets/img/logo/logo.png"
                                alt="" /></a>
                    </div>
                    <div class="trigger leading-[0]">
                        <div class="hamburger hamburger--slider">
                            <div class="hamburger-box">
                                <div class="hamburger-inner"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="dropdown w-full h-auto clear-both float-left bg-white">
                <div class="dropdown_inner w-full h-auto clear-both float-left p-[20px]">
                    <ul class="anchor_nav">
                        <li class="current m-0 float-left w-full"><a class="text-black inline-block p-0 font-medium"
                                href="#home">Home</a></li>
                        <li class="m-0 float-left w-full"><a class="text-black inline-block p-0 font-medium"
                                href="#about">About</a></li>
                        <li class="m-0 float-left w-full"><a class="text-black inline-block p-0 font-medium"
                                href="#service">Services</a></li>
                        <li class="m-0 float-left w-full"><a class="text-black inline-block p-0 font-medium"
                                href="#portfolio">Portfolio</a></li>
                        <li class="m-0 float-left w-full"><a class="text-black inline-block p-0 font-medium"
                                href="#timeline">Timeline</a></li>
                        <li class="m-0 float-left w-full"><a class="text-black inline-block p-0 font-medium"
                                href="#testimonial">Testimonial</a></li>
                        <li class="m-0 float-left w-full"><a class="text-black inline-block p-0 font-medium"
                                href="#news">News</a></li>
                        <li class="m-0 float-left w-full"><a class="text-black inline-block p-0 font-medium"
                                href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <!-- /MOBILE MENU -->

        <!-- SIDEBAR MENU -->
        <div
            class="erling_tm_sidebar_menu w-[400px] left-0 top-0 bottom-0 fixed bg-white flex items-center large:w-[300px] middle:hidden">
            <div class="sidebar_inner w-full py-0 px-[70px]">
                <div class="logo mb-[60px]">
                    <a href="#"><img class="max-w-[140px] max-h-[100px]" src="assets/img/logo/logo.png"
                            alt="" /></a>
                </div>
                <div class="menu mb-[55px]">
                    <ul class="anchor_nav">
                        <li class="current w-full"><a
                                class="inline-block text-[#868a9b] px-0 py-[5px] transition-all duration-300"
                                href="#home">Home</a></li>
                        <li class="w-full"><a
                                class="inline-block text-[#868a9b] px-0 py-[5px] transition-all duration-300"
                                href="#about">About</a></li>
                        <li class="w-full"><a
                                class="inline-block text-[#868a9b] px-0 py-[5px] transition-all duration-300"
                                href="#service">Services</a></li>
                        <li class="w-full"><a
                                class="inline-block text-[#868a9b] px-0 py-[5px] transition-all duration-300"
                                href="#portfolio">Portfolio</a></li>
                        <li class="w-full"><a
                                class="inline-block text-[#868a9b] px-0 py-[5px] transition-all duration-300"
                                href="#timeline">Timeline</a></li>
                        <li class="w-full"><a
                                class="inline-block text-[#868a9b] px-0 py-[5px] transition-all duration-300"
                                href="#testimonial">Testimonial</a></li>
                        <li class="w-full"><a
                                class="inline-block text-[#868a9b] px-0 py-[5px] transition-all duration-300"
                                href="#news">News</a></li>
                        <li class="w-full"><a
                                class="inline-block text-[#868a9b] px-0 py-[5px] transition-all duration-300"
                                href="#contact">Contact</a></li>
                    </ul>
                </div>
                <div class="copyright">
                    <p>Copyright 2024 by <a class="text-black line_effect"
                            href="https://themeforest.net/user/askthemes" target="_blank">askthemes</a></p>
                    <p>All rights are reserved.</p>
                </div>
            </div>
        </div>
        <!-- /SIDEBAR MENU -->

        <!-- MAINPART -->
        <div class="erling_tm_mainpart w-full pl-[400px] large:pl-[300px] middle:pl-0">
            <!-- HERO -->
            <div class="erling_tm_section w-full h-auto clear-both clearfix" id="home">
                <div class="erling_tm_hero w-full min-h-[100vh] relative">
                    <div class="container">
                        <div class="content w-full h-[100vh] relative flex items-center">
                            <div class="details flex items-center">
                                <div class="image relative w-[450px] h-[450px]">
                                    <div class="main absolute inset-0 bg-no-repeat bg-center bg-cover"
                                        data-img-url="assets/img/about/1.jpg"></div>
                                </div>
                                <div class="text pl-[70px]">
                                    <h3
                                        class="stroke text-[130px] font-extrabold leading-[1.1] uppercase font-archivo">
                                        Erling</h3>
                                    <h3 class="text-[130px] font-extrabold leading-[1.1] uppercase font-archivo">Walton
                                    </h3>
                                    <div class="job inline-block bg-[#f5f5f5] py-[15px] px-[40px] mt-[30px]">
                                        <span>UI Designer</span><span>Web Developer</span><span>SEO Optimizer</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /HERO -->

            <!-- ABOUT -->
            <div class="erling_tm_section w-full h-auto clear-both clearfix" id="about">
                <div class="erling_tm_about w-full bg-[#f7f7f7] px-0 py-[143px]">
                    <div class="container">
                        <div class="about_inner w-full flex">
                            <div class="left wow fadeInLeft w-1/2 pr-[50px]" data-wow-duration="1s">
                                <div class="erling_tm_title w-full mb-[30px]">
                                    <span class="inline-block mb-[10px] uppercase relative pl-[60px]">Erling
                                        Walton</span>
                                    <h3 class="text-[45px] font-bold">UI Designer based in NYC, USA since 2020</h3>
                                </div>
                                <div class="text w-full mb-[40px]">
                                    <p>My name is Erling Walton and I am a UI Designer, and I'm very passionate and
                                        dedicated to my work. With 3 years experience as a professional UI designer, I
                                        have acquired the skills and knowledge necessary to make your project a success.
                                        I enjoy every step of the design process, from discussion and collaboration.</p>
                                </div>
                                <div class="erling_tm_button">
                                    <a href="assets/img/cv/1.jpg" download>Download CV</a>
                                </div>
                            </div>
                            <div class="right wow fadeInLeft w-1/2 pl-[50px]" data-wow-duration="1s"
                                data-wow-delay="0.2s">
                                <div class="list w-full">
                                    <div class="accordion_wrap ready w-full">
                                        <div class="accordion active w-full mb-[10px]">
                                            <div
                                                class="accordion_header w-full bg-[#eaeaea] px-[40px] py-[25px] cursor-pointer">
                                                <h3 class="text-[17px] uppercase">Personal Details</h3>
                                            </div>
                                            <div class="accordion_content w-full p-[40px] bg-white">
                                                <div class="info_list w-full">
                                                    <ul>
                                                        <li class="w-full mb-[14px]">
                                                            <span
                                                                class="inline-block min-w-[135px] pr-[20px]">Name:</span>
                                                            <span class="inline-block">Erling Walton</span>
                                                        </li>
                                                        <li class="w-full mb-[14px]">
                                                            <span
                                                                class="inline-block min-w-[135px] pr-[20px]">Email:</span>
                                                            <span class="inline-block"><a
                                                                    class="line_effect text-black"
                                                                    href="#"><span class="__cf_email__"
                                                                        data-cfemail="6d1402181f000c04012d0a000c0401430e0200">[email&#160;protected]</span></a></span>
                                                        </li>
                                                        <li class="w-full">
                                                            <span
                                                                class="inline-block min-w-[135px] pr-[20px]">Phone:</span>
                                                            <span class="inline-block"><a
                                                                    class="line_effect text-black" href="#">+77
                                                                    022 777 66 99</a></span>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion w-full mb-[10px]">
                                            <div
                                                class="accordion_header w-full bg-[#eaeaea] px-[40px] py-[25px] cursor-pointer">
                                                <h3 class="text-[17px] uppercase">Programming Skills</h3>
                                            </div>
                                            <div class="accordion_content w-full p-[40px] bg-white">
                                                <div class="info_list w-full">
                                                    <div class="my_skills w-full">
                                                        <ul>
                                                            <li class="w-full mb-[14px] flex items-center">
                                                                <span
                                                                    class="title min-w-[135px] pr-[20px]">WordPress</span>
                                                                <div class="erling_progress">
                                                                    <div class="progress_inner" data-value="90">
                                                                        <div class="background">
                                                                            <div class="bar">
                                                                                <div class="bar_in"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="w-full mb-[14px] flex items-center">
                                                                <span class="title min-w-[135px] pr-[20px]">PHP</span>
                                                                <div class="erling_progress">
                                                                    <div class="progress_inner" data-value="70">
                                                                        <div class="background">
                                                                            <div class="bar">
                                                                                <div class="bar_in"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="w-full mb-[14px] flex items-center">
                                                                <span
                                                                    class="title min-w-[135px] pr-[20px]">Tweenmax</span>
                                                                <div class="erling_progress">
                                                                    <div class="progress_inner" data-value="80">
                                                                        <div class="background">
                                                                            <div class="bar">
                                                                                <div class="bar_in"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="accordion w-full mb-[10px]">
                                            <div
                                                class="accordion_header w-full bg-[#eaeaea] px-[40px] py-[25px] cursor-pointer">
                                                <h3 class="text-[17px] uppercase">Language Skills</h3>
                                            </div>
                                            <div class="accordion_content w-full p-[40px] bg-white">
                                                <div class="info_list w-full">
                                                    <div class="my_skills">
                                                        <ul>
                                                            <li class="w-full mb-[14px] flex items-center">
                                                                <span
                                                                    class="title min-w-[135px] pr-[20px]">English</span>
                                                                <div class="erling_progress">
                                                                    <div class="progress_inner" data-value="95">
                                                                        <div class="background">
                                                                            <div class="bar">
                                                                                <div class="bar_in"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="w-full mb-[14px] flex items-center">
                                                                <span
                                                                    class="title min-w-[135px] pr-[20px]">Italian</span>
                                                                <div class="erling_progress">
                                                                    <div class="progress_inner" data-value="80">
                                                                        <div class="background">
                                                                            <div class="bar">
                                                                                <div class="bar_in"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li class="w-full mb-[14px] flex items-center">
                                                                <span
                                                                    class="title min-w-[135px] pr-[20px]">Japanese</span>
                                                                <div class="erling_progress">
                                                                    <div class="progress_inner" data-value="60">
                                                                        <div class="background">
                                                                            <div class="bar">
                                                                                <div class="bar_in"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
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
            </div>
            <!-- /ABOUT -->

            <!-- SERVICE -->
            <div class="erling_tm_section w-full h-auto clear-both clearfix" id="service">
                <div class="erling_tm_service w-full px-0 pt-[143px] pb-[110px]">
                    <div class="container">
                        <div class="erling_tm_title w-full mb-[70px] wow fadeInLeft">
                            <span class="inline-block mb-[10px] uppercase relative pl-[60px]"
                                data-wow-duration="1s">Services</span>
                            <h3 class="text-[45px] font-bold">Quality Services</h3>
                        </div>
                        <div class="service_list w-full">
                            <ul class="flex flex-wrap ml-[-40px]">
                                <li class="w-1/3 pl-[40px] mb-[40px] wow fadeInLeft" data-wow-duration="1s">
                                    <div class="list_inner w-full h-full relative bg-[#f7f7f7] py-[70px] px-[50px]">
                                        <img class="svg w-[53px] h-[53px] text-[#999] mb-[20px] transition-all duration-300"
                                            src="assets/img/svg/anchor.svg" alt="" />
                                        <h3 class="title text-[20px]">Creative Design</h3>
                                        <div class="list w-full mt-[30px] pt-[30px]">
                                            <ul>
                                                <li class="w-full mb-[5px] relative pl-[18px]"><span>Figma
                                                        Design</span></li>
                                                <li class="w-full mb-[5px] relative pl-[18px]"><span>PSD Design</span>
                                                </li>
                                                <li class="w-full relative pl-[18px]"><span>Sketch Design</span></li>
                                            </ul>
                                        </div>
                                        <div class="erling_progress">
                                            <div class="progress_inner" data-value="90">
                                                <div class="background">
                                                    <div class="bar">
                                                        <div class="bar_in"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="w-1/3 pl-[40px] mb-[40px] wow fadeInLeft" data-wow-duration="1s"
                                    data-wow-delay="0.2s">
                                    <div class="list_inner w-full h-full relative bg-[#f7f7f7] py-[70px] px-[50px]">
                                        <img class="svg w-[53px] h-[53px] text-[#999] mb-[20px] transition-all duration-300"
                                            src="assets/img/svg/web.svg" alt="" />
                                        <h3 class="title text-[20px]">Web Development</h3>
                                        <div class="list w-full mt-[30px] pt-[30px]">
                                            <ul>
                                                <li class="w-full mb-[5px] relative pl-[18px]"><span>HTML
                                                        Websites</span></li>
                                                <li class="w-full mb-[5px] relative pl-[18px]"><span>Wordpress
                                                        Websites</span></li>
                                                <li class="w-full relative pl-[18px]"><span>NFT &amp; AI
                                                        Websites</span></li>
                                            </ul>
                                        </div>
                                        <div class="erling_progress">
                                            <div class="progress_inner" data-value="80">
                                                <div class="background">
                                                    <div class="bar">
                                                        <div class="bar_in"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li class="w-1/3 pl-[40px] mb-[40px] wow fadeInLeft" data-wow-duration="1s"
                                    data-wow-delay="0.4s">
                                    <div class="list_inner w-full h-full relative bg-[#f7f7f7] py-[70px] px-[50px]">
                                        <img class="svg w-[53px] h-[53px] text-[#999] mb-[20px] transition-all duration-300"
                                            src="assets/img/svg/physics.svg" alt="" />
                                        <h3 class="title text-[20px]">Mobile Application</h3>
                                        <div class="list w-full mt-[30px] pt-[30px]">
                                            <ul>
                                                <li class="w-full mb-[5px] relative pl-[18px]"><span>Android
                                                        Apps</span></li>
                                                <li class="w-full mb-[5px] relative pl-[18px]"><span>IOS Apps</span>
                                                </li>
                                                <li class="w-full relative pl-[18px]"><span>Huawei Apps</span></li>
                                            </ul>
                                        </div>
                                        <div class="erling_progress">
                                            <div class="progress_inner" data-value="70">
                                                <div class="background">
                                                    <div class="bar">
                                                        <div class="bar_in"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /SERVICE -->

            <!-- PORTFOLIO -->
            <div class="erling_tm_section w-full h-auto clear-both clearfix" id="portfolio">
                <div class="erling_tm_portfolio w-full bg-[#f7f7f7] py-[143px] px-0 swiper-section">
                    <div class="container">
                        <div class="erling_tm_title w-full mb-[70px] wow fadeInLeft">
                            <span class="inline-block mb-[10px] uppercase relative pl-[60px]"
                                data-wow-duration="1s">Portfolio</span>
                            <h3 class="text-[45px] font-bold">Creative Portfolio</h3>
                        </div>
                        <div class="portfolio_list w-full h-auto clear-both gallery_zoom wow fadeInLeft"
                            data-wow-duration="1s">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">
                                    <div class="swiper-slide">
                                        <div class="list_inner w-full h-auto clear-both relative overflow-hidden">
                                            <div class="image relative overflow-hidden">
                                                <img class="relative min-w-full opacity-0"
                                                    src="assets/img/thumbs/1-1.jpg" alt="" />
                                                <div class="main absolute inset-0 bg-no-repeat bg-center bg-cover"
                                                    data-img-url="assets/img/portfolio/1.jpg"></div>
                                            </div>
                                            <div
                                                class="details absolute z-[2] bottom-[-100px] left-[20px] right-[20px] bg-white px-[20px] pt-[8px] pb-[13px]">
                                                <span
                                                    class="text-[12px] uppercase mb-[5px] text-[#868a9b] font-medium">Vimeo</span>
                                                <h3 class="text-black text-[20px] mb-[2px]">Web Design</h3>
                                            </div>
                                            <a class="erling_tm_full_link popup-vimeo"
                                                href="https://vimeo.com/321091335"></a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="list_inner w-full h-auto clear-both relative overflow-hidden">
                                            <div class="image relative overflow-hidden">
                                                <img class="relative min-w-full opacity-0"
                                                    src="assets/img/thumbs/1-1.jpg" alt="" />
                                                <div class="main absolute inset-0 bg-no-repeat bg-center bg-cover"
                                                    data-img-url="assets/img/portfolio/2.jpg"></div>
                                            </div>
                                            <div
                                                class="details absolute z-[2] bottom-[-100px] left-[20px] right-[20px] bg-white px-[20px] pt-[8px] pb-[13px]">
                                                <span
                                                    class="text-[12px] uppercase mb-[5px] text-[#868a9b] font-medium">Youtube</span>
                                                <h3 class="text-black text-[20px] mb-[2px]">Code Editor</h3>
                                            </div>
                                            <a class="erling_tm_full_link popup-youtube"
                                                href="https://www.youtube.com/watch?v=toClS5fCudA"></a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="list_inner w-full h-auto clear-both relative overflow-hidden">
                                            <div class="image relative overflow-hidden">
                                                <img class="relative min-w-full opacity-0"
                                                    src="assets/img/thumbs/1-1.jpg" alt="" />
                                                <div class="main absolute inset-0 bg-no-repeat bg-center bg-cover"
                                                    data-img-url="assets/img/portfolio/3.jpg"></div>
                                            </div>
                                            <div
                                                class="details absolute z-[2] bottom-[-100px] left-[20px] right-[20px] bg-white px-[20px] pt-[8px] pb-[13px]">
                                                <span
                                                    class="text-[12px] uppercase mb-[5px] text-[#868a9b] font-medium">Soundcloud</span>
                                                <h3 class="text-black text-[20px] mb-[2px]">Graphic Design</h3>
                                            </div>
                                            <a class="erling_tm_full_link soundcloude_link mfp-iframe audio"
                                                href="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/471954807&amp;color=%23ff5500&amp;auto_play=true&amp;hide_related=false&amp;show_comments=true&amp;show_user=true&amp;show_reposts=false&amp;show_teaser=true&amp;visual=true"></a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="list_inner w-full h-auto clear-both relative overflow-hidden">
                                            <div class="image relative overflow-hidden">
                                                <img class="relative min-w-full opacity-0"
                                                    src="assets/img/thumbs/1-1.jpg" alt="" />
                                                <div class="main absolute inset-0 bg-no-repeat bg-center bg-cover"
                                                    data-img-url="assets/img/portfolio/4.jpg"></div>
                                            </div>
                                            <div
                                                class="details absolute z-[2] bottom-[-100px] left-[20px] right-[20px] bg-white px-[20px] pt-[8px] pb-[13px]">
                                                <span
                                                    class="text-[12px] uppercase mb-[5px] text-[#868a9b] font-medium">Modalbox</span>
                                                <h3 class="text-black text-[20px] mb-[2px]">Hello Phone</h3>
                                            </div>
                                            <a class="erling_tm_full_link portfolio_popup" href="#"></a>


                                            <!-- Modalbox Info Start -->
                                            <div class="hidden_content_portfolio">
                                                <div class="popup_details">
                                                    <div class="main_details">
                                                        <div class="textbox">
                                                            <p>Web designing is the process of planning,
                                                                conceptualizing, and implementing the plan for designing
                                                                a website in a way that is functional and offers a good
                                                                user experience. User experience is central to the web
                                                                designing process. Websites have an array of elements
                                                                presented in ways that make them easy to navigate.</p>
                                                            <p>Web designing essentially involves working on every
                                                                attribute of the website that people interact with, so
                                                                that the website is simple and efficient, allows users
                                                                to quickly find the information they need, and looks
                                                                visually pleasing. All these factors, when combined,
                                                                decide how well the website is designed.</p>
                                                        </div>
                                                        <div class="detailbox">
                                                            <ul>
                                                                <li>
                                                                    <span class="first">Client</span>
                                                                    <span>David Parker</span>
                                                                </li>
                                                                <li>
                                                                    <span class="first">Category</span>
                                                                    <span><a href="#">Modalbox</a></span>
                                                                </li>
                                                                <li>
                                                                    <span class="first">Date</span>
                                                                    <span>November 22, 2024</span>
                                                                </li>
                                                                <li>
                                                                    <span class="first">Share</span>
                                                                    <ul class="share">
                                                                        <li><a href="#"><img class="svg"
                                                                                    src="assets/img/svg/social/facebook.svg"
                                                                                    alt="" /></a></li>
                                                                        <li><a href="#"><img class="svg"
                                                                                    src="assets/img/svg/social/twitter.svg"
                                                                                    alt="" /></a></li>
                                                                        <li><a href="#"><img class="svg"
                                                                                    src="assets/img/svg/social/instagram.svg"
                                                                                    alt="" /></a>
                                                                        </li>
                                                                    </ul>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <div class="additional_images">
                                                        <ul>
                                                            <li>
                                                                <div class="list_inner">
                                                                    <div class="my_image">
                                                                        <img src="assets/img/thumbs/4-2.jpg"
                                                                            alt="" />
                                                                        <div class="main"
                                                                            data-img-url="assets/img/portfolio/5.jpg">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="list_inner">
                                                                    <div class="my_image">
                                                                        <img src="assets/img/thumbs/4-2.jpg"
                                                                            alt="" />
                                                                        <div class="main"
                                                                            data-img-url="assets/img/portfolio/6.jpg">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                            <li>
                                                                <div class="list_inner">
                                                                    <div class="my_image">
                                                                        <img src="assets/img/thumbs/4-2.jpg"
                                                                            alt="" />
                                                                        <div class="main"
                                                                            data-img-url="assets/img/portfolio/7.jpg">
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- /Modalbox Info Start -->

                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="list_inner w-full h-auto clear-both relative overflow-hidden">
                                            <div class="image relative overflow-hidden">
                                                <img class="relative min-w-full opacity-0"
                                                    src="assets/img/thumbs/1-1.jpg" alt="" />
                                                <div class="main absolute inset-0 bg-no-repeat bg-center bg-cover"
                                                    data-img-url="assets/img/portfolio/8.jpg"></div>
                                            </div>
                                            <div
                                                class="details absolute z-[2] bottom-[-100px] left-[20px] right-[20px] bg-white px-[20px] pt-[8px] pb-[13px]">
                                                <span
                                                    class="text-[12px] uppercase mb-[5px] text-[#868a9b] font-medium">Popup</span>
                                                <h3 class="text-black text-[20px] mb-[2px]">SEO Mockup</h3>
                                            </div>
                                            <a class="erling_tm_full_link zoom" href="assets/img/portfolio/8.jpg"></a>
                                        </div>
                                    </div>
                                    <div class="swiper-slide">
                                        <div class="list_inner w-full h-auto clear-both relative overflow-hidden">
                                            <div class="image relative overflow-hidden">
                                                <img class="relative min-w-full opacity-0"
                                                    src="assets/img/thumbs/1-1.jpg" alt="" />
                                                <div class="main absolute inset-0 bg-no-repeat bg-center bg-cover"
                                                    data-img-url="assets/img/portfolio/9.jpg"></div>
                                            </div>
                                            <div
                                                class="details absolute z-[2] bottom-[-100px] left-[20px] right-[20px] bg-white px-[20px] pt-[8px] pb-[13px]">
                                                <span
                                                    class="text-[12px] uppercase mb-[5px] text-[#868a9b] font-medium">Popup</span>
                                                <h3 class="text-black text-[20px] mb-[2px]">Part Notebook</h3>
                                            </div>
                                            <a class="erling_tm_full_link zoom" href="assets/img/portfolio/9.jpg"></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="erling_tm_swiper_progress fill">
                                    <div class="my_pagination_in">
                                        <span class="current"></span>
                                        <span class="pagination_progress"><span
                                                class="all"><span></span></span></span>
                                        <span class="total"></span>
                                    </div>
                                    <div class="my_navigation">
                                        <ul>
                                            <li><a class="my_prev" href="#"><i
                                                        class="icon-left-open-1"></i></a></li>
                                            <li><a class="my_next" href="#"><i
                                                        class="icon-right-open-1"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /PORTFOLIO -->

            <!-- EXPERIENCE -->
            <div class="erling_tm_section w-full h-auto clear-both clearfix" id="timeline">
                <div class="erling_tm_experience w-full px-0 pt-[143px] pb-[150px]">
                    <div class="container">
                        <div class="erling_tm_title w-full mb-[70px] wow fadeInLeft">
                            <span class="inline-block mb-[10px] uppercase relative pl-[60px]"
                                data-wow-duration="1s">Timeline</span>
                            <h3 class="text-[45px] font-bold">Timeline Period</h3>
                        </div>
                        <div class="experience_inner w-full flex">
                            <div class="left w-1/2 pr-[20px]">
                                <div class="box w-full">
                                    <div class="title w-full py-[25px] px-[40px] bg-[#eaeaea] mb-[30px] wow fadeInLeft"
                                        data-wow-duration="1s">
                                        <h3 class="text-[17px] uppercase">Experience</h3>
                                    </div>
                                    <div class="list_wrap w-full">
                                        <ul class="relative">
                                            <li class="w-full mb-[10px] wow fadeInLeft" data-wow-duration="1s">
                                                <div
                                                    class="list_inner w-full relative flex justify-between bg-[#f7f7f7] px-[35px] pt-[40px] pb-[35px]">
                                                    <div class="occ pr-[20px]">
                                                        <h3 class="text-[17px] mb-[2px]">Envato Market</h3>
                                                        <span>Web Designer</span>
                                                    </div>
                                                    <div class="time inline-block">
                                                        <span
                                                            class="inline-block bg-white py-[10px] px-[20px]">2020-now</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="w-full mb-[10px] wow fadeInLeft" data-wow-duration="1s">
                                                <div
                                                    class="list_inner w-full relative flex justify-between bg-[#f7f7f7] px-[35px] pt-[40px] pb-[35px]">
                                                    <div class="occ pr-[20px]">
                                                        <h3 class="text-[17px] mb-[2px]">Behance</h3>
                                                        <span>SEO Optimizer</span>
                                                    </div>
                                                    <div class="time inline-block">
                                                        <span
                                                            class="inline-block bg-white py-[10px] px-[20px]">2018-2020</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="w-full wow fadeInLeft" data-wow-duration="1s">
                                                <div
                                                    class="list_inner w-full relative flex justify-between bg-[#f7f7f7] px-[35px] pt-[40px] pb-[35px]">
                                                    <div class="occ pr-[20px]">
                                                        <h3 class="text-[17px] mb-[2px]">Colorlib</h3>
                                                        <span>Theme Reviewer</span>
                                                    </div>
                                                    <div class="time inline-block">
                                                        <span
                                                            class="inline-block bg-white py-[10px] px-[20px]">2016-2018</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="right w-1/2 pl-[20px]">
                                <div class="box w-full">
                                    <div class="title w-full py-[25px] px-[40px] bg-[#eaeaea] mb-[30px] wow fadeInLeft"
                                        data-wow-duration="1s">
                                        <h3 class="text-[17px] uppercase">Experience</h3>
                                    </div>
                                    <div class="list_wrap w-full">
                                        <ul class="relative">
                                            <li class="w-full mb-[10px] wow fadeInLeft" data-wow-duration="1s">
                                                <div
                                                    class="list_inner w-full relative flex justify-between bg-[#f7f7f7] px-[35px] pt-[40px] pb-[35px]">
                                                    <div class="occ pr-[20px]">
                                                        <h3 class="text-[17px] mb-[2px]">Univercity of Texas</h3>
                                                        <span>Master of Design</span>
                                                    </div>
                                                    <div class="time inline-block">
                                                        <span
                                                            class="inline-block bg-white py-[10px] px-[20px]">2020-2017</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="w-full mb-[10px] wow fadeInLeft" data-wow-duration="1s">
                                                <div
                                                    class="list_inner w-full relative flex justify-between bg-[#f7f7f7] px-[35px] pt-[40px] pb-[35px]">
                                                    <div class="occ pr-[20px]">
                                                        <h3 class="text-[17px] mb-[2px]">Webster College</h3>
                                                        <span>UI/UX Design</span>
                                                    </div>
                                                    <div class="time inline-block">
                                                        <span
                                                            class="inline-block bg-white py-[10px] px-[20px]">2017-2015</span>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="w-full wow fadeInLeft" data-wow-duration="1s">
                                                <div
                                                    class="list_inner w-full relative flex justify-between bg-[#f7f7f7] px-[35px] pt-[40px] pb-[35px]">
                                                    <div class="occ pr-[20px]">
                                                        <h3 class="text-[17px] mb-[2px]">Github Club</h3>
                                                        <span>Web Sertification</span>
                                                    </div>
                                                    <div class="time inline-block">
                                                        <span
                                                            class="inline-block bg-white py-[10px] px-[20px]">2015-2013</span>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /EXPERIENCE -->

            <!-- TESTIMONIALS -->
            <div class="erling_tm_section w-full h-auto clear-both clearfix" id="testimonial">
                <div class="erling_tm_testimonials w-full bg-[#f7f7f7] px-0 pt-[143px] pb-[150px]">
                    <div class="container">
                        <div class="erling_tm_title w-full mb-[70px] wow fadeInLeft">
                            <span class="inline-block mb-[10px] uppercase relative pl-[60px]"
                                data-wow-duration="1s">Testimonial</span>
                            <h3 class="text-[45px] font-bold">Valuable Feedback</h3>
                        </div>
                        <div class="wrapper w-full flex">
                            <div class="box w-full bg-white relative wow fadeInLeft" data-wow-duration="1s">
                                <div
                                    class="short w-full bg-[#eaeaea] py-[25px] px-[40px] flex items-center justify-between">
                                    <div class="title">
                                        <h3 class="text-[17px] uppercase">Albert Kennedy</h3>
                                        <span>Graphic Designer</span>
                                    </div>
                                    <img class="w-[60px] h-[60px] rounded-full object-cover"
                                        src="assets/img/testimonials/1.jpg" alt="" />
                                </div>
                                <div class="desc w-full px-[40px] pt-[40px] pb-[60px]">
                                    <ul class="rating flex mb-[20px]">
                                        <li><i class="icon-star-1 text-[18px]"></i></li>
                                        <li><i class="icon-star-1 text-[18px]"></i></li>
                                        <li><i class="icon-star-1 text-[18px]"></i></li>
                                        <li><i class="icon-star-1 text-[18px]"></i></li>
                                        <li><i class="icon-star-1 text-[18px]"></i></li>
                                    </ul>
                                    <p class="relative z-[1]">I generally begin with what people are doing well. It’s
                                        too deflating for them if you start by immediately identifying all the things
                                        that are wrong. There’s a tipping point when any more negative feedback could
                                        shatter their confidence. If it’s really bad work, I ask them to stop and have a
                                        different kind of discussion. There are times where you may need just to say,
                                        ‘Stop, we need to reset. I generally begin with what people are doing well. It’s
                                        too deflating for them if you start by immediately identifying all the things
                                        that are wrong.</p>
                                </div>
                                <img class="svg absolute bottom-[-130px] right-[-100px] w-[500px] h-[500px] opacity-[.07]"
                                    src="assets/img/svg/quote.svg" alt="" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /TESTIMONIALS -->

            <!-- NEWS -->
            <div class="erling_tm_section w-full h-auto clear-both clearfix" id="news">
                <div class="erling_tm_news w-full px-0 pt-[143px] pb-[150px]">
                    <div class="container">
                        <div class="erling_tm_title w-full mb-[70px] wow fadeInLeft">
                            <span class="inline-block mb-[10px] uppercase relative pl-[60px]"
                                data-wow-duration="1s">Blog</span>
                            <h3 class="text-[45px] font-bold">Recent Posts</h3>
                        </div>
                        <div class="news_list w-full">
                            <ul class="ml-[-40px] flex flex-wrap">
                                <li class="mb-[40px] pl-[40px] w-1/3 wow fadeInLeft" data-wow-duration="1s">
                                    <div class="list_inner w-full h-full clear-both relative">
                                        <div class="image relative mb-[10px] overflow-hidden">
                                            <img class="relative min-w-full opacity-0" src="assets/img/thumbs/4-3.jpg"
                                                alt="" />
                                            <div class="main absolute inset-0 bg-no-repeat bg-cover bg-center transition-all duration-300"
                                                data-img-url="assets/img/news/1.jpg"></div>
                                            <span
                                                class="date absolute z-[1] top-[20px] left-[20px] bg-white inline-block py-[5px] px-[20px]">Nov
                                                30, 2024</span>
                                            <a class="erling_tm_full_link" href="#"></a>
                                        </div>
                                        <div class="details w-full bg-[#f5f5f5]">
                                            <div
                                                class="meta w-full bg-[#eaeaea] px-[30px] py-[15px] flex items-center">
                                                <span class="admin">By <a class="line_effect"
                                                        href="#">Bernard</a></span><span class="category">In <a
                                                        class="line_effect" href="#">Design</a></span>
                                            </div>
                                            <div class="title w-full p-[30px]">
                                                <h3 class="text-[20px]"><a class="text-black text_hover_effect"
                                                        href="#">Secrets of the Mobile Application</a></h3>
                                            </div>
                                        </div>

                                        <!-- Modalbox Info Start -->
                                        <div class="news_hidden_details">
                                            <div class="news_popup_informations">
                                                <div class="text">
                                                    <p>Erling is a leading web design agency with an award-winning
                                                        design team that creates innovative, effective websites that
                                                        capture your brand, improve your conversion rates, and maximize
                                                        your revenue to help grow your business and achieve your goals.
                                                    </p>
                                                    <p>In today’s digital world, your website is the first interaction
                                                        consumers have with your business. That's why almost 95 percent
                                                        of a user’s first impression relates to web design. It’s also
                                                        why web design services can have an immense impact on your
                                                        company’s bottom line.</p>
                                                    <p>That’s why more companies are not only reevaluating their
                                                        website’s design but also partnering with Erling, the web design
                                                        agency that’s driven more than $2.4 billion in revenue for its
                                                        clients. With over 50 web design awards under our belt, we're
                                                        confident we can design a custom website that drives sales for
                                                        your unique business.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Modalbox Info End -->

                                    </div>
                                </li>
                                <li class="mb-[40px] pl-[40px] w-1/3 wow fadeInLeft" data-wow-duration="1s"
                                    data-wow-delay="0.2s">
                                    <div class="list_inner w-full h-full clear-both relative">
                                        <div class="image relative mb-[10px] overflow-hidden">
                                            <img class="relative min-w-full opacity-0" src="assets/img/thumbs/4-3.jpg"
                                                alt="" />
                                            <div class="main absolute inset-0 bg-no-repeat bg-cover bg-center transition-all duration-300"
                                                data-img-url="assets/img/news/2.jpg"></div>
                                            <span
                                                class="date absolute z-[1] top-[20px] left-[20px] bg-white inline-block py-[5px] px-[20px]">Oct
                                                22, 2024</span>
                                            <a class="erling_tm_full_link" href="#"></a>
                                        </div>
                                        <div class="details w-full bg-[#f5f5f5]">
                                            <div
                                                class="meta w-full bg-[#eaeaea] px-[30px] py-[15px] flex items-center">
                                                <span class="admin">By <a class="line_effect"
                                                        href="#">Walker</a></span><span class="category">In <a
                                                        class="line_effect" href="#">Media</a></span>
                                            </div>
                                            <div class="title w-full p-[30px]">
                                                <h3 class="text-[20px]"><a class="text-black text_hover_effect"
                                                        href="#">How to Create Quality Figma Design</a></h3>
                                            </div>
                                        </div>

                                        <!-- Modalbox Info Start -->
                                        <div class="news_hidden_details">
                                            <div class="news_popup_informations">
                                                <div class="text">
                                                    <p>Erling is a leading web design agency with an award-winning
                                                        design team that creates innovative, effective websites that
                                                        capture your brand, improve your conversion rates, and maximize
                                                        your revenue to help grow your business and achieve your goals.
                                                    </p>
                                                    <p>In today’s digital world, your website is the first interaction
                                                        consumers have with your business. That's why almost 95 percent
                                                        of a user’s first impression relates to web design. It’s also
                                                        why web design services can have an immense impact on your
                                                        company’s bottom line.</p>
                                                    <p>That’s why more companies are not only reevaluating their
                                                        website’s design but also partnering with Erling, the web design
                                                        agency that’s driven more than $2.4 billion in revenue for its
                                                        clients. With over 50 web design awards under our belt, we're
                                                        confident we can design a custom website that drives sales for
                                                        your unique business.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Modalbox Info End -->

                                    </div>
                                </li>
                                <li class="mb-[40px] pl-[40px] w-1/3 wow fadeInLeft" data-wow-duration="1s"
                                    data-wow-delay="0.4s">
                                    <div class="list_inner w-full h-full clear-both relative">
                                        <div class="image relative mb-[10px] overflow-hidden">
                                            <img class="relative min-w-full opacity-0" src="assets/img/thumbs/4-3.jpg"
                                                alt="" />
                                            <div class="main absolute inset-0 bg-no-repeat bg-cover bg-center transition-all duration-300"
                                                data-img-url="assets/img/news/3.jpg"></div>
                                            <span
                                                class="date absolute z-[1] top-[20px] left-[20px] bg-white inline-block py-[5px] px-[20px]">Sep
                                                07, 2024</span>
                                            <a class="erling_tm_full_link" href="#"></a>
                                        </div>
                                        <div class="details w-full bg-[#f5f5f5]">
                                            <div
                                                class="meta w-full bg-[#eaeaea] px-[30px] py-[15px] flex items-center">
                                                <span class="admin">By <a class="line_effect"
                                                        href="#">Jacob</a></span><span class="category">In <a
                                                        class="line_effect" href="#">Lifestyle</a></span>
                                            </div>
                                            <div class="title w-full p-[30px]">
                                                <h3 class="text-[20px]"><a class="text-black text_hover_effect"
                                                        href="#">Tutorials for Learning Development</a></h3>
                                            </div>
                                        </div>

                                        <!-- Modalbox Info Start -->
                                        <div class="news_hidden_details">
                                            <div class="news_popup_informations">
                                                <div class="text">
                                                    <p>Erling is a leading web design agency with an award-winning
                                                        design team that creates innovative, effective websites that
                                                        capture your brand, improve your conversion rates, and maximize
                                                        your revenue to help grow your business and achieve your goals.
                                                    </p>
                                                    <p>In today’s digital world, your website is the first interaction
                                                        consumers have with your business. That's why almost 95 percent
                                                        of a user’s first impression relates to web design. It’s also
                                                        why web design services can have an immense impact on your
                                                        company’s bottom line.</p>
                                                    <p>That’s why more companies are not only reevaluating their
                                                        website’s design but also partnering with Erling, the web design
                                                        agency that’s driven more than $2.4 billion in revenue for its
                                                        clients. With over 50 web design awards under our belt, we're
                                                        confident we can design a custom website that drives sales for
                                                        your unique business.</p>
                                                </div>
                                            </div>
                                        </div>
                                        <!-- /Modalbox Info End -->

                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /NEWS -->

            <!-- CONTACT -->
            <div class="erling_tm_section w-full h-auto clear-both clearfix" id="contact">
                <div class="erling_tm_contact w-full pt-[143px] px-0 pb-[140px] bg-[#f5f5f5]">
                    <div class="container">
                        <div class="erling_tm_title w-full mb-[70px] wow fadeInLeft">
                            <span class="inline-block mb-[10px] uppercase relative pl-[60px]"
                                data-wow-duration="1s">Contact</span>
                            <h3 class="text-[45px] font-bold">Get in Touch</h3>
                        </div>
                        <div class="contact_inner w-full ">
                            <div class="accordion_wrap ready w-full">
                                <div class="accordion active w-full mb-[10px] wow fadeInLeft" data-wow-duration="1s">
                                    <div
                                        class="accordion_header w-full bg-[#eaeaea] px-[40px] py-[25px] cursor-pointer">
                                        <h3 class="text-[17px] uppercase">Working Days</h3>
                                    </div>
                                    <div class="accordion_content w-full p-[40px] bg-white">
                                        <p>Our company provides services for our customers between 9:00 a.m. and 8:00
                                            p.m. ET, Monday through Friday. You can visit or call during these days.</p>
                                        <p><strong>Weekends:</strong> Saturday and Sunday.</p>
                                    </div>
                                </div>
                                <div class="accordion w-full mb-[10px] wow fadeInLeft" data-wow-duration="1s">
                                    <div
                                        class="accordion_header w-full bg-[#eaeaea] px-[40px] py-[25px] cursor-pointer">
                                        <h3 class="text-[17px] uppercase">Social Profiles</h3>
                                    </div>
                                    <div class="accordion_content w-full p-[40px] bg-white">
                                        <div class="social w-full">
                                            <ul class="flex flex-wrap ml-[-20px]">
                                                <li class="w-1/2 mb-[14px] pl-[20px]"><a
                                                        class="text-black line_effect" href="#">Facebook</a>
                                                </li>
                                                <li class="w-1/2 mb-[14px] pl-[20px]"><a
                                                        class="text-black line_effect" href="#">Instagram</a>
                                                </li>
                                                <li class="w-1/2 mb-[14px] pl-[20px]"><a
                                                        class="text-black line_effect" href="#">Behance</a></li>
                                                <li class="w-1/2 mb-[14px] pl-[20px]"><a
                                                        class="text-black line_effect" href="#">Dribbble</a>
                                                </li>
                                                <li class="w-1/2 mb-[14px] pl-[20px]"><a
                                                        class="text-black line_effect" href="#">YouTube</a></li>
                                                <li class="w-1/2 pl-[20px]"><a class="text-black line_effect"
                                                        href="#">Linkedin</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion w-full mb-[10px] wow fadeInLeft" data-wow-duration="1s">
                                    <div
                                        class="accordion_header w-full bg-[#eaeaea] px-[40px] py-[25px] cursor-pointer">
                                        <h3 class="text-[17px] uppercase">Extra Info</h3>
                                    </div>
                                    <div class="accordion_content w-full p-[40px] bg-white">
                                        <div class="info_list w-full">
                                            <ul>
                                                <li class="w-full mb-[14px]">
                                                    <span class="inline-block min-w-[135px] pr-[20px]">Address:</span>
                                                    <span class="inline-block">177 Ave street New York, USA</span>
                                                </li>
                                                <li class="w-full mb-[14px]">
                                                    <span class="inline-block min-w-[135px] pr-[20px]">Email:</span>
                                                    <span class="inline-block"><a class="text-black line_effect"
                                                            href="#"><span class="__cf_email__"
                                                                data-cfemail="3841574d4a55595154785f55595154165b5755">[email&#160;protected]</span></a></span>
                                                </li>
                                                <li class="w-full mb-[14px]">
                                                    <span class="inline-block min-w-[135px] pr-[20px]">Phone:</span>
                                                    <span class="inline-block"><a class="text-black line_effect"
                                                            href="#">+77 022 777 66 99</a></span>
                                                </li>
                                                <li class="w-full">
                                                    <span class="inline-block min-w-[135px] pr-[20px]">Website:</span>
                                                    <span class="inline-block"><a class="text-black line_effect"
                                                            href="#">www.yourdomain.com</a></span>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion w-full mb-[10px] wow fadeInLeft" data-wow-duration="1s">
                                    <div
                                        class="accordion_header w-full bg-[#eaeaea] px-[40px] py-[25px] cursor-pointer">
                                        <h3 class="text-[17px] uppercase">Fill the Form</h3>
                                    </div>
                                    <div class="accordion_content w-full p-[40px] bg-white">
                                        <div class="form_wrapper w-full">
                                            <form id="contactForm">
                                                <div class="error_box" id="empty-form">
                                                    <p>Please Fill Required Fields</p>
                                                </div>
                                                <div class="error_box" id="subject-alert">
                                                    <p>Please Select Subject</p>
                                                </div>
                                                <div class="error_box" id="security-alert">
                                                    <p>Security code does not match !</p>
                                                </div>
                                                <div class="error_box" id="email-invalid">
                                                    <p>Please enter a valid email address. Exp. <a
                                                            href="https://itemsstore.net/cdn-cgi/l/email-protection"
                                                            class="__cf_email__"
                                                            data-cfemail="c4a1bca5a9b4a8a184a3a9a5ada8eaa7aba9">[email&#160;protected]</a>
                                                    </p>
                                                </div>
                                                <div class="error_box" id="phone-invalid">
                                                    <p>Please enter a valid phone number.Exp. +998991774433</p>
                                                </div>
                                                <div class="error_box" id="error_mail">
                                                    <p></p>
                                                </div>
                                                <div class="success_box" id="success_mail">
                                                    <p>Your message has been sent. We will contact you as soon as
                                                        possible.</p>
                                                </div>
                                                <ul>
                                                    <li>
                                                        <input type="text" placeholder="Name" name="contact_name"
                                                            class="cf-form-control" />
                                                        <span></span>
                                                    </li>
                                                    <li>
                                                        <input type="text" placeholder="Email"
                                                            name="contact_email" class="cf-form-control" />
                                                        <span></span>
                                                    </li>
                                                    <li>
                                                        <input type="text" placeholder="Phone"
                                                            name="contact_phone" class="cf-form-control" />
                                                        <span></span>
                                                    </li>
                                                    <li>
                                                        <select name="contact_subject" class="cf-form-control">
                                                            <option value="Choose Services">Choose Service</option>
                                                            <option value="Web Development">Web Development</option>
                                                            <option value="Mobile Application">Mobile Application
                                                            </option>
                                                            <option value="UI/UX Design">UI/UX Design</option>
                                                        </select>
                                                    </li>
                                                    <li id="text-area-w">
                                                        <textarea placeholder="Message" name="contact_message" class="cf-form-control"></textarea>
                                                    </li>
                                                    <li id="enter_code">
                                                        <span id="txtCaptchaSpan"></span>
                                                        <input type="text" class="cf-form-control"
                                                            name="contact_question" id="txtInput" autocomplete="off"
                                                            placeholder="Please Enter Code *">
                                                        <input type="hidden" id="txtCaptcha">
                                                    </li>
                                                </ul>
                                                <div class="erling_tm_button">
                                                    <button id="send_message" href="#">Send Message</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion w-full mb-[10px] wow fadeInLeft" data-wow-duration="1s">
                                    <div
                                        class="accordion_header w-full bg-[#eaeaea] px-[40px] py-[25px] cursor-pointer">
                                        <h3 class="text-[17px] uppercase">Location</h3>
                                    </div>
                                    <div class="accordion_content w-full p-[40px] bg-white">
                                        <div class="my_map">
                                            <div class="mapouter">
                                                <div class="gmap_canvas"><iframe width="100%" height="350"
                                                        id="gmap_canvas"
                                                        src="https://maps.google.com/maps?q=Broadway,%20New%20York&amp;t=&amp;z=15&amp;ie=UTF8&amp;iwloc=&amp;output=embed"
                                                        frameborder="0" scrolling="no" marginheight="0"
                                                        marginwidth="0"></iframe><a
                                                        href="https://123movies-i.net/"></a><br>
                                                    <style>
                                                        .mapouter {
                                                            position: relative;
                                                            text-align: right;
                                                            height: 350px;
                                                            width: 100%;
                                                        }
                                                    </style><a href="https://www.embedgooglemap.net/">embed google
                                                        map</a>
                                                    <style>
                                                        .gmap_canvas {
                                                            overflow: hidden;
                                                            background: none !important;
                                                            height: 350px;
                                                            width: 100%;
                                                        }
                                                    </style>
                                                </div>
                                            </div>

                                            <!--  You can get your location here https://www.embedgooglemap.net  -->

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /CONTACT -->
        </div>

        <!-- TOTOP -->
        <div class="progressbar">
            <a href="#"><span class="text">To Top</span></a>
            <span class="line"></span>
        </div>
        <!-- /TOTOP -->

    </div>
    <!-- / WRAPPER ALL -->


    <!-- SCRIPTS -->
    <script data-cfasync="false" src="{{ asset('assets/js/email-decode.min.js') }} "></script>
    <script src="assets/js/jquery.js"></script>
    <script src="{{ asset('assets/js/plugins.js') }}"></script>
    <script src="{{ asset('assets/js/contact.form.js') }}"></script>
    <script src="{{ asset('assets/js/init.js') }}"></script>
    <!-- /SCRIPTS -->

</body>

</html>
