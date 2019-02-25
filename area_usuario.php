<?php 
  include 'inicia_session.php';
  require 'conecta_bd.php';

  //......Busca dados do usuário
  $sql = "select id, nome, sexo from USUARIOS where email = '$email_logado' and tipo = 'U'";
  $resultado = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($resultado);
  $id = $row['id'];
  $nome = $row['nome'];
  $sexo = $row['sexo'];
?>

<!DOCTYPE html>
<!-- saved from url=(0061)https://getbootstrap.com/docs/4.1/examples/starter-template/# -->
<html lang="pt-br">
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
            <a class="nav-link" href="login_usuario.php"> Área Usuário <span class="sr-only">(current)</span></a>
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
          <?php
           if($sexo=='F')
              echo "<h4>Olá $nome, seja bem vinda! </h4>";
          else
              echo "<h4>Olá $nome, seja bem vindo! </h4>"
          ?>
        </div>
      </div>
    </div>
    <br>

    <!-- Opções da area do usuário -->
    <div class="container">
    <div class="row">
        <div class="col">Visualizar vagas disponíveis</div>
        <div class="col" align="right">
          <a class='btn btn-primary' href='vagas_disponiveis.php?pagina=1' role='button'>Clique aqui</a> 
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">Visualizar vagas que você se candidatou</div>
        <div class="col" align="right">
          <a class='btn btn-primary' href='vagas_candidatadas.php?id=<?= $id ?>&pagina=1' role='button'>Clique aqui</a> 
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">Cadastrar dados de experiência</div>
        <div class="col" align="right">
          <a class='btn btn-primary' href='cadastrar_experiencia.php?id=<?= $id ?>' role='button'>Clique aqui</a> 
        </div>
      </div>
      <hr>
      <div class="row">
        <div class="col">Visualizar experiências cadastradas</div>
        <div class="col" align="right">
          <a class='btn btn-primary' href='experiencias_cadastradas.php?id=<?= $id ?>&pagina=1' role='button'>Clique aqui</a> 
        </div>
      </div>
      <hr>

      <div class="row">
        <div class="col">Alterar cadastro</div>
        <div class="col" align="right">
        <a class='btn btn-primary' role='button' href='alterar_cadastro_usuario.php?id=<?= $id ?>' >Clique aqui</a> 
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