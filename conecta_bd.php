<?php
  $conn = mysqli_connect("localhost", "root", "", "kzs_jobs");
  if(!$conn)
    die('Erro ao conectar ao banco de dados: ' .mysqli_connect_error());
?>