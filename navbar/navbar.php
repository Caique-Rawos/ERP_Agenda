<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
<script src="https://kit.fontawesome.com/f4bd964e32.js" crossorigin="anonymous"></script>
<style>
  .main-content{
    width: 50%;
    margin: auto;
  }

  @media only screen and (max-width: 700px) {
    .main-content{
        width: 96%;
    }
  }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-light main-content">
  <div class="container-fluid">
    <a class="navbar-brand" href="index.php">Menu</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Cadastros
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="index.php?r=criar_login">Usuario</a></li>
            <li><a class="dropdown-item" href="index.php?r=cad_prod">Produto/Serviço</a></li>
            <li><a class="dropdown-item" href="index.php?r=cad_receber">Contas a Receber</a></li>
            <li><a class="dropdown-item" href="index.php?r=cad_pagar">Contas a Pagar</a></li>
          </ul>
        </li>
      </ul>
      <form class="d-flex">
      <i id='logout' class="p-4 fa-solid fa-right-from-bracket fa-xl" onclick='if(confirm("Deseja sair do sistema?")) window.location.href = "logout/logout.php";'></i>
        <input class="form-control me-2" type="search" placeholder="Tela" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Acessar</button>
      </form>
    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>