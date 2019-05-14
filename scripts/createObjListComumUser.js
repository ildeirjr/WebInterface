function addElement(item, listIndex){
    var li = document.createElement('li');
    li.setAttribute("class","mdl-list__item mdl-list__item--two-line");
    li.onclick = function(){
        sessionStorage.setItem("objIndex", listIndex);
        window.location.href = "showObjectComumUser.html?id="+item.codigo;
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
    itemDate.innerHTML = new Date(item.data_entrada).toLocaleDateString("pt-BR", {timeZone: 'UTC'});

    primaryContent.appendChild(itemName);
    primaryContent.appendChild(itemId);

    secondaryContent.appendChild(itemDate);

    li.appendChild(img);
    li.appendChild(primaryContent);
    li.appendChild(secondaryContent);
    
    return li;
}

var list = document.querySelector("#obj-list");
var indexArray = [];

function clearList(){
    while(list.firstChild){
        list.removeChild(list.firstChild);
    }
    pageCount = 0;
}

function appendArrayToList(itemArray){
    itemArray.forEach((element, index) => {
        list.appendChild(addElement(element, index + pageCount));
    });
}

function loadFilteredData(page, windowSize, params){
    $.ajax({
        url: "http://"+Url.url+"filter/",
        type: 'get',
        headers: {"Authorization": "1gdh87efuhwi"},
        data: {
            'mode': "non_deleted",
            'num_page': page,
            'window_size': windowSize,
            'filter_params': params
        }
    }).done(function(response){
        appendArrayToList(JSON.parse(response));
    });
}

const windowSize = 15;
var pageCount = 0;

var filterParams = localStorage.getItem("comumUserFilteredData");
loadFilteredData(pageCount, windowSize, filterParams);

// document.querySelector("#load-more-button").onclick = function(){
//     pageCount += windowSize;
//     loadData("non_deleted", pageCount, windowSize);
// }

$('main').scroll(function(){
    //console.log(`ScrollTop: ${$('main').scrollTop()}, MainHeight: ${$('main').height()}, ListHeight: ${$('#obj-list').height()}`)
    if($('main').scrollTop() >= $('#obj-list').height() - $(document).height()){
        pageCount += windowSize;
        loadFilteredData(pageCount, windowSize, filterParams);
    }
});