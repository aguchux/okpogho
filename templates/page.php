<!-- About Section -->
<div id="about-section" class="padding pt-xs-40">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-8">
				<?php if ($PageInfo->pagestyle == "blog") : ?>
					<div class="block-title v-line">
						<h2><?= $PageInfo->title ?></h2>
						<p class="italic">last updated: <span><?= $PageInfo->created ?></span></p>
					</div>
					<div class="text-content">
						<?= stripcslashes($PageInfo->content) ?>
					</div>
				<?php elseif ($PageInfo->pagestyle == "page") :
					while ($page_part = mysqli_fetch_object($PageParts)) {
						require("./templates/webparts/{$page_part->webpart}/index.php");
					}
				endif; ?>

			</div>
			<div class="col-md-6 col-lg-4">
				<div class="dark-bg our-vision light-color padding-40">
					<div class="block-title">
						<img src="<?= $assets ?>/assets/images/pageimg.jpeg" alt="">
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<!-- About Section End-->