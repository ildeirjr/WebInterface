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
	<title>Editar objeto</title>
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
				<span class="mdl-layout-title">Editar objeto</span>
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
					<div class="add-img-area">
						<div id="add-img-container" class="add-img-container-with-img">
							<h6 id="add-img-text" hidden>Selecione uma imagem</h6>
                            <img id="add-img" src="" alt="">
							<button type="button" id="add-img-button" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored">
								<i class="material-icons">photo_camera</i>
							</button>
							<input id="img-input" type="file" accept="image/*" onchange="previewFile()" name="foto-file" hidden>
						</div>
					</div>
					

						<div id="id-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="codigo" value="">
							<label class="mdl-textfield__label" for="codigo">Tombamento</label>
							<span id="id-error-msg" class="mdl-textfield__error">Este campo só pode conter números</span>
						</div>

						<div id="name-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" id="nome" name="nome" value="">
							<label class="mdl-textfield__label" for="nome">Descrição do bem</label>
							<span class="mdl-textfield__error">Este campo não pode ser vazio</span>
						</div>

						<div id="description-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<textarea class="mdl-textfield__input" type="text" rows= "2" name="descricao" value=""></textarea>
							<label class="mdl-textfield__label" for="descricao">Especificação</label>
						</div>

						<div id="date-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="date" name="data_entrada" id="date" value="">
							<label class="mdl-textfield__label" for="data">Data de compra/cadastro</label>
							<span id="date-error-msg" class="mdl-textfield__error">Data inválida</span>
						</div>

						<div id="responsible-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" name="recebeu" value="">
							<label class="mdl-textfield__label" for="recebeu">Responsável</label>
							<span class="mdl-textfield__error">Este campo não pode ser vazio</span>
						</div>

						<div id="note-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" name="nota" value="">
							<label class="mdl-textfield__label" for="nota">Processo compra</label>
							<span id="note-error-msg" class="mdl-textfield__error">Este campo só pode conter números</span>
						</div>

						<div id="empenho-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" name="empenho" value="">
							<label class="mdl-textfield__label" for="empenho">Empenho</label>
							<span id="empenho-error-msg" class="mdl-textfield__error">Este campo não pode ser vazio</span>
						</div>

						<div id="unity-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<select class="mdl-textfield__input" id="unity" name="unidade">
                                <option id="unity-selected" value="" selected></option>
								<option value="Centro de Educação Aberta e a Distância (CEAD)">Centro de Educação Aberta e a Distância (CEAD)</option>
								<option value="Centro Desportivo da UFOP (CEDUFOP)">Centro Desportivo da UFOP (CEDUFOP)</option>
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
							<input class="mdl-textfield__input" type="text" name="bloco" value="">
							<label class="mdl-textfield__label" for="bloco">Bloco/Prédio</label>
						</div>

						<div id="room-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<input class="mdl-textfield__input" type="text" name="sala" value="">
							<label class="mdl-textfield__label" for="sala">Sala</label>
							<span class="mdl-textfield__error">Este campo não pode ser vazio</span>
						</div>

						<div id="state-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<select class="mdl-textfield__input" id="state" name="estado">
                                <option id="state-selected" value="" selected></option>
								<option value="Alocado">Alocado</option>
								<option value="Cedido em comodato">Cedido em comodato</option>
								<option value="Cedido em doacao">Cedido em doacao</option>
								<option value="Cessao de uso">Cessao de uso</option>
								<option value="Em deposito p/ baixa">Em deposito p/ baixa</option>
								<option value="Em deposito p/ redistribuicao">Em deposito p/ redistribuicao</option>
								<option value="Em manutencao">Em manutencao</option>
								<option value="Emprestado">Emprestado</option>
								<option value="Nao incorporado">Nao incorporado</option>
								<option value="Nao localizado">Nao localizado</option>
								<option value="Ocioso">Ocioso</option>
								<option value="Permuta">Permuta</option>
								<option value="Reavaliacao">Reavaliacao</option>
								<option value="Recebido em comodato">Recebido em comodato</option>
								<option value="Recebido em doacao">Recebido em doacao</option>
								<option value="Sinistrado">Sinistrado</option>
								<option value="Sucateado">Sucateado</option>
							</select>
							<label class="mdl-textfield__label" for="state">Situação</label>
						</div>

						<div id="conservation-field" class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
							<select class="mdl-textfield__input" id="conservation" name="conservacao">
								<option id="conservation-selected" value="" selected></option>
								<option value="Alienado">Alienado</option>
								<option value="Antieconomico">Antieconomico</option>
								<option value="Bom">Bom</option>
								<option value="Doado">Doado</option>
								<option value="Irrecuperavel">Irrecuperavel</option>
								<option value="Obsoleto">Obsoleto</option>
								<option value="Outros">Outros</option>
								<option value="Peca de museu">Peca de museu</option>
								<option value="Precario">Precario</option>
								<option value="Recuperavel">Recuperavel</option>
								<option value="Sucateado">Sucateado</option>
							</select>
							<label class="mdl-textfield__label" for="conservation">Conservação</label>
						</div>
						<input type="text" name="base64_img" value="" hidden>
						<input type="text" name="base64_thumb" value="" hidden>
						<input type="text" name="nome_usuario" value="" hidden>
                        <input type="text" name="codigoAntigo" value="" hidden>
                        <input type="text" name="fotoAntigo" value="" hidden>
                        <input type="text" name="imgDelete" value="false" hidden>
                        <input type="text" name="imgRename" value="false" hidden>
						<input type="text" name="imgSeted" value="false" hidden>
						<input type="text" name="foto" value="" hidden>
					</form>
			</div>
		</main>
	</div>
