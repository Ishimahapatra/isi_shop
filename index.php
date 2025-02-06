<?php require_once('./components/dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>ISI Shoping</title>
    <?php require_once('./components/header_script.php'); ?>
</head>

<body>
    <?php require_once('./components/header.php'); ?>
    <div class="container">
<<<<<<< HEAD
        <h1 class="text-center">Welcome to ISI Shoping</h1>
    </div>

    <!-- Hero Section -->
    <section class="hero bg-primary text-white text-center py-5">
        <div class="container">
            <h1 class="display-4 fw-bold">Welcome to ISI Shopping</h1>
            <p class="lead">Your one-stop shop for the best products, amazing deals, and a seamless shopping experience.</p>
            <a href="./products.php" class="btn btn-light btn-lg mt-3">Shop Now</a>
        </div>
    </section>

    <!-- Featured Products -->
    <section class="container my-5">
        <h2 class="text-center fw-bold">Trending Products</h2>
        <div class="row mt-4 gap-1">
            <?php
            $query = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
            $result = mysqli_query($conn, $query);
            while ($product = mysqli_fetch_assoc($result)) {
                echo '                
                <div class="col-md-3 card product-card shadow-sm p-3 mb-4 bg-white rounded" style="width: 18rem;">
                    <img src="./img/uploads/products/' . $product['image'] . '" class="card-img-top rounded" style="height: 200px; object-fit: cover;" alt="' . $product['name'] . '">
                    <div class="card-body text-center">
                        <h5 class="card-title fw-bold text-dark">' . $product['name'] . '</h5>
                        <p class="card-text text-muted">' . substr($product['description'], 0, 50) . '...</p>
                        <strong class="text-primary fs-5">₹ ' . $product['price'] . '</strong>
                        <div class="mt-3">
                            <a href="#" class="btn btn-outline-primary w-100" href="' . $baseurl . 'product.php">
                                <i class="fas fa-shopping-cart"></i> Add to Cart
                            </a>
                        </div>
                    </div>
                </div>';
            }
            ?>
        </div>
    </section>

    <!-- Testimonials -->
    <section class="bg-light py-5">
        <div class="container text-center">
            <h2 class="fw-bold">What Our Customers Say</h2>
            <div class="row mt-4">
                <div class="col-md-4">
                    <div class="p-4 border rounded shadow-sm">
                        <p>"ISI Shopping has changed my online shopping experience. The products are top-notch!"</p>
                        <h5 class="fw-bold">- Himansu Sekhar Sahu</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded shadow-sm">
                        <p>"Amazing customer service and quick delivery. Highly recommend!"</p>
                        <h5 class="fw-bold">- Sarmistha Patro</h5>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4 border rounded shadow-sm">
                        <p>"Best prices and a huge variety of products. Love it!"</p>
                        <h5 class="fw-bold">- Ganesh Kumar</h5>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Call to Action -->
    <section class="text-center py-5">
        <h2 class="fw-bold">Start Shopping Today!</h2>
        <p class="lead">Browse through thousands of products and get amazing deals.</p>
        <a href="./products.php" class="btn btn-primary btn-lg">Start Shopping</a>
    </section>
=======
        <h1 class="text-center">Welcome to my Home page</h1>
    </div>
>>>>>>> f0038a6f51c4057b9aa5ee17b962303d34745f80
    <?php require_once('./components/footer_script.php'); ?>
</body>

</html>