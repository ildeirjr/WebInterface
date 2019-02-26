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
		<div class="mdl-layout__drawer">
			<header class="demo-drawer-header">
	          <img src="images/user.jpg" class="demo-avatar">
	          <div class="demo-avatar-dropdown">
	            <span>hello@example.com</span>
	            <div class="mdl-layout-spacer"></div>
	            <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
	              <i class="material-icons" role="presentation">arrow_drop_down</i>
	              <span class="visuallyhidden">Accounts</span>
	            </button>
	            <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
	              <li class="mdl-menu__item">hello@example.com</li>
	              <li class="mdl-menu__item">info@example.com</li>
	              <li class="mdl-menu__item"><i class="material-icons">add</i>Add another account...</li>
	            </ul>
	          </div>
        	</header>
			<nav class="mdl-navigation">
					<a href="cadastrar.php" class="mdl-navigation__link">Cadastrar objetos</a>
					<a href="#listar" class="mdl-navigation__link">Listar objetos</a>
					<a href="#" class="mdl-navigation__link">Objetos excluídos</a>
			</nav>
		</div>
		<main class="mdl-layout__content mdl-color--grey-100" id="listar">
			<?php

				$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, 'localhost:8080/WebUbspaces/listall/?mode=non_deleted&num_page=0&window_size=10');
				$header = array(
    					'Authorization: 1gdh87efuhwi'
							);
				curl_setopt($curl, CURLOPT_HTTPHEADER, $header);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
				$result = curl_exec($curl);
				curl_close($curl);

				$jsonObject = json_decode($result, true);

				foreach ($jsonObject as $item => $value) {

					$date = date_create($value['data_entrada']);

					$image_url = "localhost:8080/WebUbspaces/photos/thumbs/".$value['foto'];
					$ch = curl_init();
					$timeout = 0;
					curl_setopt ($ch, CURLOPT_URL, $image_url);
					curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);

					// Getting binary data
					curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
					curl_setopt($ch, CURLOPT_BINARYTRANSFER, 1);

					$image = curl_exec($ch);
					curl_close($ch);

					// output to browser
					//header("Content-type: image/jpeg");
					//print $image;

					?>

					<ul class="demo-list-two mdl-list">
						  <li class="mdl-list__item mdl-list__item--two-line">
							<img src="http://localhost:8080/WebUbspaces/photos/thumbs/<?=$value['foto']?>" class="thumb" width="50" height="50">
						    <span class="mdl-list__item-primary-content">
						      <!-- <i class="material-icons mdl-list__item-avatar">person</i> -->
						      <span><?=$value['nome']?></span>
						      <span class="mdl-list__item-sub-title">Código: <?=$value['codigo']?></span>
						    </span>
						    <span class="mdl-list__item-secondary-content">
						      <span class="mdl-list__item-secondary-info"><?=date_format($date, 'd/m/Y')?></span>
						    </span>
						  </li>
					</ul>

				<?php
			}

			?>



		</main>
	</div>
</body>

<script src="scripts/imgThumb.js"></script>

</html>
