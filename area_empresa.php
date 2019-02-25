<?php 
  include 'inicia_session.php';
  require 'conecta_bd.php';

  //......Busca dados da empresa
  $sql = "select id, nome from USUARIOS where email = '$email_logado' and tipo = 'E'";
  $resultado = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($resultado);
  $id = $row['id'];
  $nome = $row['nome'];
?>

<!DOCTYPE html>
<!-- saved from url=(0061)https://getbootstrap.com/docs/4.1/examples/starter-template/# -->
<html lang="pt">
  <head>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/K.png">

    <title>KZS Jobs</title>

    <!-- Bootstrap core CSS -->
    <link href="./index_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./index_files/starter-template.css" rel="stylesheet">
    <script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script>
  </head>

  <body>

    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
      <a class="navbar-brand" href="index.php"> KZS Jobs </a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
          <li class="nav-item inactive">
            <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="login_empresa.php"> Área Empresa <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"> Sair <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <!--<main role="main" class="container">

      <div class="starter-template">
        <h4>Olá <?= $nome?>, seja bem vindo! </h4>
      </div>

    </main> /.container -->

    <div class="container" align="center">
      <div class="row">
        <div class="col" align="center">
          <h4>Olá <?= $nome?>, seja bem vindo! </h4>
        </div>
      </div>
    </div>
    <br>

    <!-- Opções da area da empresa -->
    <div class="container">
    <div class="row">
        <div class="col">Cadastrar vagas</div>
        <div class="col" align="right">
          <a class='btn btn-primary' href='cadastrar_vaga.php' role='button'>Clique aqui</a> 
        </div>
      </div>
    <hr>
      <div class="row">
        <div class="col">Manutenção das vagas cadastradas</div>
        <div class="col" align="right">
          <a class='btn btn-primary' href='vagas_cadastradas.php?id=<?= $id ?>&pagina=1' role='button'>Clique aqui</a> 
        </div>
      </div>
    <hr>
      <div class="row">
        <div class="col">Visualizar usuários candidatados às vagas</div>
        <div class="col" align="right">
          <a class='btn btn-primary' href='usuarios_candidatados.php?id=<?= $id ?>&pagina=1' role='button'>Clique aqui</a> 
        </div>
      </div>
    <hr>
      <div class="row">
        <div class="col">Alterar cadastro</div>
        <div class="col" align="right">
          <a class='btn btn-primary' role='button' href='alterar_cadastro_empresa.php?id=<?= $id ?>' >Clique aqui</a> 
        </div>
      </div>    
    <hr>
      <div class="row">
        <div class="col">Excluir cadastro</div>
        <div class="col" align="right">
        <a class='btn btn-primary' role='button' href='delete_cadastro.php?id=<?= $id ?>' >Clique aqui</a> 
        </div>
      </div>          
    </div>    

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./index_files/jquery-3.3.1.slim.min.js.download" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./index_files/popper.min.js.download"></script>
    <script src="./index_files/bootstrap.min.js.download"></script>
  

</body>
</html>