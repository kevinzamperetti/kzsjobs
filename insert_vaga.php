<?php
  require 'conecta_bd.php';
  include 'inicia_session.php';

  //var_dump($_POST);    

  //......Busca id da empresa
  $sql = "select id from USUARIOS where email = '$email_logado' and tipo = 'E'";
  $resultado = mysqli_query($conn, $sql);
  $row = mysqli_fetch_assoc($resultado);
  $id = $row['id'];

  //......insere dados no banco...
  $tipo='$_POST[tipo]';
  $tipo = substr("$_POST[tipo]",0,3);
  
  $sql = "insert into VAGAS(titulo, descricao, empresa_id, tipo) 
               values('$_POST[titulo]', '$_POST[descricao]', $id, '$tipo')";

  //......Ver o que está sendo passado no sql 
  //  echo $sql;
  
  //......ENVIA EMAIL COM VAGA CADASTRADA......//

  //......Busca email dos usuarios cadastrados na plataforma
  $sql_email = "select email from USUARIOS where tipo = 'U'";
  $resultado1 = mysqli_query($conn, $sql_email);

  while($row_email = mysqli_fetch_assoc($resultado1)){

    //Carrega arquivo do PHPMailer
    //use PHPMailer\PHPMailer\PHPMailer;
    require_once 'C:\xampp\htdocs\PHPMailer\PHPMailerAutoload.php';

    $mail = new PHPMailer;
    $mail->isSMTP();
    $mail->SMTPDebug = 2;

    //Dados do servidor de email
    $mail->Host = ' smtp-mail.outlook.com';
    $mail->SMTPSecure = "tls";
    $mail->Port = 587;
    $mail->SMTPAuth = true;
    
    //Usuário e senha do email para validação do envio
    $mail->Username = "kevimzs@hotmail.com";
    $mail->Password = "xxxxxxxxx";

    //Dados de origem e destino dos emails
    $mail->setFrom('kevimzs@hotmail.com', 'KZS Jobs');
    $mail->addAddress($row_email['email']);

    //Assunto e corpo do email
    $mail->Subject = 'KZS Jobs-Nova vaga cadastrada venha conferir.';
    $body = "A vaga '" .$_POST['titulo'] ."' acabou de ser cadastrada em nosso site! Acesse agora mesmo sua conta e confira!";
    $mail->Body = $body;

    if (!$mail->send()) {
//      echo "Erro ao enviar email: " . $mail->ErrorInfo;
        echo "Erro ao enviar email.";
    } else {
        if(!mysqli_query($conn, $sql))
        die('Erro ao cadastrar vaga: ' .mysqli_error($conn));
        mysqli_close($conn);
        header('Location: area_empresa.php');
      }
  }  

?>
