<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style.css" />
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
  </head>
  <body>
    <nav class="sidebar">
      <p>IAMS</p>
      <div class="logo">
        <ul class="main">
          <li class="active">
            <a href="#">
              <i class="bi bi-grid"></i>
              <span>Dashboard</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-people"></i>
              <span>Applicants</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-archive"></i>
              <span>Archive</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-bookmark"></i>
              <span>About Us</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-person-lines-fill"></i>
              <span>Contact Us</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="bi bi-box-arrow-right"></i>
              <span>Logout</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
    <div class="main-content">
      <div class="header--wrapper">
        <div class="header--title">
         
        </div>
        <div class="user--info"></div>
      </div>
      <div class="container-fluid px-4">
        <div class="row g-3 my-2">
          <div class="col-md-3">
            <div class="card1">
              <div>
                <p class="fs-5">New Applicants</p>
                <h3 class="fs-5">253</h3>
              </div>
              <i class="bi bi-people-fill"></i>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card1">
              <div>
                <p class="fs-5">Accepted Applicants</p>
                <h3 class="fs-5">73</h3>
              </div>
              <i class="bi bi-bag-check-fill"></i>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card1">
              <div>
                <p class="fs-5">Declined Applicants</p>
                <h3 class="fs-5">134</h3>
              </div>
              <i class="bi bi-bag-x-fill"></i>
            </div>
          </div>
          <div class="col-md-3">
            <div class="card1">
              <div>
                <p class="fs-5">Pending Applicants</p>
                <h3 class="fs-5">521</h3>
              </div>
              <i class="bi bi-arrow-clockwise"></i>
            </div>
          </div>
        </div>
      </div>

      <div class="container-fluid px-4">
        <div class="row">
          <div class="col">
            <div class="activities">
              <p class="fs-5">Activities</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <script>
      src =
        "https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js";
      integrity =
        "sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4";
      crossorigin = "anonymous";
    </script>
  </body>
</html>
