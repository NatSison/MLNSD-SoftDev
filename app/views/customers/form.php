<?php

?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Regristaion Page</title>
    <link rel="stylesheet" href="/MLNSD-SoftDev/public/register.css" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="..."
      crossorigin="anonymous"
    />
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css"
    />
  </head>

  <body>
    <div class="login-container">
      <div class="logo">
        <img src="Logo.png" alt="" class="logo-image">
        <h2>Registration</h2>
      </div>
      <form action="<?php echo URLROOT .'/customers/signup'; ?>" method="post">
        <div class="input-field">
       
          <label for="username"></label>
          <input type="text" id="username" placeholder="Username" name="username" required>
          <i class="bi bi-person"></i>
        </div>
        
        <div class="input-field">
            <label for="fname"></label>
            <input type="text" id="fname" placeholder="First Name" name="fname" required>
            <i class="bi bi-person-lines-fill"></i>
          </div>
          <div class="input-field">
            <label for="lname"></label>
            <input type="text" id="lname" placeholder="Last Name" name="lname" required>
            <i class="bi bi-person-lines-fill"></i>
          </div>
          <div class="input-field">
            <label for="dateOfBirth"></label>
            <input type="date" id="dateOfBirth" placeholder="Date of Birth" name="dateOfBirth" required>
            <i class="bi bi-calendar"></i>
          </div>
          <div class="input-field">
            <label for="contactNumber"></label>
            <input type="number" id="contactNumber" placeholder="Contact Number" name="contactNumber" required>
            <i class="bi bi-telephone"></i>
          </div>
          <div class="input-field">
            <label for="streetAddress"></label>
            <input type="text" id="streetAddress" placeholder="Street Address" name="streetAddress" required>
            <i class="bi bi-geo-alt"></i>
          </div>
          <div class="input-field">
            <label for="city"></label>
            <input type="text" id="city" placeholder="City" name="city" required>
            <i class="bi bi-geo-alt"></i>
          </div>
          <div class="input-field">
            <label for="province"></label>
            <input type="text" id="province" placeholder="Province" name="province" required>
            <i class="bi bi-geo-alt"></i>
          </div>
          <div class="input-field">
            <label for="postalCode"></label>
            <input type="text" id="postalCode" placeholder="Postal Code" name="postalCode" required>
            <i class="bi bi-mailbox"></i>
          </div>
          <div class="input-field">
            <label for="email"></label>
            <input type="email" id="email"  placeholder="Email" name="email" required>
            <i class="bi bi-envelope"></i>
          </div>
        <div class="input-field">
          <label for="password"></label>
          <input type="password" id="password"  placeholder="Password" name="password" required>
          <i class="bi bi-key"></i>
        </div>
        <div class="input-field">
            <label for="confirm_password"></label>
            <input type="password" id="confirm_password" placeholder=" Confirm Password" name="confirm_password" required>
            <i class="bi bi-key"></i>
          </div>
        <input class="button" type="submit" value="Signup">
        <div class="signup" style="font-size: 12px; margin-top: 10px;">
            <span class="text">
            Already have an account?
              <a href="#" class="btn-toggle" onclick="toggleForm('login')">Login here</a>
            </span>
          </div>
      </form>
    </div>
  
    <script src="/MLNSD-SoftDev/public/login.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"
      integrity="..."
      crossorigin="anonymous"
    ></script>
  </body>
</html>
