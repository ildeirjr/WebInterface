var dialog = document.querySelector('dialog');
var filterButton = document.querySelector("#filter-button");
if (! dialog.showModal) {
    dialogPolyfill.registerDialog(dialog);
}
filterButton.addEventListener('click', function() {
    dialog.showModal();
});
dialog.querySelector('.close').addEventListener('click', function() {
    dialog.close();
});
dialog.querySelector('#filter-ok-button').addEventListener('click', function() {
    $('#form-filter').submit();
});

let nameCheckbox = document.querySelector("#name-checkbox");
let localCheckbox = document.querySelector("#local-checkbox");
let dateCheckbox = document.querySelector("#date-checkbox");
let stateCheckbox = document.querySelector("#state-checkbox");

let nameFields = document.querySelector("#filter-name-fields");
let localFields = document.querySelector("#filter-local-fields");
let dateFields = document.querySelector("#filter-date-fields");
let stateFields = document.querySelector("#filter-state-fields");

document.forms["form-filter"]["start_date"].valueAsDate = new Date();
document.forms["form-filter"]["end_date"].valueAsDate = new Date();

nameCheckbox.onclick = function(){
    if(nameCheckbox.checked){
        nameFields.style.display = "block";
    } else {
        nameFields.style.display = "none";
    }
}

localCheckbox.onclick = function(){
    if(localCheckbox.checked){
        localFields.style.display = "block";
    } else {
        localFields.style.display = "none";
    }
}

dateCheckbox.onclick = function(){
    if(dateCheckbox.checked){
        dateFields.style.display = "block";
    } else {
        dateFields.style.display = "none";
    }
}

stateCheckbox.onclick = function(){
    if(stateCheckbox.checked){
        stateFields.style.display = "block";
    } else {
        stateFields.style.display = "none";
    }
}

$('#form-filter').submit(function(e) {
    e.preventDefault();
    dialog.close();

    let that = $(this),
        url = "http://"+Url.url+"filter/",
        type = 'get',
        header = {"Authorization": localStorage.getItem("token")},
        data = {};

    that.find('[name]').each(function(index, value){
        let that = $(this),
            name = that.attr('name');
            value = that.val();

        data[name] = value;
    });

    console.log(data);

    $.ajax({
        url: url,
        type: type,
        headers: header,
        data: {
            'mode': 'non_deleted',
            'num_page': pageCount,
            'window_size': windowSize,
            'filter_params': JSON.stringify(data)
        }
    }).done(function(response){
        console.log(response);
    });

    

});