<?php
$feature_result = $obj_app->select_all_recent_feature_info();
$product_result = $obj_app->select_all_recent_product_info();
$category_result = $obj_app->select_all_recent_category_info();
?>
<section id="main-slider" class="no-margin">
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#main-slider" data-slide-to="0" class="active"></li>
            <li data-target="#main-slider" data-slide-to="1"></li>
            <li data-target="#main-slider" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">

            <div class="item active" style="background-image: url(assets/front_end_assets/images/slider/bg2.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">One Stop Web Development solution</h1>
                                <!--<h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>-->
                                <!--<a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <!--<img src="assets/front_end_assets/images/slider/img1.png" class="img-responsive">-->
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" style="background-image: url(assets/front_end_assets/images/slider/bg4.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">One Stop Web Development solution</h1>
<!--                                <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                <a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                            </div>
                        </div>

                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <!--<img src="assets/front_end_assets/images/slider/img2.png" class="img-responsive">-->
                            </div>
                        </div>

                    </div>
                </div>
            </div><!--/.item-->

            <div class="item" style="background-image: url(assets/front_end_assets/images/slider/bg3.jpg)">
                <div class="container">
                    <div class="row slide-margin">
                        <div class="col-sm-6">
                            <div class="carousel-content">
                                <h1 class="animation animated-item-1">One Stop Web Development solution</h1>
<!--                                <h2 class="animation animated-item-2">Accusantium doloremque laudantium totam rem aperiam, eaque ipsa...</h2>
                                <a class="btn-slide animation animated-item-3" href="#">Read More</a>-->
                            </div>
                        </div>
                        <div class="col-sm-6 hidden-xs animation animated-item-4">
                            <div class="slider-img">
                                <!--<img src="assets/front_end_assets/images/slider/img3.png" class="img-responsive">-->
                            </div>
                        </div>
                    </div>
                </div>
            </div><!--/.item-->
        </div><!--/.carousel-inner-->
    </div><!--/.carousel-->
    <a class="prev hidden-xs" href="#main-slider" data-slide="prev">
        <i class="fa fa-chevron-left"></i>
    </a>
    <a class="next hidden-xs" href="#main-slider" data-slide="next">
        <i class="fa fa-chevron-right"></i>
    </a>
</section><!--/#main-slider-->

<section id="feature" >
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Features</h2>

        </div>

        <div class="row">

                <?php while ($feature_info = mysqli_fetch_assoc($feature_result)) { ?>
                <div class="features">
                    <div class="col-md-4 col-sm-6 wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
                        <div class="feature-wrap">
                            <i class="fa <?php echo $feature_info['feature_icon']; ?>"></i>
                            <h2><?php echo $feature_info['feature_name']; ?></h2>
                            <h3><?php echo $feature_info['feature_description']; ?></h3>
                        </div>
                    </div>
                <?php } ?>

                </div><!--/.features-->
        </div><!--/.row-->    
    </div><!--/.container-->
</section><!--/#feature-->



<section id="recent-works">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Recent Works</h2>

        </div>



        <div class="row">
            <?php while ($product_info = mysqli_fetch_assoc($product_result)) { ?>  
                <div class="col-xs-12 col-sm-4 col-md-4 col-md-offset-4">
                    <div class="recent-work-wrap">
                        <img class="img-responsive" src="pages/<?php echo $product_info['product_image']; ?>" alt="">
                        <div class="overlay">
                            <div class="recent-work-inner">
                                <h3><a href="#recent-works"><?php echo $product_info['product_name']; ?></a> </h3>
                                <p><?php echo $product_info['product_short_description']; ?></p>
                                <a class="preview" href="pages/<?php echo $product_info['product_image']; ?>" rel="prettyPhoto"><i class="fa fa-eye"></i> View</a>
                            </div> 
                        </div>
                    </div>
                </div>   

            <?php } ?>


        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#recent-works-->

<section id="services" class="service-item">
    <div class="container">
        <div class="center wow fadeInDown">
            <h2>Our Service</h2>

        </div>

        <div class="row">
            <?php while ($category_info = mysqli_fetch_assoc($category_result)) { ?>
                <div class="col-sm-6 col-md-4">
                    <div class="media services-wrap wow fadeInDown">
                        <div class="pull-left">
                            <i class="fa <?php echo $category_info['category_icon']; ?> fa-5x "></i>
                        </div>
                        <div class="media-body">
                            <h3 class="media-heading"><?php echo $category_info['category_name']; ?></h3>
                            <p><?php echo $category_info['category_description']; ?></p>
                        </div>
                    </div>
                </div>

            <?php } ?>


        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#services-->
