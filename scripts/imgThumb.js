let imgArray = document.querySelectorAll(".thumb");
imgArray.forEach(element => {
    if(element.getAttribute("src").includes("null.jpg")){
        element.setAttribute("src","http://" + Url.url + "photos/thumbs/default.jpg");
    }
});

// function getThumb(src){
//     if(src == "null.jpg"){
//         return "http://" + Url.getUrl + "photos/thumbs/default.jpg";
//     } else {
//         return "http://" + Url.getUrl + "photos/thumbs/" + src;
//     }
// }