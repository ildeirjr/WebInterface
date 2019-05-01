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
	<script src="Url.js"></script>
	<script src="scripts/tokenValidation.js" ></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">Ubspaces</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
				</nav>
			</div>
		</header>
		<?php include "drawer_menu.php"; ?>
		<main class="mdl-layout__content mdl-color--grey-100">
			<div id="card-container">
				<div id="card-1" class="demo-card-square mdl-card mdl-shadow--2dp">
					<div class="mdl-card__title mdl-card--expand">
						<h2 class="mdl-card__title-text">Objetos cadastrados por você</h2>
					</div>
					<div id="text-card-1" class="mdl-card__supporting-text">
					</div>
				</div>
				<div id="card-2" class="demo-card-square mdl-card mdl-shadow--2dp">
					<div class="mdl-card__title mdl-card--expand">
						<h2 class="mdl-card__title-text">Objetos cadastrados no sistema</h2>
					</div>
					<div id="text-card-2" class="mdl-card__supporting-text">
					</div>
				</div>
				<div id="card-3" class="demo-card-square mdl-card mdl-shadow--2dp">
					<div class="mdl-card__title mdl-card--expand">
						<h2 class="mdl-card__title-text">Objetos cadastrados neste mês</h2>
					</div>
					<div id="text-card-3" class="mdl-card__supporting-text">
					</div>
				</div>
			</div>
		</main>
	</div>
	<script type="text/javascript">
		$.ajax({
			url: "http://"+Url.url+"getMetadata/?user_id=" + localStorage.getItem("idUser"),
			type: 'get',
			headers: {"Authorization": localStorage.getItem("token")},
			cache: false
		}).done(function(response){
			let data = JSON.parse(response);
			document.querySelector("#text-card-1").innerHTML = "Total: " + data.num_obj_user;
			document.querySelector("#text-card-2").innerHTML = "Total: " + data.num_obj;
			document.querySelector("#text-card-3").innerHTML = "Total: " + data.num_obj_month;
		});
	</script>
</body>
</html>
