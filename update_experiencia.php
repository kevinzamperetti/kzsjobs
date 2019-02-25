<?php
  include 'inicia_session.php';
  require 'conecta_bd.php';

  //......recebe id que deseja excluir
  $id = $_GET['id'];
  $local = $_POST['local'];
  $descricao = $_POST['descricao'];
  $tipo = $_POST['tipo'];

//  var_dump($_POST);  
//  echo "id $id";
  
  $sql_update = "update EXPERIENCIAS 
                    set local = '$local', descricao = '$descricao', tipo = '$tipo'
                  where id = $id";
//  echo $sql_update;  
  $resultado = mysqli_query($conn, $sql_update);

  $sql = "select usuario_id from EXPERIENCIAS where id = $id";
//  echo $sql;
  $resultado = mysqli_query($conn, $sql_update);
  $row = mysqli_fetch_assoc($resultado);  
  $empresa_id=$row[empresa_id];

  header('Location: area_usuario.php');
  mysqli_close($conn);
?>