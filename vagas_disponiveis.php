<?php
  include 'inicia_session.php';
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
          </li>
          <li class="nav-item">
            <a class="nav-link" href="logout.php"> Sair <span class="sr-only">(current)</span></a>
          </li>          
        </ul>
      </div>
    </nav>

<?php
  require 'conecta_bd.php';

  $sql = "select * from VAGAS";
  $registros_por_pagina = 5;  

  //......informa em qual página da paginação se encontra
  $pagina=$_GET['pagina'];
  if(!$pagina){
    $pc = "1";
  }else{
  $pc = $pagina;
  }

  //......Determina o valor inicial das buscas limitadas
  $inicio = $pc - 1;
  $inicio = $inicio * $registros_por_pagina;

  //......Seleciona os dados
  $limite = mysqli_query($conn, "$sql LIMIT $inicio,$registros_por_pagina");
  $todos = mysqli_query($conn, "$sql");
 
  $tr = mysqli_num_rows($todos); // verifica o número total de registros
  $tp = $tr / $registros_por_pagina; // verifica o número total de páginas

  echo "<div class='container'>";
  //echo "<div class='row'>";
  
  echo"<table class='table table-sm'>
        <thead class='thead-light'>
          <tr align='center'>
            <th colspan=6 >Vagas Disponíves</th>
          </tr>
          <tr>
            <th>Id</th>
            <th>Título</th>
            <th>Descrição</th>
            <th>Tipo</th>
            <th>Situação</th>
            <th>Operação</th>
          </tr>
        <thead>";

  while($row_vaga = mysqli_fetch_assoc($limite)){
    if($row_vaga['tipo']=='EMP'){
      $tipo = 'Emprego';
    }elseif($row_vaga['tipo']=='VOL'){
      $tipo = 'Voluntário';
    }elseif($row_vaga['tipo']=='EST'){
      $tipo = 'Estágio';
    }else{
      $tipo = 'Outro';
    }
    
    $id_vaga = $row_vaga['id'];
    $id_empresa = $row_vaga['empresa_id'];

    //......Verifica se usuário está candidatado à vaga
    
    //......Busca id do usuário
    $sql_1 = "select id from USUARIOS where email = '$email_logado' and tipo = 'U'";
    $resultado_1 = mysqli_query($conn, $sql_1);
    $row_usuario = mysqli_fetch_assoc($resultado_1);
    $id_usuario = $row_usuario['id'];

    echo "<tbody>";
    echo "<tr>";
    echo "<td>" .$row_vaga['id'] ."</td>";
    echo "<td>" .$row_vaga['titulo'] ."</td>";
    echo "<td>" .$row_vaga['descricao'] ."</td>";
    echo "<td>" .$tipo ."</td>";

    //......Verifica se existe registro da vaga e usuário
    $sql_2 = "select * from CANDIDATURAS where vaga_id = $id_vaga and usuario_id = $id_usuario "; 
    $resultado_2 = mysqli_query($conn, $sql_2);
    $count = mysqli_num_rows($resultado_2);
    $row_candidatura = mysqli_fetch_assoc($resultado_2);

      //......Só mostra o Candidatar-se se não existir registro na tabela candidatura para o usuário e a vaga
    if($count == 0){
      echo "<td width=10%><font color='red'>Candidate-se</font></td>";
      echo "<td width=10%><a class='btn btn-primary' href='candidatar_vaga.php?id=$row_vaga[id]&idusu=$id_usuario&idemp=$id_empresa&pagina=$pagina'> Candidatar-se </a></td>";
    }else{
      echo "<td><font color='green'>Candidatado</font></td>";
      echo "<td width=10%><a class='btn btn-primary' href='delete_candidatura.php?id=$row_candidatura[vaga_id]&idusu=$row_candidatura[usuario_id]&pag=vdisp&pagina=$pagina'> Desfazer Candidatura </a></td>";
  }

	  echo "</tr>";
	  echo "</tbody>";
  }
  echo"</table>";

  //...Criação do botões "Anterior e próximo"
  $anterior = $pc -1;
  $proximo = $pc +1;
  if($pc>1){
    echo "<a class='btn btn-primary' href='?pagina=$anterior'><- Anterior</a> ";
  }
  if($pc<$tp){
    echo "<a class='btn btn-primary' href='?pagina=$proximo'>Próxima -></a>";
  }
  
  //echo "</div>";
  echo "</div>";

  //......Botões de cadastrar e voltar para Area da Empesa
  echo "<div class='container'>";
  echo "<hr>";
  echo "<a class='btn btn-primary' href='area_usuario.php'> Voltar para Área Usuário</a>";
  echo "<br><br>";
  echo "</div>";

  mysqli_close($conn);
  ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="./index_files/jquery-3.3.1.slim.min.js.download" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="./index_files/popper.min.js.download"></script>
    <script src="./index_files/bootstrap.min.js.download"></script>

  </body>
</html>