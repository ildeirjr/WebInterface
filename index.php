<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Ubspaces - Página inicial</title>

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

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
      <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="#page-top">Ubspaces</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
          <ul class="navbar-nav ml-auto">
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#portfolio">Pesquisar</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="#about">Sobre</a>
            </li>
            <li class="nav-item mx-0 mx-lg-1">
              <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="login.php">Login</a>
            </li>
          </ul>
        </div>
      </div>
    </nav>

    <!-- Header -->
    <header class="masthead bg-primary text-white text-center">
      <div class="container">
        <img class="img-fluid mb-5 d-block mx-auto" src="img/icone_ubspaces_v3.png" alt="" height="400px" width="400px">
        <h1 class="text-uppercase mb-0">Ubspaces</h1>
        <h2 class="font-weight-light mb-0" style="margin: 40px">Bem-vindo à página inicial!</h2>
      </div>
    </header>

    <!-- Portfolio Grid Section -->
    <section class="portfolio" id="portfolio">
      <div class="container">
        <h2 class="text-center text-uppercase text-secondary mb-0">Pesquisar</h2>
        <h3 class="text-center font-weight-light mb-0" style="margin: 40px">Comece a sua busca por objetos informando os dados abaixo.</h3>
        <div class="row" style="margin-top: 40px">
	        <div class="col-lg-8 mx-auto">
	          <form name="search-object" id="search-object">
	              <div class="control-group">
	                <div class="form-group controls mb-0 pb-2">
	                  <label>Descrição do bem</label>
	                  <input class="form-control" name="name" id="name" type="text" data-validation-required-message="Please enter your email address.">
	                  <p class="help-block text-danger"></p>
	                </div>
	              </div>
	              <div class="row">
	              	<div class="col-lg-6">
	              		<div class="control-group">
	                		<div class="form-group controls mb-0 pb-2">
	                  			<label>Data inicial</label>
	                  			<input class="form-control" name="start_date" id="start_date" type="date" placeholder="Data inicial" data-validation-required-message="Please enter your phone number.">
	                  			<p class="help-block text-danger"></p>
	                		</div>
	              		</div>
	              	</div>
	              	<div class="col-lg-6">
	              		<div class="control-group">
	                		<div class="form-group controls mb-0 pb-2">
	                  			<label>Data final</label>
	                  			<input class="form-control" name="final_date" id="final_date" type="date" placeholder="Data final" data-validation-required-message="Please enter your phone number.">
	                  			<p class="help-block text-danger"></p>
	                		</div>
	              		</div>
	              	</div>
	              </div>
	              
	              <br>
	              <div id="success"></div>
	              <div class="form-group">
	                <button type="submit" class="btn btn-primary btn-xl" id="sendMessageButton">Pesquisar</button>
	              </div>
	            </form>
	        </div>
    	</div>
      </div>
    </section>

    <!-- About Section -->
    <section class="bg-primary text-white mb-0" id="about">
      <div class="container">
        <h2 class="text-center text-uppercase text-white">Sobre</h2>
        <div class="row" style="margin-top: 40px">
          <div class="col-lg-4 ml-auto">
            <p class="lead">Ubspaces é um sistema de gerenciamento de informações de objetos presentes no espaço físico. Com ele, é possível obter informações sobre um objeto diretamente em um aplicativo móvel, bem como editá-las conforme for necessário.</p>
          </div>
          <div class="col-lg-4 mr-auto">
            <p class="lead">Este sistema foi feito tomando como base os objetos de patrimônio do Instituto de Ciências Exatas e Aplicadas (ICEA) da Universidade Federal de Ouro Preto (UFOP).</p>
          </div>
        </div>
        <div class="text-center mt-4">
          <a class="btn btn-xl btn-outline-light" href="#">
            <i class="fa fa-download mr-2"></i>
            Baixe o app!
          </a>
        </div>
      </div>
    </section>

    <div class="copyright py-4 text-center text-white">
      <div class="container">
        <small>Universidade Federal de Ouro Preto | Laboratório iMobilis</small>
      </div>
    </div>

    <!-- Scroll to Top Button (Only visible on small and extra-small screen sizes) -->
    <div class="scroll-to-top d-lg-none position-fixed ">
      <a class="js-scroll-trigger d-block text-center text-white rounded" href="#page-top">
        <i class="fa fa-chevron-up"></i>
      </a>
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

    <script type="text/javascript">
      $("#search-object").submit(function(e){
        e.preventDefault();

        data = {};

        data['name'] = document.forms["search-object"]["name"].value;
        data['start_date'] = document.forms["search-object"]["start_date"].value;
        data['end_date'] = document.forms["search-object"]["final_date"].value;

        data['unity'] = "";
        data['bloco'] = "";
        data['sala'] = "";
        data['state'] = "";

        localStorage.setItem("comumUserFilteredData", JSON.stringify(data));

        window.location.href = "listObjComumUser.html";

      });
    </script>

  </body>

</html>
