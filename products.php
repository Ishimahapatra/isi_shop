<?php require_once('./components/dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Products</title>
    <?php require_once('./components/header_script.php'); ?>
</head>

<body>
    <?php require_once('./components/header.php'); ?>


    <!-- =================== products Section Start =================== -->
    <div class="container my-5">
        <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
            <h3 class="display-3 mb-4 text-center">Our products</h3>
        </div>
        <div id="productContainer" class="row w-100 gap-3 justify-content-center"></div>

        <!-- Pagination system -->
        <div class="pagination justify-content-center">
            <button id="prevPage" class="btn border" disabled>Previous</button>
            <span id="pageInfo" class="mx-4 py-1"></span>
            <button id="nextPage" class="btn border">Next</button>
        </div>
    </div>

    <!-- Add to Cart Modal -->
    <div class="modal fade" id="cartModal" tabindex="-1" aria-labelledby="cartModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered">
            <div class="modal-content shadow-lg rounded">
                <div class="modal-header bg-light">
                    <h5 class="modal-title fw-bold text-dark" id="cartModalLabel">Product Details</h5>
                    <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="" id="cartForm">
                    <div class="modal-body">
                        <div class="row">
                            <!-- Product Image -->
                            <div class="col-md-5 text-center">
                                <img id="modalProductImage" src="" class="img-fluid rounded shadow-sm" alt="Product Image" style="max-height: 250px;">
                            </div>

                            <!-- Product Details -->
                            <div class="col-md-7">
                                <h4 id="modalProductName" class="fw-bold text-dark"></h4>
                                <p id="modalProductDescription" class="text-muted"></p>
                                <h4 id="modalProductPrice" class="text-primary fw-bold"></h4>

                                <!-- Quantity Selection -->
                                <div class="mt-3">
                                    <label for="productQuantity" class="form-label fw-bold">Quantity</label>
                                    <input type="number" class="form-control border-primary" id="productQuantity" name="product_quantity" value="1" min="1" required>
                                    <input type="text" class="form-control d-none" id="productId" name="product_id">
                                </div>

                                <!-- Add to Cart Button -->
                                <button type="submit" class="btn btn-primary w-100 mt-4">
                                    <i class="fas fa-cart-plus"></i> Add to Cart
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- =================== products Section End =================== -->


    <?php require_once('./components/footer_script.php'); ?>
    <script>
        $(document).ready(function() {

            let currentPage = 1;
            let totalPages = 1;
            const limit = 10;

            function fetchProducts(page = 1) {
                $.ajax({
                    url: `./controller/products/products_fetch_pagination.php?page=${page}&limit=${limit}`,
                    type: "GET",
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            $("#productContainer").html(""); // Clear previous list

                            response.products.forEach(product => {
                                let productHTML = `
                                <div class="card product-card shadow-sm p-3 mb-4 bg-white rounded" style="width: 18rem;">
                                    <img src="./img/uploads/products/${product.image}" class="card-img-top rounded" style="height: 200px; object-fit: cover;" alt="${product.name}">
                                    <div class="card-body text-center">
                                        <h5 class="card-title fw-bold text-dark">${product.name}</h5>
                                        <p class="card-text text-muted">${product.description.substring(0, 50)}...</p>
                                        <strong class="text-primary fs-5">₹${product.price}</strong>
                                        <div class="mt-3">
                                            <a href="#" class="btn btn-outline-primary w-100" onclick="openCartModal('${product.id}', '${product.name}', '${product.image}', '${product.price}', '${product.description}')">
                                                <i class="fas fa-shopping-cart"></i> Add to Cart
                                            </a>
                                        </div>
                                    </div>
                                </div>`;
                                $("#productContainer").append(productHTML);
                            });

                            // Update pagination
                            currentPage = response.current_page;
                            totalPages = response.total_pages;

                            $("#pageInfo").text(`Page ${currentPage} of ${totalPages}`);
                            $("#prevPage").prop("disabled", currentPage === 1);
                            $("#nextPage").prop("disabled", currentPage === totalPages);
                        } else {
                            $("#productContainer").html('<p class="text-center">No products found.</p>');
                        }
                    },
                    error: function() {
                        $("#productContainer").html('<p class="text-center text-danger">Failed to load products.</p>');
                    }
                });
            }

            // Open Add to Cart modal

            // Open Add to Cart modal and populate product details
            window.openCartModal = function(productId, productName, productImage, productPrice, productDescription) {
                $("#productId").val(productId);
                $("#modalProductImage").attr("src", "./img/uploads/products/" + productImage);
                $("#modalProductName").text(productName);
                $("#modalProductDescription").text(productDescription);
                $("#modalProductPrice").text("₹" + productPrice); // Assuming INR currency

                $("#cartModal").modal("show");
            };

            // Handle AJAX Form Submission for Adding to Cart
            $("#cartForm").submit(function(event) {
                event.preventDefault();
                let formData = new FormData(this);

                $.ajax({
                    url: "./controller/cart/cart_add.php",
                    type: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    success: function(result) {
                        if (result.success) {
                            swal({
                                title: "Success!",
                                text: "Product added to cart successfully!",
                                icon: "success",
                                buttons: {
                                    confirm: {
                                        text: "OK",
                                        className: "btn btn-success",
                                        closeModal: true,
                                    },
                                },
                            }).then(() => {
                                $("#cartForm")[0].reset();
                                $("#cartModal").modal("hide");
                                fetchCartItems();
                            });
                        } else {
                            swal({
                                title: "Error!",
                                text: result.message || "Some error occurred!",
                                icon: "error",
                                buttons: {
                                    confirm: {
                                        text: "OK",
                                        className: "btn btn-danger",
                                        closeModal: true,
                                    },
                                },
                            });
                        }
                    },
                    error: function() {
                        swal({
                            title: "Error!",
                            text: "Some error occurred!",
                            icon: "error",
                            buttons: {
                                confirm: {
                                    text: "OK",
                                    className: "btn btn-danger",
                                    closeModal: true,
                                },
                            },
                        });
                    }
                });
            });

            // Pagination controls
            $("#prevPage").click(() => fetchProducts(currentPage - 1));
            $("#nextPage").click(() => fetchProducts(currentPage + 1));

            // Load products on page load
            fetchProducts();
        });
    </script>
</body>

</html>