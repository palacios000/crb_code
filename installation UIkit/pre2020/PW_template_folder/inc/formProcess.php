<?php 
/* form UI-kit 03/2020 */

// settings
	$recipient = "";
	$subject = "";
	$notSent = "<p>Messaggio non inviato, prego riprovare o contattare l'amministratore del sito.</p>";
	$multilanguage = "lingua: ".$user->language->country_code;

//1 required field
	$nome = "";
	$cognome = "";
	$email = "";
	$messaggio = "";
	$errori = "";

//2 minifunction
	function errormessage($fieldname){
		return  "<p>Campo <strong>$fieldname</strong> mancante o non corretto, prego controllare</p>";
	}

// honeypot, usually is "citta"

	if ($input->post->invia) {
		
		if ($input->post->citta) { 
			//honeypot
			$session->redirect($homepage->url);
			$errori = 1;
		}else{
			$emailMessage = "";
			foreach ($input->post() as $postKey => $postItem) {
			if ($postKey == "citta" ) continue; // honeypot
			if ($postKey == "invia" ) continue; 
			if ($postKey == "ppolicy" ) continue; 
			if ($postKey == "messaggio" ) {
				$$postKey = $sanitizer->textArea($postItem); // questo l'ho spostato sotto
			}else{
				$$postKey = $sanitizer->text($postItem);
			} 
			$emailMessage .= $postKey .": ". $postItem. "<br>";
			}
		}

		//check if empy values		
		if (!$nome) 	$errori .= errormessage('nome');
		if (!$cognome) 	$errori .= errormessage('cognome');
		if (!$email) 	$errori .= errormessage('email');
		if (!$messaggio) $errori .= errormessage('messaggio');

		//further checks
		if (!$sanitizer->email($email)) 		$errori .= errormessage('email');
		if (!$sanitizer->checkbok($ppolicy)) 	$errori .= errormessage('Privacy Policy');


		// if all OK, send ///////////////////////////////////////////////
		if (!$errori) {

			// aggiungi lingua
			$emailMessage .= $multilanguage;

			$mail = wireMail(); 
			// $mail->to($recipient); // activate on line
			$mail->to('web@carburo.net'); // test email
			$mail->header('Reply-To', $email); // da controllare (procache)
			$mail->subject($subject);
			$mail->bodyHTML($emailMessage);
			$mail->addSignature(true);
			if ($mail->send()) {
				$session->redirect($page->child->url);
			}else{
				$errori .= $notSent;
			}
		}

	}
