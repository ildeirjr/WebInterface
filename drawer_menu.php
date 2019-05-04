<div class="mdl-layout__drawer">
    <header class="demo-drawer-header">
      <img src="images/user.jpg" class="demo-avatar">
      <div class="demo-avatar-dropdown">
        <span id="user-name-text"></span>
        <div class="mdl-layout-spacer"></div>
        <button id="accbtn" class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-button--icon">
          <i class="material-icons" role="presentation">arrow_drop_down</i>
          <span class="visuallyhidden">Accounts</span>
        </button>
        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="accbtn">
          <li id="logout-button" class="mdl-menu__item">Sair</li>
        </ul>
      </div>
    </header>
    <nav class="mdl-navigation">
            <a href="home.php" class="mdl-navigation__link">Início</a>
            <a href="cadastrar.php" class="mdl-navigation__link">Cadastrar objetos</a>
            <a id="non-deleted-link" class="mdl-navigation__link">Listar objetos</a>
            <a id="deleted-link" class="mdl-navigation__link">Objetos excluídos</a>
            <a href="cadastrarOperador.php" id="add-operator-link" style="display: none;" class="mdl-navigation__link">Cadastrar operador</a>
            <a href="listOperators.php" id="list-operators-link" style="display: none;" class="mdl-navigation__link">Listar operadores</a>
    </nav>
</div>

<!-- <script src="Url.js"></script> -->
<script>

  document.querySelector("#non-deleted-link"). onclick = function(){
    sessionStorage.setItem("mode","non_deleted");
    document.location.href = "listObj.php";
  }

  document.querySelector("#deleted-link"). onclick = function(){
    sessionStorage.setItem("mode","deleted");
    document.location.href = "listObj.php";
  }

  console.log(localStorage.getItem("depto"));

  if(localStorage.getItem("admin") == "1"){
    document.querySelector("#add-operator-link").style.display = "block";
    document.querySelector("#list-operators-link").style.display = "block";
  }

  document.querySelector("#user-name-text").innerHTML = localStorage.getItem("nome");
  document.querySelector("#logout-button").onclick = function(){
    $.ajax({
      url: "http://"+Url.url+"clearUserToken/",
      type: 'post',
      headers: {
        "Authorization": localStorage.getItem("token")
      }
    }).done(function(response){
      if(response == "OK"){
        localStorage.clear();
        window.location.replace("index.php");
      }
    });
  }
</script>