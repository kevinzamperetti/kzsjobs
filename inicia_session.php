<?php
  /*verificar se existe a sessão, pois o usuário pode simplesmente não fazer o login e digitar na url
  o caminho para a área do usuário. Se a sessão não existe é redirecionado para o home do site.*/
  session_start();
  if( 
      (!isset ($_SESSION['email']) == true) and 
      (!isset ($_SESSION['senha']) == true) and 
      (!isset ($_SESSION['tipo']) == true)
    )
    {
      unset($_SESSION['email']);
      unset($_SESSION['senha']);
      unset($_SESSION['tipo']);
      header('location:index.php');
    }
  
  $email_logado = $_SESSION['email'];
?>