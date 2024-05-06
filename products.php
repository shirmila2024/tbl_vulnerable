<?php

include_once 'database/dbconn.php';

// Fetch the latest 20 products from the database
$stmt = $conn->prepare("SELECT `id`, `product_name`, `description`, `pdf_link`, `main_image_url`, `sub_image_url` FROM `main_product` ORDER BY `id` DESC LIMIT 20");
$stmt->execute();

// Fetch all products
$products = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>TBL - Our Products</title>
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

    <link rel="stylesheet" href="assets/css/plugins/swiper-bundle.min.css" />

    <link rel="stylesheet" href="assets/css/plugins/magnific-popup.css" />


    <!-- Style CSS -->
    <link rel="stylesheet" href="assets/css/style.css" />

</head>


<body class="font-poppins text-dark text-sm leading-loose">
    <!-- Header start -->

    <header id="sticky-header">
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
    <div class="py-9 bg-gray-light">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-4">
                <div class="col-span-12">
                    <nav>
                        <ul class="flex flex-wrap items-center justify-center">
                            <li class="mr-5"><a href="index.html" class="text-dark font-medium text-base uppercase transition-all hover:text-orange relative before:w-5 before:h-1px before:empty before:absolute before:top-3 before:bg-dark before:transform before:rotate-115 before:-right-5">Home</a></li>
                            <li class="text-dark font-medium text-base uppercase mr-5">PRODUCTS</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <!-- Hero section end -->


    <!-- blog grid section start -->

    <div class="py-24">
        <div class="container">
            <div class="flex flex-wrap flex-col lg:flex-row -mx-4">
                <div class="lg:w-1/4 px-4 order-last lg:order-first mt-8 lg:mt-0">
                    <div>


                    <div class="mb-12">
                        <h4 class="font-medium text-md lg:text-lg text-dark capitalize mb-5">Products</h4>
                        <ul>
                            <?php foreach ($products as $product): ?>
                                <li class="mb-5 transition-all hover:text-orange">
                                    <a href="#" class="relative cursor-pointer flex items-center">
                                        <?php echo htmlspecialchars($product['product_name']); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>

                        
                    </div>

                </div>

                <div id="shoptab" class="flex-1">
                    <div class="flex flex-wrap justify-between items-center px-4">
                        <div>
                            <ul class="shop-tab-nav flex flex-wrap">
                                <li class="active"><a href="#grid" class="text-base hover:text-orange inline-block py-2 px-2"><i class="icon-grid"></i></a></li>
                                <li><a href="#list" class="text-base hover:text-orange inline-block py-2 px-2 ml-5"><i class="icon-menu"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="mt-10">
                        <div id="grid" class="shop-tab-content active">
                            <div class="flex flex-wrap -mb-7 -px-4">
                                <?php if (!empty($products)): ?>
                                    <?php foreach ($products as $product): ?>
                                        <div class="w-full md:w-1/2 xl:w-1/3 px-4 mb-7">
                                            <div class="border border-solid border-gray-300 transition-all hover:shadow-product group relative">
                                                <div class="relative overflow-hidden">
                                                    <span class="font-medium uppercase text-sm text-black inline-block py-1 px-2 leading-none absolute top-3 left-3"><?php echo htmlspecialchars($product['product_name']); ?></span>
                                                    <img class="w-full h-full" src="admin/<?php echo htmlspecialchars($product['main_image_url']); ?>" alt="product image" loading="lazy" />
                                                    <!-- Your other HTML content here -->
                                                </div>
                                                <div class="py-5 px-4">
                                                    <h4><a class="block text-base hover:text-orange transition-all" href="#"><?php echo htmlspecialchars($product['description']); ?></a></h4>
                                                    <a href="single-product.php?product_id=<?php echo htmlspecialchars($product['id']); ?>" class="bg-primary transition-all hover:bg-orange hover:text-white px-5 md:px-12 py-3 md:py-4 xl:py-4 rounded-full text-white capitalize font-medium text-sm lg:text-md inline-block mt-8 leading-normal">Learn More</a>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endforeach; ?>
                                <?php endif; ?>
                            </div>
                        </div>

                        
                        <div id="list" class="shop-tab-content">
                            <div class="flex flex-wrap -mb-7 -px-4">
                                <?php foreach ($products as $product): ?>
                                    <div class="w-full px-4 mb-7">
                                        <div class="border border-solid border-gray-300 transition-all hover:shadow-product group relative flex flex-wrap flex-col md:flex-row">
                                            <div class="relative overflow-hidden md:w-1/3">
                                                <span class="font-medium uppercase text-sm text-black inline-block py-1 px-2 leading-none absolute top-3 left-3">New</span>
                                                <img class="md:absolute w-full md:h-full md:object-cover" src="admin/<?php echo htmlspecialchars($product['main_image_url']); ?>" alt="product image" loading="lazy" />

                                                <!-- actions start -->
                                                <div class="absolute left-2/4 top-2/4 transform -translate-x-2/4 -translate-y-2/4 z-10">
                                                    <ul class="flex items-center justify-center bg-white shadow opacity-0 invisible group-hover:visible group-hover:opacity-100 transition-all ease-linear transform translate-y-4 group-hover:-translate-y-0">
                                                        <li>
                                                            <a href="#modal-cart" class="text-dark flex items-center justify-center text-md hover:text-orange modal-toggle px-4 py-4" aria-label="quick view" data-tippy-content="Quick View">
                                                                <i class="icon-magnifier-add"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <!-- actions end -->
                                            </div>

                                            <div class="py-5 px-4 flex-1">
                                                <h4><a class="block text-md hover:text-orange transition-all mb-2" href="<?php echo htmlspecialchars($product['pdf_link']); ?>"><?php echo htmlspecialchars($product['product_name']); ?></a></h4>
                                                <p class="text-sm"><?php echo htmlspecialchars($product['description']); ?></p>
                                                <a href="single-product.php?product_id=<?php echo htmlspecialchars($product['id']); ?>" class="bg-primary transition-all hover:bg-orange hover:text-white px-5 md:px-12 py-3 md:py-4 xl:py-4 rounded-full text-white capitalize font-medium text-sm lg:text-md inline-block mt-8 leading-normal">Learn More</a>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <?php include 'footer.php';?>

    <a id="scrollUp" class="w-12 h-12 rounded-full bg-orange text-white fixed right-5 bottom-16 flex flex-wrap items-center justify-center transition-all duration-300 z-10" href="#" aria-label="scroll up"><i class="icon-arrow-up"></i></a>

    <!-- Modals -->
    <!-- modal-overlay start -->
    <div class="modal-overlay hidden fixed inset-0 bg-black opacity-50 z-10"></div>
    <!-- modal-overlay end -->
    <!-- modal-mobile-menu start -->
    <div id="modal-cart" class="modal fixed opacity-0 transition-opacity duration-300 ease-linear md:w-11/12 md:max-w-1000 hidden z-40 left-8 right-8 md:left-1/2 top-1/2 transform -translate-y-1/2 md:-translate-x-1/2 p-7 bg-white">



        <div class="grid md:grid-cols-2 gap-4">
            <div class="w-full">
                <img class="w-full h-full" src="assets/images/products/lg/product1.webp" alt="product image" loading="lazy" width="432" height="480">
            </div>
            <div>
                <button class="text-black text-lg absolute top-7 right-7 modal-close"><i class="icon-close"></i></button>

                <h3 class="text-dark font-medium text-md lg:text-lg leading-none mb-4">Airpod product kiebd</h3>
                <h5 class="font-bold text-md leading-none text-orange mb-8">
                    $130.00
                    <del class="font-normal text-base mr-1 inline-block">$110.00</del>
                </h5>

                <p class="mb-5 text-sm">All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary,</p>

                <select class="w-full h-12 border border-solid border-gray-300  px-5 py-2 appearance-none" style="background: rgba(0,0,0,0) url('assets/images/icon/qcv-arrow-down.webp') no-repeat scroll right 20px center;">
                    <option value="red">red</option>
                    <option value="green">green</option>
                    <option value="blue">blue</option>
                </select>

                <div class="flex flex-wrap items-center mt-8">
                    <div class="flex count border border-solid border-gray-300 p-2 h-11">
                        <button class="decrement flex-auto w-5 leading-none" aria-label="button">-</button>
                        <input type="number" min="1" max="100" step="1" value="1" class="quantity__input flex-auto w-8 text-center focus:outline-none input-appearance-none">
                        <button class="increment flex-auto w-5 leading-none" aria-label="button">+</button>
                    </div>
                    <div class="ml-2 sm:ml-8">
                        <button class="bg-black leading-none py-4 px-5 md:px-8 font-normal text-sm h-11 text-white transition-all hover:bg-orange">Add to Cart</button>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- modal-mobile-menu end -->


    <!-- modal-overlay start -->
    <div class="modal-overlay hidden fixed inset-0 bg-black opacity-50 z-30"></div>
    <!-- modal-overlay end -->
    <!-- modal-mobile-menu start -->
    <div id="modal-addto-cart" class="modal fixed opacity-0 transition-opacity duration-300 ease-linear md:w-11/12 md:max-w-1000 hidden z-50 left-8 right-8 md:left-1/2 top-1/2 transform -translate-y-1/2 md:-translate-x-1/2 p-7 bg-white mx-auto">


        <div class="md:flex md:flex-wrap">
            <div class="md:mr-5 md:flex-30 mb-5 md:mb-0">
                <img class="w-full" src="assets/images/products/lg/product1.webp" alt="product image" loading="lazy" width="432" height="480">
            </div>
            <div class="md:flex-auto">
                <button class="text-black text-lg absolute top-7 right-7 modal-close"><i class="icon-close"></i></button>
                <h3 class="text-dark font-medium text-md sm:text-lg mb-4">Airpod product kiebd</h3>
                <p class="text-dark text-sm flex flex-wrap items-center"><i class="icon-check text-lg mr-5"></i> Added to cart successfully!</p>
                <div class="mt-8">
                    <a href="#" class="bg-black leading-none py-2 px-5 font-normal text-sm text-white transition-all hover:bg-orange mr-5">View Cart</a>
                    <a href="#" class="bg-black leading-none py-2 px-5 font-normal text-sm text-white transition-all hover:bg-orange">Checkout</a>
                </div>
            </div>
        </div>

    </div>
    <!-- modal-mobile-menu end -->

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
                        element.classList.remove('text-primary');
                        element.classList.add('text-primary');
                    });
                } else {
                    logoImage.src = 'assets/images/logo/black_logo.webp';
                    textElements.forEach(function(element) {
                        element.classList.add('text-primary');
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