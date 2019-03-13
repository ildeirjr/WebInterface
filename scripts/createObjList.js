function addElement(item){
    var li = document.createElement('li');
    li.setAttribute("class","mdl-list__item mdl-list__item--two-line");
    li.onclick = function(){
        window.location.href = "showObject.php?id="+item.codigo;
    }

    var img = document.createElement('img');
    img.setAttribute("class","thumb");
    
    if(item.foto == "null.jpg"){
        img.setAttribute("src","http://"+Url.url+"photos/thumbs/default.jpg");
    } else {
        img.setAttribute("src","http://"+Url.url+"photos/thumbs/"+item.foto);
    }

    var primaryContent = document.createElement('span');
    primaryContent.setAttribute("class","mdl-list__item-primary-content");

    var itemName = document.createElement('span');
    itemName.innerHTML = item.nome;

    var itemId = document.createElement('span');
    itemId.setAttribute("class","mdl-list__item-sub-title");
    itemId.innerHTML = item.codigo;

    var secondaryContent = document.createElement('span');
    secondaryContent.setAttribute("class","mdl-list__item-secondary-content");

    var itemDate = document.createElement('span');
    itemDate.setAttribute("class","mdl-list__item-secondary-info");
    itemDate.innerHTML = new Date(item.data_entrada).toLocaleDateString("pt-BR");

    primaryContent.appendChild(itemName);
    primaryContent.appendChild(itemId);

    secondaryContent.appendChild(itemDate);

    li.appendChild(img);
    li.appendChild(primaryContent);
    li.appendChild(secondaryContent);
    
    return li;
}

function createList(itemArray){
    var list = document.querySelector("#obj-list");

    itemArray.forEach(element => {
        list.appendChild(addElement(element));
    });
}

$.ajax({
    url: "http://"+Url.url+"listall/?mode=non_deleted&num_page=0&window_size=10",
    type: 'get',
    headers: {
        "Authorization": "1gdh87efuhwi"
    }
}).done(function(response){
    let jsonArray = JSON.parse(response);
    createList(jsonArray);
});