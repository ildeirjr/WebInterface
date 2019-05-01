

document.forms["login"].onsubmit = function(e) {
    e.preventDefault();

    $.ajax({
      url: "http://" + Url.url + "validateLogin/",
      type: 'post',
      headers: {
        "Authorization": "1gdh87efuhwi"
      },
      data: {
        "email": document.forms["login"]["email"].value,
        "senha": document.forms["login"]["senha"].value
      }
    }).done(function(response){
      if(response == "0"){
        document.querySelector("#error-msg").removeAttribute("hidden");
      } else {
        let jsonAuth = JSON.parse(response);
        console.log(jsonAuth);
        localStorage.setItem("idUser", jsonAuth.idUser);
        localStorage.setItem("token", jsonAuth.token);
        document.querySelector("#error-msg").style.visibility = "hidden";

        $.ajax({
            url: "http://"+Url.url+"getOperator/?id="+localStorage.getItem("idUser"),
            type: 'get',
            headers: {
              "Authorization": "1gdh87efuhwi"
            },
            cache: false
          }).done(function(response){
            let jsonAuth = JSON.parse(response);
            localStorage.setItem("nome", jsonAuth.nome);
            localStorage.setItem("email", jsonAuth.email);
            localStorage.setItem("data_nasc", jsonAuth.data_nasc);
            localStorage.setItem("depto", jsonAuth.depto);
            window.location.replace("home.php")
          });
      }
    });
  }