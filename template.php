<?php
include "requests/token_validation.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Cadastrar objeto</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-lime.min.css" />
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="style.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">Cadastrar objeto</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
					<a href="#" class="mdl-navigation__link" id="submit-button">Confirmar</a>
					<script type="text/javascript">
						document.getElementById("submit-button").onclick = function() {
							document.getElementById("form_cadastro").submit();
						}
					</script>
				</nav>
			</div>
		</header>
		<div class="mdl-layout__drawer">
			<header class="demo-drawer-header">
	          <img src="images/user.jpg" class="demo-avatar">
	          <div class="demo-avatar-dropdown">
	            <span><?=$_SESSION['nome']?></span>
	            <div class="mdl-layout-spacer"></div>
	            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
	              <i class="material-icons" role="presentation">arrow_drop_down</i>
	              <span class="visuallyhidden">Accounts</span>
	            </button>
	            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
								<a href="requests/logout.php"><li class="mdl-menu__item">Sair</li></a>
	            </ul>
	          </div>
        	</header>
			<nav class="mdl-navigation">
					<a href="#cadastrar" class="mdl-navigation__link">Cadastrar objetos</a>
					<a href="#listar" class="mdl-navigation__link">Listar objetos</a>
					<a href="#" class="mdl-navigation__link">Objetos excluídos</a>
			</nav>
		</div>
		<main class="mdl-layout__content mdl-color--grey-100">
			
		</main>
	</div>
</body>
</html>
