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
	$errori = "";

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
				$errori = 1;
			}
		}else{
			$errore_nome = "<p class='help is-danger'>Required field.</p>";
			$redBorder_nome = "is-danger"; 
			$errori = 1;
		}
		//email
		if ($input->post->email) {
			$email = $sanitizer->email($input->post->email);
			if (!$email) {
				$errore_email = "<p class='help is-danger'>Email not valid, please check and resend</p>";
				$redBorder_email = "is-danger";
				$errori = 1;
			}
		}else{
			$errore_email = "<p class='help is-danger'>Required field.</p>";
			$redBorder_email = "is-danger";
			$errori = 1;
		}

		//checkbox
		if (!$input->post->ppolicy) {
			$redBorder_ppolicy = "has-text-danger";
			$errore_policy = "<p class='help is-danger'>Required checkbox</p>";
			$errori = 1;
		}

		//messaggio text
		if (!$input->post->messaggio) {
			$redBorder_text = "is-danger";
			$errore_text = "Please write something, even just 'Hello!'";
			$errori = 1;
		}


	//2 send
		if (!$errori) {
			$emailText = "Name: $nome - Email: $email\n\n";
			$emailText .= $input->post->messaggio;
			$mail = wireMail(); 
			$mail->to('info@sumensadecurius.it');
			$mail->subject('Sumensa de Curius - Contact Form');
			$mail->body($emailText);
			if ($mail->send()) {
				$session->redirect($page->child->url, false);
			}
		}
	}
