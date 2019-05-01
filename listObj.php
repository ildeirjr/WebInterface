<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Ubspaces</title>
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
				<span class="mdl-layout-title">Ubspaces</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
					<a id="delete-button" class="mdl-navigation__link" style="display: none;"><i class="material-icons">delete</i></a>
					<a id="restore-button" class="mdl-navigation__link" style="display: none;"><i class="material-icons">settings_backup_restore</i></a>
					<!-- <a href="#" class="mdl-navigation__link">Link 2</a>
					<a href="#" class="mdl-navigation__link">Link 3</a> -->
					<form id="search-form" name="search-form">
						<div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable">
							<label class="mdl-button mdl-js-button mdl-button--icon" for="id-search-input">
								<i class="material-icons">search</i>
							</label>
							<div class="mdl-textfield__expandable-holder">
								<input class="mdl-textfield__input" type="number" name="id-search-input" id="id-search-input" placeholder="Pesquisar por código">
								<label class="mdl-textfield__label" for="sample-expandable">Expandable Input</label>
							</div>
						</div>
					</form>
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
							<input class="mdl-textfield__input" type="text" id="sample1" name="name" />
							<label class="mdl-textfield__label" for="sample1"></label>
						</div>
					</div>
					<div class="filter-checkbox">
						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="local-checkbox">
							<input type="checkbox" id="local-checkbox" class="mdl-checkbox__input"/>
							<label for="local-checkbox">Localização</label>
						</label>
					</div>
					<div id="filter-local-fields">
						<div class="filter-row">
							<div class="filter-label">
								<h6>Unidade acadêmica:</h6>
							</div>
							<div class="mdl-textfield mdl-js-textfield filter-field">
								<select class="mdl-textfield__input" id="unity" name="unity">
									<option value="Centro de Educação Aberta e a Distância (CEAD)">Centro de Educação Aberta e a Distância (CEAD)</option>
									<option value="87">Centro Desportivo da UFOP (CEDUFOP)</option>
									<option value="Escola de Direito, Turismo e Museologia (EDTM)">Escola de Direito, Turismo e Museologia (EDTM)</option>
									<option value="Escola de Farmácia">Escola de Farmácia</option>
									<option value="Escola de Minas">Escola de Minas</option>
									<option value="Escola de Medicina">Escola de Medicina</option>
									<option value="Escola de Nutrição">Escola de Nutrição</option>
									<option value="Instituto de Ciências Exatas e Aplicadas (ICEA)">Instituto de Ciências Exatas e Aplicadas (ICEA)</option>
									<option value="Instituto de Ciências Exatas e Biológicas">Instituto de Ciências Exatas e Biológicas</option>
									<option value="Instituto de Ciências Humanas e Sociais (ICHS)">Instituto de Ciências Humanas e Sociais (ICHS)</option>
									<option value="Instituto de Ciências Sociais Aplicadas (ICSA)">Instituto de Ciências Sociais Aplicadas (ICSA)</option>
									<option value="Instituto de Filosofia, Arte e Cultura (IFAC)">Instituto de Filosofia, Arte e Cultura (IFAC)</option>
								</select>
							</div>
						</div>
						<div class="filter-row">
							<div class="filter-label">
								<h6>Bloco:</h6>
							</div>
							<div class="mdl-textfield mdl-js-textfield filter-field">
								<input class="mdl-textfield__input" type="text" id="sample1" name="bloco" >
								<label class="mdl-textfield__label" for="sample1"></label>	
							</div>
						</div>
						<div class="filter-row">
							<div class="filter-label">
								<h6>Sala:</h6>
							</div>
							<div class="mdl-textfield mdl-js-textfield filter-field">
								<input class="mdl-textfield__input" type="text" id="sample1" name="sala" >
								<label class="mdl-textfield__label" for="sample1"></label>	
							</div>
						</div>
					</div>
					<div class="filter-checkbox">
						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="date-checkbox">
							<input type="checkbox" id="date-checkbox" class="mdl-checkbox__input"/>
							<label for="date-checkbox">Data de entrada</label>
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
						<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="state-checkbox">
							<input type="checkbox" id="state-checkbox" class="mdl-checkbox__input"/>
							<label for="state-checkbox">Estado</label>
						</label>
					</div>
					<div id="filter-state-fields">
						<div class="mdl-textfield mdl-js-textfield mdl-cell mdl-cell--12-col">
							<select class="mdl-textfield__input" id="state" name="state">
								<option value="Normal">Normal</option>
								<option value="Quebrado">Quebrado</option>
								<option value="Consertado">Consertado</option>
							</select>
							<label class="mdl-textfield__label" for="state">Estado</label>
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
					O item com o código especificado não existe no sistema
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

	<script src="scripts/filterScript.js"></script>
	<script src="scripts/createObjList.js" ></script>
	<script src="scripts/deleteSelectedItems.js"></script>
	<script>
		if(sessionStorage.getItem("mode") == "deleted"){
			document.querySelector(".mdl-layout-title").innerHTML = "Objetos excluídos";
		} else if(sessionStorage.getItem("mode") == "non_deleted"){
			document.querySelector(".mdl-layout-title").innerHTML = "Listar objetos";
		}

		$( document ).ready(function() {
			$(':checkbox').prop('checked',false); //This would clear all inputs.
		});

		$("#search-form").submit(function(e){
			e.preventDefault();
			let searchQuery = document.forms["search-form"]["id-search-input"].value;
			$.ajax({
				url: "http://"+Url.url+"getObject/?id="+searchQuery,
				type: 'get',
				headers: {"Authorization": localStorage.getItem("token")},
				cache: false
			}).done(function(response){
				let item = JSON.parse(response);
				if(item){
					window.location.href = "showObject.php?id=" + searchQuery;
				} else {
					let dialog = document.querySelector('#obj-not-found-dialog');
					if (! dialog.showModal) {
						dialogPolyfill.registerDialog(dialog);
					}
					dialog.querySelector('.close').addEventListener('click', function() {
						dialog.close();
					});
					dialog.showModal();
				}
				
			});
		});
	</script>

</body>

</html>
