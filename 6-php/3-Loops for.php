<?php
$family = array("Rob","Kirsten","Tommy","Ralphie");
	
foreach ($family as $key => $value) {

	$family[$key] = $value." Percival";
	echo "Array item".$key." is ".$value."<br>";
}

$a = sizeof($family) - 1;

for ($i = 0; $i <= $a ; $i++) {

	echo $family[$i]."<br>";

}

for ($i=10; $i>=0;$i--){
	echo $i."<br>";
}


?>   