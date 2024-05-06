<?php
   ini_set('display_errors', 1);
   error_reporting(E_ALL);
   
   include_once 'database/dbconn.php';
   
   if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
       $product_id = $_GET['product_id'];
   } else {
       echo "Product ID is not set or invalid.";
       exit;
   }
   
   $stmt_details = $conn->prepare("
       SELECT *
       FROM `product_detail`
       WHERE `product_id` = :product_id
   ");
   $stmt_details->bindParam(':product_id', $product_id, PDO::PARAM_INT);
   $stmt_details->execute();
   
   $product_details = $stmt_details->fetch(PDO::FETCH_ASSOC);
   
   if (!$product_details) {
       echo "Product details not found.";
       exit;
   }
   
   $stmt_main = $conn->prepare("
       SELECT * FROM `main_product`
       WHERE `id` = :product_id
   ");
   $stmt_main->bindParam(':product_id', $product_id, PDO::PARAM_INT);
   $stmt_main->execute();
   
   $main_product = $stmt_main->fetch(PDO::FETCH_ASSOC);
   
   
   $head_d = $main_product['head_d'];

    // Fetching details from head using head_d
    $stmt_head = $conn->prepare("SELECT * FROM head WHERE id = ?");
    $stmt_head->bindParam(1, $head_d);
    $stmt_head->execute();
    $head_details = $stmt_head->fetchAll(PDO::FETCH_ASSOC);

   if (!$main_product) {
       echo "Main product not found.";
       exit;
   }
   
   // Fetch related products
   $stmt_related = $conn->prepare("
       SELECT `id`, `product_name`, `description`, `pdf_link`, `main_image_url`
       FROM `main_product`
       LIMIT 4
   ");
   
   
   $stmt_related->execute();
   
   $products = $stmt_related->fetchAll(PDO::FETCH_ASSOC);
   
   ?>
<!DOCTYPE html>
<html class="no-js" lang="en">
   <head>
      <meta charset="utf-8" />
      <meta http-equiv="x-ua-compatible" content="ie=edge" />
      <title>TBL - Product details</title>
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
      <style>
         /* Styles for the table container */
         .table-responsive {
         overflow-x: auto; /* Enables horizontal scrolling */
         margin: 20px 0;
         }
         /* Table styles */
         .custom-table {
         width: 100%;
         border-collapse: collapse;
         }
         .custom-table, .custom-table th, .custom-table td {
         border: 1px solid #ddd;
         }
         .custom-table th, .custom-table td {
         text-align: left;
         padding: 8px;
         }
         .custom-table tr:nth-child(even) {
         background-color: #f2f2f2;
         }
         /* Table styles */
         .custom-table {
         width: 100%;
         margin-top: 20px;
         border-collapse: collapse; /* Collapses border to avoid double borders */
         }
         /* Header styles */
         .custom-table thead {
         background-color: #333;
         color: #fff;
         }
         /* Body styles */
         .custom-table tbody tr:nth-child(odd) {
         background-color: #f2f2f2;
         }
         .custom-table tbody tr:nth-child(even) {
         background-color: #ddd;
         }
         /* Cell styles */
         .custom-table td, .custom-table th {
         border: 1px solid #ddd;
         padding: 8px; /* Add padding to cells */
         }
         /* Custom color classes */
         .primary {
         background-color: #007bff;
         color: #fff;
         }
         .secondary {
         background-color: #6c757d;
         color: #fff;
         }
         .success {
         background-color: #28a745;
         color: #fff;
         }
         .danger {
         background-color: #dc3545;
         color: #fff;
         }
         .warning {
         background-color: #ffc107;
         color: #000;
         }
         .info {
         background-color: #17a2b8;
         color: #fff;
         }
      </style>
   </head>
   <body>
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
                           <li class="text-dark font-medium text-base uppercase mr-5"><?php echo htmlspecialchars($main_product['product_name']); ?></li>
                        </ul>
                     </nav>
                  </div>
               </div>
            </div>
         </div>
         <!-- Hero section end -->
         <div class="py-24">
            <div class="container">
               <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
                  <div>
                     <div class="relative overflow-hidden">
                        <div class="gallery mb-6">
                           <div class="swiper-container2">
                                <div class="swiper-wrapper">
                                    <!-- Check and display each image only if the URL is not empty -->
                                    <?php if (!empty($main_product['main_image_url'])): ?>
                                    <div class="swiper-slide">
                                        <img src="admin/<?php echo htmlspecialchars($main_product['main_image_url']); ?>" alt="Main product image">
                                    </div>
                                    <?php endif; ?>
                                    <?php if (!empty($main_product['main_image_url2'])): ?>
                                    <div class="swiper-slide">
                                        <img src="admin/<?php echo htmlspecialchars($main_product['main_image_url2']); ?>" alt="Second product image">
                                    </div>
                                    <?php endif; ?>
                                    <?php if (!empty($main_product['main_image_url3'])): ?>
                                    <div class="swiper-slide">
                                        <img src="admin/<?php echo htmlspecialchars($main_product['main_image_url3']); ?>" alt="Third product image">
                                    </div>
                                    <?php endif; ?>
                                    <?php if (!empty($main_product['main_image_url4'])): ?>
                                    <div class="swiper-slide">
                                        <img src="admin/<?php echo htmlspecialchars($main_product['main_image_url4']); ?>" alt="Fourth product image">
                                    </div>
                                    <?php endif; ?>
                                </div>
                                <!-- Add Pagination if needed -->
                                <div class="swiper-pagination"></div>
                                <!-- Navigation buttons -->
                                <div class="swiper-button-prev"></div>
                                <div class="swiper-button-next"></div>
                            </div>
                        </div>
                     </div>
                  </div>
                  <div>
                     <h3 class="font-medium text-lg capitalize"><?php echo htmlspecialchars($main_product['product_name']); ?></h3>
                     <p class="mb-8"><?php echo htmlspecialchars($main_product['description']); ?></p>
                     <a id="inquiryButton" class="bg-primary transition-all hover:bg-orange hover:text-white px-5 md:px-12 py-3 md:py-4 xl:py-4 rounded-full text-white capitalize font-medium text-sm lg:text-md inline-block leading-normal">Inquiry</a>
                  </div>
               </div>
            </div>
         </div>
         <!-- Modal Popup -->
        <div id="inquiryModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 hidden">
           <div class="bg-white rounded-lg p-8 w-96">
              <h3 class="font-medium text-lg mb-4">Product Inquiry</h3>
              <form id="inquiryForm" method="post">Name
                 <input type="text" name="name" placeholder="Name" class="mb-2 w-full p-2 text-black border border-gray-300 rounded-md">Email
                 <input type="email" name="email" placeholder="Email" class="mb-2 w-full p-2 text-black border border-gray-300 rounded-md">Subject
                 <input type="text" name="subject" placeholder="Subject" class="mb-2 w-full p-2 text-black border border-gray-300 rounded-md">Message
                 <textarea name="message" placeholder="Message" class="mb-2 w-full p-2 border text-black border-gray-300 rounded-md"></textarea>Phone Number
                 <input type="text" name="phone" placeholder="Phone Number" class="mb-2 w-full p-2 text-black border border-gray-300 rounded-md">Company Name
                 <input type="text" name="company" placeholder="Company Name (optional)" class="mb-2 w-full p-2 text-black border border-gray-300 rounded-md">
                 <button type="submit" class="bg-primary transition-all hover:bg-orange text-white font-bold py-2 px-4 rounded">Submit</button>
              </form>
              <button id="closeModal" class="absolute top-0 right-0 mt-2 mr-2 text-gray-500 hover:text-gray-700" aria-label="Close"><span class="icon-close"></span></button>
           </div>
        </div>

         <div id="maintab" class="pb-24">
            <div class="container">
               <div class="grid grid-cols-1 gap-x-5">
                  <div class="border border-solid border-gray-300 p-8">
                     <!-- Tab Navigation -->
                     <ul class="custom-tab-nav flex flex-wrap items-center mb-10 -mx-5 -my-1">
                        <li class="mx-5 my-1">
                           <a class="tab-link" href="#product-details">Product Details</a>
                        </li>
                        <li class="mx-5 my-1">
                           <a class="tab-link" href="#description">Description</a>
                        </li>
                     </ul>
                     <!-- Product Details Tab Content -->
                     <div id="product-details" class="custom-tab-content">
                        <img src="admin/<?php echo htmlspecialchars($main_product['sub_image_url']); ?>" alt="product image">
                        <div class="table-responsive">
                           <table class="custom-table">
                              <thead>
                                 <?php foreach ($head_details as $row): ?>
                                    <tr>
                                        <th><?php echo htmlspecialchars($row['field_1']); ?></th>
                                        <th><?php echo htmlspecialchars($row['field_3']); ?></th>
                                        <th><?php echo htmlspecialchars($row['field_4']); ?></th>
                                        <th><?php echo htmlspecialchars($row['field_5']); ?></th>
                                        <th><?php echo htmlspecialchars($row['field_6']); ?></th>
                                        <th><?php echo htmlspecialchars($row['field_7']); ?></th>
                                        <th><?php echo htmlspecialchars($row['field_8']); ?></th>
                                        <th><?php echo htmlspecialchars($row['field_9']); ?></th>
                                        <th><?php echo htmlspecialchars($row['field_10']); ?></th>
                                    </tr>
                                    <?php endforeach; ?>
                              </thead>
                              <tbody>
                                 <?php 
                                    $stmt_details->execute();
                                    $results = $stmt_details->fetchAll(PDO::FETCH_ASSOC);
                                    
                                    if (!$results) {
                                        echo "Product details not found.";
                                        exit;
                                    }
                                                                        foreach ($results as $product_detail) {
                                        // Display each row in your table
                                        echo "<tr>";
                                        echo "<td>" . htmlspecialchars($product_detail['product_id']) . "</td>";
                                        echo "<td class='info'>" . htmlspecialchars($product_detail['field_3']) . "</td>";
                                        echo "<td class='primary'>" . htmlspecialchars($product_detail['field_4']) . "</td>";
                                        echo "<td class='info'>" . htmlspecialchars($product_detail['field_5']) . "</td>";
                                        echo "<td class='info'>" . htmlspecialchars($product_detail['field_6']) . "</td>";
                                        echo "<td class='info'>" . htmlspecialchars($product_detail['field_7']) . "</td>";
                                        echo "<td class='info'>" . htmlspecialchars($product_detail['field_8']) . "</td>";
                                        echo "<td class='info'>" . htmlspecialchars($product_detail['field_9']) . "</td>";
                                        echo "<td class='info'>" . htmlspecialchars($product_detail['field_10']) . "</td>";
                                        echo "</tr>";
                                    }
                                                                        ?>
                              </tbody>
                           </table>
                        </div>
                     </div>
                     <!-- Description Tab Content -->
                     <div id="description" class="custom-tab-content">
                        <div class="review-bottom">
                           <div class="single-product-desc">
                              <div class="product-anotherinfo-wrapper">
                                 <p><?php echo htmlspecialchars($main_product['description']); ?></p>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <!-- Product section start -->
         <section class="product-section pb-24">
            <div class="container">
               <div class="grid grid-rows-1 grid-flow-col gap-4">
                  <div class="text-center mb-14">
                     <h2 class="font-playfair font-bold text-primary text-3xl md:text-4xl lg:text-xl mb-4">Latest Arrivals</h2>
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
                           <!-- Add Pagination -->
                           <!-- <div class="swiper-pagination"></div> -->
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
         <!-- Footer section start -->
         <?php include 'footer.php';?>
         <!-- Footer section end -->
         <a id="scrollUp" class="w-12 h-12 rounded-full bg-orange text-white fixed right-5 bottom-16 flex flex-wrap items-center justify-center transition-all duration-300 z-10" href="#" aria-label="scroll up"><i class="icon-arrow-up"></i></a>
         <!-- JS Vendor, Plugins & Activation Script Files -->
         <!-- Vendors JS -->
         <script>
             document.addEventListener("DOMContentLoaded", function() {
    // Show popup when Inquiry button is clicked
    document.querySelector('#inquiryButton').addEventListener('click', function() {
        document.getElementById('inquiryModal').classList.remove('hidden');
    });

    // Hide popup when Close button is clicked
    document.querySelector('#closeModal').addEventListener('click', function() {
        document.getElementById('inquiryModal').classList.add('hidden');
    });

    // Submit form data
    document.getElementById('inquiryForm').addEventListener('submit', function(event) {
        event.preventDefault();
        var formData = new FormData(this);

        fetch('send_inquiry.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            alert(data); // Show response from server
            document.getElementById('inquiryForm').reset(); // Reset form after submission
            document.getElementById('inquiryModal').classList.add('hidden'); // Hide modal after submission
        })
        .catch(error => {
            console.error('Error:', error);
        });
    });
});

         </script>
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
         <script>
            document.addEventListener("DOMContentLoaded", function() {
                var swiper = new Swiper('.swiper-container2', {
                    loop: true,
                    pagination: {
                        el: '.swiper-pagination',
                        clickable: true,
                    },
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                });
            });
            </script>

   </body>
</html>