function showDialog(dialogTitle, dialogMsg){
    let dialog = document.querySelector("dialog");
    document.querySelector(".close").addEventListener('click', function() {
        dialog.close();
    });

    document.querySelector(".mdl-dialog__title").innerHTML = dialogTitle;
    document.querySelector("#dialog-msg").innerHTML = dialogMsg;
    dialog.showModal();
}