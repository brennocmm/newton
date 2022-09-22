<?php

	date_default_timezone_set( 'America/Sao_Paulo' );

	// Validação se os campos estão validados
	if(
		!isset( $_POST[ 'nome' ], $_POST[ 'email' ], $_POST[ 'assunto' ], $_POST[ 'mensagem' ] )
		|| empty( $_POST[ 'nome' ] )
		|| empty( $_POST[ 'email' ] )
		|| empty( $_POST[ 'assunto' ] )
		|| empty( $_POST[ 'mensagem' ] )
	){
		header( 'Location: index.php?send-mail=0#fale-conosco' );
	}

	// Recebendo os dados da LP
	$nome 		= $_POST['nome'];
	$email 		= $_POST['email'];
	$assunto 	= $_POST['assunto'];
	$mensagem 	= $_POST['mensagem'];

	// Criando corpo do e-mail para envio e destinatários
	$subject = 'Novo Contato';
	$body  = 'Novo Contato<br><br>
			<strong>Nome:</strong> '. $nome .'<br><br>
			<strong>E-mail:</strong> '. $email .'<br><br>
			<strong>Assunto:</strong> '. $assunto .'<br><br>
			<strong>Mensagem:</strong> '. $mensagem .'<br><br>
			<strong>Data:</strong> '. date( 'd/m/Y H:i:s' ) .'<br><br>';
	$destinatarios[] = "teste@teste.com";

	// Enviando corpo do e-mail para função
	$envio = send_email( $destinatarios, $subject, $body );

	// Validandando ser foi enviando o e-mail
	$results = $envio ? 1 : 0;
	header( 'Location: index.php?send-mail='. $results .'#fale-conosco' );


	// Função para o envio dos e-mails
	function send_email( $destinatarios, $subject, $body ){

		require 'libs/PHPMailer-5.2-stable/PHPMailerAutoload.php';

		$mail = new PHPMailer;
		$error = false;

		try {
			// Dados de SMTP para envio
			$mail->isSMTP();
			$mail->Host 		= 'outlook.office365.com';
			$mail->SMTPAuth 	= true;
			$mail->Username 	= '';
			$mail->Password 	= '';
			$mail->SMTPSecure 	= '';
			$mail->Port 		= 25;
			$mail->CharSet 		= "UTF-8";
			$mail->setFrom( 'teste@teste.com', 'Teste');

			// Destinatários 
			foreach($destinatarios as $destinatario){
				$mail->addAddress( $destinatario );
			}

			$mail->isHTML( true );
			$mail->Subject 		= $subject;
			$mail->Body 		= $body;
						
			$mail->send();
		}
		catch( phpmailerException $e ){
			$error = $e->errorMessage(); //Pretty error messages from PHPMailer
		}
		catch( Exception $e ){
			$error = $e->getMessage(); //Boring error messages from anything else!
		}

		return $error;
	}
