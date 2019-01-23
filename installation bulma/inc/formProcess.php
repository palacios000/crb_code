<?php 
//1 validate
	$nome = "";
	$email = "";
	$errore_nome = "";
	$errore_email = "";
	$errore_text = "";
	$errore_ppolicy = "";
	$redBorder_email = "";
	$redBorder_nome = "";
	$redBorder_text = "";
	$redBorder_ppolicy = "";

	if($input->post->invia) {
		//honeypot
		if ($input->post->surname) {
			$session->redirect($page->child->url, false);
			exit;
		}

		//nome
		if ($input->post->nome) {
			$nome = $sanitizer->text($input->post->nome);
			if (!$nome) {
				$errore_nome = "<p class='help is-danger'>Field contains invalid characters, please check and resend</p>";
				$redBorder_nome = "is-danger"; 
			}
		}else{
			$errore_nome = "<p class='help is-danger'>Required field.</p>";
			$redBorder_nome = "is-danger"; 
		}
		//email
		if ($input->post->email) {
			$email = $sanitizer->email($input->post->email);
			if (!$email) {
				$errore_email = "<p class='help is-danger'>Email not valid, please check and resend</p>";
				$redBorder_email = "is-danger";
			}
		}else{
			$errore_email = "<p class='help is-danger'>Required field.</p>";
			$redBorder_email = "is-danger";
		}

		//checkbox
		/*if (!$input->post->ppolicy) {
			$redBorder_ppolicy = "has-text-danger";
			$errore_policy = "<p class='help is-danger'>Required checkbox</p>";
		}*/

		//messaggio text
		if (!$input->post->messaggio) {
			$redBorder_text = "is-danger";
			$errore_text = "Please write something, even just 'Hello!'";
		}


	//2 send
		if (!$errore_email && !$errore_nome && !$errore_policy && !$errore_text ) {
			$emailText = "Name: $nome - Email: $email\n\n";
			$emailText .= $input->post->messaggio;
			$mail = wireMail(); 
			$mail->to('info@smockcompany.co.uk');
			$mail->subject('The Hampstead Smock Company - Contact Form');
			$mail->body($emailText);
			if ($mail->send()) {
				$session->redirect($page->child->url, false);
			}
		}
	}
