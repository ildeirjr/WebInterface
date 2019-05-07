function dataValidation(){

    let nameField = document.querySelector("#name-field");
    let nameInput = document.forms["form-cadastro"]["nome"];

    let emailField = document.querySelector("#email-field");
    let emailInput = document.forms["form-cadastro"]["email"];

    let passwordField = document.querySelector("#password-field");
    let passwordInput = document.forms["form-cadastro"]["senha"];

    let dateField = document.querySelector("#date-field");
    let dateInput = document.forms["form-cadastro"]["data_nasc"];

    let deptoField = document.querySelector("#depto-field");
    let deptoInput = document.forms["form-cadastro"]["depto"];

    if(nameInput.value == ""){
        nameField.classList.add("is-invalid");
    }
    if(emailInput.value == ""){
        document.querySelector("#email-error-msg").innerHTML = "Este campo não pode ser vazio"
        emailField.classList.add("is-invalid");
    }
    emailInput.onkeypress = function() {
        document.querySelector("#email-error-msg").innerHTML = "Endereço de e-mail inválido"
    }
    if(typeof passCheckbox !== 'undefined' && passCheckbox.checked){
        if(passwordInput.value == ""){
            passwordField.classList.add("is-invalid");
        }
    }
    if(dateInput.value == ""){
        dateField.classList.add("is-invalid");
    }
    if(deptoInput.value == ""){
        deptoField.classList.add("is-invalid");
    }

    let inputFields = [nameField, emailField, passwordField, dateField, deptoField];

    let hasInvalidField = false;

    inputFields.forEach(element => {
        if(element.classList.contains("is-invalid")){
            hasInvalidField = true;
            return;
        }
    });

    if(!hasInvalidField){
        $('#form-cadastro').submit();
    }
}