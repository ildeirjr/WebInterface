$('#form-cadastro').submit(function(e) {
    e.preventDefault();

    let that = $(this),
        url =  "http://"+Url.url+"addOperator/",
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

        console.log(response);
        let dialogTitle, dialogMsg;

        if(response == "23000"){
            dialogTitle = "Erro";
            dialogMsg = "O email informado já está associado a um operador";
            showDialog(dialogTitle, dialogMsg);
        } else if(response == "00000"){
            console.log(data);
            dialogTitle = "Sucesso!";
            dialogMsg = "Operador cadastrado no sistema";
            showDialog(dialogTitle, dialogMsg);
        } else {
            dialogTitle = "Erro";
            dialogMsg = "Falha ao inserir dados no sistema";
            showDialog(dialogTitle, dialogMsg);
        }
    });
});