$.ajax({
    url: "http://"+Url.url+"idle/",
    type: 'get',
    headers: {
        "Authorization": localStorage.getItem("token")
    },
    async: false,
    statusCode: {
        401: function(){
            console.log("TOKENN");
            if(localStorage.getItem("token") != null){
                localStorage.clear();
            }
            alert("Sua sessão expirou");
            window.location.replace("login.php");
        }
    }
});