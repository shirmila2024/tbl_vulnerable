<?php
if (isset($_GET['message'])) {
    if ($_GET['message'] == 'success') {
        echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>';
        echo '<script>';
        echo 'document.addEventListener("DOMContentLoaded", function() {';
        echo '  Swal.fire({';
        echo '    title: "Success!",';
        echo '    text: "Email sent successfully.",';
        echo '    icon: "success",';
        echo '    confirmButtonText: "OK"';
        echo '  }).then(function() {';
        echo '    window.location.href = "contact-us.php";'; // Redirect to contact-us.php
        echo '  });';
        echo '});';
        echo '</script>';
    } elseif ($_GET['message'] == 'error') {
        echo '<div class="alert alert-danger">Email sending failed.</div>';
    }
}
?>


<!DOCTYPE html>
<html class="no-js" lang="en">


<!-- Mirrored from template.hasthemes.com/sinp/sinp/contact-us.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 26 Mar 2024 04:24:58 GMT -->
<head>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>TBL- Contact Us</title>
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
                            <li class="text-dark font-medium text-base uppercase mr-5">contact us</li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>


    <!-- Hero section end -->



    <!-- contact us section start -->


    <div class="bg-white py-24">
        <div class="container">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-x-4">
                <div class="contact-info-area">
                    <h2 class="font-semibold text-dark text-4xl mb-14 capitalize">Contact Us</h2>
                    <div class="flex flex-wrap items-center mb-8">
                        <span class="text-dark text-4xl mr-5"><i class="icon-location-pin"></i></span>
                        <p class="flex-1">Address goes here, street, Crossroad 123.</p>
                    </div>
                    <div class="flex flex-wrap items-center mb-8">
                        <span class="text-dark text-4xl mr-5"><i class="icon-envelope"></i></span>
                        <a href="mailto:info@example.com" class="flex-1">info@example.com / info@example.com</a>
                    </div>
                    <div class="flex flex-wrap items-center">
                        <span class="text-dark text-4xl mr-5"><i class="icon-screen-smartphone"></i></span>
                        <a href="tel:01234567890" class="flex-1">01234567890 / 01234567890</a>
                    </div>
                </div>

                <div class="p-10 lg:p-14 shadow mt-14 lg:mt-0">
                    <form id="contact-form" method="POST" action="api.php">
                        <input type="hidden" name="user_email" id="user_email">
                        <input class="border border-solid border-gray-300 w-full py-1 px-5 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base" type="text" id="name" name="name" placeholder="Name">
                        <input class="border border-solid border-gray-300 w-full py-1 px-5 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base" type="email" id="Email" placeholder="Email" name="email">
                        <input class="border border-solid border-gray-300 w-full py-1 px-5 mb-5 placeholder-current text-dark h-12 focus:outline-none text-base" type="text" id="subject" placeholder="subject" name="subject">
                        <textarea class="border border-solid border-gray-300 w-full py-1 px-5 mb-5 text-dark h-32 focus:outline-none text-base resize-none" id="massage" name="massage"></textarea>
                        <button type="submit" class="w-full leading-none uppercase text-white text-sm bg-dark px-5 py-5 transition-all hover:bg-orange" aria-label="button">Send Message</button>
                    </form>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Get the user's email from the input field
                            var userEmailInput = document.getElementById('Email');
                            var userEmail = userEmailInput.value;
                        
                            // Set the hidden input field value to the user's email
                            document.getElementById('user_email').value = userEmail;
                        
                            // Submit the form
                            document.getElementById('contact-form').addEventListener('submit', function(event) {
                                event.preventDefault(); // Prevent the default form submission
                                this.submit(); // Submit the form
                            });
                        });
                        </script>
                </div>
            </div>
        </div>

    </div>
    <!-- contact us section end -->


    <!-- google map start -->

    <div>
        <iframe class="w-full h-96 md:h-500px" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3743278.227637299!2d-61.159056951307704!3d-2.371597134950372!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x91e8605342744385%3A0x3d3c6dc1394a7fc7!2sAmazon%20Rainforest!5e0!3m2!1sen!2sbd!4v1638433670177!5m2!1sen!2sbd" allowfullscreen="" loading="lazy"></iframe>
    </div>

    <!-- google map end -->

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