<?php
// include "requests/token_validation.php";
// if(isset($_POST['json_str'])){
//     $jsonObj = json_decode($_POST['json_str']);
// }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Editar operador</title>
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
				<span class="mdl-layout-title">Editar operador</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
					<a class="mdl-navigation__link" id="submit-button">Confirmar</a>
					<script type="text/javascript">
						document.getElementById("submit-button").onclick = function() {
							dataValidation();
						}
					</script>
				</nav>
			</div>
		</header>
		<?php include "drawer_menu.php" ?>

		<dialog class="mdl-dialog">
			<h4 class="mdl-dialog__title">Allow data collection?</h4>
			<div class="mdl-dialog__content">
				<p id="dialog-msg">
					Allowing us to collect data will let us get you the information you want faster.
				</p>
			</div>
			<div class="mdl-dialog__actions">
				<button type="button" class="mdl-button close">OK</button>
			</div>
		  </dialog>
		  
		  <dialog id="loading-dialog" class="mdl-dialog">
			<div class="mdl-dialog__content">
                <div id="div-spinner" class="container">
                    <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active center"></div>
                </div>
			</div>
  		</dialog>

		<main class="mdl-layout__content mdl-color--grey-100">
			<div class="cadastro">
				<form id="form-cadastro" name="form-cadastro">
                    <div id="name-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="text" id="nome" name="nome">
                        <label class="mdl-textfield__label" for="nome">Nome</label>
                        <span class="mdl-textfield__error">Este campo não pode ser vazio</span>
                    </div>

                    <div id="email-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="email" name="email">
                        <label class="mdl-textfield__label" for="email">E-mail</label>
                        <span id="email-error-msg" class="mdl-textfield__error">Endereço de e-mail inválido</span>
                    </div>

                    <div id="date-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="date" name="data_nasc" id="date">
                        <label class="mdl-textfield__label" for="data_nasc">Data de nascimento</label>
                        <span id="date-error-msg" class="mdl-textfield__error">Data inválida</span>
                    </div>

                    <div id="depto-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
                        <input class="mdl-textfield__input" type="text" name="depto">
                        <label class="mdl-textfield__label" for="depto">Departamento</label>
                        <span class="mdl-textfield__error">Este campo não pode ser vazio</span>
                    </div>

					<div class="mdl-grid">
						<div class="mdl-cell mdl-cell--4-col">
							<label class="mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect" for="password-checkbox">
								<input type="checkbox" id="password-checkbox" class="mdl-checkbox__input"/>
								<label for="password-checkbox">Redefinir senha</label>
							</label>
						</div>
						<div id="password-field" class="mdl-cell mdl-cell--8-col mdl-textfield mdl-js-textfield mdl-textfield--floating-label is-disabled">
							<input class="mdl-textfield__input" id="password-input" type="password" name="senha" disabled="true">
							<label class="mdl-textfield__label" for="senha">Senha</label>
							<span class="mdl-textfield__error">Este campo não pode ser vazio</span>
						</div>
					</div>
                    <input type="text" name="emailAntigo" value="" hidden>
					<input type="text" name="alterarSenha" value="false" hidden>
                </form>
			</div>
		</main>
	</div>
</body>

<script>

	var item = JSON.parse(sessionStorage.getItem("userData"));
	document.forms["form-cadastro"]["nome"].value = item.nome;
	document.forms["form-cadastro"]["email"].value = item.email;
	document.forms["form-cadastro"]["data_nasc"].value = item.data_nasc;
    document.forms["form-cadastro"]["depto"].value = item.depto;
	document.forms["form-cadastro"]["emailAntigo"].value = item.email;

	var passCheckbox = document.querySelector("#password-checkbox");
	var passField = document.querySelector("#password-field");
	var passInput = document.querySelector("#password-input");
	passCheckbox.onclick = function() {
		if(passCheckbox.checked){
			passField.classList.remove("is-disabled");
			passInput.disabled = false;
			document.forms["form-cadastro"]["alterarSenha"].value = "true";
		} else {
			passField.classList.add("is-disabled");
			passInput.disabled = true;
			document.forms["form-cadastro"]["alterarSenha"].value = "false";
		}
	}

</script>

<script src="scripts/dialogHandler.js" ></script>
<script src="scripts/operatorFieldsValidation.js" ></script>
<script src="scripts/editOperatorRequest.js" ></script>

</html>
