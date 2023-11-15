<?php
  //require APPROOT . '/views/templates/header.php';
?>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title></title>
    <link rel="stylesheet" href="<?php echo URLROOT . '/login.css' ?>" />
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
        <a href="<?php echo URLROOT?>">
          <img src="<?php echo URLROOT . '/img/Logo.png'?>" alt="" class="logo-image">
        </a>
        <h2>Login</h2>
      </div>
      <form method="post" action="#">
        <div class="input-field">
          <label for="username">User Name: <sup>*</sup></label>
          <input type="text" name="username" class="form-control form-control-lg" value="" required>
          <span class="invalid-feedback"><?php echo (isset($data["error"]["username_err"]) ? $data["error"]["username_err"] : "") ?></span>
        </div>
        <div class="input-field">
          <label for="password">Password: <sup>*</sup></label>
          <input type="password" name="password" class="form-control form-control-lg" value="" required>
          <span class="invalid-feedback"><?php echo (isset($data["error"]["password"]) ? $data["error"]["password_err"] : "") ?></span>
        </div>
        <input class="btn btn-primary px-5" name="submit" type="submit" id="submit" value="Login">
      </form>
    </div>

  
    <script src="login.js"></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.0/dist/js/bootstrap.bundle.min.js"
      integrity="..."
      crossorigin="anonymous"
    ></script>
  </body>
</html>
