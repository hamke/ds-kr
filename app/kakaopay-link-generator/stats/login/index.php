<?php
require_once('./config.php'); // For storing username and password.
session_start();
?>

<!-- HTML code for Bootstrap framework and form design -->

<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Desource</title>
    <link rel="shortcut icon" type="image/x-icon" href="./../assets-login/img/favicon.ico" />
    <link rel="stylesheet" type="text/css" href="./../assets-login/css/bootstrap/4.5.0/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="./../assets-login/css/signin.css">
  </head>
  <body class="text-center">
    <form action="" method="post" name="Login_Form" class="form-signin">
      <a href="./">
        <img class="mb-3" src="https://hellotblog.files.wordpress.com/2019/08/kaplan-logo-round-02-120x120.png" alt="" width="72" height="72">
      </a>

      <h1 class="h3 mb-3 font-weight-bold">Desource</h1>

      <label for="inputusername" class="sr-only">username</label>
      <input name="username" type="username" id="inputusername" class="form-control" placeholder="username" required autofocus>

      <label for="inputpassword" class="sr-only">password</label>
      <input name="password" type="password" id="inputpassword" class="form-control" placeholder="password" required>

      <input name="human-check" type="text" id="human-check" class="form-control">

      <div class="checkbox mb-2 float-left">
        <label>
          <input type="checkbox" value="remember-me"> Remember me
        </label>
      </div>

      <button name="Submit" value="Login" class="btn btn-lg btn-danger btn-block" type="submit">Sign in</button>

      <?php

      /* Check if login form has been submitted */
      if( isset($_POST['Submit']) && empty($_POST['human-check']) ){

        // Rudimentary hash check
        $result = password_verify($_POST['password'], $password);

        /* Check if form's username and password matches */
        if( ($_POST['username'] == $username) && ($result === true) ) {

          /* Success: Set session variables and redirect to protected page */
          $_SESSION['username'] = $username;

          $_SESSION['logged_in'] = true;
          header("location:./../");
          exit;

        } else {
          ?>
          <!-- Show an error alert -->
          &nbsp;
          <div class="alert alert-danger alert-dismissible" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              <strong>Warning!</strong> Incorrect information.
          </div>
          <?php
        }
      }
      ?>

      <p class="mt-4 mb-3 text-muted">&copy; Desource</p>

    </form>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="./../assets-login/js/jquery/3.5.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="./../assets-login/js/bootstrap/4.5.0/bootstrap.min.js"></script>

  </body>
</html>
