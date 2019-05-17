function addElement(item, listIndex){
    var li = document.createElement('li');
    li.setAttribute("class","mdl-list__item mdl-list__item--two-line");
    li.onclick = function(){
        sessionStorage.setItem("objIndex", listIndex);
        window.location.href = "showObject.php?id="+item.codigo;
    }

    var chkBoxLabel = document.createElement('label');
    chkBoxLabel.setAttribute("class","mdl-checkbox mdl-js-checkbox mdl-js-ripple-effect");
    chkBoxLabel.setAttribute("for","checkbox-"+listIndex);
    chkBoxLabel.setAttribute("style","width: 30px;");

    $(chkBoxLabel).click(function(event){
        event.stopPropagation();
    });

    var checkBox = document.createElement('input');
    checkBox.setAttribute("type","checkbox");
    checkBox.setAttribute("style","margin-right: 20px;");
    checkBox.setAttribute("id","checkbox-"+listIndex);
    checkBox.setAttribute("class","mdl-checkbox__input");

    $(checkBox).click(function(){
        let clickIndex = $(this).parent().parent().index();
        let itemId = $(this).parent().parent().children().eq(2).children().eq(1).html();
        if($(this).prop("checked")){
            indexArray.push({index: clickIndex, id: itemId, html: null});
        } else {
            let idx = indexArray.map(function(e){return e.index;}).indexOf(clickIndex);
            indexArray.splice(idx,1);
        }

        console.log(indexArray);

        if(indexArray.length > 0){
            selectModeOn();
        } else {
            selectModeOff();
        }
    });

    chkBoxLabel.appendChild(checkBox);

    componentHandler.upgradeElement(chkBoxLabel);

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

    if(mode == 'deleted'){
        itemName.style.color = "red";
        itemId.style.color = "red";
        itemDate.style.color = "red";
    }

    primaryContent.appendChild(itemName);
    primaryContent.appendChild(itemId);

    secondaryContent.appendChild(itemDate);

    li.appendChild(chkBoxLabel);
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
    if(itemArray.length < windowSize){
        document.querySelector("#load-more-button").style.visibility = "hidden";
    }
    itemArray.forEach((element, index) => {
        list.appendChild(addElement(element, index + pageCount));
    });
}

function loadData(mode, page, windowSize){
    $.ajax({
        url: `http://${Url.url}listall/?mode=${mode}&num_page=${page}&window_size=${windowSize}`,
        type: 'get',
        headers: {
            "Authorization": localStorage.getItem("token")
        },
        cache: false
    }).done(function(response){
        document.querySelector("#obj-list").style.display = "block";
        document.querySelector("#filter-button").style.display = "block";
        document.querySelector("#search-form").style.display = "block";
        document.querySelector("#div-spinner").style.display = "none";
        appendArrayToList(JSON.parse(response));
        loadingButtonOff();
    });
}

function loadFilteredData(mode, page, windowSize, params){
    $.ajax({
        url: "http://"+Url.url+"filter/",
        type: 'get',
        headers: {"Authorization": localStorage.getItem("token")},
        data: {
            'mode': mode,
            'num_page': page,
            'window_size': windowSize,
            'filter_params': params
        },
        cache: false
    }).done(function(response){
        appendArrayToList(JSON.parse(response));
        loadingButtonOff();
        document.querySelector("#div-spinner").style.display = "none";
        document.querySelector("#obj-list").style.display = "block";
    });
}

const windowSize = 15;
var pageCount = 0;
var mode = sessionStorage.getItem("mode");

loadData(mode, pageCount, windowSize);

document.querySelector("#load-more-button").onclick = function(){
    loadingButtonOn();
    pageCount += windowSize;
    if(filterOn){
        loadFilteredData(mode, pageCount, windowSize, filterParams);
    } else {
        loadData(mode, pageCount, windowSize);
    }
}

function loadingButtonOn(){
    document.querySelector("#load-more-button").style.display = "none";
    document.querySelector("#spinner-bottom").style.display = "block";
}

function loadingButtonOff(){
    document.querySelector("#spinner-bottom").style.display = "none";
    document.querySelector("#load-more-button").style.display = "block";
}

// $('main').scroll(function(){
//     console.log(`ScrollTop: ${$('main').scrollTop()}, MainHeight: ${$('main').height()}, ListHeight: ${$('#obj-list').height()}`)
//     if($('main').scrollTop() >= $('#obj-list').height() - $(document).height()){
//         pageCount += windowSize;
//         if(filterOn){
//             loadFilteredData(mode, pageCount, windowSize, filterParams);
//         } else {
//             loadData(mode, pageCount, windowSize);
//         }
//     }
// });