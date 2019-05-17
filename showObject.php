<?php
// include "requests/token_validation.php";
// include "requests/get_object.php";
// $jsonObj = getObject($_GET['id']);
// $jsonStr = json_encode($jsonObj);
// ?>

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
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="Url.js"></script>
	<script src="scripts/tokenValidation.js" ></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
</head>
<body>
	<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header mdl-layout--fixed-drawer">
		<header class="mdl-layout__header">
			<div class="mdl-layout__header-row">
				<span class="mdl-layout-title">Visualizar objeto</span>
				<div class="mdl-layout-spacer"></div>
				<nav class="mdl-navigation">
                    <a id="delete-button" class="mdl-navigation__link" style="display: none;"><i class="material-icons">delete</i></a>
                    <a id="edit-button" class="mdl-navigation__link" style="display: none;"><i class="material-icons">edit</i></a>
                    <a id="restore-button" class="mdl-navigation__link" style="display: none;"><i class="material-icons">settings_backup_restore</i></a>
                    <form name="obj-data-form" action="edit.php" method="post">
                        <input type="text" name="json_str" value="" hidden>
                    </form>
				</nav>
			</div>
		</header>
		<?php include "drawer_menu.php"; ?>

        <dialog id="delete-dialog" class="mdl-dialog">
			<h4 class="mdl-dialog__title">Excluir</h4>
			<div class="mdl-dialog__content">
				<p id="dialog-msg">
					Tem certeza que deseja excluir esse objeto?
				</p>
			</div>
			<div class="mdl-dialog__actions">
                <button type="button" id="yes-button" class="mdl-button">Sim</button>
				<button type="button" id="no-button" class="mdl-button close">Não</button>
			</div>
  		</dialog>

        <dialog id="response-dialog" class="mdl-dialog">
			<h4 class="mdl-dialog__title">Sucesso!</h4>
			<div class="mdl-dialog__content">
				<p id="dialog-msg">
					O objeto foi excluído
				</p>
			</div>
			<div class="mdl-dialog__actions">
				<button type="button" id="ok-button" class="mdl-button close">OK</button>
			</div>
  		</dialog>

        <dialog id="restore-dialog" class="mdl-dialog">
			<h4 class="mdl-dialog__title">Restaurar</h4>
			<div class="mdl-dialog__content">
				<p id="dialog-msg">
					Tem certeza que deseja restaurar esse objeto?
				</p>
			</div>
			<div class="mdl-dialog__actions">
                <button type="button" id="restore-yes-button" class="mdl-button">Sim</button>
				<button type="button" id="restore-no-button" class="mdl-button close">Não</button>
			</div>
          </dialog>
          
          <dialog id="loading-dialog" class="mdl-dialog">
			<div class="mdl-dialog__content">
                <div id="div-spinner" class="container">
                    <div class="mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active center"></div>
                </div>
			</div>
  		</dialog>

        <dialog id="restore-response-dialog" class="mdl-dialog">
			<h4 class="mdl-dialog__title">Sucesso!</h4>
			<div class="mdl-dialog__content">
				<p id="dialog-msg">
					O objeto foi restaurado
				</p>
			</div>
			<div class="mdl-dialog__actions">
				<button type="button" id="restore-ok-button" class="mdl-button close">OK</button>
			</div>
  		</dialog>

		<main class="mdl-layout__content mdl-color--grey-100">
            <div id="div-show-object" class="show-object-container" >
                <div class="show-object-text">
                    <h3 id="object-name-title"></h3>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Tombamento
                        </div>
                        <div id="item-id" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Situação
                        </div>
                        <div id="item-state" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Conservação
                        </div>
                        <div id="item-conservation" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Especificação
                        </div>
                        <div id="item-description" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Data de compra
                        </div>
                        <div id="item-date" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Unidade acadêmica
                        </div>
                        <div id="item-unity" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Bloco/Prédio
                        </div>
                        <div id="item-block" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Sala
                        </div>
                        <div id="item-room" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Responsável
                        </div>
                        <div id="item-responsible" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Processo compra
                        </div>
                        <div id="item-note" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div class="show-object-item">
                        <div class="show-object-item-primary">
                            Empenho
                        </div>
                        <div id="item-empenho" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div id="div-delete-user" class="show-object-item" style="display: none;">
                        <div class="show-object-item-primary">
                            Excluído por
                        </div>
                        <div id="item-delete-user" class="show-object-item-secondary">
                        </div>
                    </div>
                    <div id="div-delete-date" class="show-object-item" style="display: none;">
                        <div class="show-object-item-primary">
                            Data da exclusão
                        </div>
                        <div id="item-delete-date" class="show-object-item-secondary">
                        </div>
                    </div>
                </div>
                <div class="show-object-image">
                    <img class="object-image" src="" alt="">
                </div>
            </div>
		</main>
	</div>
