<!-- Service Section -->
<div id="services-section" class="padding ptb-xs-40">
	<div class="container">

		<div class="row">

			<?php while ($gallery = mysqli_fetch_object($Galleries)) : ?>
				<div class="col-lg-4 col-md-6 mb-30">
					<div class="courses-block img-scale">
						<figure class="img__block">
							<img class="img-responsive" src="<?= $gallery->photo ?>" alt="<?= $gallery->title ?>">
						</figure>
						<div class="courses-content__block">
							<h3 class="item-title"><a href="<?= $gallery->linkedpage ?>"><?= $gallery->title ?></a></h3>
							<p class="item-content">
								<?= $gallery->text ?>
							</p>
						</div>
					</div>
				</div>
			<?php endwhile; ?>

		</div>
	</div>
</div>
<!-- Service Section end -->