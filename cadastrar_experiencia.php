<?php
  include 'inicia_session.php';
  require 'conecta_bd.php';

  //......recebe id que deseja excluir
  $id = $_GET['id'];
  $sql_select = "select id, nome, email, endereco, sexo, data_nasc from USUARIOS where id = $id";
  
  $resultado = mysqli_query($conn, $sql_select);
  $row = mysqli_fetch_assoc($resultado);  

  $ano = substr($row['data_nasc'],0,4);
  $mes = substr($row['data_nasc'],5,2);
  $dia = substr($row['data_nasc'],8,2);
//  echo $ano;
//  echo $mes;
//  echo $dia;

  mysqli_close($conn);

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
            <a class="nav-link" href="index.php"> Home </a>
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

    <main role="main" class="container">
      <div class="starter-template">
        <h2>Cadastro de Experiências</h2>        
      </div>

      <!--Formulário de cadastro de vaga-->
      <form class="col-sm-6 offset-md-4" action="insert_experiencia.php" method="POST">
        <div class="form-row">
          <div class="col-md-10 mb-3">
            <label for="validationTipo">Tipo:</label>
            <select class="form-control" id="validationTipo" name="tipo" value="" required>
              <option>EDU-Educação</option>
              <option>EMP-Emprego</option>
              <option>EST-Estágio</option>
              <option>VOL-Voluntário</option>
              <option>OTR-Outro</option>
            </select>
          </div>        
			    <div class="col-md-10 mb-3">
				    <label for="validationLocal">Local:</label>
            <input type="text" class="form-control" id="validationLocal" name="local" placeholder="Local" value="" required>
          </div>
				  <div class="col-md-10 mb-3">
            <label for="validationDescricao">Descrição:</label>
            <textarea class="form-control" id="validationDescricao" name="descricao" placeholder="Descrição da experiência" value="" rows="10" required></textarea>
          </div>
        </div>
			  <input type="submit" name="btnCadastrar" value="Cadastrar" class="btn btn-primary" />
        <a class='btn btn-primary' href='area_empresa.php'> Cancelar </a>
        <div class="form-row">
          <div class="col-md-10 mb-3">
            <br>
            <!--<a class='btn btn-primary' href='area_empresa.php' role='button'>Voltar</a>-->
          </div>
        </div>
      </form>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./index_files/jquery-3.3.1.slim.min.js.download" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./index_files/popper.min.js.download"></script>
    <script src="./index_files/bootstrap.min.js.download"></script>

    </body>
</html>