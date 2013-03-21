<?php
	if(isset($_POST['submit'])) {
			$to = preg_replace("([\r\n])", "", $_POST['receiver']);
			$from = preg_replace("([\r\n])", "", $_POST['email']);
			$subject = "[".$_POST['blogname']."]".$_POST['subject']."(Message from ".$_POST['name'].")";
			$message = $_POST['comment'];

			$match = "/(bcc:|cc:|content\-type:)/i";
			if (preg_match($match, $to) ||
				preg_match($match, $from) ||
				preg_match($match, $message)) {
					print "Please check your message.";
					die("Header injection detected.");
			}
			$headers = "From: ". $from ."\r\n";
			$headers .= "Reply-to: ".$from."\r\n";

			if(mail($to, $subject, $message, $headers))
			{
				print '<div id="success">Your message submitted successfully: <br>Your name is <b>' . $_POST['name'] . '</b> and your email is <b>' . $_POST['email']. '</b><br>We will try to reply you as soon as possible.<br></div>';
			}
			else {
				print '<div id="error">Sorry, your message was not submitted successfully. Please try again later.<br></div>';
			}
	} else {
		die("Direct access not allowed!");
	}
?>