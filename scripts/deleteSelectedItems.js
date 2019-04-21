function selectModeOn(){
    let actionBtn;
    if(sessionStorage.getItem("mode") == "non_deleted"){
        actionBtn = document.querySelector("#delete-button");
    } else {
        actionBtn = document.querySelector("#restore-button");
    }
    let header = document.querySelector("header");
    let headerTitle = document.querySelector(".mdl-layout-title");

    header.style.backgroundColor = "grey";
    actionBtn.style.display = "block";
    headerTitle.innerHTML = indexArray.length;
    filterButton.style.display = "none";
}

function selectModeOff(){
    let actionBtn;
    if(sessionStorage.getItem("mode") == "non_deleted"){
        actionBtn = document.querySelector("#delete-button");
    } else {
        actionBtn = document.querySelector("#restore-button");
    }
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

var deleteBtn = document.querySelector("#delete-button");
deleteBtn.onclick = function() {
    indexArray.sort(compare);
    console.log(indexArray);
    for(i = indexArray.length - 1; i >= 0; i--){
        list.removeChild(list.childNodes[indexArray[i].index]);
    }
    indexArray = [];
    selectModeOff();
}

var restoreBtn = document.querySelector("#restore-button");
restoreBtn.onclick = function() {
    
}