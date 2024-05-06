<?php

    include_once 'database/dbconn.php';

    $stmt = $conn->prepare("SELECT `id`, `product_name`, `description`, `pdf_link`, `main_image_url`, `sub_image_url` FROM `main_product` ORDER BY `id` DESC LIMIT 5");
    $stmt->execute();

    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $product = $products[0];
    $product2 = $products[1];

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>TBL- The Big Lad</title>
    <!-- <meta name="robots" content="noindex, follow" /> -->
    <meta name="AdsBot-Google" content="noindex follow" />
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/favicon.webp" />

    <!-- CSS (Font, Vendor, Icon, Plugins & Style CSS files) -->

    <link rel="stylesheet" href="assets/css/vendor/icofont.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/line-awesome.min.css" />
    <link rel="stylesheet" href="assets/css/vendor/simple-line-icons.css" />
    <!-- Font CSS -->
    <link rel="preconnect" href="https://fonts.googleapis.com/" />
    <link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&amp;display=swap" rel="stylesheet" />

    <!-- Vendor CSS (Bootstrap & Icon Font) -->

    <!-- Plugins CSS (All Plugins Files) -->

    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />

    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css" />


    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />

</head>


<body class="font-poppins text-dark text-sm leading-loose">
    <!-- Header start -->
    <header id="sticky-header" class="fixed inset-x-0 top-0 w-full z-20">
        <?php include 'header.php';?>
    </header>

        <div class="search-form fixed top-0 left-0 w-full bg-black opacity-95 min-h-screen items-center justify-center py-8 px-10 transform  transition-transform translate-x-full ease-in-out duration-500 hidden lg:flex z-50">
            <button class="search-close absolute left-1/2 text-white text-xl top-12 translate-y-1/2" aria-label="close icon"><span class="icon-close"></span></button>
            <form class="relative xl:w-1/3 lg:w-1/2" action="#" method="get">
                <input class="text-md font-normal border-b border-solid border-gray-600 bg-transparent h-14 w-full focus:outline-none pr-14 text-white" type="search" name="search" placeholder="Search our store" />
                <button class="absolute right-0 top-3 text-white text-md font-normal" type="submit" aria-label="submit button"><i class="icon-magnifier"></i></button>
            </form>
        </div>

    <?php include 'offcanvas-mobile-menu.php';?>

    <!-- Header end -->


    <!-- Hero section start -->
    <section class="hero-section relative bg-sky-100">
        <div class="hero-slider overflow-hidden">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <!-- swiper-slide start -->
                    <div class="swiper-slide 2xl:h-screen lg:h-700px relative flex flex-wrap items-center px-4 md:px-10 2xl:px-24 py-20 lg:py-0 bg-no-repeat bg-left-bottom bg-sky-100 bg-cover">
                      <video autoplay muted loop playsinline class="absolute w-full h-full top-0 left-0 object-cover z-0">
                        <source src="assets/images/hero/tbl1.mp4" type="video/mp4">
                      </video>
                      <div class="flex flex-col md:flex-row items-center justify-between w-full z-10">
                        <div class="md:flex-grow">
                          <div class="slider-content">
                            <span class="text-lg font-bold text-white block mb-3">Welcome to The Big Lad</span>
                            <h1 class="font-playfair font-bold text-white text-3xl sm:text-4xl lg:text-5xl xl:text-8xl 2xl:text-9xl mb-3 inline-block xl:block">Maritime</h1>
                            <h2 class="font-playfair font-bold text-white text-3xl sm:text-4xl lg:text-5xl xl:text-8xl 2xl:text-9xl mb-7 inline-block xl:block">Needs</h2>
                            <p class="font-normal text-white text-sm lg:text-md">
                              The Latest Innovations in Fishing <br class="hidden xl:block"> Be the First to Know.
                            </p>
                            <div class="inline-block mt-8 lg:mt-12">
                              <a class="flex flex-wrap items-center bg-primary transition-all hover:bg-orange hover:text-white px-3 md:px-4 xl:px-10 py-3 md:py-4 xl:py-5 rounded-full text-white capitalize font-medium text-sm lg:text-md leading-normal" href="products.php">Explore More</a>
                            </div>
                          </div>
                        </div>
                        <div class="md:flex-shrink mt-10 md:mt-0">
                          <!-- Optionally, an image can be placed here if uncommented -->
                          <!-- <img class="sm:max-w-sm mx-auto lg:max-w-lg xl:max-w-full" src="assets/images/hero/drone/drone1.webp" alt="image" loading="lazy" width="758" height="758"> -->
                        </div>
                      </div>
                    </div>
                    <!-- swiper-slide end-->

                    <!-- swiper-slide start -->
                    <div class="swiper-slide 2xl:h-screen lg:h-700px relative flex flex-wrap items-center px-4 md:px-10 2xl:px-24 py-20 lg:py-0 bg-no-repeat bg-left-bottom bg-sky-100 bg-cover">
                      <video autoplay muted loop playsinline class="absolute w-full h-full top-0 left-0 object-cover z-0">
                        <source src="assets/images/hero/tbl2.mp4" type="video/mp4">
                      </video>
                      <div class="flex flex-col md:flex-row items-center justify-between w-full z-10">
                        <div class="md:flex-grow">
                                <div class="slider-content">
                                    <br>
                                    <span class="text-lg font-bold text-primary block mb-3">Gear Up for the Season</span>
                                    <h1 class="font-playfair font-bold text-white text-3xl sm:text-4xl lg:text-5xl xl:text-8xl 2xl:text-9xl mb-3 inline-block xl:block">Seasonal</h1>
                                    <h2 class="font-playfair font-bold text-white text-3xl sm:text-4xl lg:text-5xl xl:text-8xl 2xl:text-9xl mb-7 inline-block xl:block">Essentials</h2>
                                    <p class="font-normal text-white text-sm lg:text-md">
                                        Gear Up for the Season <br class="hidden xl:block"/> From Calm Seas to Stormy Waters
                                    </p>
                                    <div class="inline-block mt-12">
                                        <a class="flex flex-wrap items-center bg-primary transition-all hover:bg-orange hover:text-white px-3 md:px-4 xl:px-10 py-3 md:py-4 xl:py-5 rounded-full text-white capitalize font-medium text-sm lg:text-md leading-normal" href="products.php">Explore More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="md:flex-shrink mt-10 md:mt-0">
                                <!--<img class="sm:max-w-sm mx-auto lg:max-w-lg xl:max-w-full" src="assets/images/hero/drone/drone2.webp" alt="image" loading="lazy" width="750" height="628">-->
                            </div>
                        </div>
                    </div>
                    <!-- swiper-slide end-->

                    <!-- swiper-slide start -->
                    <div class="swiper-slide 2xl:h-screen lg:h-700px relative flex flex-wrap items-center px-4 md:px-10 2xl:px-24 py-20 lg:py-0 bg-no-repeat bg-left-bottom bg-sky-100 bg-cover">
                      <video autoplay muted loop playsinline class="absolute w-full h-full top-0 left-0 object-cover z-0">
                        <source src="assets/images/hero/tbl3.mp4" type="video/mp4">
                      </video>
                      <div class="flex flex-col md:flex-row items-center justify-between w-full z-10">
                        <div class="md:flex-grow">
                                <div class="slider-content">
                                    <span class="text-lg font-bold text-white block mb-3">Set Sail with Our Top Picks</span>
                                    <h1 class="font-playfair font-bold text-primary text-3xl sm:text-4xl lg:text-5xl xl:text-8xl 2xl:text-9xl mb-3 inline-block xl:block">Featured</h1>
                                    <h2 class="font-playfair font-bold text-primary text-3xl sm:text-4xl lg:text-5xl xl:text-8xl 2xl:text-9xl mb-7 inline-block xl:block">Products</h2>
                                    <p class="font-normal text-white text-sm lg:text-md">
                                        Set Sail with Our Top Picks<br class="hidden xl:block"/> Essential Gear for the Sea
                                    </p>
                                    <div class="inline-block mt-12">
                                        <a class="flex flex-wrap items-center bg-primary transition-all hover:bg-orange hover:text-white px-3 md:px-4 xl:px-10 py-3 md:py-4 xl:py-5 rounded-full text-white capitalize font-medium text-sm lg:text-md leading-normal" href="products.php">Explore More</a>
                                    </div>
                                </div>
                            </div>
                            <div class="md:flex-shrink mt-10 md:mt-0">
                                <!--<img class="sm:max-w-sm mx-auto lg:max-w-lg xl:max-w-full" src="assets/images/hero/drone/drone3.webp" alt="image" loading="lazy" width="758" height="758">-->
                            </div>
                        </div>
                    </div>
                    <!-- swiper-slide end-->
                </div>
            </div>

            <!-- Add Pagination -->
            <div class="swiper-pagination mb-5 md:mb-0"></div>
            <!-- swiper navigation -->

            <!--     <div class="hidden">
      <div class="swiper-button-prev">
        <i class="ion-chevron-left"></i>
      </div>
      <div class="swiper-button-next">
        <i class="ion-chevron-right"></i>
      </div>
    </div> -->
        </div>
    </section>

    <!-- Hero section end -->

    <!-- Featured section start -->

    <section class="pt-24 pb-24">
        <div class="container">
            <div class="flex items-center -mx-4 flex-wrap">

                <div class="w-full md:w-1/2 px-4">
                    <span class="text-md font-normal text-orange block mb-4">#FEATURED PRODUCT</span>
                    <h2 class="font-playfair font-bold text-primary text-[30px] sm:text-[36px] xl:text-[48px] leading-tight mb-5"><?php echo htmlspecialchars($product['product_name']); ?></h2>
                    <hr class="w-16 h-1 bg-orange mb-7 border-0">
                    <p class="font-normal text-primary text-base xl:text-md"><?php echo htmlspecialchars($product['description']); ?></p>
                    <a href="single-product.php?product_id=<?php echo htmlspecialchars($product['id']); ?>" class="bg-primary transition-all hover:bg-orange hover:text-white px-5 md:px-12 py-3 md:py-4 xl:py-4 rounded-full text-white capitalize font-medium text-sm lg:text-md inline-block mt-8 leading-normal">Learn More</a>
                </div>
                <div class="w-full md:w-1/2 px-4">
                    <img class="mt-8 md:mt-0" src="admin/<?php echo htmlspecialchars($product['main_image_url']); ?>" alt="product image" />
                </div>
            </div>
        </div>
    </section>

    <!-- Featured section end -->


    <!-- Featured section start -->

    <section class="pt-24 pb-24 ">
        <div class="container">
            <div class="lg:grid lg:grid-cols-2 gap-4">

                <div class="lg:px-5 flex items-center mb-8 md:mb-0">
                    <img src="admin/<?php echo htmlspecialchars($product2['main_image_url']); ?>"" alt="product image" />
                </div>

                <div class="lg:px-5">
                    <span class="text-md font-normal text-orange block mb-4">#LATEST PRODUCT</span>
                    <h2 class="font-playfair font-bold text-primary text-3xl xl:text-xl mb-5 leading-tight"><?php echo htmlspecialchars($product2['product_name']); ?></h2>
                    <p class="font-normal text-primary text-base">
                        <?php echo htmlspecialchars($product2['description']); ?>
                    </p>
                    <a href="single-product.php?product_id=<?php echo htmlspecialchars($product['id']); ?>" class="bg-primary transition-all hover:bg-orange hover:text-white px-5 md:px-12 py-3 md:py-4 xl:py-4 rounded-full text-white capitalize font-medium text-sm lg:text-md inline-block mt-8 leading-normal">Learn More</a>
                </div>
            </div>
        </div>
    </section>


    <!-- Featured section end -->


    <!-- Product section start -->
    <section class="product-section pt-24 pb-24">
        <div class="container">

            <div class="grid grid-rows-1 grid-flow-col gap-4">
                <div class="text-center mb-14">
                    <span class="font-medium text-orange text-base uppercase mb-4 block">AWESOME PRODUCTS</span>
                    <h2 class="font-playfair font-bold text-primary text-3xl md:text-4xl lg:text-xl">Featured Products</h2>
                </div>
            </div>
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <section class="relative -m-4">
                        <div class="product-carousel2 overflow-hidden p-4">
                            <div class="swiper-container">
                                <div class="swiper-wrapper">

                                <?php foreach ($products as $product): ?>
                                    <!-- Dynamic swiper-slide for each product -->
                                    <div class="swiper-slide">
                                        <div class="border border-solid border-gray-300 transition-all hover:shadow-product group">
                                            <div class="relative overflow-hidden">
                                                <img class="w-full h-full" src="admin/<?php echo htmlspecialchars($product['main_image_url']); ?>" alt="product image" loading="lazy" />
                                            </div>
                                            <div class="py-5 px-4">
                                                <h3><a class="block text-base hover:text-orange transition-all" href="<?php echo htmlspecialchars($product['pdf_link']); ?>"><?php echo htmlspecialchars($product['product_name']); ?></a></h3>
                                                <p class="text-sm mb-4"><?php echo htmlspecialchars($product['description']); ?></p>
                                                <a href="single-product.php?product_id=<?php echo htmlspecialchars($product['id']); ?>" class="bg-primary transition-all hover:bg-orange hover:text-white px-5 md:px-12 py-3 md:py-4 xl:py-4 rounded-full text-white capitalize font-medium text-sm lg:text-md inline-block leading-normal">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>


                                </div>
                            </div>

                            <!-- swiper navigation -->

                            <div class="swiper-buttons">
                                <div class="swiper-button-prev right-auto left-4  w-12 h-12 rounded-full bg-white border border-solid border-gray-400 text-sm text-dark opacity-100 transition-all hover:text-orange hover:border-orange"></div>
                                <div class="swiper-button-next left-auto right-4  w-12 h-12 rounded-full bg-white border border-solid border-gray-400 text-sm text-dark opacity-100 transition-all hover:text-orange hover:border-orange"></div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </section>
    <!-- Product section end -->

    <?php include 'blog.php';?>

    <?php include 'footer.php';?>

    <a id="scrollUp" class="w-12 h-12 rounded-full bg-orange text-white fixed right-5 bottom-16 flex flex-wrap items-center justify-center transition-all duration-300 z-10" href="#" aria-label="scroll up"><i class="icon-arrow-up"></i></a>
    <!-- Modals -->

    <!-- modal-overlay start -->
    <div class="modal-overlay hidden fixed inset-0 bg-black opacity-50 z-10"></div>
    <!-- modal-overlay end -->
    <!-- modal-mobile-menu start -->
    <div id="modal-cart" class="modal fixed opacity-0 transition-opacity duration-300 ease-linear md:w-11/12 md:max-w-1000 hidden z-40 left-8 right-8 md:left-1/2 top-1/2 transform -translate-y-1/2 md:-translate-x-1/2 p-7 bg-white">

    </div>
    <!-- modal-mobile-menu end -->

    <!-- modal-overlay start -->
    <div class="modal-overlay hidden fixed inset-0 bg-black opacity-50 z-30"></div>
    <!-- modal-overlay end -->

    <!-- JS Vendor, Plugins & Activation Script Files -->

    <!-- Vendors JS -->
    <script src="assets/js/vendor/modernizr-3.11.7.min.js"></script>
    <script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
    <script src="assets/js/vendor/jquery-migrate-3.3.2.min.js"></script>
    <!-- Plugins JS -->
    <script src="assets/js/plugins/swiper-bundle.min.js"></script>
    <script src="assets/js/plugins/popper.min.js"></script>
    <script src="assets/js/plugins/tippy-bundle.umd.min.js"></script>
    <script src="assets/js/plugins/jquery.magnific-popup.min.js"></script>
    <script src="assets/js/plugins/jquery.ajaxchimp.min.js"></script>

    <!-- Activation JS -->
    <script src="assets/js/main.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            function updateHeader() {
                var header = document.querySelector('header');
                var logoImage = document.querySelector('.logo img');
                var textElements = document.querySelectorAll('.main-menu__item a');

                if (header.classList.contains('is-sticky')) {
                    logoImage.src = 'assets/images/logo/black_logo.webp';
                    textElements.forEach(function(element) {
                        element.classList.remove('text-white');
                        element.classList.add('text-primary');
                    });
                } else {
                    logoImage.src = 'assets/images/logo/logo.webp';
                    textElements.forEach(function(element) {
                        element.classList.add('text-white');
                        element.classList.remove('text-primary'); 
                    });
                }
            }

            window.addEventListener('scroll', function() {
                updateHeader();
            });

            updateHeader();
        });
        </script>


</body>

</html>