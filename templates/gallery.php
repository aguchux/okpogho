<!-- Work Section -->
<section id="work" class="padding">
	<div class="container">
		<!-- work Filter -->
		<div class="row">
			<div class="col-lg-6 offset-lg-3">
				<ul class="container-filter categories-filter">
					<li>
						<a class="categories active" data-filter="*">All</a>
					</li>
				</ul>
			</div>
		</div>
		<!-- End work Filter -->
		<div class="row container-grid nf-col-3">
			<?php while ($gallery = mysqli_fetch_object($Galleries)) : ?>
				<div class="nf-item branding coffee spacing">
					<div class="item-box">
						<a><img alt="1" src="<?= $gallery->photo ?>" class="item-container"></a>
						<div class="link-zoom">
							<a href="<?= $gallery->linkedpage ?>" class="project_links"> <i class="fa fa-link"> </i> </a>
							<a href="<?= $gallery->photo ?>" class="fancylight popup-btn" data-fancybox-group="light"> <i class="fa fa-search-plus"></i> </a>
						</div>
					</div>
				</div>
			<?php endwhile; ?>
		</div>

	</div>

</section>
<!--End Contact-->