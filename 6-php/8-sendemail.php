<?php
$emailTo = "carlosteodoro.lomeli@gmail.com";
$subject = "Hola";
$body = "Soy percy.";
$headers = "From: percy@percy.com";
	
  if (mail($emailTo, $subject, $body, $headers)){
  	echo "The email was sent succesfully";
  }else{
  	echo "No";
  }


?>  

<p>Escribe tu nombre</p>
<form method="post">
	<input name="name" type="text">
	<input type="submit" value="Go!">

</form> 