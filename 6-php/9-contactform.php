<?php

$error = "";
$successMessage= "";

	if($_POST){

		if(!$_POST["email"]){
			$error .= "An email address is required.<br>";
		}
		if(!$_POST["subject"]){
			$error .= "A subject is required.<br>";
		}
		if(!$_POST["content"]){
			$error .= "Content is required.<br>";
		}
		if ($_POST['email'] && filter_var($_POST, FILTER_VALIDATE_EMAIL == false)) {
  			$error .=  "The email address is not valid"; 
		}
		if ($error !=""){
			$error = '<div class="alert alert-danger" role="alert"><p><strong>There were errors in your form:</strong></p>'.$error.'</div>';
		}else{
			$emailTo = "daniel.larios.t@gmail.com";
			$subject = $_POST['subject'];
			$body = $_POST['content'];
			$headers = "From: ".$_POST['email'];
			if(mail($emailTo, $subject, $body, $headers)){
				$successMessage = '<div class="alert alert-success" role="alert"><p><strong>We will get back to you ASAP!</strong></p></div>';
			}else{
				$error='<div class="alert alert-danger" role="alert"><p><strong>Your message couldn\'t be delivered</strong></p></div>';
			}
		}
	}
/*

	
  if (mail($emailTo, $subject, $body, $headers)){
  	echo "The email was sent succesfully";
  }else{
  	echo "No";
  }
*/

?>  

<html lang="en">
    
  <head>
      
    <meta charset="utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
      
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      
      
    
 <style>
 	#greenAlert{
 		display: none;
 	}
 	#redAlert{
 		display: none;
 	}

 	#emailError{
 		display: none;

 	}
 	#subjectError{
 		display: none;
 	}
 	#contentError{
 		display: none;
 	}
 
 </style>

 </head>

 <body>
 	<div class="container">
 	<h1>Get in touch!</h1>
 	<div id="error"><? echo $error.=$successMessage ?> </div>
 	<!--
	<div id="greenAlert" class="alert alert-success" role="alert">
	  Your message was sent, we'll get back to you ASAP</div>
	<div id="redAlert" class="alert alert-danger" role="alert">
  		<b id="errorGeneric">There were error(s) in yout form</b>  		
  		<p id="emailError">The email field is required.<p>
  		<p id="subjectError">The subject field is required.<p>
  		<p id="contentError">The content field is required.<p>
	</div>
-->
 	<div class="container">
	  	<form method="post">
		  <div class="container">
	  	<form>
		  <div class="form-group">
		    <label for="emailInput">Email address</label>
		    <input name="email" type="email" class="form-control" id="emailInput" placeholder="name@example.com">
		  </div>
		   <label for="subjectInput">Subject</label>
		  <input name="subject" class="form-control" type="text" id="subjectInput">
		  	<fieldset class="form-group">
		    <label for="textInput">What would you like to ask us?</label>
		    <textarea name="content" class="form-control" id="textInput" rows="3"></textarea>
		    </fieldset>
		  <button id="submit" type="submit" class="btn btn-primary">Submit</button>
		</form>
</div>
</div>

	<!-- jQuery first, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>
     
    <script type="text/javascript">
     	$("form").submit(function(e){
                var error = "";
                if($("#emailInput").val() == ""){
                	error += "The email is required.<br>";
                }
                if($("#subjectInput").val() == ""){
                	error += "The subject field is required.<br>";
                }
                if($("#textInput").val() == ""){
                	error += "The content field is required.";
                }
                if(error != ""){
                	$("#error").html('<div class="alert alert-danger" role="alert"><p><strong>There were errors in your form:</strong></p>'+ error + '</div>');
                	return false;
            }else{
            	return true;

            }

            });


     </script>
     
  </body>
    
</html>
