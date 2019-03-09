<?php
include "requests/token_validation.php";
include "requests/get_object.php";
$jsonObj = getObject($_GET['id']);
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Visualizar objeto</title>
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
				<span class="mdl-layout-title">Visualizar objeto</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
                    <a href="#" class="mdl-navigation__link"><i class="material-icons">delete</i></a>
                    <a href="#" class="mdl-navigation__link"><i class="material-icons">edit</i></a>
				</nav>
			</div>
		</header>
		<?php include "drawer_menu.php"; ?>
		<main class="mdl-layout__content mdl-color--grey-100">
            <div class="show-object-container">
                <div class="show-object-text">
                    <h3 id="object-name-title"><?=$jsonObj->nome?></h3>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Código
                        </div>
                        <div class="show-object-item-secondary">
                            <?=$jsonObj->codigo?>
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Estado
                        </div>
                        <div class="show-object-item-secondary">
                            <?=$jsonObj->estado?>
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Descrição
                        </div>
                        <div class="show-object-item-secondary">
                            <?=$jsonObj->descricao?>
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Data de entrada
                        </div>
                        <div class="show-object-item-secondary">
                            <?=date_format(date_create($jsonObj->data_entrada), 'd/m/Y')?>
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Unidade acadêmica
                        </div>
                        <div class="show-object-item-secondary">
                            <?=$jsonObj->unidade?>
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Bloco/Prédio
                        </div>
                        <div class="show-object-item-secondary">
                            <?=$jsonObj->bloco?>
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Sala
                        </div>
                        <div class="show-object-item-secondary">
                            <?=$jsonObj->sala?>
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Recebedor
                        </div>
                        <div class="show-object-item-secondary">
                            <?=$jsonObj->quem_recebeu?>
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Nota fiscal
                        </div>
                        <div class="show-object-item-secondary">
                            <?=$jsonObj->nota?>
                        </div>
                    </div>
                </div>
                <div class="show-object-image">
                    <img class="object-image" src="http://<?=UbspacesURL::$URL?>photos/<?=$jsonObj->foto?>" alt="">
                </div>
            </div>
		</main>
	</div>
</body>

<script>
    let imgArray = document.querySelectorAll(".object-image");
    imgArray.forEach(element => {
        if(element.getAttribute("src").includes("null.jpg")){
            element.setAttribute("src","http://<?php echo UbspacesURL::$URL?>photos/default.jpg");
        }
    });
</script>

</html>
