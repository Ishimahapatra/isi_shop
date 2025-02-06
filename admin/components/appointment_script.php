<script>
  $(document).ready(function() {
    fetchAppointments();

    // Status filter event
    $("#statusFilter").on("change", function() {
      fetchAppointments(); // Fetch filtered data
    });
  });

  // Function to fetch and display appointments with status filter
  function fetchAppointments() {
    let selectedStatus = $("#statusFilter").val(); // Get selected status

    $.ajax({
      url: "../controller/appointments/<?= $fileName ?>",
      type: "GET",
      data: {
        status: selectedStatus
      }, // Pass status as filter parameter
      dataType: "json",
      success: function(data) {
        if (data.success) {
          let html = '';
          data.appointments.forEach(appointment => {
            html += `
            <tr>
              <td data-order="${appointment.created_at}">${appointment.id}</td>
              <td>${appointment.name}</td>
              <td>${appointment.email}</td>
              <td>${appointment.phone}</td>
              <td>${appointment.doctor_id}</td>
              <td>${new Date(appointment.appointment_date).toLocaleString('en-US', { dateStyle: 'medium', timeStyle: 'short' })}</td>
              <td>${appointment.status}</td>
              <td>${appointment.mail_send}</td>
              <td class='d-flex gap-1'>
                <button type="button" class="btn btn-info btn-sm text-light" onclick="viewAppointment('${appointment.id}', '${appointment.name}', '${appointment.email}', '${appointment.phone}', '${appointment.doctor_id}', '${appointment.appointment_date}', '${appointment.message}', '${appointment.document}', '${appointment.status}', '${appointment.mail_send}')">
                  <i class="fa-solid fa-eye"></i>
                </button>
                <button type="button" class="btn btn-danger btn-sm text-light" onclick="deleteAppointment('${appointment.id}', '${appointment.document}')"><i class="fa-solid fa-trash"></i></button>
              </td>
            </tr>`;
          });

          // Destroy old DataTable instance before updating
          if ($.fn.DataTable.isDataTable("#appointmentsTable")) {
            $("#appointmentsTable").DataTable().destroy();
          }

          $("#appointmentsLists").html(html); // Update table body

          // Reinitialize DataTable
          $("#appointmentsTable").DataTable({
            order: [
              [0, 'desc']
            ],
          });
        } else {
          $("#appointmentsLists").html('<tr><td class="text-center" colspan="10">No appointments found.</td></tr>');
        }
      },
      error: function(err) {
        console.error("Error fetching appointments:", err);
      }
    });
  }

  // Delete Appointment
  function deleteAppointment(appointmentId, document) {
    const appointmentImage = document;
    swal({
      title: "Are you sure?",
      text: "You want to delete this appointment?",
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
          url: "../controller/appointments/appointment_delete.php",
          type: "POST",
          data: {
            id: appointmentId,
            image: appointmentImage
          },
          success: function(response) {
            response = JSON.parse(response);

            console.log(response.success);

            if (response.success) {
              swal("Deleted!", "appointment deleted successfully!", "success").then(() => {
                fetchAppointments(); // Refresh the document list
              });
            } else {
              swal("Error!", "Unable to delete the appointment.", "error");
              fetchAppointments(); // Refresh the document list
            }
          }
        });
      }
    });
  }

  // Function to open modal and show appointment details
  function viewAppointment(id, name, email, phone, doctor_id, appointment_date, message, document, status, send_mail) {
    currentAppointmentId = id;

    $("#viewAppointmentId").text(id);
    $("#viewAppointmentName").text(name);
    $("#viewAppointmentEmail").text(email);
    $("#viewAppointmentPhone").text(phone);
    $("#viewAppointmentDoctor").text(doctor_id);
    $("#viewAppointmentDate").text(appointment_date);
    $("#viewAppointmentMessage").text(message);
    $("#viewAppointmentStatus").val(status);

    if (document) {
      $("#viewAppointmentDocument").html(`<a href="../uploads/patient_documents/${document}" target="_blank">View Document</a>`);
    } else {
      $("#viewAppointmentDocument").text("No document uploaded");
    }

    $("#viewAppointmentMailStatus").text(send_mail);

    // Show the Send Mail button only if mail status is 'Not Send'
    if (send_mail === "Not Send") {
      $("#sendMailButton").show();
    } else {
      $("#sendMailButton").hide();
    }

    $("#viewAppointmentModal").modal("show");
  }

  // Prevent status change without verification
  $("#viewAppointmentStatus").on("change", function() {
    swal({
      title: "Are you sure?",
      text: "Do you want to change the status?",
      icon: "warning",
      buttons: {
        cancel: {
          text: "No, cancel!",
          value: false,
          visible: true,
          className: "btn btn-danger",
          closeModal: true,
        },
        confirm: {
          text: "Yes, change it!",
          value: true,
          visible: true,
          className: "btn btn-success",
          closeModal: true,
        },
      },
    }).then((result) => {
      if (!result) {
        $(this).val($(this).data("original-value")); // Reset to original
      } else {
        updateStatus(currentAppointmentId, $(this).val());
      }
    });
  });

  function updateStatus(appointmentId, newStatus) {
    $.ajax({
      url: "../controller/appointments/status_change.php",
      type: "POST",
      data: {
        id: appointmentId,
        status: newStatus,
      },
      success: function(response) {
        try {
          response = JSON.parse(response);
          console.log("Server response:", response);

          if (response.success === true) { // Correct boolean check
            swal({
              title: "Success!",
              text: "Status has been updated successfully!",
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
              console.log("Fetching appointments...");
              fetchAppointments();
            });
          } else {
            throw new Error("Server returned false success.");
          }
        } catch (error) {
          console.error("Error parsing response:", error);
          swal({
            title: "Error!",
            text: "Failed to update status.",
            icon: "error",
            buttons: {
              confirm: {
                text: "OK",
                value: true,
                visible: true,
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
          text: "Failed to update status.",
          icon: "error",
          buttons: {
            confirm: {
              text: "OK",
              value: true,
              visible: true,
              className: "btn btn-danger",
              closeModal: true,
            },
          },
        });
      },
    });
  }

  function sendMail() {
    $.ajax({
      url: "../controller/appointments/send_mail.php",
      type: "POST",
      data: {
        id: currentAppointmentId,
      },
      success: function(response) {
        swal({
          title: "Success!",
          text: "Mail has been sent successfully!",
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
          $("#viewAppointmentMailStatus").text("sent");
          $("#sendMailButton").hide();
        });
      },
      error: function() {
        swal({
          title: "Error!",
          text: "Failed to send mail.",
          icon: "error",
          buttons: {
            confirm: {
              text: "OK",
              value: true,
              visible: true,
              className: "btn btn-danger",
              closeModal: true,
            },
          },
        });
      },
    });
  }
</script>