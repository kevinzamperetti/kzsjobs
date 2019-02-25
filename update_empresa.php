<?php
  include 'inicia_session.php';
  require 'conecta_bd.php';

  //......recebe id que deseja excluir
  $id = $_GET['id'];
  $nome = $_POST['nome'];
  $email = $_POST['email'];
  $endereco = $_POST['endereco'];
  $sexo = "N";
  $data_fund = "'$_POST[ano_fund]-$_POST[mes_fund]-$_POST[dia_fund]'"; 

  $senha = $_POST['senha'];
  $custo = '08';
  $salt = 'Cf1f11ePArKlBJomM0F6aJ';
 
  // Gera um hash baseado em bcrypt
  $hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');  

//  var_dump($_POST);  
//  echo "id $id";
  
  $sql_update = "update USUARIOS 
                    set nome = '$nome', email = '$email', endereco = '$endereco', 
                        sexo = '$sexo', data_nasc = $data_fund, senha = '$hash'
                  where id = $id";
//  echo $sql_update;  
  $resultado = mysqli_query($conn, $sql_update);

  header('Location: area_empresa.php');
  mysqli_close($conn);
?>