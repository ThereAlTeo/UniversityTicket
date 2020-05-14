<?php
require_once './../bootFiles.php';
// definisco mittente e destinatario della mail
$nome_mittente = "Mio Nome";
$mail_mittente = "mittente@sito.com";
$mail_destinatario = "teo97.alesiani@gmail.com";

// definisco il subject ed il body della mail
$mail_oggetto = "Messaggio di prova";
$mail_corpo = "Questo è un messaggio di prova per testare la mia applicazione";

// aggiusto un po' le intestazioni della mail
// E' in questa sezione che deve essere definito il mittente (From)
// ed altri eventuali valori come Cc, Bcc, ReplyTo e X-Mailer
$mail_headers = "From: " .  $nome_mittente . " <" .  $mail_mittente . ">\r\n";
$mail_headers .= "Reply-To: " .  $mail_mittente . "\r\n";
$mail_headers .= "X-Mailer: PHP/" . phpversion();

if ($mail->sendMail($mail_destinatario, $mail_oggetto, $mail_corpo))
  echo "Messaggio inviato con successo a " . $mail_destinatario;
else
  echo "Errore. Nessun messaggio inviato.";
 ?>
