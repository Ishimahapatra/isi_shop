<?php
require_once '../components/ifNotLogin.php';
require_once '../components/dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Contacts</title>
  <?php require_once('../components/header_script.php'); ?>
</head>

<body>
  <?php require_once('./components/sidebar.php'); ?>
  <div class="my-2">
    <div class="">
      <div class="card">
        <div class="card-header">
          <div class="position-relative py-3">
            Contacts
          </div>
        </div>
        <div class="card-body">
          <!-- <div class="contact-list"> -->
          <div class="table-responsive">
            <table class="table table-hover" id="contactsTable">
              <thead>
                <tr style="background-color: #f8f9fa;">
                  <th>ID</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Gender</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="contactsLists"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- View Contact Modal -->
  <div class="modal fade" id="viewContactModal" tabindex="-1" aria-labelledby="viewContactModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewContactModalLabel">Contact Details</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <label class="form-label fw-bold">Name:</label>
              <input type="text" class="form-control" id="contactName" readonly>
            </div>
            <div class="col-md-6">
              <label class="form-label fw-bold">Email:</label>
              <input type="text" class="form-control" id="contactEmail" readonly>
            </div>
            <div class="col-md-6 mt-2">
              <label class="form-label fw-bold">Phone:</label>
              <input type="text" class="form-control" id="contactPhone" readonly>
            </div>
            <div class="col-md-6 mt-2">
              <label class="form-label fw-bold">Gender:</label>
              <input type="text" class="form-control" id="contactGender" readonly>
            </div>
            <div class="col-md-6 mt-2">
              <label class="form-label fw-bold">Appointment Date:</label>
              <input type="text" class="form-control" id="contactAppointementDate" readonly>
            </div>
            <div class="col-md-6 mt-2">
              <label class="form-label fw-bold">Department:</label>
              <input type="text" class="form-control" id="contactDepartment" readonly>
            </div>
            <div class="col-md-12 mt-2">
              <label class="form-label fw-bold">Comments:</label>
              <textarea class="form-control" id="contactComments" rows="3" readonly></textarea>
            </div>
            <div class="col-md-6 mt-2">
              <label class="form-label fw-bold">Created At:</label>
              <input type="text" class="form-control" id="contactCreatedAt" readonly>
            </div>
            <div class="col-md-6 mt-2">
              <label class="form-label fw-bold">Updated At:</label>
              <input type="text" class="form-control" id="contactUpdatedAt" readonly>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>


  <?php require_once('../components/footer_script.php'); ?>
  <script>
    $(document).ready(function() {
      fetchcontacts();
    });

    // Fetch contacts
    function fetchcontacts() {
      $.ajax({
        url: "../controller/contact/contact_fetch.php",
        type: "GET",
        dataType: "json",
        success: function(data) {
          if (data.success) {
            let html = "";
            data.contacts.forEach((contact) => {
              html += `
                <tr>
                  <td data-order="${contact.created_at}">${contact.id}</td>
                  <td>${contact.name}</td>
                  <td>${contact.email}</td>
                  <td>${contact.phone}</td>
                  <td>${contact.gender}</td>
                  <td class="d-flex gap-1">
                    <button type="button" class="btn btn-info btn-sm text-light" onclick="viewcontact('${contact.id}', '${contact.name}', '${contact.email}', '${contact.phone}', '${contact.gender}', '${contact.appointement_date}', '${contact.department}', '${contact.comments}', '${contact.created_at}', '${contact.updated_at}')">
                      <i class="fa-solid fa-eye"></i>
                    </button>
                    <button type="button" class="btn btn-danger btn-sm text-light" onclick="deletecontact('${contact.id}')">
                      <i class="fa-solid fa-trash"></i>
                    </button>
                  </td>
                </tr>`;
            });

            // Destroy old DataTable instance before updating
            if ($.fn.DataTable.isDataTable("#contactsTable")) {
              $("#contactsTable").DataTable().destroy();
            }

            $("#contactsLists").html(html); // Update table body

            // Reinitialize DataTable
            $("#contactsTable").DataTable({
              order: [
                [0, "desc"]
              ],
              columnDefs: [{
                  targets: [0],
                }, // Hide the first column
              ],
            });
          } else {
            $("#contactsLists").html('<tr><td class="text-center" colspan="10">No contacts found.</td></tr>');
          }
        },
        error: function(err) {
          console.error("Error fetching contacts:", err);
        },
      });
    }

    // View Contact Function (Updated)
    function viewcontact(id, name, email, phone, gender, appointement_date, department, comments, created_at, updated_at) {
      $("#contactName").val(name);
      $("#contactEmail").val(email);
      $("#contactPhone").val(phone);
      $("#contactGender").val(gender);
      $("#contactAppointementDate").val(appointement_date);
      $("#contactDepartment").val(department);
      $("#contactComments").val(comments);
      $("#contactCreatedAt").val(created_at);
      $("#contactUpdatedAt").val(updated_at);

      // Show the modal
      $("#viewContactModal").modal("show");
    }


    // Delete contact Function
    function deletecontact(contactId, image) {
      const contactImage = image;
      swal({
        title: "Are you sure?",
        text: "You want to delete this contact?",
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
            url: "../controller/contact/contact_delete.php",
            type: "POST",
            data: {
              id: contactId,
              image: contactImage
            },
            success: function(response) {
              response = JSON.parse(response);

              console.log(response.success);

              if (response.success) {
                swal("Deleted!", "contact deleted successfully!", "success").then(() => {
                  fetchcontacts(); // Refresh the document list
                });
              } else {
                swal("Error!", "Unable to delete the contact.", "error");
                fetchcontacts(); // Refresh the document list
              }
            }
          });
        }
      });
    }
  </script>
</body>

</html>