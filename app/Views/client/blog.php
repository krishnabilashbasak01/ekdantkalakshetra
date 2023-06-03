<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <base href="/">
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


        <div class="edu-blog-details-area edu-section-gap bg-color-white">
            <div class="container">
                <div class="row g-5">

                    <div class="col-lg-12 order-1 order-lg-2">
                        <div class="blog-details-1">
                            <div class="content-blog-top">
                                <div class="status-group">
                                    <a class="eduvibe-status status-05 color-primary w-600"><?= $blog['post_author_user_name'] ?></a>
                                </div>
                                <h4 class="title">
                                    <?= $blog['post_title'] ?>
                                </h4>
                                <ul class="blog-meta">
                                    <li>
                                        <img src="client_assets/images/blog/author/author-small/author.png" alt="Blog Images" />
                                        <?= $blog['post_author_user_name'] ?>
                                    </li>
                                    <li><i class="icon-calendar-2-line"></i><?= $blog['date'] ?></li>
                                </ul>
                                <div class="thumbnail">
                                    <img class="radius-small w-100 mb--30" src="/assets/uploads/<?= $blog['post_thumbnail'] ?>" alt="Blog Images" />
                                </div>
                            </div>

                            <div class="blog-main-content">
                                <?= $blog['post_content'] ?>
                            </div>

                        

                            <!-- Start Comment Area  -->
                            <div class="edu-comment-area mt--50">
                                <h5 class="blog-page-title">2 Comments</h5>
                                <div class="comment-list-wrapper mt--40">
                                    <!-- Start Single Comment  -->
                                    <?php

                                if ($comments) {
                                    foreach ($comments as $key => $value) {
                                        extract((array) $value);
                                ?>
                                    <div class="comment">
                                        <div class="thumbnail">
                                            <img src="client_assets/images/course/student-review/student-1.png" alt="Comment Images" />
                                        </div>
                                        <div class="comment-content">
                                            <h6 class="title">Daniel Stevo</h6>
                                            <span class="date">Nov 04, 2023 at 6:07 am</span>
                                            <p>
                                                As Thomas pointed out, Chegg’s survey appears more
                                                like a scorecard that details obstacles and challenges
                                                that the current university undergraduate student
                                                population is going through in their universities and
                                                countries during and probably after the COVID-19
                                                pandemic.
                                            </p>
                                            <div class="reply-btn-wrapper">
                                                <a class="reply-btn" href="#"><i class="icon-reply-all-fill"></i> Reply</a>
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                    }
                                }

                                ?>
                                </div>
                            </div>
                            <!-- End Comment Area  -->

                            <!-- Start Comment Form  -->
                            <div class="edu-comment-form mt--50">
                                
                                <form class="comment-form-style-1" action="" method="POST">
                                    <p class="comment-note">
                                        Your email address will not be published. Required fields
                                        are marked *
                                    </p>
                                    <div class="row g-5">
                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <input type="text" name="name" placeholder="Name*" />
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="input-box">
                                                <input type="text" name="email" placeholder="Email*" />
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="input-box">
                                                <textarea name="comment" placeholder="Your comment"></textarea>
                                            </div>
                                        </div>
                                       
                                        <div class="col-lg-12">
                                            <div class="comment-btn">
                                                <button class="edu-btn" type="submit">Submit Now<i class="icon-arrow-right-line-right"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!-- End Comment Form  -->
                        </div>
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