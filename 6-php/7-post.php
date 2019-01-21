<?php

  if ($_POST) {
        
        $family = array("Rob", "Kirsten", "Tommy", "Ralphie");
        
        $isKnown = false;
        
        foreach ($family as $value) {
            
            if ($value == $_POST['name']) {
                
                $isKnown = true;
                
            }  
            
        }
        
        if ($isKnown) {
            
            echo "Hi there ".$_POST['name']."!";
            
        } else {
            
            echo "I don't know you.";
            
        }      
        
    }
//Solución Daniel
/*
print_r($_POST);
$nameArray = array("Tommy","Kirsten","Chumpis","Fluffy");
$a = 0;

if($_POST){
	for($i=0;$i<sizeof($nameArray);$i++){
		if($nameArray[$i] == $_POST['name']){
			echo "Welcome";
			$a++;
		}

	}
	if($a == 0){
		echo "I dont know you!";
	}

}
*/


?>  

<p>Escribe tu nombre</p>
<form method="post">
	<input name="name" type="text">
	<input type="submit" value="Go!">

</form> 