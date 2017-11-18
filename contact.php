<?php 

require_once ("Connections/EMP_config.php");
require_once ('Connections/EMP_job.php');
require_once ('inc/class.phpmailer.php');

$mail = new PHPMailer();
$mail->IsSMTP(); // Define que a mensagem será SMTP
$mail->Host = ""; // Endereço do servidor SMTP
$mail->SMTPAuth = true; // Autenticação
$mail->Username = ''; // Usuário do servidor SMTP
$mail->Password = ''; // Senha da caixa postal utilizada

$EMP_db = Conexao::EMP_getInstance();

$EMP_result = EMP_select("qtEmails", "managerbr", $EMP_db);
foreach($EMP_result as $EMP_lineManager)
$qtEmails = $EMP_lineManager['qtEmails']+1;

if (isset($_SERVER["REQUEST_METHOD"]) && isset($_REQUEST[ 'name' ]) && isset($_REQUEST[ 'email' ]) && isset($_REQUEST[ 'phone' ]) && isset($_REQUEST[ 'comments' ])) {
	$EMP_name_temp = $_REQUEST[ 'name' ];
	$EMP_email_temp = $_REQUEST[ 'email' ];
	$EMP_phone_temp = $_REQUEST[ 'phone' ];
	$EMP_message_temp = $_REQUEST[ 'comments' ];

	$EMP_name = addslashes($EMP_name_temp);
	$EMP_email = addslashes($EMP_email_temp);
	$EMP_phone = addslashes($EMP_phone_temp);
	$EMP_message = addslashes($EMP_message_temp);

	if((!empty($EMP_name) || !empty($EMP_email) || !empty($EMP_phone) || !empty($EMP_message)) && ($EMP_name != 'Nome' && $EMP_email != 'Email' && $EMP_phone != 'Telefone' && $EMP_message != 'Mensagem')){
	$mail_subject = "Contato - Site";
	$EMP_message = "Nome: ".$EMP_name." | Fone: ".$EMP_phone."\nMensagem: ".$EMP_message."\n\n---------------------------------\nEmperium Code - Business Solution";
	$mail->From = $EMP_email;
	$mail->FromName  = $EMP_name;
	$mail->AddAddress('', '');
	$mail->IsHTML(true); // Define que o e-mail será enviado como HTML
	$mail->CharSet = 'iso-8859-1'; // Charset da mensagem (opcional)
	$mail->Subject = $mail_subject;
	$mail->Body = $EMP_message;
	$enviado = $mail->Send();
	$mail->ClearAllRecipients();
	if ( $enviado ) {
		echo "Obrigado <strong>$EMP_name</strong>. Sua mensagem foi enviada com sucesso! Retornaremos em breve. :)";
 		$EMP_atualiza = EMP_update("qtEmails", $qtEmails, "id", "1", "managerbr", $EMP_db);
		echo "<meta HTTP-EQUIV='refresh' CONTENT='2;URL=index.php#contact-form'>";
	} else {
		echo "Ops, ocorreu um erro ao enviar sua mensagem! Por favor tente novamente. :(";
		echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=index.php#contact-form'>";	
	}
	}else{
	echo "Por favor, preencha todos os dados solicitados.";
	echo "<meta HTTP-EQUIV='refresh' CONTENT='5;URL=index.php#contact-form'>";
}
}
?>
