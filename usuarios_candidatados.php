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
            <a class="nav-link" href="login_empresa.php"> Área Empresa <span class="sr-only">(current)</span></a>
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

  $id_empresa = $_GET['id'];
  $sql = "select usuario_id, vaga_id, empresa_id,
                 (select nome from USUARIOS where id = usuario_id ) as nome_usuario,
                 (select email from USUARIOS where id = usuario_id ) as email_usuario,
                 (select nro_telefone from USUARIOS where id = usuario_id ) as telefone_usuario,
                 (select titulo from VAGAS where id = vaga_id ) as titulo_vaga,
                 (select tipo from VAGAS where id = vaga_id ) as tipo_vaga
            from CANDIDATURAS C, VAGAS V 
           where C.vaga_id = V.id
             and V.empresa_id = $id_empresa
           order by titulo_vaga, nome_usuario";

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
            <th colspan=6 >Usuários candidatados às suas vagas</th>
          </tr>
          <tr>
            <th>Vaga</th>
            <th>Candidato</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Tipo</th>
          </tr>
        <thead>";

  while($row = mysqli_fetch_assoc($limite)){
    if($row['tipo_vaga']=='EMP'){
      $tipo = 'Emprego';
    }elseif($row['tipo_vaga']=='VOL'){
      $tipo = 'Voluntário';
    }elseif($row['tipo_vaga']=='EST'){
      $tipo = 'Estágio';
    }else{
      $tipo = 'Outro';
    }

    //......Imprime dados dos usuários candidatados    
    echo "<tbody>";
	  echo "<tr>";
	  echo "<td>" .$row['titulo_vaga'] ."</td>";
	  echo "<td>" .$row['nome_usuario'] ."</td>";
	  echo "<td>" .$row['email_usuario'] ."</td>";
	  echo "<td>" .$row['telefone_usuario'] ."</td>";
    echo "<td>" .$tipo ."</td>";

	  echo "</tr>";
	  echo "</tbody>";
  }
  echo"</table>";

  //...Criação do botões "Anterior e próximo"
  $anterior = $pc -1;
  $proximo = $pc +1;
  if($pc>1){
    echo "<a class='btn btn-primary' href='?id=$id_empresa&pagina=$anterior'><- Anterior</a> ";
  }
  //echo "|";
  if($pc<$tp){
    echo "<a class='btn btn-primary' href='?id=$id_empresa&pagina=$proximo'>Próxima -></a>";
  }
  
  //echo "</div>";
  echo "</div>";

  //......Botões de cadastrar e voltar para Area da Empesa
  echo "<div class='container'>";
  echo "<hr>";
  echo "<a class='btn btn-primary' href='area_empresa.php'> Voltar para Área Empresa</a>";
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