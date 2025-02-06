<?php require_once('./components/dbconnect.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>My Cart</title>
    <?php require_once('./components/header_script.php'); ?>
</head>

<body>
    <?php require_once('./components/header.php'); ?>
    <div class="container">
        <h2 class="my-4 text-center">My Cart Products</h2>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Image</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
                        <th scope="col">Total</th>
                    </tr>
                </thead>
                <tbody id="cartLists">

                </tbody>
            </table>
        </div>
    </div>

    <?php require_once('./components/footer_script.php'); ?>
    <script>
        $(document).ready(function() {
    function fetchCartItems() {
        $.ajax({
            url: "./controller/cart/cart_items_list.php",
            type: "GET",
            dataType: "json",
            success: function(response) {
                if (response.success && response.items.length > 0) {
                    $("#cartLists").html(""); // Clear previous list

                    response.items.forEach(item => {
                        let total = item.price * item.quantity;
                        let itemHTML = `
                            <tr>
                                <td><img src="./img/uploads/products/${item.image}" width="50" height="50"></td>
                                <td>${item.name}</td>
                                <td>₹${item.price}</td>
                                <td>${item.quantity}</td>
                                <td>₹${total}</td>
                            </tr>
                        `;
                        $("#cartLists").append(itemHTML);
                    });
                } else {
                    $("#cartLists").html('<tr><td colspan="4" class="text-center">No items found.</td></tr>');
                }
            },
            error: function() {
                $("#cartLists").html('<tr><td colspan="4" class="text-center text-danger">Failed to load Cart Items.</td></tr>');
            }
        });
    }

    fetchCartItems();
});

    </script>
</body>

</html>