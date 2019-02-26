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
					<a href="#cadastrar" class="mdl-navigation__link">Cadastrar objetos</a>
					<a href="#listar" class="mdl-navigation__link">Listar objetos</a>
					<a href="#" class="mdl-navigation__link">Objetos excluídos</a>
			</nav>
		</div>
		<main class="mdl-layout__content mdl-color--grey-100">
			<div class="cadastro">
				<form action="#" enctype="application/json" id="form_cadastro" method="post">
					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
				    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="codigo">
				    <label class="mdl-textfield__label" for="codigo">Código</label>
				    <span class="mdl-textfield__error">Esta entrada não é um número!</span>
				  </div>

				  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
				    <input class="mdl-textfield__input" type="text" id="nome">
				    <label class="mdl-textfield__label" for="nome">Nome</label>
				  </div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
				    <textarea class="mdl-textfield__input" type="text" rows= "2" id="descricao" ></textarea>
				    <label class="mdl-textfield__label" for="descricao">Descrição</label>
				  </div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
				    <input class="mdl-textfield__input" type="text" id="data">
				    <label class="mdl-textfield__label" for="data">Data de entrada</label>
				  </div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
				    <input class="mdl-textfield__input" type="text" id="quem_recebeu">
				    <label class="mdl-textfield__label" for="quem_recebeu">Recebedor</label>
				  </div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
				    <input class="mdl-textfield__input" type="text" pattern="-?[0-9]*(\.[0-9]+)?" id="nota">
				    <label class="mdl-textfield__label" for="nota">Nota fiscal</label>
						<span class="mdl-textfield__error">Esta entrada não é um número!</span>
				  </div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
				    <select class="mdl-textfield__input" id="unity" name="octane">
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

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
				    <input class="mdl-textfield__input" type="text" id="bloco">
				    <label class="mdl-textfield__label" for="bloco">Bloco/Prédio</label>
				  </div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
				    <input class="mdl-textfield__input" type="text" id="sala">
				    <label class="mdl-textfield__label" for="sala">Sala</label>
				  </div>

					<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
				    <select class="mdl-textfield__input" id="state" name="octane">
				      <option value="Normal">Normal</option>
				      <option value="Quebrado">Quebrado</option>
				      <option value="Consertado">Consertado</option>
				    </select>
				    <label class="mdl-textfield__label" for="state">Estado</label>
				  </div>
				</form>
			</div>
		</main>
	</div>
</body>
</html>
