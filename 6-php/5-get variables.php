<?php
if(is_numeric($_GET['number']) && $_GET['number'] > 0 && $_GET['number'] == round($_GET['number'], 0)){
	$i=2;
	$isPrime = true;
	while ($i < $_GET['number']){
		if($_GET['number'] % $i == 0){
			// Not prime!
			$isPrime = false;

		}
		
	$i++;
	}

	if ($isPrime){
		echo "<p>".$i." is a prime number</p>";
	}else{
		echo "<p>".$i." is not a prime number</p>";
	}
}else if($_GET){
		echo "<p>No number</p>";
	}

//Solución Daniel
/* 
 $arrayprimo = array();
 $a = 0;
 $b = 0;
if($_GET){
 for($i=1;$i<=$_GET['number'];$i++){
   $arrayprimo[$a] = $i;
   $a++;
 }
$i=0;
 for($i=0;$i<$_GET['number'];$i++){
 	 $a = $arrayprimo[$i];
 	if($_GET['number'] %$a == 0){
 		$b++;
 	}
 }
 if($b == 2){
	print_r($_GET['number']." Es un número Primo");
}else{
	print_r($_GET['number']." No es un número Primo");
}
}
*/



?>  

<p>Escribe a continuación el número primo</p>
<form>
	<input name="number" type="number">
	<input type="submit" value="Go!">

</form> 