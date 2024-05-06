<?php
// Database connection variables
$host = "localhost";
$username = "u151986272_tbl";
$password = "Tbl@13124";
$dbname = "u151986272_tbl";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Prepare the SQL statement
    $stmt = $pdo->prepare("SELECT * FROM blog ORDER BY id DESC LIMIT 3");
    $stmt->execute();

    // Fetch all blog posts
    $blogs = $stmt->fetchAll();

} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}
?>

<!-- Blog section start -->
<section class="blog-carousel-section pb-24">
    <div class="container">
        <div class="grid grid-cols-12 gap-4">
            <div class="col-span-12">
                <div class="section-title text-center pb-14">
                    <span class="font-medium text-orange text-base block mb-4">FEATURED BLOGS</span>
                    <h3 class="font-playfair font-bold text-primary text-3xl md:text-4xl lg:text-xl">Latest Featured Blog</h3>
                </div>
            </div>
            <div class="col-span-12">
                <section class="relative -m-4">
                    <div class="blog-carousel overflow-hidden p-4">
                        <div class="swiper-container">
                            <div class="swiper-wrapper">
                                
                                <?php foreach ($blogs as $blog): ?>
                                <!-- swiper-slide start -->
                                <div class="swiper-slide">
                                    <div class="border border-solid border-gray-300 p-[20px] md:p-[30px] group">
                                        <div class="mb-6">
                                            <a href="blog-details.php?id=<?= $blog['id']; ?>" class="overflow-hidden block">
                                                <img class="transform group-hover:scale-110 transition-transform duration-500 w-full h-full" src="<?= $blog['image_url']; ?>" alt="blog image" loading="lazy" width="600" height="400" />
                                            </a>
                                        </div>
                                        <h3><a href="blog-details.php?id=<?= $blog['id']; ?>" class="block text-base md:text-md hover:text-orange transition-all font-medium mb-[10px]"><?= htmlspecialchars($blog['topic']); ?></a></h3>
                                        <div class="blog-meta blog-mrg-border">
                                            <ul class="pb-[10px]">
                                                <li class="text-sm"><a href="#" class="text-sm text-dark hover:text-orange transition-all"><?= $blog['date']; ?></a></li>
                                            </ul>
                                        </div>

                                        <p class="font-normal text-black text-sm mb-[25px]"><?= substr(htmlspecialchars($blog['content']), 0, 150) . '...'; ?></p>
                                        <a class="bg-white transition-all hover:bg-orange hover:border-orange hover:text-white text-dark capitalize font-medium text-sm inline-block border border-solid border-gray-300 px-8 py-4 leading-none mb-[10px]" href="blog-details.php?id=<?= $blog['id']; ?>">blog details</a>
                                    </div>
                                </div>
                                <!-- swiper-slide end-->
                                <?php endforeach; ?>

                            </div>
                        </div>

                        <!-- Add Pagination -->

                        <!-- <div class="swiper-pagination"></div> -->

                        <!-- swiper navigation -->

                        <div class="swiper-buttons">
                            <div class="swiper-button-prev right-auto left-2 md:-left-2  w-12 h-12 rounded-full bg-white border border-solid border-gray-600 text-sm text-dark opacity-100 transition-all hover:text-orange hover:border-orange"></div>
                            <div class="swiper-button-next left-auto right-2 md:-right-2  w-12 h-12 rounded-full bg-white border border-solid border-gray-600 text-sm text-dark opacity-100 transition-all hover:text-orange hover:border-orange"></div>
                        </div>
                    </div>
                </section>




            </div>
        </div>
    </div>
</section>
<!-- Blog section end -->