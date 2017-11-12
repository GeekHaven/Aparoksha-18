function initEventScripts(){

	$navItems = $("#ap-events-nav li a");
	$events = $(".ap-event-category div");
	$modalWindow = $("section#modal-window");
	$modalWindowWrapper = $("div#modal-window-wrapper");

	$navItems.hover(
		function(){
			$navItems.find("a").addClass("temp-inactive");
			$(this).removeClass("temp-inactive").addClass("temp-active");
		},
		function(){
			$(this).removeClass("temp-active");
			$navItems.find("a").removeClass("temp-inactive");
		}
	);

	$navItems.on("click",function(){
		if(!$(this).parent().hasClass("active")){
			$("#ap-events-nav li.active a").parent().removeClass("active");
			$(this).parent().addClass("active");

			var targetCategory = $(this).attr("href");
			$(".ap-event-category.active").removeClass("active");
			$(targetCategory).addClass("active");
		}
	});

	//Clumsy code needs to be changed.
	$("span#close-modal").on("click",function(e){
		if($modalWindow.hasClass("on")){
			$modalWindowWrapper.addClass("hide").delay(500).promise().done(function(){
				$modalWindow.removeClass("on");
				$modalWindowWrapper.removeClass("hide");
			});
		}
	});
	$events.on("click", function(e){
		var info = "To be updated soon."
		var description = "To be updated soon."
		var rule = "To be updated soon."
		var organizers = "To be updated soon."
		info = this.id;
		if(allevents.hasOwnProperty(info)){
			if(allevents[info].hasOwnProperty('description'))
				description = allevents[info]['description'];
			if(allevents[info].hasOwnProperty('rule'))
				rule = allevents[info]['rule'];
			if(allevents[info].hasOwnProperty('contacts'))
				organizers = allevents[info]['contacts'];
		}
		$("#event-about-load").html(description);
		$("#event-rules-load").html(rule);
		$("#event-organizers-load").html(organizers);
		$("#event-load-name").html(info);
		$modalWindow.addClass("on");
		e.stopPropagation();
		
		// return ;
	});

	// Sound Handling.
	var audio = document.getElementById("soundclip");

	// $navItems.on("mouseover",function(){
	// 	if($(this).parent().hasClass("active"))
	// 		return;
	// 	audio.play();
	// });

	$navItems.on("click",function(){
		audio.play();
	});
	
	$(".ap-event").on("click mouseover",function(){
		audio.play();
	});

}