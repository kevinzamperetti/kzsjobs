<?php
  //inicia a sessão
  session_start();

  //verificar se já existe a sessão
  if((!isset ($_SESSION['email']) == false) and
     (!isset ($_SESSION['senha']) == false) and
     (($_SESSION['tipo']) == "U"))
  {
      header('location:area_usuario.php');
  } 

  //testa conexão com o bd
  require 'conecta_bd.php';

  if(isset($_POST['btnEntrar']))
  {
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = "select senha from USUARIOS where email = '$_POST[email]' and tipo = 'U'";

    $resultado = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($resultado);
    $hash = $row['senha'];
    $count = mysqli_num_rows($resultado);
  
    //......gera mensagem se email não cadastrado
    if($count == 0){
      echo "<script>alert(\"Endereço de email '$_POST[email]' não encontrado!\");</script>";
    }else{

      //verifica se a senha informadda no formulário está correta
       if(crypt($senha, $hash) === $hash){
          $_SESSION['email'] = $email;
          $_SESSION['senha'] = $senha;
          $_SESSION['tipo'] = "U";
          //echo "<script>alert(\"Login realizado com sucesso!\");</script>";
          header('location:area_usuario.php');
      }
      else
      {
          unset ($_SESSION['email']);
          unset ($_SESSION['senha']);
          unset ($_SESSION['tipo']);
          //echo " Senha incorreta!";
          echo "<script>alert(\"Senha incorreta!\");</script>";
          //header('location:login_empresa.php');
      }
    }
  }
?>

<!DOCTYPE html>
<!-- saved from url=(0061)https://getbootstrap.com/docs/4.1/examples/starter-template/# -->
<html lang="pt"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="img/K.png">

    <title>KZS Jobs</title>

    <!-- Bootstrap core CSS -->
    <link href="./index_files/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="./index_files/starter-template.css" rel="stylesheet">
  <script src="chrome-extension://mooikfkahbdckldjjndioackbalphokd/assets/prompt.js"></script></head>

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
          <li class="nav-item inactive">
            <a class="nav-link" href="login_empresa.php"> Área Empresa <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="login_usuario.php"> Área Usuário <span class="sr-only">(current)</span></a>
          </li>
        </ul>
      </div>
    </nav>

    <main role="main" class="container">
      <div class="starter-template">
        <h2>Área do Usuário</h2>
      </div>

      <!--Formulário de login-->
      <form class="col-sm-4 offset-md-4" action="login_usuario.php" method="POST">
        <div class="form-group">
          <label for="InputEmail">E-mail</label>
          <input type="text" class="form-control" id="InputEmail" name="email" aria-describedby="emailHelp" placeholder="Informe o e-mail">
          <small id="emailHelp" class="form-text text-muted">Nós nunca vamos compartilhar seu e-mail com  ninguém.</small>
        </div>
        <div class="form-group">
          <label for="InputSenha">Senha</label>
          <input type="password" class="form-control" id="InputSenha" name="senha" placeholder="Senha">
        </div>
        <div class="form-group">
<!--          <a href="registro_usuario.php"> Registre-se! </a>-->
          <a href="esqueceu_senha.php"> Esqueceu sua senha? </a>          
        </div>
        <div class="container">
          <div class="row">
            <div class="col-sm">
              <button type="submit" name="btnEntrar" class="btn btn-primary">Entrar</button>
            </div>
            <div class="col-sm">
              <a class='btn btn-primary' href='cadastrar_usuario.php' role='button'>Cadastre-se</a> 
            </div>
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