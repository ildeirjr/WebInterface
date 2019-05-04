function addElement(item, listIndex){
    var li = document.createElement('li');
    li.setAttribute("class","mdl-list__item mdl-list__item--two-line");
    li.onclick = function(){
        sessionStorage.setItem("objData", JSON.stringify(item));
        window.location.href = "editOperator.php";
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

    var i = document.createElement('i');
    i.setAttribute("class","material-icons mdl-list__item-avatar");
    i.innerHTML = "person";

    var primaryContent = document.createElement('span');
    primaryContent.setAttribute("class","mdl-list__item-primary-content");

    var itemName = document.createElement('span');
    itemName.innerHTML = item.nome;

    var itemId = document.createElement('span');
    itemId.setAttribute("class","mdl-list__item-sub-title");
    itemId.innerHTML = "Email: " + item.email + " - " + "Departamento: " + item.depto;

    var secondaryContent = document.createElement('span');
    secondaryContent.setAttribute("class","mdl-list__item-secondary-content");

    var itemDate = document.createElement('span');
    itemDate.setAttribute("class","mdl-list__item-secondary-info");
    itemDate.innerHTML = new Date(item.data_nasc).toLocaleDateString("pt-BR");

    primaryContent.appendChild(i);
    primaryContent.appendChild(itemName);
    primaryContent.appendChild(itemId);

    secondaryContent.appendChild(itemDate);

    li.appendChild(chkBoxLabel);
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

function loadData(page, windowSize){
    $.ajax({
        url: `http://${Url.url}listOperators/?num_page=${page}&window_size=${windowSize}`,
        type: 'get',
        headers: {
            "Authorization": localStorage.getItem("token")
        },
        cache: false,
        async: false
    }).done(function(response){
        appendArrayToList(JSON.parse(response));
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
        }
    }).done(function(response){
        appendArrayToList(JSON.parse(response));
    });
}

const windowSize = 15;
var pageCount = 0;

loadData(pageCount, windowSize);

// document.querySelector("#load-more-button").onclick = function(){
//     pageCount += windowSize;
//     loadData("non_deleted", pageCount, windowSize);
// }

$('main').scroll(function(){
    //console.log(`ScrollTop: ${$('main').scrollTop()}, MainHeight: ${$('main').height()}, ListHeight: ${$('#obj-list').height()}`)
    if($('main').scrollTop() >= $('#obj-list').height() - $(document).height()){
        pageCount += windowSize;
        if(filterOn){
            loadFilteredData(mode, pageCount, windowSize, filterParams);
        } else {
            loadData(pageCount, windowSize);
        }
    }
});