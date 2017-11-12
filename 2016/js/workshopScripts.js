var workshop = 1;
function workshop1(){
		if(workshop == 2)
		{
			$("#each1").css({'transition':'all 0.8s linear', 'transform': 'rotateY(25deg) translateZ(950px)', 'margin-left':'600px','opacity':'0.0'});
			$("#each2").css({'transition':'all 0.8s linear', 'transform': 'rotateY(25deg) translateZ(0px)', 'margin-left':'200px','opacity':'0.9'});
			setTimeout(function(){
				$("#each1").css({'transform': 'rotateY(25deg) translateZ(0px)', 'margin-left':'200px','opacity':'1'});
			    $("#each2").css({'transform': 'rotateY(25deg) translateZ(-500px)', 'margin-left':'150px','opacity':'0.9'});	
			}, 500);
			setTimeout(function(){
				$("#each1").css({'transition':'all 0.5s linear', 'transform': 'rotateY(0deg) translateZ(0px)', 'margin-left':'200px','opacity':'1'});
			    $("#each2").css({'transition':'all 0.5s linear', 'transform': 'rotateY(0deg) translateZ(-500px)', 'margin-left':'150px','opacity':'0.9'});	
			}, 1300);
			workshop = 1;
		}
}
function workshop2(){
		if(workshop == 1)
		{	$("#each1").css({'transition':'all 0.8s linear', 'transform': 'rotateY(25deg)'});
			$("#each2").css({'transition':'all 0.8s linear', 'transform': 'rotateY(25deg)', 'margin-left':'-100px'});
			setTimeout(function(){
				$("#each1").css({'transform': 'rotateY(25deg) translateZ(950px)', 'margin-left':'600px','opacity':'0.0'});
			    $("#each2").css({'transform': 'rotateY(25deg) translateZ(0px)', 'margin-left':'200px','opacity':'0.9'});	
			}, 500);
			setTimeout(function(){
				$("#each1").css({'transition':'all 0.5s linear', 'transform': 'rotateY(0deg) translateZ(950px)', 'margin-left':'600px','opacity':'0.0'});
			    $("#each2").css({'transition':'all 0.5s linear', 'transform': 'rotateY(0deg) translateZ(0px)', 'margin-left':'200px','opacity':'0.9'});	
			}, 1300);
			
			
			workshop = 2;
		}

}