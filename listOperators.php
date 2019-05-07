<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Listar operadores</title>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
	<link rel="stylesheet" href="https://code.getmdl.io/1.3.0/material.teal-lime.min.css" />
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="style.css">
	<script src="https://code.getmdl.io/1.3.0/material.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="Url.js"></script>
	<script src="scripts/tokenValidation.js" ></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">Listar operadores</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
					<a id="delete-button" class="mdl-navigation__link" style="display: none;"><i class="material-icons">delete</i></a>
					<a id="restore-button" class="mdl-navigation__link" style="display: none;"><i class="material-icons">settings_backup_restore</i></a>
					<!-- <a href="#" class="mdl-navigation__link">Link 2</a>
					<a href="#" class="mdl-navigation__link">Link 3</a> -->
				</nav>
			</div>
		</header>
		<?php include "drawer_menu.php"; ?>

		<dialog id="filter-dialog" class="mdl-dialog">
			<h4 class="mdl-dialog__title">Filtrar objetos por</h4>
			<div class="mdl-dialog__content">
				<form name="form-filter" id="form-filter">
					<div class="filter-checkbox">
						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="name-checkbox">
							<input type="checkbox" id="name-checkbox" class="mdl-checkbox__input"/>
							<label for="name-checkbox">Nome</label>
						</label>
					</div>
					<div id="filter-name-fields">
						<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" id="name-input" name="name" />
							<label class="mdl-textfield__label" for="name-input"></label>
						</div>
					</div>
					<div class="filter-checkbox">
						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="date-checkbox">
							<input type="checkbox" id="date-checkbox" class="mdl-checkbox__input"/>
							<label for="date-checkbox">Data de nascimento</label>
						</label>
					</div>
					<div id="filter-date-fields">
						<div class="filter-row">
							<div class="filter-label">
								<h6>De</h6>
							</div>
							<div class="mdl-textfield mdl-js-textfield filter-field">
								<input class="mdl-textfield__input" type="date" name="start_date">
							</div>
						</div>
						<div class="filter-row">
							<div class="filter-label">
								<h6>Até</h6>
							</div>
							<div class="mdl-textfield mdl-js-textfield filter-field">
								<input class="mdl-textfield__input" type="date" name="end_date">
							</div>
						</div>
					</div>
					<div class="filter-checkbox">
						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="depto-checkbox">
							<input type="checkbox" id="depto-checkbox" class="mdl-checkbox__input"/>
							<label for="depto-checkbox">Departamento</label>
						</label>
					</div>
					<div id="filter-depto-fields">
						<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" id="depto-input" name="depto" />
							<label class="mdl-textfield__label" for="depto-input"></label>
						</div>
					</div>
				</form>
			</div>
			<div class="mdl-dialog__actions">
				<button id="filter-ok-button" type="button" class="mdl-button">OK</button>
				<button type="button" class="mdl-button close">Cancelar</button>
			</div>
		</dialog>

		<dialog id="obj-not-found-dialog" class="mdl-dialog">
			<h4 class="mdl-dialog__title">Erro</h4>
			<div class="mdl-dialog__content">
				<p>
					O operador com o email especificado não existe no sistema
				</p>
			</div>
			<div class="mdl-dialog__actions">
				<button type="button" class="mdl-button close">OK</button>
			</div>
		</dialog>

		<div id="snackbar" class="mdl-js-snackbar mdl-snackbar">
			<div class="mdl-snackbar__text"></div>
			<button class="mdl-snackbar__action" type="button"></button>
		</div>

		<main class="mdl-layout__content mdl-color--grey-100" id="listar">	
			<ul id="obj-list" class="demo-list-two mdl-list"></ul>
			<button id="filter-button" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
  				<i class="material-icons">filter_list</i>
			</button>
			<!-- <div id="div-load-more-button">
				<button id="load-more-button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect">Carregar mais itens</button>
			</div> -->
		</main>
	</div>

	<script src="scripts/filterScriptOperators.js"></script>
	<script src="scripts/createOperatorsList.js" ></script>
	<script src="scripts/deleteSelectedOperators.js"></script>
	<script>
		$( document ).ready(function() {
			$(':checkbox').prop('checked',false); //This would clear all inputs.
		});
	</script>

</body>

</html>
