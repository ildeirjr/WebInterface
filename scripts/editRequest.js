$('#form-cadastro').submit(function(e) {
    e.preventDefault();

    let loadingDialog = document.querySelector("#loading-dialog");
    loadingDialog.showModal();

    let that = $(this),
        url =  "http://"+Url.url+"edit/",
        type = 'post',
        header = {"Authorization": localStorage.getItem("token")},
        data = {},
        dataImg = {};
    
    that.find('[name]').each(function(index, value){
        let that = $(this),
            name = that.attr('name');
            value = that.val();

        data[name] = value;
    });

    if(data['imgSeted'] == "true"){
        dataImg['nome'] = data['nome'] + "_" + data['codigo'] + ".jpg";
        dataImg['img'] = data['base64_img'];
        dataImg['imgThumb'] = data['base64_thumb'];
        data['foto'] = dataImg['nome'];
    }

    if(data['fotoAntigo'] != "null.jpg" && data['imgSeted'] == "false"){
        data['imgRename'] = "true";
    }


    $.ajax({
        url: url,
        type: type,
        headers: header,
        data: data
    }).done(function(response){
        

        let dialogTitle, dialogMsg;

        if(response == "23000"){
            loadingDialog.close();
            dialogTitle = "Erro";
            dialogMsg = "O código informado já existe";
            showDialog(dialogTitle, dialogMsg);
        } else if(response == "00000"){

            if(data['imgSeted'] == "true"){
                //WITH IMAGE
                $.ajax({
                    url: "http://"+Url.url+"uploadImg/",
                    type: type,
                    headers: header,
                    data: dataImg
                }).done(function(response){
                    loadingDialog.close();
                    if(response == "1"){
                        dialogTitle = "Sucesso!";
                        dialogMsg = "Objeto editado";
                        showDialog(dialogTitle, dialogMsg);
                    } else {
                        dialogTitle = "Erro";
                        dialogMsg = "Falha ao carregar imagem";
                        showDialog(dialogTitle, dialogMsg);
                    }
                });
            } else {
                loadingDialog.close();
                //WITHOUT IMAGE
                dialogTitle = "Sucesso!";
                dialogMsg = "Objeto editado";
                showDialog(dialogTitle, dialogMsg);
            }

            
        }
        
    });
});