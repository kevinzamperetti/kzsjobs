<?php
  require 'conecta_bd.php';

  //var_dump($_POST);    

  if(isset($_POST['btnAlterar']))
  {

  //......verifica se email já cadastrado e gera mensagem de alerta se não existe...
  $sql = "select email, tipo from USUARIOS where email = '$_POST[email]'";
  $resultado = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($resultado);
  $tipo = $row['tipo'];  
  $count = mysqli_num_rows($resultado);
  
  //......testa se e-mail já foi cadastrado
  if($count == 0){
	  //echo("Endereço de email '$_POST[email]' não cadastrado!");
    echo "<script>alert(\"Endereço de email '$_POST[email]' não cadastrado!\");</script>";
  }

  //......altera senha do usuário no banco...
//  $hash = crypt('$_POST[senha]', '');
//  $hash = crypt('$_POST[senha]', '$5$static_salt');

  $senha = $_POST['senha'];
  $custo = '08';
  $salt = 'Cf1f11ePArKlBJomM0F6aJ';
 
  // Gera um hash baseado em bcrypt
  $hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');



//  $sql_update = "update USUARIOS set senha = '$_POST[senha]' where email = '$_POST[email]'";
  $sql_update = "update USUARIOS set senha = '$hash' where email = '$_POST[email]'";
  $resultado = mysqli_query($conn, $sql_update);

  //......Ver o que está sendo passado no sql 
  //  echo $sql;

  if(!mysqli_query($conn, $sql))
    die('Erro ao alterar sua senha. Tente novamente! ' .mysqli_error($conn));

  if($count > 0){
    if($tipo == 'E')
      header('Location: login_empresa.php');
    else
      header('Location: login_usuario.php');    
  }
  mysqli_close($conn);

  }
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
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
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
                <li class="nav-item inactive">
                    <a class="nav-link" href="login_usuario.php"> Área Usuário <span class="sr-only">(current)</span></a>
                </li>
            </ul>
        </div>
    </nav>

    <main role="main" class="container">
        <div class="starter-template">
            <h2>Esqueceu sua senha?</h2>
            <h6>Não se preocupe. Informe seu e-mail cadastrado e a nova senha!</h6>
        </div>

        <!--Formulário de alteração de senha-->
        <form class="col-sm-4 offset-md-4" action="esqueceu_senha.php" method="POST">
            <div class="form-group">
                <label for="InputEmail">E-mail</label>
                <input type="email" class="form-control" id="InputEmail" name="email" aria-describedby="emailHelp"
                    placeholder="Informe o e-mail">
            </div>
            <div class="form-group">
                <label for="InputSenha">Nova senha</label>
                <input type="password" class="form-control" id="InputSenha" name="senha" placeholder="Senha">
            </div>
            <button type="submit" name="btnAlterar" class="btn btn-primary">Alterar senha</button>
        </form>

    </main><!-- /.container -->

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./index_files/jquery-3.3.1.slim.min.js.download" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
        crossorigin="anonymous"></script>
    <script>
        window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')
    </script>
    <script src="./index_files/popper.min.js.download"></script>
    <script src="./index_files/bootstrap.min.js.download"></script>

</body>

</html>