</body>

<script>
    let itemId = new URLSearchParams(window.location.search).get('id');
    var item;
    $.ajax({
        url: "http://"+Url.url+"getObject/?id="+itemId,
        type: 'get',
        headers: {
            "Authorization": localStorage.getItem("token")
        },
        cache: false
    }).done(function(response){
        sessionStorage.setItem("objData", response);
        item = JSON.parse(response);
        document.querySelector("#object-name-title").innerHTML = item.nome;
        document.querySelector("#item-id").innerHTML = item.codigo;
        document.querySelector("#item-state").innerHTML = item.estado;
        document.querySelector("#item-conservation").innerHTML = item.conservacao;
        document.querySelector("#item-description").innerHTML = item.descricao;
        document.querySelector("#item-date").innerHTML = new Date(item.data_entrada).toLocaleDateString("PT-br", {timeZone: 'UTC'});
        document.querySelector("#item-unity").innerHTML = item.unidade;
        document.querySelector("#item-block").innerHTML = item.bloco;
        document.querySelector("#item-room").innerHTML = item.sala;
        document.querySelector("#item-responsible").innerHTML = item.quem_recebeu;
        document.querySelector("#item-note").innerHTML = item.nota;
        document.querySelector("#item-empenho").innerHTML = item.empenho;
        document.querySelector("#item-delete-user").innerHTML = item.op_exclusao_id;
        document.querySelector("#item-delete-date").innerHTML = new Date(item.tempo_exclusao).toLocaleDateString("PT-br") + " - " 
                                                                + new Date(item.tempo_exclusao).getHours() + ":"
                                                                + new Date(item.tempo_exclusao).getMinutes();

        if(item.foto == "null.jpg"){
            document.querySelector(".object-image").src = "http://"+Url.url+"photos/default.jpg";
        } else {
            document.querySelector(".object-image").src = "http://"+Url.url+"photos/"+item.foto;
        }

        

        
        if(item.estado == 'Excluido'){
            document.querySelector("#restore-button").style.display = "block";
            document.querySelector("#div-delete-user").style.display = "block";
            document.querySelector("#div-delete-date").style.display = "block";
        } else {
            document.querySelector("#delete-button").style.display = "block";
            document.querySelector("#edit-button").style.display = "block";
        }
    });
</script>
    
<script>
    var loadingDialog = document.querySelector("#loading-dialog");
    let deleteButton = document.querySelector("#delete-button");
    deleteButton.onclick = function(){
        let deleteDialog = document.querySelector("#delete-dialog");
        deleteDialog.showModal();
        document.querySelector("#no-button").onclick = function(){
            deleteDialog.close();
        }
        document.querySelector("#yes-button").onclick = function(){
            loadingDialog.showModal();
            deleteDialog.close();
            $.ajax({
                url: "http://"+Url.url+"delete/",
                type: "post",
                headers: {
                    "Authorization": localStorage.getItem("token")
                },
                data: {
                    id: item.codigo,
                    delete_user: localStorage.getItem("nome")
                }
            }).done(function(response){
                let responseDialog = document.querySelector("#response-dialog");
                loadingDialog.close();
                responseDialog.showModal();
                document.querySelector("#ok-button").onclick = function(){
                    responseDialog.close();
                    window.history.back();
                }
            });
        }
    }

    let editButton = document.querySelector("#edit-button");
    editButton.onclick = function(){
        document.location.href = "edit.php";
    }

    let restoreButton = document.querySelector("#restore-button");
    restoreButton.onclick = function(){
        let restoreDialog = document.querySelector("#restore-dialog");
        restoreDialog.showModal();
        document.querySelector("#restore-no-button").onclick = function(){
            restoreDialog.close();
        }
        document.querySelector("#restore-yes-button").onclick = function(){
            loadingDialog.showModal();
            restoreDialog.close();
            $.ajax({
                url: "http://"+Url.url+"restore/",
                type: "post",
                headers: {
                    "Authorization": localStorage.getItem("token")
                },
                data: {
                    id: item.codigo,
                }
            }).done(function(response){
                loadingDialog.close();
                let responseDialog = document.querySelector("#restore-response-dialog");
                responseDialog.showModal();
                document.querySelector("#restore-ok-button").onclick = function(){
                    responseDialog.close();
                    window.history.back();
                }
            });
        }
    }

</script>

</html>
