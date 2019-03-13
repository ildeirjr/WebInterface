<?php
//include "requests/token_validation.php";
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ubspaces</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-lime.min.css" />
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="style.css">
	<script defer src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">Ubspaces</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
					<a href="#" class="mdl-navigation__link">Link 1</a>
					<a href="#" class="mdl-navigation__link">Link 2</a>
					<a href="#" class="mdl-navigation__link">Link 3</a>
				</nav>
			</div>
		</header>
		<?php include "drawer_menu.php"; ?>
		<main class="mdl-layout__content mdl-color--grey-100" id="listar">	
			<ul id="obj-list" class="demo-list-two mdl-list"></ul>
		</main>
	</div>
</body>

<script src="Url.js"></script>
<script src="scripts/tokenValidation.js" ></script>
<script src="scripts/createObjList.js" ></script>
<!-- <script src="scripts/imgThumb.js"></script> -->

</html>
