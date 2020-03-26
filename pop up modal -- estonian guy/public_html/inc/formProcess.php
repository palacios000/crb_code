<?php 
//1 validate
	$nome = "";
	$cognome = "";
	$email = "";
	$giorno = "";
	//
	$errori = "";



	if ($input->post->invia) {
		
		if ($input->post->citta) { 
			//honeypot
			$session->redirect($homepage->url);
			$errori = 1;
		}else{
			$emailMessage = "";
			foreach ($input->post() as $postKey => $postItem) {
			$$postKey = $sanitizer->text($postItem);
			if ($postKey == "citta" ) continue; // honeypot
			if ($postKey == "invia" ) continue; 
			if ($postKey == "ppolicy" ) continue; 
			$emailMessage .= $postKey .": ". $postItem. "<br>";
			
			}

		}

		
		//nome
		if (!$nome) { 		$errori .= "<p>campo 'nome' mancante o non corretto, prego controllare</p>"; }
		if (!$cognome) { 		$errori .= "<p>campo 'cognome' mancante o non corretto, prego controllare</p>"; }
		if (!$giorno) { 		$errori .= "<p>campo 'giorno' mancante o non corretto, prego controllare</p>"; }
		if (!$email) { 		$errori .= "<p>campo 'email' mancante o non corretto, prego controllare</p>"; }
		if (!$ppolicy) { 		$errori .= "<p>campo 'privacy policy' mancante, prego controllare</p>"; }
		if (!$sanitizer->email($email)) {
			$errori .= "<p>formato 'email' non corretto, prego controllare";
		}


		if (!$errori) {
			$mail = wireMail(); 
			$mail->to('web@soluzioni.tech');
			//$mail->to('web@carburo.net');
			$mail->to('alessandra.gavazzi@fureco.it');
			$mail->to('montenapoleone@fureco.it');
			$mail->header('Reply-To', $email);
			$mail->subject('Richiesta visita Showroom Fabio Gavazzi');
			$mail->bodyHTML($emailMessage);
			if ($mail->send()) {
				$session->redirect($page->child->url);
			}else{
				$errori = "<p>messaggio non inviato, prego riprovare</p>";
			}
		}

	}
