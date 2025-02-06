<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <title>GROSS HOSPITAL</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport" />
  <meta content="" name="keywords" />
  <meta content="" name="description" />

  <!-- Favicon Setup -->
  <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon" />
  <link
    rel="apple-touch-icon"
    sizes="180x180"
    href="img/favicon/apple-touch-icon.png" />
  <link
    rel="icon"
    type="image/png"
    sizes="32x32"
    href="img/favicon/favicon-32x32.png" />
  <link
    rel="icon"
    type="image/png"
    sizes="16x16"
    href="img/favicon/favicon-16x16.png" />
  <link rel="manifest" href="img/favicon/site.webmanifest" />
  <!-- End Favicon -->

  <!-- Google Web Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link
    href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600&family=Playfair+Display:wght@400;500;600&display=swap"
    rel="stylesheet" />

  <!-- Icon Font Stylesheet -->
  <link
    rel="stylesheet"
    href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css"
    rel="stylesheet" />

  <!-- Libraries Stylesheet -->
  <link href="lib/animate/animate.min.css" rel="stylesheet" />
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />

  <!-- Customized Bootstrap Stylesheet -->
  <link href="css/bootstrap.min.css" rel="stylesheet" />

  <!-- Template Stylesheet -->
  <link href="css/style.css" rel="stylesheet" />

  <style>
    .baa-d {
      background: #fff;
      border: 1px solid #eaeaea;
      border-radius: 6px;
      clear: both;
      margin: 0 0 15px;
      padding: 10px;
      transition: all .3s linear 0s;
      color: #666;
      display: flex;
    }

    .doctor-list figure {
      margin: 0;
      float: left;
      height: 90px;
      overflow: hidden;
      -webkit-transform: scale(1);
      transform: scale(1);
      transition: all .7s ease 0s;
      width: 90px;
      align-self: center;
    }

    .baa-d img {
      width: 90px;
      height: 90px;
      border-radius: 50px;
      object-fit: cover;
    }

    .doctor-list .figcaption {
      -moz-border-bottom-colors: none;
      -moz-border-left-colors: none;
      -moz-border-right-colors: none;
      -moz-border-top-colors: none;
      /* background: #fff; */
      -o-border-image: none;
      border-image: none;
      border-radius: 4px;
      border-style: solid;
      border-width: 0;
      padding: 0px 10px 10px 10px;
      position: relative;
      text-align: left;
      width: 100%;
    }

    .doctorname {
      font-size: 20px;
      font-weight: bold;
      color: #2d9bd5;
    }

    .drrightsec {
      font-size: 12px;
      color: #333;
      display: block;
    }

    .appontbtn {
      color: #fff;
      background-color: #28ac4e;
      border-color: #18a84e;
      font-size: 12px;
      text-align: center;
      padding: 6px 8px;
      border-radius: 5px;
      border: none;
      outline: none;
      margin-top: 10px;
    }

    .details {
      font-size: smaller;
      border-bottom: 1px dotted #ccc;

    }

    .details label {
      font-weight: 600;
      color: #28ac4e;
    }
  </style>
</head>

