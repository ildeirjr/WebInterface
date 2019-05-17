var dialog = document.querySelector('dialog');
var filterButton = document.querySelector("#filter-button");

function toggleFilterButtonOn(){
    filterButton.style.backgroundColor = "red";
    filterButton.style.color = "white";
    filterButton.querySelector('i').innerHTML = "close";
    document.querySelector("#obj-list").style.display = "none";
    document.querySelector("#div-spinner").style.display = "block";
    document.querySelector("#load-more-button").style.visibility = "visible";
}

function toggleFilterButtonOff(){
    filterButton.style.backgroundColor = "rgb(238,255,65)";
    filterButton.style.color = "black";
    filterButton.querySelector('i').innerHTML = "filter_list";
    document.querySelector("#div-spinner").style.display = "none";
    document.querySelector("#obj-list").style.display = "block";
    document.querySelector("#load-more-button").style.visibility = "visible";
}

if (! dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
}
filterButton.addEventListener('click', function() {
    if(!filterOn){
        dialog.showModal();
    } else {
        loadingButtonOn();
        clearList();
        loadData(pageCount, windowSize);
        toggleFilterButtonOff();
        filterOn = false;
    }
});
dialog.querySelector('.close').addEventListener('click', function() {
    dialog.close();
});
dialog.querySelector('#filter-ok-button').addEventListener('click', function() {
    $('#form-filter').submit();
    toggleFilterButtonOn();
});

let nameCheckbox = document.querySelector("#name-checkbox");
let dateCheckbox = document.querySelector("#date-checkbox");
let deptoCheckbox = document.querySelector("#depto-checkbox");

let nameFields = document.querySelector("#filter-name-fields");
let dateFields = document.querySelector("#filter-date-fields");
let deptoFields = document.querySelector("#filter-depto-fields");

document.forms["form-filter"]["start_date"].valueAsDate = new Date();
document.forms["form-filter"]["end_date"].valueAsDate = new Date();

nameCheckbox.onclick = function(){
    if(nameCheckbox.checked){
        nameFields.style.display = "block";
    } else {
        nameFields.style.display = "none";
    }
}

dateCheckbox.onclick = function(){
    if(dateCheckbox.checked){
        dateFields.style.display = "block";
    } else {
        dateFields.style.display = "none";
    }
}

deptoCheckbox.onclick = function(){
    if(deptoCheckbox.checked){
        deptoFields.style.display = "block";
    } else {
        deptoFields.style.display = "none";
    }
}

var filterParams;
var filterOn = false;

$('#form-filter').submit(function(e) {
    e.preventDefault();
    dialog.close();

    filterOn = true;

    let that = $(this),
        data = {};

    that.find('[name]').each(function(index, value){
        let that = $(this),
            name = that.attr('name');
            value = that.val();

        data[name] = value;
    });

    if(!nameCheckbox.checked){
        data['name'] = "";
    }
    if(!dateCheckbox.checked){
        data['start_date'] = "";
        data['end_date'] = "";
    }
    if(!deptoCheckbox.checked){
        data['depto'] = "";
    }

    filterParams = JSON.stringify(data);

    clearList();
    loadFilteredData(pageCount, windowSize, filterParams);
});