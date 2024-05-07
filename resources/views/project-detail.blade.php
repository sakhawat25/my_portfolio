<!DOCTYPE html>
<html>
	<head>
		<title>Work detail</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta name="format-detection" content="telephone=no">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<!-- Fonts-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/fontawesome/font-awesome.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/fonts/pe-icon/pe-icon.css') }}">
		<!-- Vendors-->
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/bootstrap/grid.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/magnific-popup/magnific-popup.min.css') }}">
		<link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/swiper/swiper.css') }}">
		<!-- App & fonts-->
		<link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600,700|Open+Sans:400,700">
		<link rel="stylesheet" type="text/css" id="app-stylesheet" href="{{asset('assets/css/main.css') }}"><!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
		<![endif]-->
        <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/project-detail.css') }}">
	</head>

	<body>
		<div class="page-wrap" id="root">

			<!-- header -->
			<header class="header header--fixed">
				<div class="header__inner">
					<div class="header__logo"><a href="index.html"><img src="{{ asset('assets/imgs/logo-light.png') }}" alt="" style="width: 122px;"/></a></div>
					<div class="navbar-toggle" id="fs-button">
						<div class="navbar-icon"><span></span></div>
					</div>
				</div>

				<!-- fullscreenmenu__module -->
				<div class="fullscreenmenu__module" trigger="#fs-button">

					<!-- overlay-menu -->
					<nav class="overlay-menu">

						<!--  -->
						<ul class="wil-menu-list">
							<li><a href="{{ route('homepage') }}">Home</a>
							</li>
							<li><a href="about.html">About</a>
							</li>
							<li><a href="work.html">Work</a>
							</li>
							<li><a href="blog.html">Blog</a>
							</li>
							<li><a href="contact.html">Contact</a>
							</li>
						</ul><!--  -->

					</nav><!-- End / overlay-menu -->

				</div><!-- End / fullscreenmenu__module -->

			</header><!-- End / header -->

			<!-- Content-->
			<div class="wil-content">

				<!-- Section -->
				<section class="awe-section">
					<div class="container">

						<!-- page-title -->
						<div class="page-title pb-40">
							<h2 class="page-title__title">{{ $project->title }}</h2>
							<p class="page-title__text">{{ $project->category }}</p>
							<div class="page-title__divider"></div>
						</div><!-- End / page-title -->

					</div>
				</section>
				<!-- End / Section -->


				<!-- Section -->
				<section class="awe-section bg-gray">
					<div class="container">

						<!--  -->
						<div>
							<div class="work-detail__entry">
								{{ $project->description }}
								<br>
                                <div class="tags">
                                    @foreach ($tags as $tag)
                                        <span class="tag">{{ $tag }}</span>
                                    @endforeach
                                </div>
								<div class="work-img"><img src="{{ asset('images/' . $project->image) }}" alt=""></div>
								{{-- <div class="work-img"><img src="{{ asset('assets/imgs/works/2.jpg') }}" alt=""></div>
								<div class="work-img"><img src="{{ asset('assets/imgs/works/3.jpg') }}" alt=""></div> --}}
							</div>
							<div class="sharebox__module awe-text-center">
								<p class="social-text">SHARE THIS WORK</p>

								<!-- social-icon -->
								<a class="social-icon" href="#"><i class="social-icon__icon fa fa-facebook"></i>
								</a><!-- End / social-icon -->


								<!-- social-icon -->
								<a class="social-icon" href="#"><i class="social-icon__icon fa fa-twitter"></i>
								</a><!-- End / social-icon -->


								<!-- social-icon -->
								<a class="social-icon" href="#"><i class="social-icon__icon fa fa-linkedin"></i>
								</a><!-- End / social-icon -->


								<!-- social-icon -->
								<a class="social-icon" href="#"><i class="social-icon__icon fa fa-behance"></i>
								</a><!-- End / social-icon -->


								<!-- social-icon -->
								<a class="social-icon" href="#"><i class="social-icon__icon fa fa-vimeo"></i>
								</a><!-- End / social-icon -->

							</div>
						</div><!-- End /  -->

						<div class="awe-text-center mt-50">
							<a class="md-btn md-btn--outline-primary " href="#">All work
							</a>
						</div>
					</div>
				</section>
				<!-- End / Section -->

			</div>
			<!-- End / Content-->

			<!-- footer -->
			<div class="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-lg-6 ">
							<p class="footer__coppy">2018 &copy; Copyright <a href="http://awe7.com/">Awe7</a>. All rights Reserved.</p>
						</div>
						<div class="col-md-6 col-lg-6 ">
							<div class="footer__social">

								<!-- social-icon -->
								<a class="social-icon" href="#"><i class="social-icon__icon fa fa-facebook"></i>
								</a><!-- End / social-icon -->


								<!-- social-icon -->
								<a class="social-icon" href="#"><i class="social-icon__icon fa fa-twitter"></i>
								</a><!-- End / social-icon -->


								<!-- social-icon -->
								<a class="social-icon" href="#"><i class="social-icon__icon fa fa-linkedin"></i>
								</a><!-- End / social-icon -->


								<!-- social-icon -->
								<a class="social-icon" href="#"><i class="social-icon__icon fa fa-behance"></i>
								</a><!-- End / social-icon -->


								<!-- social-icon -->
								<a class="social-icon" href="#"><i class="social-icon__icon fa fa-vimeo"></i>
								</a><!-- End / social-icon -->

							</div>
						</div>
					</div>
				</div>
			</div><!-- End / footer -->

		</div>
		<!-- Vendors-->
		<script type="text/javascript" src="{{ asset('assets/vendors/jquery/jquery.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/imagesloaded/imagesloaded.pkgd.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/isotope-layout/isotope.pkgd.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/jquery-one-page/jquery.nav.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/jquery.easing/jquery.easing.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/jquery.matchHeight/jquery.matchHeight.min.j') }}s"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/magnific-popup/jquery.magnific-popup.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/masonry-layout/masonry.pkgd.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/jquery.waypoints/jquery.waypoints.min.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/swiper/swiper.jquery.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/menu/menu.js') }}"></script>
		<script type="text/javascript" src="{{ asset('assets/vendors/typed/typed.min.js') }}"></script>
		<!-- App-->
		<script type="text/javascript" src="{{ asset('assets/js/main.js') }}"></script>
	</body>
</html>
