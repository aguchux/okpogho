<!--
Name: Landing Page (Home PAge)
-->

<!-- Header End -->
<div class="page-section">
    <ul class="main-slider">
        <?php while ($slider = mysqli_fetch_object($Sliders)) : ?>
            <li><img src="<?= $slider->slide ?>" alt="#"></li>
        <?php endwhile; ?>
    </ul>
</div>
<!-- Main Start -->
<main id="main">
    <div class="main-section">
        <div class="page-section" style="background:url(<?= $assets ?>/extra-images/bg-money-option.jpg) no-repeat; background-size:cover; padding:0 0 50px;margin-top:-30px;margin-bottom:59px;">
            <div class="container">
                <div class="dontaion-holder">
                    <div class="row">
                        <div class="col-lg-9 col-md-8 col-sm-12 col-sm-12">
                            <div class="cs-donation-section cs-index">
                                <div class="row">
                                    <div class="col-lg-9 col-md-9 col-sm-12 col-xs-12">
                                        <h4>MBANITO road construction project</h4>
                                        <div class="progress">
                                            <div class="progress-bar">
                                                <span class="percentCount" id="percentCount" percentCount="<?= $Core->getSiteInfo("percentage_donation") ?>">0%</span>
                                            </div>
                                        </div>
                                        <div class="cs-counter small">
                                            <ul>
                                                <li>
                                                    <div class="cs-media">
                                                        <figure><img src="<?= $assets ?>/images/icon-total.png" alt="#"></figure>
                                                    </div>
                                                    <p><strong class="counter"><span style="color: #54D84B;"><?= $Core->ToMoney(2000000) ?></span></strong> Donated by the community</p>
                                                </li>
                                                
                                            </ul>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                                        <a href="#" class="cs-btn disabled" disabled>Donate Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-md-3 col-sm-12 col-xs-12">
                            <div class="cs-video-border">
                                <div class="cs-video">
                                    <iframe style="width: 790px; border: 0;" src="../../video/25924530.html?portrait=0"></iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                    <ul class="cs-money-option">
                        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                            <h3><a href="#">Join the YOUTH Association</a></h3>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <span><em>STEP</em>01</span>
                            <p>Complete online registration</p>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <span><em>STEP</em>02</span>
                            <p>Pay the sum of <?= $Core->ToMoney(1000) ?></p>
                        </li>
                        <li class="col-lg-3 col-md-3 col-sm-6 col-xs-12"> <span><em>STEP</em>03</span>
                            <p>Get your membership ID</p>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</main>
<!-- Main End -->