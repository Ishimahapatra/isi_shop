<?php
require_once '../components/ifNotLogin.php';
require_once '../components/dbconnect.php';

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>Appointments</title>
  <?php require_once('../components/header_script.php'); ?>
</head>

<body>
  <?php require_once('./components/sidebar.php'); ?>
  <div class="my-2">
    <div class="">
      <div class="card">
        <div class="card-header">
          <div class="position-relative py-3">
            Appointment Lists
            <span class="position-absolute end-0">
              <?php require_once('./components/dropdown_header.php'); ?>
            </span>
          </div>
        </div>
        <div class="card-body">
          <div class="mb-3">
            <label for="statusFilter" class="form-label"><strong>Filter by Status:</strong></label>
            <select id="statusFilter" class="form-select w-25">
              <option value="">All</option>
              <option value="Pending">Pending</option>
              <option value="Completed">Completed</option>
              <option value="Accepted">Accepted</option>
              <option value="Rejected">Rejected</option>
            </select>
          </div>
          <div class="table-responsive">
            <table class="table table-striped w-100" id="appointmentsTable">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Doctor</th>
                  <th>App. Dt</th>
                  <th>Status</th>
                  <th>Mail</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody id="appointmentsLists"></tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Create Appointment Modal -->
  <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="appointmentModalLabel">Register Appointment</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <form id="createAppointmentForm" enctype="multipart/form-data">
          <div class="modal-body">
            <div class="row">
              <input type="text" class="form-control mt-2" id="name" name="name" placeholder="Enter Patient Nmae">
              <input type="text" class="form-control mt-2" id="email" name="email" placeholder="Enter Patient Email">
              <input type="text" class="form-control mt-2" id="phone" name="phone" placeholder="Enter Patient Phone">
              <input type="datetime-local" class="form-control mt-2" id="appointment_date" name="appointment_date" placeholder="Enter Patient Appointment Date" value="<?= date('Y-m-d\TH:i'); ?>">
              <textarea name="message" class="form-control mt-2" id="message" rows="2" placeholder="Enter Patient Message"></textarea>
              <?php
              $sql = "SELECT * FROM doctors";
              $result = $conn->query($sql);
              if ($result->num_rows > 0) {
                echo '<select class="form-select mt-2" id="doctor_id" name="doctor_id">
                  <option selected disabled>-- Select Doctor --</option>';
                while ($row = $result->fetch_assoc()) {
                  echo '<option value="' . $row['id'] . '">' . $row['name'] . '</option>';
                }
                echo '</select>';
              }
              ?>
              <input type="text" class="form-control mt-2" id="status" name="status" placeholder="Enter Patient Status">
              <input type="text" class="form-control mt-2" id="mail_send" name="mail_send" placeholder="Enter Patient Status">
              <label for="document">Document <input type="file" name="document" class="form-control mt-2" id="document"></label>
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

  <!-- View Appointment Modal -->
  <div class="modal fade" id="viewAppointmentModal" tabindex="-1" aria-labelledby="viewAppointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="viewAppointmentModalLabel">Appointment Details</h5>
          <button type="button" class="btn-close" data-coreui-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table">
            <tr>
              <td><strong>ID:</strong> <span id="viewAppointmentId"></span></td>
            </tr>
            <tr>
              <td><strong>Name:</strong> <span id="viewAppointmentName"></span></td>
            </tr>
            <tr>
              <td><strong>Email:</strong> <span id="viewAppointmentEmail"></span></td>
            </tr>
            <tr>
              <td><strong>Phone:</strong> <span id="viewAppointmentPhone"></span></td>
            </tr>
            <tr>
              <td><strong>Doctor ID:</strong> <span id="viewAppointmentDoctor"></span></td>
            </tr>
            <tr>
              <td><strong>Appointment Date:</strong> <span id="viewAppointmentDate"></span></td>
            </tr>
            <tr>
              <td><strong>Message:</strong> <span id="viewAppointmentMessage"></span></td>
            </tr>
            <tr>
              <td><strong>Document:</strong> <span id="viewAppointmentDocument"></span></td>
            </tr>
            <tr>
              <td>
                <div class="d-flex align-content-center"><strong>Status: </strong>
                  <select id="viewAppointmentStatus" class="form-select mx-3">
                    <option value="Pending">Pending</option>
                    <option value="Accepted">Accepted</option>
                    <option value="Completed">Completed</option>
                    <option value="Rejected">Rejected</option>
                  </select>
                </div>
              </td>
            </tr>
            <tr>
              <td><strong>Mail Status:</strong> <span id="viewAppointmentMailStatus"></span>
                <button id="sendMailButton" class="btn btn-primary btn-sm mx-3" style="display:none;" onclick="sendMail()">Send Mail</button>
              </td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>


  <?php
  require_once('../components/footer_script.php');
  $fileName = 'appointment_fetch.php';
  require_once('./components/appointment_script.php');
  ?>

  <script>
    // Handle AJAX Form Submission
    $("#createAppointmentForm").submit(function(event) {
      event.preventDefault();

      let formData = new FormData(this);

      $.ajax({
        url: "../controller/appointments/appointment_create.php",
        type: "POST",
        data: formData,
        contentType: false,
        processData: false,
        success: function(result) {
          console.log(result);

          if (result.success) {
            swal({
              title: "Success!",
              text: "Appointment Created successfully!",
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
              fetchAppointments();
              $("#createAppointmentForm")[0].reset(); // Reset the form
              $("#appointmentModal").modal("hide"); // Close the modal
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
              // fetchAppointments();
              $("#createAppointmentForm")[0].reset(); // Reset the form
              $("#appointmentModal").modal("hide"); // Close the modal
              setTimeout(fetchAppointments, 500); // ✅ Delay to ensure fresh data is fetched
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
            fetchAppointments();
            $("#appointmentModal")[0].reset(); // Reset the form
            $("#appointmentModal").modal("hide"); // Close the modal
          });
        }
      });
    });
  </script>
</body>

</html>