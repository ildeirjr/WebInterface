function selectModeOn(){
    let actionBtn;
    actionBtn = document.querySelector("#delete-button");
    let header = document.querySelector("header");
    let headerTitle = document.querySelector(".mdl-layout-title");

    header.style.backgroundColor = "grey";
    actionBtn.style.display = "block";
    headerTitle.innerHTML = indexArray.length;
    filterButton.style.display = "none";
}

function selectModeOff(){
    let actionBtn;
    actionBtn = document.querySelector("#delete-button");
    let header = document.querySelector("header");
    let headerTitle = document.querySelector(".mdl-layout-title");

    header.style.backgroundColor = "rgb(0,150,136)";
    actionBtn.style.display = "none";
    headerTitle.innerHTML = "Ubspaces";
    filterButton.style.display = "block";
}

function compare(a,b) {
    if (a.index < b.index)
      return -1;
    if (a.index > b.index)
      return 1;
    return 0;
  }

var indexArrayCopy;

var deleteBtn = document.querySelector("#delete-button");
deleteBtn.onclick = function() {
    indexArray.sort(compare);
    console.log(indexArray);
    for(i = indexArray.length - 1; i >= 0; i--){
        indexArray[i].html = list.removeChild(list.childNodes[indexArray[i].index]);
    }
    indexArrayCopy = indexArray;
    console.log(indexArrayCopy);
    indexArray = [];
    selectModeOff();

    let handler = function () {
        clearTimeout(deleteTimeOut);
        indexArrayCopy.forEach((element) => {
            list.insertBefore(element.html, list.childNodes[element.index]);
            $(list.childNodes[element.index].childNodes[0].childNodes[0]).prop('checked', false);
            list.childNodes[element.index].childNodes[0].classList.remove("is-checked");
            
        });
    }

    let snackbarContainer = document.querySelector('#snackbar');
    let data = {
        message: 'Operadores excluídos',
        timeout: 2000,
        actionHandler: handler,
        actionText: 'Desfazer'
    };
    snackbarContainer.MaterialSnackbar.showSnackbar(data);
    let deleteTimeOut = setTimeout(deleteItems, 2100);
}

function deleteItems() {
    indexArrayCopy.forEach((element) => {
        console.log("EMAIL: "+element.id);
        $.ajax({
            url: "http://"+Url.url+"deleteOperator/",
            type: 'post',
            headers: {"Authorization": localStorage.getItem("token")},
            data: {
                "email": element.id
            },
            cache: false
        }).done();
    });
}