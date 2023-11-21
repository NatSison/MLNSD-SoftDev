<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta
      name="viewport"
      content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0"
    />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css"
      integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3"
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="http://localhost/MLNSD-SoftDev/flickity.css"
      media="screen"
    />
    <link
      rel="stylesheet"
      href=" https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css"
    />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/flickity/1.0.0/flickity.css"
    />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
      crossorigin="anonymous"
    ></script>
    <title>Villamin Wood &amp; Iron Works</title>

    <script type="text/javascript" language="JavaScript">
      var element = document.querySelector("form");
      element.addEventListener("submit", function (event) {
        event.preventDefault();
        // actual logic, e.g. validate the form
        alert("Form submission cancelled.");
      });
    </script>
  </head>
  <body>
    <header class="container-fluid bg-warning p-3">
      <div class="row d-flex align-items-center mx-3">
        <div
          class="col-1 bg-gradient text-center"
          style="background-color: darkblue"
        >
          <p class="display-5 fw-bold text-warning">V</p>
        </div>
        <div class="col-5 text-white">
          <h5>Villamin Wood &amp; Iron Works</h5>
        </div>
        <div class="col-6 text-white text-end">
          <h5>Subok na matibay since 1983</h5>
        </div>
      </div>
    </header>

    <nav
      class="navbar navbar-expand-lg navbar-light mb-3"
      style="background-color: darkblue"
    >
      <div class="container-fluid">
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarSupportedContent"
          aria-controls="navbarSupportedContent"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse col-8" id="navbarSupportedContent">
          <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-2">
            <li class="nav-item px-4">
              <a
                class="nav-link text-white"
                href="http://localhost/MLNSD-SoftDev/admin/dashboard"
                >Dashboard</a
              >
            </li>
            <li class="nav-item px-4">
              <a
                class="nav-link text-white"
                href="http://localhost/MLNSD-SoftDev/admin/customers"
                >Customers</a
              >
            </li>
            <li class="nav-item px-4">
              <a
                class="nav-link text-white"
                href="http://localhost/MLNSD-SoftDev/admin/products"
                >Products</a
              >
            </li>
            <li class="nav-item px-4">
              <a
                class="nav-link text-white"
                href="http://localhost/MLNSD-SoftDev/admin/reports"
                >Reports</a
              >
            </li>
            <li class="nav-item px-4">
              <a
                class="nav-link text-white"
                href="http://localhost/MLNSD-SoftDev/admin/inquiries"
                >Inquiries</a
              >
            </li>
          </ul>
          <div class="d-flex justify-content-end">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ps-2">
              <li class="nav-item px-2">
                <a
                  class="nav-link text-white"
                  href="http://localhost/MLNSD-SoftDev/admin/profile"
                >
                  <i
                    class="fa fa-solid fa-user"
                    style="font-size: 24px; color: white"
                  >
                    admin
                  </i>
                </a>
              </li>
              <li class="nav-item px-4">
                <a
                  class="nav-link text-white"
                  href="http://localhost/MLNSD-SoftDev/admin/login/logout"
                  >Logout</a
                >
              </li>
            </ul>
          </div>
        </div>
      </div>
    </nav>
    <div class="container">
      <div class="container">
        <div class="card card-body mb-3">
          <h4 class="card-title">Customer Inquiries</h4>
          <hr>
          <table id="example" class="table table-bordered table-hover">
            <thead class="table-dark">
              <tr>
                <th scope="col" class="text-center"></th>
                <th scope="col" class="text-center">ID#</th>
                <!-- <th scope="col" class="text-center">Name</th> -->
                <th scope="col" class="text-center">Email</th>
                <th scope="col" class="text-center">Contact #</th>
                <th scope="col" class="text-center">
                  Date <br />
                  of Inquiry
                </th>
                <th scope="col" class="text-center">Inquiry</th>
                <!-- <th scope="col" class="text-center">Action:</th> -->
                <th scope="col" style="display: none;">Inquiry</th>
              </tr>
            </thead>
            <tbody class="text-center">
            <?php foreach($data["customerInquiry"] as $key => $details) : ?>  
                <tr>
                <td><i class="bi bi-circle-fill text-success" ></i></td>
                <td><?php $details->existingCustomerId?></td>
                <!-- <td>NAME</td> -->
                <td><a href="mailto:<?php $details->email;?>"><?php echo $details->email?></a></td>
                <td>09123456789</td>
                <td>11-19-2023</td>
                <td>
                  <textarea
                    class="form-control"
                    id="responsiveTextarea"
                    readonly
                    style="
                      background-color: white;
                      border-color: white;
                      width: 100%;
                      max-width: 100%;
                      overflow-y: hidden;
                      resize: none;
                    "
                  ><?php echo $details->inquiryStatement?></textarea
                  >
                </td>
                <!-- <td><button class="btn btn-primary"> Process </button></td> -->
                <td style="display: none;">0</td>
              </tr>
              <?php endforeach;?>
            </tbody>
          </table>
        </div>
      </div>

      <meta charset="UTF-8" />
      <meta name="viewport" content="width=device-width, initial-scale=1.0" />
      <link
        href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
        rel="stylesheet"
      />
      <title>Home Page</title>
      <link rel="stylesheet" href="footer.css" />
      <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css"
        rel="stylesheet"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous"
      />
      <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
      />

      <script>
        function adjustTextareaHeight() {
          const textarea = document.getElementById("responsiveTextarea");
          textarea.style.height = "auto";
          textarea.style.height = textarea.scrollHeight + "px";
        }
        // Adjust textarea height on page load and input change
        window.addEventListener("load", adjustTextareaHeight);
        document
          .getElementById("responsiveTextarea")
          .addEventListener("input", adjustTextareaHeight);
      </script>
      <!-- FOOTER -->
      <footer>
        <div
          class="section2 text-center text-white py-5"
          style="background-color: navy"
        >
          <div class="container section2-content">
            <div class="row">
              <div class="contact col-md-4">
                <h2 class="mb-4">Contact Us</h2>
                <div class="contact-info">
                  <a
                    type="button"
                    href="tel:09292799021"
                    target="_blank"
                    class="d-flex align-items-center text-white text-decoration-none"
                  >
                    <i class="bi bi-telephone me-2"></i>
                    <span>Phone: +63 929 279 9021</span>
                  </a>
                  <a
                    href="https://www.facebook.com/Villamin-Wood-Iron-Glass-Aluminum-Works-479583689050461"
                    alt="facebook"
                    class="d-flex align-items-center text-white text-decoration-none mt-2"
                  >
                    <i class="bi bi-facebook me-2"></i>
                    <span>Visit us on Facebook</span>
                  </a>
                  <a
                    type="button"
                    href="mailto:villaminwoodworks@gmail.com"
                    target="_blank"
                    class="d-flex align-items-center text-white text-decoration-none mt-2"
                  >
                    <i class="bi bi-envelope me-2"></i>
                    <span>Email: villaminwoodworks@gmail.com</span>
                  </a>
                </div>
              </div>
              <div class="opening-hours col-md-4">
                <div class="hours">
                  <h3>OPENING HOURS</h3>
                  <p>MONDAY - SATURDAY: 11:00 AM - 6:00 PM</p>
                  <p>SUNDAY: Closed</p>
                </div>
              </div>
              <div class="inquiries col-md-4">
                <a href="http://localhost/MLNSD-SoftDev/formInq">
                  <h3>For More Inquiries</h3>
                  <p>
                    Feel free to reach out to us for any further inquiries or
                    assistance.
                  </p>
                </a>
              </div>
            </div>
          </div>
        </div>
        <div
          class="copyright text-center py-3"
          style="font-size: 18px; background-color: black; color: white"
        >
          © 2023 Villamin Wood and Iron Works. All Rights Reserved.
        </div>
      </footer>

      <script src="homepage.js"></script>
      <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.min.js"
        integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9"
        crossorigin="anonymous"
      ></script>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"
        integrity="sha512-bPs7Ae6pVvhOSiIcyUClR7/q2OAsRiovw4vAkX+zJbw3ShAeeqezq50RIIcIURq7Oa20rW2n2q+fyXBNcU9lrw=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
      ></script>
      <script
        src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous"
        referrerpolicy="no-referrer"
      ></script>
      <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
      <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
      <script>
        $("#example").DataTable({
          responsive: true,
          order: [[8, "desc"],[5,"asc"]],
        });
      </script>
    </div>
  </body>
</html>
