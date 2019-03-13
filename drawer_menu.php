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
            <a href="cadastrar.php" class="mdl-navigation__link">Cadastrar objetos</a>
            <a href="#listar" class="mdl-navigation__link">Listar objetos</a>
            <a href="#" class="mdl-navigation__link">Objetos excluídos</a>
    </nav>
</div>

<!-- <script src="Url.js"></script> -->
<script>
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
        window.location.href = "login.php";
      }
    });
  }
</script>