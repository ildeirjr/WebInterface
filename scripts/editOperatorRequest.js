$('#form-cadastro').submit(function(e) {
    e.preventDefault();

    let loadingDialog = document.querySelector("#loading-dialog");
    loadingDialog.showModal();

    let that = $(this),
        url =  "http://"+Url.url+"editOperator/",
        type = 'post',
        header = {"Authorization": localStorage.getItem("token")},
        data = {};
    
    that.find('[name]').each(function(index, value){
        let that = $(this),
            name = that.attr('name');
            value = that.val();

        data[name] = value;
    });

    $.ajax({
        url: url,
        type: type,
        headers: header,
        data: data
    }).done(function(response){
        loadingDialog.close();
        let dialogTitle, dialogMsg;

        if(response == "23000"){
            dialogTitle = "Erro";
            dialogMsg = "O email informado já está associado a um operador";
            showDialog(dialogTitle, dialogMsg);
        } else if(response == "00000"){
            dialogTitle = "Sucesso!";
            dialogMsg = "Operador editado";
            localStorage.setItem("nome", data['nome']);
            localStorage.setItem("email", data['email']);
            localStorage.setItem("data_nasc", data['data_nasc']);
            localStorage.setItem("depto", data['depto']);
            showDialog(dialogTitle, dialogMsg);
        } else {
            dialogTitle = "Erro";
            dialogMsg = "Falha ao modificar os dados no sistema";
            showDialog(dialogTitle, dialogMsg);
        }
    });
});