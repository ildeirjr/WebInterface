<?php
//include "requests/token_validation.php";
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
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="Url.js"></script>
	<script src="scripts/tokenValidation.js" ></script>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">Cadastrar objeto</span>
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

		<main class="mdl-layout__content mdl-color--grey-100">
			<div class="cadastro">
				<form id="form-cadastro" name="form-cadastro">
					<div class="add-img-area">
						<div id="add-img-container" class="add-img-container-without-img">
							<h6 id="add-img-text">Selecione uma imagem</h6>
							<img id="add-img" src="#" alt="">
							<button type="button" id="add-img-button" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
								<i class="material-icons">photo_camera</i>
							</button>
							<input id="img-input" type="file" accept="image/*" onchange="previewFile()" name="foto" hidden>
						</div>
					</div>
					

						<div id="id-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="codigo">
							<label class="mdl-textfield__label" for="codigo">Código</label>
							<span id="id-error-msg" class="mdl-textfield__error">Este campo só pode conter números</span>
						</div>

						<div id="name-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" id="nome" name="nome">
							<label class="mdl-textfield__label" for="nome">Nome</label>
							<span class="mdl-textfield__error">Este campo não pode ser vazio</span>
						</div>

						<div id="description-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<textarea class="mdl-textfield__input" type="text" rows= "2" name="descricao" ></textarea>
							<label class="mdl-textfield__label" for="descricao">Descrição</label>
						</div>

						<div id="date-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" name="data_entrada" id="date">
							<label class="mdl-textfield__label" for="data">Data de entrada</label>
							<span id="date-error-msg" class="mdl-textfield__error">Data inválida</span>
						</div>

						<div id="responsible-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" name="recebeu">
							<label class="mdl-textfield__label" for="recebeu">Recebedor</label>
							<span class="mdl-textfield__error">Este campo não pode ser vazio</span>
						</div>

						<div id="note-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="nota">
							<label class="mdl-textfield__label" for="nota">Nota fiscal</label>
							<span id="note-error-msg" class="mdl-textfield__error">Este campo só pode conter números</span>
						</div>

						<div id="unity-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<select class="mdl-textfield__input" id="unity" name="unidade">
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
							<label class="mdl-textfield__label" for="unity">Unidade acadêmica</label>
						</div>

						<div id="block-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" name="bloco">
							<label class="mdl-textfield__label" for="bloco">Bloco/Prédio</label>
						</div>

						<div id="room-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" name="sala">
							<label class="mdl-textfield__label" for="sala">Sala</label>
							<span class="mdl-textfield__error">Este campo não pode ser vazio</span>
						</div>

						<div id="state-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<select class="mdl-textfield__input" id="state" name="estado">
								<option value="Normal">Normal</option>
								<option value="Quebrado">Quebrado</option>
								<option value="Consertado">Consertado</option>
							</select>
							<label class="mdl-textfield__label" for="state">Estado</label>
						</div>
						<input type="text" name="base64_img" value="" hidden>
						<input type="text" name="base64_thumb" value="" hidden>
						<input type="text" name="nome_usuario" value="" hidden>
					</form>
			</div>
		</main>
	</div>
</body>

<script type="text/javascript">
	document.forms["form-cadastro"]["nome_usuario"].value = localStorage.getItem("idUser");
	let inputData = document.querySelector("#date");
	let divData = document.querySelector("#date-field");
	inputData.addEventListener('focusin', function(){
		inputData.setAttribute("type","date");
		divData.addEventListener('focusout', function(){
			 	divData.setAttribute("class","mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col is-upgraded is-focused");
		});
	});
</script>

<script>
	var uploadButton = document.querySelector('#add-img-button');
	var imgInput = document.querySelector('input[type="file"]');

	uploadButton.addEventListener('click', () => {
		imgInput.click();
	});

	function previewFile(){
		var imgContainer = document.querySelector("#add-img-container");
		var imgText = document.querySelector("#add-img-text");
		var img = document.querySelector('#add-img');
		var file = imgInput.files[0];
		var reader = new FileReader();

		console.log(file);

		if(file){
			console.log("ENTROU NO IF");
			reader.readAsBinaryString(file);
		} else {
			imgContainer.setAttribute("class", "add-img-container-without-img");
			imgText.style.visibility = "visible";			
			img.setAttribute("src","#");
		}

		reader.onload = function(){
			let imgFile = new Image();
			imgContainer.setAttribute("class", "add-img-container-with-img");
			imgText.style.visibility = "hidden";

			let base64Img = window.btoa(reader.result);
			img.setAttribute("src", 'data:image/jpeg;base64,' + base64Img);
			document.forms["form-cadastro"]["base64_img"].value = base64Img;

			imgFile.src = 'data:image/jpeg;base64,' + base64Img;

			imgFile.onload = function(){
				let c = document.createElement('canvas');
				let ctx = c.getContext('2d');

				let scale = 1;

				console.log(imgFile.height);

				if(imgFile.height > 1000){
					scale = 0.25;
				} else if(imgFile.height > 500){
					scale = 0.5;
				}

				c.width = imgFile.width * scale;
				c.height = imgFile.height * scale;
				
				ctx.drawImage(imgFile, 0, 0, c.width, c.height);
				
				let binary = c.toDataURL("image/jpeg").split(",");
				console.log(binary);
				document.forms["form-cadastro"]["base64_thumb"].value = binary[1];
			}

		}

	}

</script>

<script src="scripts/dialogHandler.js"></script>
<script src="scripts/objectFieldsValidation.js"></script>
<script src="scripts/addRequest.js"></script>

</html>
