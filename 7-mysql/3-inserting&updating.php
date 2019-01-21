<?php
	$link = mysqli_connect("shareddb-g.hosting.stackcp.net","cl29-users-3237fb87","centripeta1","cl29-users-3237fb87");

	if(mysqli_connect_error()){
		die("There was an error connecting to the database");
	}
	//$query = "INSERT INTO `users` (`email`,`password`) VALUES('tommy@gmail.com','abcde')";
	$query = "UPDATE `users` SET password= 'dasfdkjsf' WHERE email = 'dalt.rock1@gmail.com' LIMIT 1";
	mysqli_query($link, $query);


	$query = "SELECT * FROM users";

	if ($result= mysqli_query($link, $query)){
		$row = mysqli_fetch_array($result);
		$cat = "Your email is ".$row['email']." and your password is ".$row['password'].".";
		echo $cat;
	}

?>