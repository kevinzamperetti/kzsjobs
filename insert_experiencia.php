<?php
  require 'conecta_bd.php';
  include 'inicia_session.php';

  //var_dump($_POST);    

  //......Busca id do usuário
  $sql = "select id from USUARIOS where email = '$email_logado' and tipo = 'U'";
  $resultado = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($resultado);
  $id = $row['id'];

  //......insere dados no banco...
  $tipo='$_POST[tipo]';
  $tipo = substr("$_POST[tipo]",0,3);
  
  $sql = "insert into EXPERIENCIAS(local, descricao, usuario_id, tipo) 
               values('$_POST[local]', '$_POST[descricao]', $id, '$tipo')";

  //......Ver o que está sendo passado no sql 
  //  echo $sql;
  
  if(!mysqli_query($conn, $sql))
    die('Erro ao cadastrar vaga: ' .mysqli_error($conn));
  mysqli_close($conn);
  header('Location: area_usuario.php');
?>
