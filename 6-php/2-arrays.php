<?php

$myArray = array("Daniel","Rob","Tommy", "Ralphie");

$myArray[] = "Katie";

print_r($myArray);
echo $myArray[1];

echo "<br>";

$anotherArray[0] = "pizza";
$anotherArray[1] = "yoghurt";
$anotherArray[5] = "salami";
$anotherArray["myFavouriteFood"]="ice cream";

$thirdArray = array(
	"France" => "French",
	"USA" => "English",
	"Germany" =>"German" );

unset($thirdArray["France"]);

print_r($anotherArray); 
echo "<br>";
print_r($thirdArray); 

echo sizeof($thirdArray);

?>   