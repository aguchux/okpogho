<?php
$Cat1Pages = $Core->CatPages("cat1");
$Cat2Pages = $Core->CatPages("cat2");
$Cat3Pages = $Core->CatPages("cat3");
$Cat4Pages = $Core->CatPages("cat4");
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<base href="<?= domain ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?= $title ?></title>
	<link href="<?= $assets ?>/css/bootstrap.css" rel="stylesheet">
	<link href="<?= $assets ?>/css/bootstrap-theme.css" rel="stylesheet">
	<link href="<?= $assets ?>/css/iconmoon.css" rel="stylesheet">
	<link href="<?= $assets ?>/css/style.css?ver=90997" rel="stylesheet">
	<link href="<?= $assets ?>/css/color.css" rel="stylesheet">
	<link href="<?= $assets ?>/css/widget.css" rel="stylesheet">
	<link href="<?= $assets ?>/css/responsive.css" rel="stylesheet">
	<link href="<?= $assets ?>/css/fonts.css" rel="stylesheet">
	<link href="<?= $assets ?>/css/lightbox.css" rel="stylesheet">
	<!-- <link href="<?= $assets ?>/css/rtl.css" rel="stylesheet"> Uncomment it if needed! -->

	<script src="<?= $assets ?>/scripts/jquery.js"></script>
	<script src="<?= $assets ?>/scripts/modernizr.js"></script>
	<script src="<?= $assets ?>/scripts/bootstrap.min.js"></script>

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
	<div class="wrapper">
		<!-- Header Start -->
		<header id="header">
			<div class="container">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
						<div class="cs-logo"><a href="/"><img src="<?= $assets ?>/images/logo.png" alt="#"></a></div>
					</div>
					<div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
						<div class="cs-header-right">
							<div class="cs-top-bar">
								<div class="cs-contact-detail">
									<ul>
										<li><strong>The Community</strong><i class="icon-arrow-right10"></i></li>
										<li><i class="icon-phone-square"></i>Call: <?= $Core->getSiteInfo("site_mobile") ?></li>
										<li><i class="icon-mail6"></i>Email: <a href="#"><?= $Core->getSiteInfo("site_email") ?></a></li>
									</ul>
								</div>
								<ul class="cs-social-media">
									<li><a href="<?= $Core->getSiteInfo("link_facebook") ?>"><i class="icon-facebook7"></i></a></li>
									<li><a href="<?= $Core->getSiteInfo("link_twitter") ?>"><i class="icon-twitter6"></i></a></li>
									<li><a href="<?= $Core->getSiteInfo("link_instagram") ?>"><i class="icon-instagram"></i></a></li>
									<li><a href="<?= $Core->getSiteInfo("link_youtube") ?>"><i class="icon-youtube-play"></i></a></li>
								</ul>
								<div class="lang-top">
									<div class="lang-dropdown-main">
										<div id="lang_sel">
											<ul>
												<li>
													<a class="lang_sel_sel icl-en" href="#">
														<i class="icon-home"></i>&nbsp;<?= $Core->getSiteInfo("default_village") ?>
													</a>
													<ul>
														<li class="icl-es">
															<a href="/village/Imezi/set"><i class="icon-home"></i>&nbsp;Imezi</a>
														</li>
														<li class="icl-ar"><a href="/village/Ukwuagba/set">
																<i class="icon-home"></i>&nbsp;Ukwuagba</a>
														</li>
														<li class="icl-ar"><a href="/village/Okube/set">
																<i class="icon-home"></i>&nbsp;Okube</a>
														</li>
														<li class="icl-ar"><a href="/village/Mgbuta/set">
																<i class="icon-home"></i>&nbsp;Mgbuta</a>
														</li>
														<li class="icl-ar"><a href="/village/Mbanito/set">
																<i class="icon-home"></i>&nbsp;Mbanito</a>
														</li>
													</ul>
												</li>
											</ul>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="cs-main-nav">
							<a href="/" class="home-link"><i class="icon-home"></i></a>

							<ul>
								<li><a href="/">Home </a></li>
								<?php while ($cat2 = mysqli_fetch_array($Cat2Pages)) : ?>
									<?php if ($Core->HasPages($cat2['pageid'])) : $SubPages = $Core->SubPages($tlink['pageid']) ?>
										<li>
											<a href="#!"><?= $cat2['menutitle'] ?></a>
											<ul class="sub-dropdown">
												<?php while ($slink = mysqli_fetch_array($SubPages)) : ?>
													<li><a href="/pages/<?= $slink['shortname'] ?>"><?= $slink['menutitle'] ?></a></li>
												<?php endwhile; ?>
											</ul>
											<!-- End Nav Dropdown -->
										</li>
									<?php else : ?>
										<li><a href="/pages/<?= $cat2['shortname'] ?>"><?= $cat2['menutitle'] ?> </a></li>
									<?php endif; ?>
								<?php endwhile; ?>

							</ul>
						</div>
						<div class="cs-join">
							<a href="#" class="cs-join-us">Join us <i class="icon-arrow-right9"></i></a>
							<ul>
								<li>
									<a href="#"><img src="<?= $assets ?>/images/join-icon-1.png" alt="#"></a>
									<div class="cs-text">
										<h6><a href="#">Youth General</a></h6>
										<span>Join the youth movement</span>
									</div>
								</li>
								<li>
									<a href="#"><img src="<?= $assets ?>/images/join-icon-2.png" alt="#"></a>
									<div class="cs-text">
										<h6><a href="#">Make Donation</a></h6>
										<span>Support community growth</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
					<div class="cs-responsive-nav"></div>
				</div>
			</div>
		</header>