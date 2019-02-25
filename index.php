<!DOCTYPE html>
<!-- saved from url=(0061)https://getbootstrap.com/docs/4.1/examples/starter-template/# -->
<html lang="pt">
<head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    
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
          <li class="nav-item active">
            <a class="nav-link" href="index.php"> Home <span class="sr-only">(current)</span></a>
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
        <h1>Bem vindo à KZS Jobs</h1>
        <p class="lead">
          Aqui você irá encontrar diversas oportunidades de vagas para diversas áreas de atuação.<br>
          Encontrará oportunidades de estágios, voluntários e efetivos. Efetue o seu <a href='login_usuario.php'>login </a> para ver mais.<br>
          Se ainda não possui cadastro, não perca tempo, <a href='cadastrar_usuario.php'>cadastre-se já!</a> 
        </p>
        <p class="lead">
          És uma empresa e gostaria de cadastrar vagas em nosso site?<br>
          Efetue o seu <a href='login_empresa.php'>login</a> agora mesmo 
          ou efetue seu <a href='cadastrar_empresa.php'>cadastro!</a>
          <!--é rápido e fácil.-->
        </p>
      </div>
      <hr>
      <p class="lead">
        Algumas vagas cadastradas em nosso site:
      </p>

      <?php
      require 'conecta_bd.php';

      $sql = "select * from VAGAS order by RAND() LIMIT 0,3;";

      //......Seleciona os dados
      $resultado = mysqli_query($conn, $sql);

      while($row_vaga = mysqli_fetch_assoc($resultado)){
        if($row_vaga['tipo']=='EMP'){
          $tipo = 'Emprego';
        }elseif($row_vaga['tipo']=='VOL'){
          $tipo = 'Voluntário';
        }elseif($row_vaga['tipo']=='EST'){
          $tipo = 'Estágio';
        }else{
          $tipo = 'Outro';
        }
      
        /*//......Lista algumas vagas
        echo "<table>";
        echo "  <tr>";
        echo "    <td>" .$tipo ."</td>";        
        echo "  </tr>";
        echo "  <tr>";
        echo "    <td>" .$row_vaga['titulo'] ."</td>";        
        echo "  </tr>";
        echo "<table>";
        echo "  </br>";*/

        //......linha 1
        echo "<div class='container'>";
        echo "  <div class='row'>";
        echo "    <div class='col-sm'>";
//        echo        "<b>" .$tipo  .":" ."<br>" .$row_vaga['titulo'] ."</b>" ."<br>" .$row_vaga['descricao'];
        echo        "<b>" .$row_vaga['titulo'] ."</b>" ."<br>" .$row_vaga['descricao'];
        echo "    </div>";
        echo "  </div>";
        echo "</div>";
        echo "<br>";
      }

      mysqli_close($conn);
      header("Refresh:30");
      ?>
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