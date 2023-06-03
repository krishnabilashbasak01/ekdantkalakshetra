<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title><?= $pageTitle ?></title>
    <meta name="robots" content="noindex, follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="client_assets/images/favicon.png">

    <!-- CSS
	============================================ -->
    <link rel="stylesheet" href="client_assets/css/vendor/bootstrap.min.css">
    <link rel="stylesheet" href="client_assets/css/vendor/remixicon.css">
    <link rel="stylesheet" href="client_assets/css/vendor/eduvibe-font.css">
    <link rel="stylesheet" href="client_assets/css/vendor/magnifypopup.css">
    <link rel="stylesheet" href="client_assets/css/vendor/slick.css">
    <link rel="stylesheet" href="client_assets/css/vendor/odometer.css">
    <link rel="stylesheet" href="client_assets/css/vendor/lightbox.css">
    <link rel="stylesheet" href="client_assets/css/vendor/animation.css">
    <link rel="stylesheet" href="client_assets/css/vendor/jqueru-ui-min.css">
    <link rel="stylesheet" href="client_assets/css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" integrity="sha512-H9jrZiiopUdsLpg94A333EfumgUBpO9MdbxStdeITo+KEIMaNfHNvwyjjDJb+ERPaRS6DpyRlKbvPUasNItRyw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>

<body>
    <div class="main-wrapper">
        <?php include_once 'components/header.php'; ?>
        <!-- End Search Popup  -->

        <div class="edu-elements-area edu-section-gap bg-color-white">
            <div class="container">
                <div class="row mb-3">
                    <div class="col-lg-12">
                        <div class="section-title text-center" data-sal-delay="150" data-sal="slide-up" data-sal-duration="800">

                            <h3 class="title">Annual Days</h3>
                        </div>
                    </div>
                </div>

            </div>
            <div class="container">
                <div class="grid_list">
                    <?php

                    $list = glob("client_assets/images/annual-days/*.*");
                    natsort($list);
                    foreach ($list as $image) {
                        echo '<div class="grid-item">
<a data-fancybox="gallery" href="' . $image . '"><img src="' . $image . '" /></a>
</div>';
                    }


                    ?>
                </div>
            </div>

        </div>


    </div>
    </div>
    <!-- End Testimonial Area  -->
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
    <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js" integrity="sha512-3gJwYpMe3QewGELv8k/BX9vcqhryRdzRMxVfq6ngyWXwo03GFEzjsUm8Q7RZcHPHksttq7/GFoxjCVUjkjvPdw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js" integrity="sha512-uURl+ZXMBrF4AwGaWmEetzrd+J5/8NRkWAvJx5sbPSSuOb0bZLqf+tOzniObO00BjHa/dD7gub9oCGMLPQHtQA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</body>

</html>