<?php
require_once '../components/ifNotLogin.php';
require_once '../components/dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Products Lists</title>
  <?php require_once('../components/header_script.php'); ?>
</head>

<body>
  <?php require_once('./components/sidebar.php'); ?>
  <div class="my-2">
    <div class="">
      <div class="card">
        <div class="card-header">
          <h2 class="position-relative py-3">
            Products
            <span class="position-absolute end-0">
              <a type="button" class="btn btn-primary btn-sm" data-coreui-toggle="modal" data-coreui-target="#productModal"><i class="fa fa-plus"></i> Add</a>
            </span>
          </h2>
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-hover" id="productsTable">
              <thead>
                <tr style="background-color: #f8f9fa;">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Img.</th>
                  <th>Price</th>
                  <th>Stock</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="productsLists"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="productModal" tabindex="-1" aria-labelledby="productModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="productModalLabel">Create Product</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="createproductForm" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <input type="text" class="form-control mt-2" id="name" name="name" placeholder="Enter Products Name">
              <input type="number" step="0.01" class="form-control mt-2" id="price" name="price" placeholder="Enter Products Price">
              <input type="number" class="form-control mt-2" id="stock" name="stock" placeholder="Enter Products Stock">
              <textarea name="description" class="form-control mt-2" id="description" id="description" rows="2" placeholder="Enter Products Description"></textarea>
              <input type="file" class="form-control mt-2" id="image" name="image" placeholder="Image">
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-coreui-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Save</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Edit product Modal -->
  <div class="modal fade" id="editproductModal" tabindex="-1" aria-labelledby="editproductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="editproductModalLabel">Edit product</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="editproductForm">
            <input type="hidden" id="productId">
            <div class="mb-3">
              <label for="productName" class="form-label">Name</label>
              <input type="text" class="form-control" id="productName">
            </div>
            <div class="mb-3">
              <label class="form-label">Current Image</label>
              <img id="productImagePreview" src="" width="100" height="100" class="d-block mb-2">
            </div>
            <div class="mb-3">
              <label for="productPrice" class="form-label">Price</label>
              <input type="number" step="0.01" class="form-control" id="productPrice">
            </div>
            <div class="mb-3">
              <label for="productStock" class="form-label">Stock</label>
              <input type="number" class="form-control" id="productStock">
            </div>
            <div class="mb-3">
              <label for="productDescription" class="form-label">Description</label>
              <textarea class="form-control" id="productDescription" rows="3"></textarea>
            </div>
            <div class="mb-3">
              <label for="productImage" class="form-label">Change Image</label>
              <input type="file" class="form-control" id="productImage" accept="image/*">
            </div>
            <button type="button" class="btn btn-primary" onclick="updateproduct()">Save Changes</button>
          </form>
        </div>
      </div>
    </div>
  </div>



  <?php require_once('../components/footer_script.php'); ?>
  <script>
    $(document).ready(function() {
      fetchproducts();
    });

    // Handle Create products Form Submission
    $("#createproductForm").submit(function(event) {
      event.preventDefault();
      let formData = new FormData(this);

      $.ajax({
        url: "../controller/products/products_create.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(result) {
          console.log(result);

          if (result.success) {
            swal({
              title: "Success!",
              text: "product Created successfully!",
              icon: "success",
              buttons: {
                confirm: {
                  text: "OK",
                  value: true,
                  visible: true,
                  className: "btn btn-success",
                  closeModal: true,
                },
              },
            }).then(() => {
              fetchproducts();
              $("#createproductForm")[0].reset(); // Reset the form
              $("#productModal").modal("hide"); // Close the modal
            });
          } else {
            swal({
              title: "Error!",
              text: result.message || "Some error occurred!",
              icon: "error",
              buttons: {
                confirm: {
                  text: "OK",
                  value: true,
                  visible: true,
                  className: "btn btn-success",
                  closeModal: true,
                },
              },
            }).then(() => {
              // fetchproducts();
              $("#createproductForm")[0].reset(); // Reset the form
              $("#productModal").modal("hide"); // Close the modal
              setTimeout(fetchproducts, 500); // ✅ Delay to ensure fresh data is fetched
            });
          }
        },
        error: function() {
          swal({
            title: "Error!",
            text: result.message || "Some error occurred!",
            icon: "error",
            buttons: {
              confirm: {
                text: "OK",
                value: true,
                visible: true,
                className: "btn btn-success",
                closeModal: true,
              },
            },
          }).then(() => {
            fetchproducts();
            $("#productModal")[0].reset(); // Reset the form
            $("#productModal").modal("hide"); // Close the modal
          });
        }
      });
    });

    // Fetch products
    function fetchproducts() {
      $.ajax({
        url: "../controller/products/products_fetch.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
          if (data.success) {
            let html = "";
            data.products.forEach((product) => {
              html += `
                <tr>
                  <td data-order="${product.created_at}">${product.id}</td>
                  <td>${product.name}</td>
                  <td><img src="../img/uploads/products/${product.image}" width="50" height="50"></td>
                  <td>${product.price}</td>
                  <td>${product.stock}</td>
                  <td class="d-flex gap-1 p-4">
                    <button type="button" class="btn btn-info btn-sm text-light" onclick="editproduct('${product.id}', '${product.name}', '${product.image}', '${product.price}', '${product.stock}', '${product.description}')">
                      <i class="fa-solid fa-edit"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm text-light" onclick="deleteproduct('${product.id}', '${product.image}')">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </td>
                </tr>`;
            });

            // Destroy old DataTable instance before updating
            if ($.fn.DataTable.isDataTable("#productsTable")) {
              $("#productsTable").DataTable().destroy();
            }

            $("#productsLists").html(html); // Update table body

            // Reinitialize DataTable
            $("#productsTable").DataTable({
              order: [
                [0, "desc"]
              ],
              columnDefs: [{
                  targets: [0],
                }, // Hide the first column
              ],
            });
          } else {
            $("#productsLists").html('<tr><td class="text-center" colspan="10">No products found.</td></tr>');
          }
        },
        error: function(err) {
          console.error("Error fetching products:", err);
        },
      });
    }

    // Edit product Value appended
    function editproduct(id, name, image, price, stock, description) {
      $("#productId").val(id);
      $("#productName").val(name);
      $("#productImagePreview").attr("src", "../img/uploads/products/" + image);
      $("#productPrice").val(price);
      $("#productStock").val(stock);
      $("#productDescription").val(description);

      $("#editproductModal").modal("show");
    }

    // Delete product Function
    function deleteproduct(productId, image) {
      const productImage = image;
      swal({
        title: "Are you sure?",
        text: "You want to delete this product?",
        icon: "warning",
        buttons: {
          cancel: {
            text: "Cancel",
            value: false,
            visible: true,
            className: "btn btn-danger",
            closeModal: true,
          },
          delete: {
            text: "Delete",
            value: true,
            visible: true,
            className: "btn btn-primary",
            closeModal: true,
          },
        },
      }).then((willDelete) => {
        if (willDelete) {
          $.ajax({
            url: "../controller/products/products_delete.php",
            type: "POST",
            data: {
              id: productId,
              image: productImage
            },
            success: function(response) {
              response = JSON.parse(response);

              console.log(response.success);

              if (response.success) {
                swal("Deleted!", "product deleted successfully!", "success").then(() => {
                  fetchproducts(); // Refresh the document list
                });
              } else {
                swal("Error!", "Unable to delete the product.", "error");
                fetchproducts(); // Refresh the document list
              }
            }
          });
        }
      });
    }

    // Update product POST request
    function updateproduct() {
      const formData = new FormData();
      formData.append("id", $("#productId").val());
      formData.append("name", $("#productName").val());
      formData.append("price", $("#productPrice").val());
      formData.append("stock", $("#productStock").val());
      formData.append("description", $("#productDescription").val());

      const imageFile = $("#productImage")[0].files[0];
      if (imageFile) {
        formData.append("new_image", imageFile);
        formData.append("old_image", $("#productImagePreview").attr("src").split("/").pop()); // Get old image filename
      }

      $.ajax({
        url: "../controller/products/products_update.php",
        type: "POST",
        data: formData,
        processData: false,
        contentType: false,
        success: function(response) {
          response = JSON.parse(response);
          if (response.success) {
            swal({
              title: "Success!",
              text: "product details updated successfully!",
              icon: "success",
            }).then(() => {
              $("#editproductModal").modal("hide");
              fetchproducts();
            });            
          } else {
            swal({
              title: "Error!",
              text: response.message || "Failed to update product details.",
              icon: "error",
            });
          }
        },
        error: function() {
          swal({
            title: "Error!",
            text: "Failed to update product details.",
            icon: "error",
          });
        },
      });
    }
  </script>
</body>

</html>