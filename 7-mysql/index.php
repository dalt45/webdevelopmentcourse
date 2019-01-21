<?php
	/* $link = mysqli_connect("shareddb-g.hosting.stackcp.net","cl29-users-3237fb87","centripeta1","cl29-users-3237fb87");

	if(mysqli_connect_error()){
		die("There was an error connecting to the database");
	}

	mysqli_query($link, $query);
	$name = "Daniel O'grady";

	$query = "SELECT * FROM users WHERE id=1";
	$query = "SELECT * FROM users WHERE email= 'dalt.rock1@gmail.com'";
	$query = "SELECT * FROM users WHERE email LIKE '%p%'";
	$query = "SELECT * FROM users WHERE id >=2";
	$query = "SELECT `email` FROM users WHERE id >=2 AND email LIKE '%g%'";
	$query = "SELECT * FROM users WHERE name = '".mysqli_real_escape_string($link, $name)."'";

	//Se recomienda utilizar la función anterior para evitar conflictos con acentos en mysql, también para mejorar la seguridad del sitio cada que se utilice una variable en una base de datos. Investigar mysql inyection

	if ($result= mysqli_query($link, $query)){

		while($row = mysqli_fetch_array($result)){
		print_r($row);
	}
}
*/
//Ask for email an password
//check email and password have been entered
//check that email is not registered
//sig them up!(add to database)


$error = "";
$successMessage= "";
$link = mysqli_connect("shareddb-g.hosting.stackcp.net","cl29-users-3237fb87","centripeta1","cl29-users-3237fb87");
				
if(mysqli_connect_error()){
	die("There was an error connecting to the database");

}

	if($_POST){

		if(!$_POST["email"]){
			$error .= "An email address is required.<br>";
		}
		if(!$_POST["password"]){
			$error .= "A subject is required.<br>";
		}
		if ($_POST['email'] && filter_var($_POST, FILTER_VALIDATE_EMAIL == false)) {
  			$error .=  "The email address is not valid"; 
		}
		if ($error !=""){
			$error = '<div class="alert alert-danger" role="alert"><p><strong>There were errors in your form:</strong></p>'.$error.'</div>';
		}else{

			mysqli_query($link, $query);
			$query = "SELECT `id` FROM `users` WHERE email = '".mysqli_real_escape_string($link,$_POST['email'])."'";
			$result = mysqli_query($link,$query);
			if(mysqli_num_rows($result) > 0){
				echo ('<div class="alert alert-danger" role="alert"><p><strong>That email address is taken</strong></p></div>');
			}else{
				 $query = "INSERT INTO `users` (`email`,`password`) VALUES ('".mysqli_real_escape_string($link,$_POST['email'])."','".mysqli_real_escape_string($link,$_POST['password'])."')";
					if(mysqli_query($link, $query)){
							echo ('<div class="alert alert-danger" role="alert"><p><strong>You have signed up!</strong></p></div>');
					}else{
							echo ('<div class="alert alert-danger" role="alert"><p><strong>Please try again later!</strong></p></div>');
						}
			}
		}
	}
		
	
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

   #submit{
   	margin-top: 10px;
   }
 
 </style>

 </head>

 <body>
 	<div class="container">
 	<h1>Log In</h1>
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
		   <label for="passwordInput">Password</label>
		  <input name="password" class="form-control" type="password" id="passwordInput">
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
                if($("#passwordInput").val() == ""){
                	error += "The password field is required.<br>";
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
