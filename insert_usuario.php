<?php
  include 'inicia_session.php';
  require 'conecta_bd.php';

  //var_dump($_POST);    

  //......verifica se email já cadastrado e gera mensagem de alerta...
  $sql = "select email from USUARIOS where email = '$_POST[email]'";
  $resultado = mysqli_query($conn, $sql);
  $count = mysqli_num_rows($resultado);
  
  //......testa se e-mail já foi cadastrado
  if($count > 0){
	  echo("Endereço de email '$_POST[email]' já cadastrado!");
    die("<script>window.setTimeout('history.back(-1)', 3000);</script>");
  }
  
  //......insere dados no banco...
  $senha = $_POST['senha'];
  $custo = '08';
  $salt = 'Cf1f11ePArKlBJomM0F6aJ';
 
  // Gera um hash baseado em bcrypt
  $hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');

  $data_nasc = "'$_POST[ano_nasc]-$_POST[mes_nasc]-$_POST[dia_nasc]'"; 
  $sql = "insert into USUARIOS(nome, email, senha, endereco, nro_telefone, sexo, data_nasc, tipo) 
               values('$_POST[nome]', '$_POST[email]', '$hash', '$_POST[endereco]', $_POST[telefone], '$_POST[sexo]', $data_nasc, 'U')";

  //......Ver o que está sendo passado no sql 
  //  echo $sql;

  if(!mysqli_query($conn, $sql))
    die('Erro ao registrar usuário: ' .mysqli_error());
    //die('Erro ao registrar usuário: ');
  header('Location: login_usuario.php');
  mysqli_close($conn);
?>
