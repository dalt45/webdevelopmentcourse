
<?php
 $weather='';
 if($_GET['city']){
  $chibaca = str_replace(' ','-',$_GET['city']); 
 
  $file_headers = @get_headers("https://www.weather-forecast.com/locations/".$chibaca."/forecasts/latest");
  if($file_headers[0] != 'HTTP/1.1 404 Not Found'){
      $url1 = file_get_contents("https://www.weather-forecast.com/locations/".$chibaca."/forecasts/latest");
      $url1Array= explode ('3 days)</span><p class="b-forecast__table-description-content"><span class="phrase">',$url1);
     $url1Array2 = explode ('</span></p></td><td colspan="9">',$url1Array[1]);
     $weather = $url1Array2[0];
     if (sizeof($url1Array) > 1) {
        
                $url1Array2 = explode('</span></span></span>', $url1Array[1]);
            
                if (sizeof($url1Array2) > 1) {

                    $weather = $url1Array2[0];
                    
                } else {
                    
                    $error = "That city could not be found.";
                    
                }
            
            } else {
            
                $error = "That city could not be found.";
            
            }
   }else{
    $weather = "That city is not in our database!";
   }
 	 
 }

?>  

<html lang="en">
    
  <head>
      
    <meta charset="utf-8">
      
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <title>Weather Site</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/css/bootstrap.min.css" integrity="sha384-Zug+QiDoJOrZ5t4lssLdxGhVrurbmBWopoEl+M6BdEfwnCJZtKxi1KgxUyJq13dy" crossorigin="anonymous">
      
     <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
      
      
    
 <style>

 #jumbotron{
 	background-image: url(clima.png);
 	height: 100%;
 	text-align: center;
 }

 #content{
 	margin-top: 15%;
 }

 #weather{
  margin:10px;
 }


 </style>

 </head>

 <body>
 	
 	<div id="jumbotron" class="jumbotron jumbotron-fluid">
 		<form>
  		<div  id="content" class="container">
	    	<h1 class="display-4">What's the weather?</h1>
	    	<p class="lead">Enter the name of a city</p>
	    	<div class="input-group mb-3">
	    		
	 				<input name="city" class="form-control" type="text" id="city" placeholder="Eg. Tokyo, London">
		  			<fieldset class="form-group">
	 			</form>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
      <div id="weather">
        <?php 
        if ($weather){
          echo '<div class="alert alert-success" role="alert">'.$weather.'</div>';
        }
      ?>
        
      </div>

  		</div>
	</div>


	<!-- jQuery first, then Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>

	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    
 
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.3/js/bootstrap.min.js" integrity="sha384-a5N7Y/aK3qNeh15eJKGWxsqtnX/wWdSZSKp+81YjTmS15nvnvxKHuzaWwXHDli+4" crossorigin="anonymous"></script>

     
  </body>
    
</html>
