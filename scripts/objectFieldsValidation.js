function dataValidation(){

    let idField = document.querySelector("#id-field");
    let idInput = document.forms["form-cadastro"]["codigo"];

    let nameField = document.querySelector("#name-field");
    let nameInput = document.forms["form-cadastro"]["nome"];

    let dateField = document.querySelector("#date-field");
    let dateInput = document.forms["form-cadastro"]["data_entrada"];

    let responsibleField = document.querySelector("#responsible-field");
    let responsibleInput = document.forms["form-cadastro"]["quem_recebeu"];

    let noteField = document.querySelector("#note-field");
    let noteInput = document.forms["form-cadastro"]["nota"];

    let roomField = document.querySelector("#room-field");
    let roomInput = document.forms["form-cadastro"]["sala"];

    idInput.oninput = function(){
        document.querySelector("#id-error-msg").innerHTML = "Este campo só pode conter números";
    }
    if(idInput.value == ""){
        idField.classList.add("is-invalid");
        document.querySelector("#id-error-msg").innerHTML = "Este campo não pode ser vazio";
    }
    if(nameInput.value == ""){
        nameField.classList.add("is-invalid");
    }
    if(dateInput.value == ""){
        dateField.classList.add("is-invalid");
    }
    if(responsibleInput.value == ""){
        responsibleField.classList.add("is-invalid");
    }
    noteInput.oninput = function(){
        document.querySelector("#note-error-msg").innerHTML = "Este campo só pode conter números";
    }
    if(noteInput.value == ""){
        noteField.classList.add("is-invalid");
        document.querySelector("#note-error-msg").innerHTML = "Este campo não pode ser vazio";
    }
    if(roomInput.value == ""){
        roomField.classList.add("is-invalid");
    }

    let inputFields = [idField, nameField, dateField, responsibleField, noteField, roomField];

    let hasInvalidField = false;

    inputFields.forEach(element => {
        if(element.classList.contains("is-invalid")){
            hasInvalidField = true;
            return;
        }
    });

    if(!hasInvalidField){
        document.forms["form-cadastro"].submit();
    }
}