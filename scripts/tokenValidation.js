$.ajax({
    url: "http://"+Url.url+"idle/",
    type: 'get',
    headers: {
        "Authorization": localStorage.getItem("token")
    },
    statusCode: {
        401: function(){
            console.log("TOKENN");
            if(localStorage.getItem("token") != null){
                localStorage.clear();
            }
            window.location.replace("../login.php");
        }
    }
});