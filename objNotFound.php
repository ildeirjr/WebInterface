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
	<script src="scripts/tokenValidation.js" ></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">Erro</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
				</nav>
			</div>
		</header>
		<?php include "drawer_menu.php"; ?>
		<main class="mdl-layout__content mdl-color--grey-100">
			<h5 style="
                text-align: -webkit-center;
                position: relative;
                top: 50%;
                transform: translateY(-50%);
            ">O item com o código especificado não existe no sistema</h5>
		</main>
	</div>
</body>
</html>
