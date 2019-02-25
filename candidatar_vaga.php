<?php
  require 'conecta_bd.php';
  include 'inicia_session.php';

  $id_vaga = $_GET['id']; 
  $id_usuario = $_GET['idusu'];
  $id_empresa = $_GET['idemp'];
  $pagina =  $_GET['pagina'];
  //......Insere candidatura

  $sql = "insert into CANDIDATURAS(usuario_id, vaga_id) 
               values($id_usuario, $id_vaga)";

  //......Ver o que está sendo passado no sql 
  echo $sql;

  if(!mysqli_query($conn, $sql))
    die('Erro ao se candidatar à vaga: ' .mysqli_error($conn));
  header('Location: vagas_disponiveis.php?pagina='.$pagina);

  mysqli_close($conn);
?>
