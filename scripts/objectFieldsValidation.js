$('#form-cadastro').submit(function(e) {
    e.preventDefault();

    let that = $(this),
        url =  'requests/add_object.php',
        type = 'post',
        data = {}
        dataImg = {};
    
    that.find('[name]').each(function(index, value){
        let that = $(this),
            name = that.attr('name');
            value = that.val();

        data[name] = value;
    });

    if(data['foto'] != ""){
        dataImg['nome'] = data['nome'] + "_" + data['codigo'] + ".jpg";
        dataImg['img'] = data['base64_img'];
        dataImg['imgThumb'] = data['base64_thumb'];
        data['foto'] = dataImg['nome'];
    } else {
        data['foto'] = "null.jpg";
    }

    $.ajax({
        url: url,
        type: type,
        data: data
    }).done(function(response){

        console.log(response);
        let dialogTitle, dialogMsg;

        if(response == "duplicate_id"){
            dialogTitle = "Erro";
            dialogMsg = "O código informado já existe";
            showDialog(dialogTitle, dialogMsg);
        } else if(response == "ok"){

            if(data['foto'] != "null.jpg"){
                //WITH IMAGE
                console.log(data);
                $.ajax({
                    url: 'requests/upload_img.php',
                    type: type,
                    data: dataImg
                }).done(function(response){
                    if(response == "1"){
                        dialogTitle = "Sucesso!";
                        dialogMsg = "Objeto cadastrado no sistema";
                        showDialog(dialogTitle, dialogMsg);
                    } else {
                        dialogTitle = "Erro";
                        dialogMsg = "Falha ao carregar imagem";
                        showDialog(dialogTitle, dialogMsg);
                    }
                });
            } else {
                //WITHOUT IMAGE
                dialogTitle = "Sucesso!";
                dialogMsg = "Objeto cadastrado no sistema";
                showDialog(dialogTitle, dialogMsg);
            }

            
        }
        
    });

    function showDialog(dialogTitle, dialogMsg){
        let dialog = document.querySelector("dialog");
        document.querySelector(".close").addEventListener('click', function() {
            dialog.close();
        });

        document.querySelector(".mdl-dialog__title").innerHTML = dialogTitle;
        document.querySelector("#dialog-msg").innerHTML = dialogMsg;
        dialog.showModal();
    }
});

function dataValidation(){

    let idField = document.querySelector("#id-field");
    let idInput = document.forms["form-cadastro"]["codigo"];

    let nameField = document.querySelector("#name-field");
    let nameInput = document.forms["form-cadastro"]["nome"];

    let dateField = document.querySelector("#date-field");
    let dateInput = document.forms["form-cadastro"]["data_entrada"];

    let responsibleField = document.querySelector("#responsible-field");
    let responsibleInput = document.forms["form-cadastro"]["quem_recebeu"];

    let noteField = document.querySelector("#note-field");
    let noteInput = document.forms["form-cadastro"]["nota"];

    let roomField = document.querySelector("#room-field");
    let roomInput = document.forms["form-cadastro"]["sala"];

    idInput.oninput = function(){
        document.querySelector("#id-error-msg").innerHTML = "Este campo só pode conter números";
    }
    if(idInput.value == ""){
        idField.classList.add("is-invalid");
        document.querySelector("#id-error-msg").innerHTML = "Este campo não pode ser vazio";
    }
    if(nameInput.value == ""){
        nameField.classList.add("is-invalid");
    }
    if(dateInput.value == ""){
        dateField.classList.add("is-invalid");
    }
    if(responsibleInput.value == ""){
        responsibleField.classList.add("is-invalid");
    }
    noteInput.oninput = function(){
        document.querySelector("#note-error-msg").innerHTML = "Este campo só pode conter números";
    }
    if(noteInput.value == ""){
        noteField.classList.add("is-invalid");
        document.querySelector("#note-error-msg").innerHTML = "Este campo não pode ser vazio";
    }
    if(roomInput.value == ""){
        roomField.classList.add("is-invalid");
    }

    let inputFields = [idField, nameField, dateField, responsibleField, noteField, roomField];

    let hasInvalidField = false;

    inputFields.forEach(element => {
        if(element.classList.contains("is-invalid")){
            hasInvalidField = true;
            return;
        }
    });

    if(!hasInvalidField){
        $('#form-cadastro').submit();
    }
}