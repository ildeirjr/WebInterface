<?php

// session_start();
// if(isset($_SESSION['token'])){
//   header("Location:home.php");
// }

?>

<!DOCTYPE html>
<html lang="en">

	<head>

	    <meta charset="utf-8">
	    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	    <meta name="description" content="">
	    <meta name="author" content="">

	    <title>Ubspaces - Login</title>

	    <!-- Bootstrap core CSS -->
	    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

	    <!-- Custom fonts for this template -->
	    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

	    <!-- Plugin CSS -->
	    <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet" type="text/css">

	    <!-- Custom styles for this template -->
	    <link href="css/freelancer.min.css" rel="stylesheet">

  	</head>

  	<body id="page-top">

    <script>
      if(localStorage.getItem("token") != null){
        window.location.replace("home.php?mode=non_deleted");
      }
    </script>


  		<div class="bg-secondary text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="index.html">Ubspaces</a>
      </div>
    </div>

    <!-- Contact Section -->
    <section id="contact">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Login</h2>
        <h3 class="text-center font-weight-light mb-0" style="margin: 40px">Se você é um administrador ou um operador, entre com seus dados.</h3>

        <h3 id="error-msg" class="text-center font-weight-light mb-0" style="margin: 40px; color: red" hidden>Dados incorretos. Tente novamente</h3>

        <div class="row" style="margin-top: 40px">
          <div class="col-lg-8 mx-auto">
            <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
            <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
            <form name="login" id="loginForm" novalidate="novalidate">
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Email</label>
                  <input class="form-control" name="email" id="email" type="email" placeholder="Email" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="control-group">
                <div class="form-group floating-label-form-group controls mb-0 pb-2">
                  <label>Senha</label>
                  <input class="form-control" name="senha" id="password" type="password" placeholder="Senha" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <br>
              <div id="success"></div>
              <div class="form-group">
                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Entrar</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Universidade Federal de Ouro Preto | Laboratório iMobilis</small>
      </div>
    </div>

    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>

    <!-- Contact Form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/freelancer.min.js"></script>

    <script src="Url.js"></script>
    <script src="scripts/loginValidation.js" ></script>

  	</body>

</html>