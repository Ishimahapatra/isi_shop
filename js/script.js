document.getElementById("sidebarToggle").addEventListener("click", function () {
  document.getElementById("sidebar").classList.toggle("show");
});

document
  .getElementById("closeSidebarBtn")
  .addEventListener("click", function () {
    document.getElementById("sidebar").classList.remove("show");
  });


  function fetchCartItems() {
    console.log("Fetching cart items...");
  
    $.ajax({
      url: "./controller/cart/cart_items_fetch.php",
      type: "GET",
      dataType: "json", // Ensure response is parsed as JSON
      success: function (response) {
        console.log("Cart response:", response);
  
        if (response.success) {
          $("#cartBadge").html(response.total);
        } else {
          $("#cartBadge").html("0");
        }
      },
      error: function (xhr, status, error) {
        console.error("Error fetching cart items:", error);
        $("#cartBadge").html("0");
      },
    });
  }