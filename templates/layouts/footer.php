<!-- Footer Start -->
<footer id="footer">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="footer-logo">
					<a href="/"><img src="<?= $assets ?>/images/footer-logo.png" alt="#"></a>
				</div>
			</div>

			<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
				<div class="widget widget-socialmedia">
					<div class="cs-widget-title">
						<h5>Connect with us</h5>
					</div>
					<ul>
						<li><a href="<?= $Core->getSiteInfo("link_facebook") ?>"><i class="icon-facebook9"></i></a></li>
						<li><a href="<?= $Core->getSiteInfo("link_twitter") ?>"><i class="icon-twitter6"></i></a></li>
						<li><a href="<?= $Core->getSiteInfo("link_instagram") ?>"><i class="icon-instagram"></i></a></li>
						<li><a href="<?= $Core->getSiteInfo("link_youtube") ?>"><i class="icon-youtube-play"></i></a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
				<div class="widget widget-newsletter">
					<div class="cs-widget-title">
						<h5>Subscribe for NEWSLETTER</h5>
					</div>
					<form action="/ajax/newsletter" method="POST">
						<div class="cs-field">
							<i class="icon-user3"></i>
							<input name="news_name" type="text" required aria-required="true" placeholder="Enter Name" style="border-radius:5px 0 0 5px; border-right:1px solid #1e3d3d;">
						</div>
						<div class="cs-field">
							<i class="icon-mail"></i>
							<input name="news_email" type="email" required aria-required="true" placeholder="Valid Email Address">
						</div>
						<input name="name" type="submit" value="Submit">
						<label><?= $Core->getSiteInfo("footer_news_text") ?></label>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
				<div class="copyrights">
					<p><?= $Core->getSiteInfo("copyright_text") ?></p>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Footer End -->

</div>
<script src="<?= $assets ?>/scripts/responsive.menu.js"></script>
<script src="<?= $assets ?>/scripts/chosen.select.js"></script>
<script src="<?= $assets ?>/scripts/slick.js"></script>
<script src="<?= $assets ?>/scripts/counter.js"></script>
<script src="<?= $assets ?>/scripts/jquery.fitvids.js"></script>
<script src="<?= $assets ?>/scripts/skills-progress.js"></script>
<script src="<?= $assets ?>/scripts/lightbox.js"></script>
<!-- Put all Functions in functions.js -->
<script src="<?= $assets ?>/scripts/functions.js"></script>
</body>

</html>