</body>

<script>

	var item = JSON.parse(sessionStorage.getItem("objData"));
	document.forms["form-cadastro"]["foto"].value = item.foto;
	if(item.foto != "null.jpg"){
		document.querySelector("#add-img").src = "http://"+Url.url+"photos/"+item.foto;
	} else {
		document.querySelector("#add-img-container").setAttribute("class","add-img-container-without-img");
		document.querySelector("#add-img-text").removeAttribute("hidden");
	}
	document.forms["form-cadastro"]["codigo"].value = item.codigo;
	document.forms["form-cadastro"]["nome"].value = item.nome;
	document.forms["form-cadastro"]["descricao"].value = item.descricao;
	document.forms["form-cadastro"]["data_entrada"].value = item.data_entrada;
	document.forms["form-cadastro"]["recebeu"].value = item.quem_recebeu;
	document.forms["form-cadastro"]["nota"].value = item.nota;
	document.forms["form-cadastro"]["empenho"].value = item.empenho;
	document.querySelector("#unity-selected").value = item.unidade;
	document.querySelector("#unity-selected").innerHTML = item.unidade;
	document.forms["form-cadastro"]["bloco"].value = item.bloco;
	document.forms["form-cadastro"]["sala"].value = item.sala;
	document.querySelector("#state-selected").value = item.estado;
	document.querySelector("#state-selected").innerHTML = item.estado;
	document.querySelector("#conservation-selected").value = item.conservacao;
	document.querySelector("#conservation-selected").innerHTML = item.conservacao;
	document.forms["form-cadastro"]["nome_usuario"].value = localStorage.getItem("idUser");
	document.forms["form-cadastro"]["codigoAntigo"].value = item.codigo;
	document.forms["form-cadastro"]["fotoAntigo"].value = item.foto;
	document.forms["form-cadastro"]["imgDelete"].value = "false";
	document.forms["form-cadastro"]["imgRename"].value = "false";

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

		if(file){
			console.log("ENTROU NO IF");
			reader.readAsBinaryString(file);
		}

		reader.onload = function(){
			document.forms["form-cadastro"]["imgSeted"].value = "true";

			if(item.foto != "null.jpg"){
				document.forms["form-cadastro"]["imgDelete"].value = "true";
			}
			
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
					scale = 0.1;
				} else if(imgFile.height > 500){
					scale = 0.25;
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

<script src="scripts/dialogHandler.js" ></script>
<script src="scripts/objectFieldsValidation.js" ></script>
<script src="scripts/editRequest.js" ></script>

</html>