<body>
  <!-- Spinner Start -->
  <div
    id="spinner"
    class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div
      class="spinner-border text-primary"
      style="width: 3rem; height: 3rem"
      role="status">
      <span class="sr-only">Loading...</span>
    </div>
  </div>
  <!-- Spinner End -->

  <!-- Topbar Start -->
  <div class="container-fluid bg-dark px-5 d-none d-lg-block">
    <div class="row gx-0 align-items-center" style="height: 45px">
      <div class="col-lg-8 text-center text-lg-start mb-lg-0">
        <div class="d-flex flex-wrap">
          <a href="#" class="text-light me-4"><i class="fas fa-map-marker-alt text-primary me-2"></i> Nuapada,
            Odisha, India</a>
          <a href="#" class="text-light me-4"><i class="fas fa-phone-alt text-primary me-2"></i>+91
            7205840602</a>
          <a href="#" class="text-light me-0"><i class="fas fa-envelope text-primary me-2"></i>info@grosshospital.com</a>
        </div>
      </div>
      <div class="col-lg-4 text-center text-lg-end">
        <div class="d-flex align-items-center justify-content-end">
          <a
            href="#"
            class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-facebook-f"></i></a>
          <a
            href="#"
            class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-twitter"></i></a>
          <a
            href="#"
            class="btn btn-light btn-square border rounded-circle nav-fill me-3"><i class="fab fa-instagram"></i></a>
          <a
            href="#"
            class="btn btn-light btn-square border rounded-circle nav-fill me-0"><i class="fab fa-linkedin-in"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- Topbar End -->

  <!-- Navbar & Hero Start -->
  <div class="container-fluid position-relative p-0">
    <nav
      class="navbar navbar-expand-lg navbar-light bg-white px-4 px-lg-5 py-3 py-lg-0">
      <a href="index.php">
        <!-- <h1 class="text-primary m-0"><i class="fas fa-star-of-life me-3"></i>GROSS HOSPITAL</h1> -->
        <img src="img/logo.png" alt="Logo" width="200" height="100" />
      </a>
      <button
        class="navbar-toggler"
        type="button"
        data-bs-toggle="collapse"
        data-bs-target="#navbarCollapse">
        <span class="fa fa-bars"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="navbar-nav ms-auto py-0">
          <a href="index.php" class="nav-item nav-link">Home</a>
          <a href="about.html" class="nav-item nav-link">About</a>
          <a href="service.html" class="nav-item nav-link">Services</a>
          <div class="nav-item dropdown">
            <a
              href="#"
              class="nav-link dropdown-toggle"
              data-bs-toggle="dropdown">Pages</a>
            <div class="dropdown-menu m-0">
              <a href="appointment.html" class="dropdown-item">Appointment</a>
              <a href="feature.html" class="dropdown-item">Specialization</a>
              <a href="blog.html" class="dropdown-item">Our Blog</a>
              <a href="team.html" class="dropdown-item">Our Team</a>
              <a href="testimonial.html" class="dropdown-item">Testimonial</a>
              <!-- <a href="404.html" class="dropdown-item">404 Page</a> -->
              <a href="admin/index.php" class="dropdown-item">Admin</a>
              <a href="admin/doctors.php" class="dropdown-item active">Doctors</a>
            </div>
          </div>
          <a href="contact.html" class="nav-item nav-link">Contact Us</a>
        </div>
        <a
          href="appointment.html"
          class="btn btn-primary rounded-pill text-white py-2 px-4 flex-wrap flex-sm-shrink-0">Book Appointment</a>
      </div>
    </nav>
  </div>
  <!-- Navbar & Hero End -->

  <!-- Header Start -->
  <div class="container-fluid bg-breadcrumb">
    <div class="container text-center py-5" style="max-width: 900px;">
      <h3 class="text-white display-3 mb-4 wow fadeInDown" data-wow-delay="0.1s">Doctors</h1>
        <ol class="breadcrumb justify-content-center mb-0 wow fadeInDown" data-wow-delay="0.3s">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item"><a href="#">Pages</a></li>
          <li class="breadcrumb-item active text-primary">Doctors</li>
        </ol>
    </div>
  </div>
  <!-- Header End -->

  <!-- =================== Doctors Section Start =================== -->
  <div class="container my-5">
    <div class="section-title mb-5 wow fadeInUp" data-wow-delay="0.2s" style="visibility: visible; animation-delay: 0.2s; animation-name: fadeInUp;">
      <div class="sub-style">
        <h4 class="sub-title px-3 mb-0">Doctor Section</h4>
      </div>
      <h1 class="display-3 mb-4">Our Doctors</h1>

    </div>
    <div id="doctorContainer" class="row w-100"></div>

    <!-- Pagination system -->
    <div class="pagination justify-content-center">
      <button id="prevPage" class="btn border" disabled>Previous</button>
      <span id="pageInfo" class="mx-4 py-1"></span>
      <button id="nextPage" class="btn border">Next</button>
    </div>
  </div>

  <!-- Appointment Booking Modal -->
  <div class="modal fade" id="appointmentModal" tabindex="-1" aria-labelledby="appointmentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="appointmentModalLabel">Book Appointment</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="appointmentForm" enctype="multipart/form-data">
            <input type="hidden" id="doctorId" name="doctor_id">
            <input type="text" class="form-control mt-3" id="doctorName" name="doctor_name" readonly>
            <input type="text" class="form-control mt-3" id="name" name="name" placeholder="Enter Patient Name" required>
            <input type="email" class="form-control mt-3" id="email" name="email" placeholder="Enter Email">
            <input type="tel" class="form-control mt-3" id="phone" name="phone" placeholder="Enter Phone Number">
            <input type="datetime-local" class="form-control mt-3" id="appointment_date" name="appointment_date" placeholder="Enter Appointment Date">
            <input type="text" class="form-control mt-3" id="message" name="message" placeholder="Enter Message">
            <label for="document" class="d-flex align-items-center">Document: <input type="file" class="form-control mt-3" id="document" name="document"></label>
            <button type="submit" class="btn btn-primary w-100 mt-3">Submit</button>
          </form>
        </div>
      </div>
    </div>
  </div>
  <!-- =================== Doctors Section Start =================== -->

  <!-- whatsapp start -->
  <div
    class="whatapp"
    style="position: fixed; bottom: 40px; left: 20px; z-index: 10">
    <a href="https://wa.me/7205840602" target="_blank"><img src="img/whatsapp.webp" width="50px" class="whatsapp_btn" /></a>
  </div>
  <!-- whatsapp end -->

  <!-- Footer Start -->
  <div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
      <div class="row g-5">
        <div class="col-md-6 col-lg-6 col-xl-3">
          <div class="footer-item d-flex flex-column">
            <h4 class="text-white mb-4">
              <i class="fas fa-star-of-life me-3"></i>GROSS HOSPITAL
            </h4>

            <div class="d-flex align-items-center">
              <i class="fas fa-share fa-2x text-white me-2"></i>
              <a
                class="btn-square btn btn-primary text-white rounded-circle mx-1"
                href=""><i class="fab fa-facebook-f"></i></a>
              <a
                class="btn-square btn btn-primary text-white rounded-circle mx-1"
                href=""><i class="fab fa-twitter"></i></a>
              <a
                class="btn-square btn btn-primary text-white rounded-circle mx-1"
                href=""><i class="fab fa-instagram"></i></a>
              <a
                class="btn-square btn btn-primary text-white rounded-circle mx-1"
                href=""><i class="fab fa-linkedin-in"></i></a>
            </div>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
          <div class="footer-item d-flex flex-column">
            <h4 class="mb-4 text-white">Quick Links</h4>
            <a href=""><i class="fas fa-angle-right me-2"></i> About Us</a>
            <a href=""><i class="fas fa-angle-right me-2"></i> Contact Us</a>
            <a href=""><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
            <a href=""><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
            <a href=""><i class="fas fa-angle-right me-2"></i> Our Blog & News</a>
            <a href=""><i class="fas fa-angle-right me-2"></i> Our Team</a>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
          <div class="footer-item d-flex flex-column">
            <h4 class="mb-4 text-white">GROSS HOSPITAL Services</h4>
            <a href=""><i class="fas fa-angle-right me-2"></i> All Services</a>
            <a href=""><i class="fas fa-angle-right me-2"></i> Physiotherapy</a>
            <a href=""><i class="fas fa-angle-right me-2"></i> Diagnostics</a>
            <a href=""><i class="fas fa-angle-right me-2"></i> Manual Therapy</a>
            <a href=""><i class="fas fa-angle-right me-2"></i> Massage Therapy</a>
            <a href=""><i class="fas fa-angle-right me-2"></i> Rehabilitation</a>
          </div>
        </div>
        <div class="col-md-6 col-lg-6 col-xl-3">
          <div class="footer-item d-flex flex-column">
            <h4 class="mb-4 text-white">Contact Info</h4>
            <a href=""><i class="fa fa-map-marker-alt me-2"></i>Infront Of Durga
              Mandap, Near S.P. Office, Nuapada, Odisha 766105</a>
            <a href="mailto:info@grosshospital.com"><i class="fas fa-envelope me-2"></i>info@grosshospital.com</a>

            <a href="tel:+917789952736"><i class="fas fa-phone me-2"></i> +91 7205840602</a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer End -->

  <!-- Copyright Start -->
  <div class="container-fluid copyright py-4">
    <div class="container">
      <div class="row g-4 align-items-center">
        <div class="col-md-6 text-center text-md-start mb-md-0">
          <span class="text-white"><a href="#"><i class="fas fa-copyright text-light me-2"></i>GROSS
              HOSPITAL</a>, All right reserved.</span>
        </div>
        <div class="col-md-6 text-center text-md-end text-white">
          Designed By
          <a class="border-bottom" href="https://takshsoftwares.in">Taksh</a>
        </div>
      </div>
    </div>
  </div>
  <!-- Copyright End -->

  <!-- Back to Top -->
  <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="components/sweetalert.min.js"></script>

  <!-- Template Javascript -->
  <script src="js/main.js"></script>

  <script>
    $(document).ready(function() {
      let currentPage = 1;
      let totalPages = 1;
      const limit = 10;

      function fetchDoctors(page = 1) {
        $.ajax({
          url: `./controller/doctors/doctors_fetch_pagination.php?page=${page}&limit=${limit}`,
          type: "GET",
          dataType: "json",
          success: function(response) {
            if (response.success) {
              $("#doctorContainer").html(""); // Clear previous list

              response.doctors.forEach(doctor => {
                let doctorHTML = `
                <div class="col-lg-6">
                  <div class="doctor-list panel rel baa-d">
                    <figure class="round-tab">
                      <a><img src="./img/uploads/doctors/${doctor.image}" alt="No Image" class="img-fluid"></a>
                    </figure>
                    <div class="figcaption">
                      <h2 class="doctorname">DR. ${doctor.name}</h2>
                      <div class="row">
                        <div class="col-md-8">
                          <div class="details"><i class="icofont-double-right"></i> <label>Qualification:</label> ${doctor.qualifications}</div>
                          <div class="details"><i class="icofont-double-right"></i> <label>Speciality:</label> ${doctor.specialities}</div>
                          <div class="details"><i class="icofont-double-right"></i> <label>Experience:</label> ${doctor.experiences} Years</div>
                          <div class="details"><i class="icofont-double-right"></i> <label>Language:</label> ${doctor.languages}</div>
                        </div>
                        <div class="col-md-4 px-0 text-center">
                          <div class="drrightsec text-center">
                            <div class="mLeft20"><i class="fa fa-clock-o"></i>${doctor.available_days} <span class="text-info margin0 d-block">(${doctor.available_times})</span></div>
                          </div>
                          <button class="appontbtn" type="button" onclick="openAppointmentModal('${doctor.id}', '${doctor.name}')">Book Appointment</button>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>`;
                $("#doctorContainer").append(doctorHTML);
              });

              // Update pagination
              currentPage = response.current_page;
              totalPages = response.total_pages;

              $("#pageInfo").text(`Page ${currentPage} of ${totalPages}`);
              $("#prevPage").prop("disabled", currentPage === 1);
              $("#nextPage").prop("disabled", currentPage === totalPages);
            } else {
              $("#doctorContainer").html('<p class="text-center">No doctors found.</p>');
            }
          },
          error: function() {
            $("#doctorContainer").html('<p class="text-center text-danger">Failed to load doctors.</p>');
          }
        });
      }

      // Open appointment modal with selected doctor
      window.openAppointmentModal = function(doctorId, doctorName) {
        $("#doctorId").val(doctorId);
        $("#doctorName").val("Dr. " + doctorName);
        $("#appointmentModal").modal("show");
      };

      // Handle AJAX Form Submission
      $("#appointmentForm").submit(function(event) {
        event.preventDefault();
        let formData = new FormData(this);
        $.ajax({
          url: "./controller/appointments/appointment_create.php",
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
                $("#appointmentForm")[0].reset(); // ✅ Ensure form reset
                $("#appointmentModal").modal("hide"); // ✅ Ensure modal close
                $("body").removeClass("modal-open"); // ✅ Remove modal backdrop
                $(".modal-backdrop").remove(); // ✅ Remove remaining overlay
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
                $("#appointmentForm")[0].reset(); // ✅ Fix form reset issue
                $("#appointmentModal").modal("hide"); // ✅ Fix modal close issue
                $("body").removeClass("modal-open"); // ✅ Ensure no overlay remains
                $(".modal-backdrop").remove(); // ✅ Remove backdrop
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
                  value: true,
                  visible: true,
                  className: "btn btn-success",
                  closeModal: true,
                },
              },
            }).then(() => {
              $("#appointmentForm")[0].reset(); // ✅ Fix form reset issue
              $("#appointmentModal").modal("hide"); // ✅ Fix modal close issue
              $("body").removeClass("modal-open"); // ✅ Remove modal backdrop
              $(".modal-backdrop").remove(); // ✅ Ensure no overlay remains
            });
          }
        });
      });




      // Pagination controls
      $("#prevPage").click(() => fetchDoctors(currentPage - 1));
      $("#nextPage").click(() => fetchDoctors(currentPage + 1));

      // Load doctors on page load
      fetchDoctors();
    });
  </script>
</body>

</html>