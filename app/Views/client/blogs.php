<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title><?= $pageTitle ?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="client_assets/images/favicon.png" />

    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="client_assets/css/vendor/bootstrap.min.css" />
    <link rel="stylesheet" href="client_assets/css/vendor/remixicon.css" />
    <link rel="stylesheet" href="client_assets/css/vendor/eduvibe-font.css" />
    <link rel="stylesheet" href="client_assets/css/vendor/magnifypopup.css" />
    <link rel="stylesheet" href="client_assets/css/vendor/slick.css" />
    <link rel="stylesheet" href="client_assets/css/vendor/odometer.css" />
    <link rel="stylesheet" href="client_assets/css/vendor/lightbox.css" />
    <link rel="stylesheet" href="client_assets/css/vendor/animation.css" />
    <link rel="stylesheet" href="client_assets/css/vendor/jqueru-ui-min.css" />
    <link rel="stylesheet" href="client_assets/css/style.css" />
</head>

<body>
    <div class="main-wrapper">
        <?php include_once 'components/header.php'; ?>


        <div class="edu-elements-area edu-section-gap bg-color-white">
            <div class="container">
                <div class="row g-5">
                    <div class="col-lg-12">
                        <div class="row g-5">

                            <?php

                            if ($blogs) {
                                foreach ($blogs as $key => $value) {
                                    extract((array) $value);
                            ?>
                                    <!-- Start Blog Grid  -->
                                    <div class="col-lg-4 col-md-6 col-12" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">
                                        <div class="edu-blog blog-type-2 radius-small">
                                            <div class="inner">
                                                <div class="thumbnail">
                                                    <a href="blog-details.html">
                                                        <img src="<?= '/assets/uploads/' . $post_thumbnail; ?>" alt="Blog Images" />
                                                    </a>
                                                </div>
                                                <div class="content">
                                                    <div class="status-group">
                                                        <a href="/blog/<?= $post_slug ?>" class="eduvibe-status status-05"><i class="icon-price-tag-3-line"></i> <?= $post_author_name; ?></a>
                                                    </div>
                                                    <h5 class="title">
                                                        <a href="/blog/<?= $post_slug ?>"><?= $post_title; ?></a>
                                                    </h5>
                                                    <div class="blog-card-bottom">
                                                        <ul class="blog-meta">
                                                            <li>
                                                                <i class="icon-calendar-2-line"></i>06 Nov, 2023
                                                                
                                                            </li>
                                                        </ul>
                                                        <div class="read-more-btn">
                                                            <a class="btn-transparent" href="/blog/<?= $post_slug ?>">Read More<i class="icon-arrow-right-line-right"></i></a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- End Blog Grid  -->
                            <?php
                                }
                            }

                            ?>



                        </div>
                        <!-- <div class="row">
                            <div class="col-lg-12 mt--60">
                                <nav>
                                    <ul class="edu-pagination">
                                        <li>
                                            <a href="#"><i class="ri-arrow-drop-left-line"></i></a>
                                        </li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li><a href="#">...</a></li>
                                        <li><a href="#">8</a></li>
                                        <li>
                                            <a href="#"><i class="ri-arrow-drop-right-line"></i></a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Footer Area  -->
        <?php include_once 'components/footer.php'; ?>
        <!-- End Footer Area  -->
    </div>
    <div class="rn-progress-parent">
        <svg class="rn-back-circle svg-inner" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
        </svg>
    </div>

    <!-- JS
============================================ -->
    <!-- Modernizer JS -->
    <script src="client_assets/js/vendor/modernizr.min.js"></script>
    <!-- jQuery JS -->
    <script src="client_assets/js/vendor/jquery.js"></script>
    <script src="client_assets/js/vendor/bootstrap.min.js"></script>
    <script src="client_assets/js/vendor/sal.min.js"></script>
    <script src="client_assets/js/vendor/backtotop.js"></script>
    <script src="client_assets/js/vendor/magnifypopup.js"></script>
    <script src="client_assets/js/vendor/slick.js"></script>
    <script src="client_assets/js/vendor/countdown.js"></script>
    <script src="client_assets/js/vendor/jquery-appear.js"></script>
    <script src="client_assets/js/vendor/odometer.js"></script>
    <script src="client_assets/js/vendor/isotop.js"></script>
    <script src="client_assets/js/vendor/imageloaded.js"></script>
    <script src="client_assets/js/vendor/lightbox.js"></script>
    <script src="client_assets/js/vendor/wow.js"></script>
    <script src="client_assets/js/vendor/paralax.min.js"></script>
    <script src="client_assets/js/vendor/paralax-scroll.js"></script>
    <script src="client_assets/js/vendor/jquery-ui.js"></script>
    <script src="client_assets/js/vendor/tilt.jquery.min.js"></script>
    <!-- Main JS -->
    <script src="client_assets/js/main.js"></script>
</body>

</html>