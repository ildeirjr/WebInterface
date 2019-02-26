let imgArray = document.querySelectorAll(".thumb");
imgArray.forEach(element => {
    if(element.getAttribute("src").includes("null.jpg")){
        element.setAttribute("src","http://localhost:8080/WebUbspaces/photos/thumbs/default.jpg");
    }
});