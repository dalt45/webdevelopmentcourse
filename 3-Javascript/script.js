            var startime = new Date().getTime();
            var endtime;
            var timediff;

			function getRandomColor() {
					  var letters = '0123456789ABCDEF';
					  var color = '#';
					  for (var i = 0; i < 6; i++) {
					    color += letters[Math.floor(Math.random() * 16)];
						}
					return color;
					}



        	function makeShapeAppear() {
        		var yAxis = Math.random()*500;
        		var xAxis = Math.random()*1200;
        		var width = (Math.random()*200)+100;

        		if (Math.random() > 0.5){
				document.getElementById("shape-square").style.borderRadius = "50%";
			     } else{
				document.getElementById("shape-square").style.borderRadius = "0";
			     }
        		document.getElementById("shape-square").style.backgroundColor = getRandomColor();
        		document.getElementById("shape-square").style.top = yAxis + "px";
        		document.getElementById("shape-square").style.left = xAxis + "px";
        		document.getElementById("shape-square").style.width = width + "px";
        		document.getElementById("shape-square").style.height = width + "px";
        		document.getElementById("shape-square").style.display="block";
        		
        		startime = new Date().getTime();
        	}
		

        	function afterTime() {
        	setTimeout(makeShapeAppear, Math.random()*2000);
       		}

       		afterTime();

        	document.getElementById("shape-square").onclick = function (){
        		document.getElementById("shape-square").style.display = "none";
        		endtime = new Date().getTime();
        		timediff = endtime - startime;
        		timediff = timediff /1000
        		timediff = " " + timediff  + " segundos";
        		document.getElementById("result-time").innerHTML = timediff;
        		afterTime();
        	}