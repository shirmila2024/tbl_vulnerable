<?php
// Database connection variables
$host = "localhost"; 
$username = "u151986272_tbl";
$password = "Tbl@13124";
$database = "u151986272_tbl";

// Create database connection
$conn = new mysqli($host, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL to select about us content
$sql = "SELECT `about_us`, `about_us_2` FROM `about_us` ORDER BY `id` DESC LIMIT 1"; // Assuming your table is named 'about_us'
$result = $conn->query($sql);

// Check if there are results
if ($result->num_rows > 0) {
    // Fetch the content
    $row = $result->fetch_assoc();
    $aboutUs = $row['about_us'];
    $aboutUs2 = $row['about_us_2'];
} else {
    $aboutUs = "Not available";
    $aboutUs2 = "Not available";
}

// Close the database connection
$conn->close();
?>

<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>TBL- About Us</title>
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
                            <li class="text-dark font-medium text-base uppercase mr-5">about us</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!-- Hero section end -->



    <!-- about us section start -->
    <div class="py-20 bg-white">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-5">
                <div class="flex flex-wrap items-center mb-10 lg:mb-0">
                    <img src="assets/images/drone/drone4.webp" alt="images">
                </div>
                <div>
                    <div class="mb-10">
                        <h3 class="font-bold uppercase text-3xl md:text-4xl mb-5 text-dark">WELCOME TO <span class="text-orange">The Big Lad</span></h3>
                    </div>
                    <div class="mb-10">
                        <h4 class="font-semibold uppercase text-md mb-4 text-dark">Our Voyage</h4>
                        <p><?php echo $aboutUs; ?></p>
                    </div>
                    <div>
                        <h4 class="font-semibold uppercase text-md mb-4 text-dark">Our Compass</h4>
                        <p><?php echo $aboutUs2; ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about us section end -->



    <!-- testimonial section start -->
    <div class="testimonial-area bg-gray-light py-24 bg-no-repeat bg-cover bg-center group" style="background-image: url('assets/images/hero/slide5.webp');">
        <div class="container">
            <div class="grid grid-cols-12 gap-x-4">
                <div class="col-span-12">
                    <div class="text-center pb-14">
                        <h2 class="font-playfair font-bold text-orange text-3xl sm:text-4xl xl:text-5xl mb-5">Why Navigate with Us?</h2>
                        <p class="font-playfair font-medium text-md mb-3"> </p>
                    </div>
                </div>
                <div class="lg:col-start-3 col-span-12 lg:col-span-8 text-center">

                    <div class="testimonial overflow-hidden relative">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                <div class="swiper-slide">
                                    <p class="my-8">Our extensive range covers everything from navigation tools, safety equipment, to recreational gear, ensuring you're prepared for every voyage.</p>
                                    <h5 class="font-bold text-sm text-dark uppercase">Diverse Catalogue</h5>
                                </div>
                                <div class="swiper-slide">
                                    <p class="my-8">With years at sea and in the industry, our team's expertise is your guide to finding the perfect equipment.</p>
                                    <h5 class="font-bold text-sm text-dark uppercase">Expertise You Can Trust</h5>
                                </div>
                                <div class="swiper-slide">
                                    <p class="my-8">We're committed to bringing you the latest in maritime technology, helping you stay safe and efficient in all your maritime ventures.</p>
                                    <h5 class="font-bold text-sm text-dark uppercase">Innovation on Deck</h5>
                                </div>
                                <div class="swiper-slide">
                                    <p class="my-8">As mariners, we understand the importance of preserving our waters. Our practices and products are aligned with sustainable maritime principles.</p>
                                    <h5 class="font-bold text-sm text-dark uppercase">Sustainable Seas</h5>
                                </div>
                            </div>
                        </div>
                        <!-- Add Pagination -->
                        <!-- <div class="swiper-pagination"></div> -->
                        <!-- swiper navigation -->
                        <div class="swiper-buttons">
                            <div class="swiper-button-prev right-auto left-4  w-12 h-12 rounded-full bg-white border border-solid border-gray-400 text-sm text-dark group-hover:opacity-100 transition-all hover:text-orange hover:border-orange opacity-0 invisible group-hover:visible"></div>
                            <div class="swiper-button-next left-auto right-4  w-12 h-12 rounded-full bg-white border border-solid border-gray-400 text-sm text-dark group-hover:opacity-100 transition-all hover:text-orange hover:border-orange opacity-0 invisible group-hover:visible"></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- testimonial section end -->


    <!-- team carousel start -->
    <div class="py-20">
        <div class="container">
            <div class="grid gap-x-4 grid-cols-12">
                <div class="col-span-12">
                    <div class="text-center pb-14">
                        <h2 class="font-playfair font-bold text-orange text-3xl sm:text-4xl xl:text-5xl mb-5">Set Sail with Confidence</h2>
                        <p class="font-playfair font-medium text-md mb-3">Join us at The Big Lad as we embark on this expanded journey, embracing the spirit of adventure that the sea instills in us all. Whether you're charting a course through the open ocean or enjoying a tranquil day by the shore, we're here to ensure your maritime experiences are second to none. Welcome to The Big Lad - where every voyage begins.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- team carousel end -->

    <?php include 'footer.php';?>

    <a id="scrollUp" class="w-12 h-12 rounded-full bg-orange text-white fixed right-5 bottom-16 flex flex-wrap items-center justify-center transition-all duration-300 z-10" href="#" aria-label="scroll up"><i class="icon-arrow-up"></i></a>

    <!-- Modals -->
    <!-- modal-overlay start -->
    <div class="modal-overlay hidden fixed inset-0 bg-black opacity-50 z-10"></div>
    <!-- modal-overlay end -->

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