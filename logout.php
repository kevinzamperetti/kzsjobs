<?php
  //para garantir que está utilizando a sessão correta
  session_start();
  session_destroy(); //destroi a sessão
  header("location:index.php"); //redireciona para a home do site
  exit();
?>