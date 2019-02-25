<?php
  include 'inicia_session.php';
  require 'conecta_bd.php';

  //......recebe id que deseja excluir
  $vaga_id = $_GET['id'];
  $usuario_id = $_GET['idusu'];
  $pagina_que_chamou_operacao = $_GET['pag'];
  $pagina= $_GET['pagina'];

  $sql_delete = "delete from CANDIDATURAS where vaga_id = $vaga_id and usuario_id = $usuario_id";
  $resultado = mysqli_query($conn, $sql_delete);

  if($pagina_que_chamou_operacao == 'vcand')
    header('Location: vagas_candidatadas.php?id='.$usuario_id.'&pagina='.$pagina);
  elseif($pagina_que_chamou_operacao == 'vdisp')
  header('Location: vagas_disponiveis.php?id='.$usuario_id.'&pagina='.$pagina);

  mysqli_close($conn);

?>
