
		<!DOCTYPE html>
		<html lang="en">

		<head>
			<meta charset="utf-8">
			<base href="<?= domain ?>">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<title><?= $title ?></title>
			<link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
			<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,700" rel="stylesheet">

			<link href="<?= $assets ?>\assets\css\bootstrap.min.css" rel="stylesheet" type="text/css">
			<link href="<?= $assets ?>\assets\css\font-awesome.css" rel="stylesheet" type="text/css">
			<link href="<?= $assets ?>\assets\css\ionicons.css" rel="stylesheet" type="text/css">
			<link href="<?= $assets ?>\assets\css\jquery.fancybox.css" rel="stylesheet" type="text/css">

			<!--Main Slider-->
			<link href="<?= $assets ?>\assets\css\settings.css" type="text/css" rel="stylesheet" media="screen">
			<link href="<?= $assets ?>\assets\css\layers.css" type="text/css" rel="stylesheet" media="screen">
			<link href="<?= $assets ?>\assets\css\layers.css" type="text/css" rel="stylesheet" media="screen">
			<link href="<?= $assets ?>\assets\css\owl.carousel.css" type="text/css" rel="stylesheet" media="screen">
			<link href="<?= $assets ?>\assets\css\style.css" rel="stylesheet">
			<link href="<?= $assets ?>\assets\css\header.css" rel="stylesheet" type="text/css">
			<link href="<?= $assets ?>\assets\css\footer.css" rel="stylesheet" type="text/css">
			<link href="<?= $assets ?>\assets\css\index.css" rel="stylesheet" type="text/css">

			<link href="<?= $assets ?>\assets\css\theme-color\default.css" rel="stylesheet" type="text/css" id="theme-color">

		</head>

		<body>
			<!--loader-->
			<div id="preloader">
				<div class="sk-circle">
					<div class="sk-circle1 sk-child"></div>
					<div class="sk-circle2 sk-child"></div>
					<div class="sk-circle3 sk-child"></div>
					<div class="sk-circle4 sk-child"></div>
					<div class="sk-circle5 sk-child"></div>
					<div class="sk-circle6 sk-child"></div>
					<div class="sk-circle7 sk-child"></div>
					<div class="sk-circle8 sk-child"></div>
					<div class="sk-circle9 sk-child"></div>
					<div class="sk-circle10 sk-child"></div>
					<div class="sk-circle11 sk-child"></div>
					<div class="sk-circle12 sk-child"></div>
				</div>
			</div>

			<!--loader-->

			<!--Header Section Start Here
		==================================-->
			<header>
				<div class="top-part__block">
					<div class="search__box-block">
						<div class="container">
							<input type="text" id="search" class="input-sm form-full" placeholder="Search Now">
							<a href="#!" class="search__close-btn">
								<i class="fa fa-times" aria-hidden="true"></i>
							</a>
						</div>
					</div>
					<div class="container">
						<div class="row">
							<div class="col-sm-7">
								<p>Welcome to our corporate buisness</p>
							</div>
							<div class="col-sm-5">
								<div class="social-link__block text-right">
									<a href="https://web.facebook.com/search/top?q=nonso%20nwanzi" class="facebook">
										<i class="fa fa-facebook"></i>
									</a>
									<a href="<?= $Core->getSiteInfo("link_twitter") ?>" class="twitter">
										<i class="fa fa-twitter"></i>
									</a>
									<a href="<?= $Core->getSiteInfo("link_google") ?>" class="google-plus">
										<i class="fa fa-google-plus"></i>
									</a>
									<a href="<?= $Core->getSiteInfo("link_linkedin") ?>" class="linkedin">
										<i class="fa fa-linkedin"></i>
									</a>

								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="middel-part__block ">
					<div class="container">
						<div class="row">
							<div class="col-xl-4 col-lg-3 col-md-12">
								<div class="logo">
									<a href="/">
										<img src="<?= $assets ?>\assets\images\logo.png"> </a>
								</div>

								<button type="button" class="navbar-toggle hidden-lg-up" data-toggle="collapse" data-target="#navbar-menu">
									<i class="fa fa-bars"></i>
								</button>
							</div>
							<div class="col-xl-8 col-lg-9 col-md-12 hidden-sm-down">
								<div class="top-info__block text-right">
									<ul>
										<li>
											<i class="fa fa-map-marker"></i>
											<p><?= $Core->getSiteInfo("SiteAddress") ?></span>
											</p>
										</li>
										<li>
											<i class="fa fa-phone"></i>
											<p>
												Call Us <span><?= $Core->getSiteInfo("SiteMobile") ?></span>
											</p>
										</li>
										<li>
											<i class="fa fa-envelope" aria-hidden="true"></i>
											<p>
												Mail Us
												<span>
													<a href="mailto:info@gmail.com"><?= $Core->getSiteInfo("SiteEmail") ?></a>
												</span>
											</p>
										</li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
				<div class="main_nav stricky-header__top navbar-toggleable-md">

					<nav class="navbar navbar-default navbar-sticky bootsnav">
						<div class="container">

							<!-- Collect the nav links, forms, and other content for toggling -->
							<div class="collapse navbar-collapse" id="navbar-menu">
								<ul class="nav navbar-nav mobile-menu">
									<li><a href="/">Home</a></li>
									<?php while ($tlink = mysqli_fetch_array($Cat2Pages)) : ?>
										<?php if ($Core->HasPages($tlink['pageid'])) : $SubPages = $Core->SubPages($tlink['pageid']) ?>
											<li>
												<a href="#!"><?= $tlink['menutitle'] ?></a>
												<span class="submenu-button"></span>
												<!-- Nav Dropdown -->
												<ul class="dropdown-menu">
													<?php while ($slink = mysqli_fetch_array($SubPages)) : ?>
														<li><a href="/pages/<?= $slink['shortname'] ?>"><?= $slink['menutitle'] ?></a></li>
													<?php endwhile; ?>
												</ul>
												<!-- End Nav Dropdown -->
											</li>
										<?php else : ?>
											<li><a href="/pages/<?= $tlink['shortname'] ?>" class="<?= $menukey == $tlink['shortname'] ? 'active' : '' ?>"><?= $tlink['menutitle'] ?></a></li>
										<?php endif; ?>
									<?php endwhile; ?>

								</ul>
							</div>
							<!--navbar-collapse -->
						</div>
					</nav>
				</div>
			</header>


			<!-- END HEADER -->


			<?php if ($haspage) : ?>
				<!-- Intro Section -->
				<section class="inner-intro bg-img light-color overlay-before parallax-background">
					<div class="container">
						<div class="row title">
							<div class="title_row">
								<h1 data-title="About"><span><?= $PageInfo->title ?></span></h1>
								<div class="page-breadcrumb">
									<a>Home</a>/ <span><?= $PageInfo->menutitle ?></span>
								</div>

							</div>

						</div>
					</div>
				</section>
				<!-- Intro Section End-->
			<?php endif; ?>