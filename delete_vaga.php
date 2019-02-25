<?php
  include 'inicia_session.php';
  require 'conecta_bd.php';

  //......recebe id que deseja excluir
  $id = $_GET['id'];
  //$id_empresa = $_GET['id_emp'];

  $sql_delete = "delete from VAGAS where id = $id";
  $resultado = mysqli_query($conn, $sql_delete);

//  echo "$sql_delete";

    if(!mysqli_query($conn, $sql_delete))
       die('Erro ao excluir vaga. Tente novamente! ' .mysqli_error($conn));
  header('Location: area_empresa.php');
  mysqli_close($conn);

?>