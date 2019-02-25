<?php
  include 'inicia_session.php';
  require 'conecta_bd.php';

  //......recebe id que deseja excluir
  $id = $_GET['id'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $endereco = $_POST['endereco'];
  $telefone = $_POST['telefone'];
  $sexo = $_POST['sexo'];
  $data_fund = "'$_POST[ano_nasc]-$_POST[mes_nasc]-$_POST[dia_nasc]'"; 

  //var_dump($_POST);  

  $senha = $_POST['senha'];
  $custo = '08';
  $salt = 'Cf1f11ePArKlBJomM0F6aJ';

  // Gera um hash baseado em bcrypt
  $hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

  $sql_update = "update USUARIOS 
                    set nome = '$nome', email = '$email', endereco = '$endereco', 
                    nro_telefone = $telefone, sexo = '$sexo', data_nasc = $data_fund, senha = '$hash'
                  where id = $id";
  //echo $sql_update;  
  $resultado = mysqli_query($conn, $sql_update);

  header('Location: area_usuario.php');
  mysqli_close($conn);
?>