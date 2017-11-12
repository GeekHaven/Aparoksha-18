(function($) {

	$.fn.imageTiles = function(opts){

		var options = $.extend({
			rows: 5,
			cols: 5,
			animationTime: 400,
			className: "jquery_tile_div",
			maxOpacity: 1
		},opts);

		var tileWidth = this.width()/options.cols;
		var tileHeight = this.height()/options.rows;

		var tileCSS = {
			"background-color" : "#030301",
			"height": tileHeight,
			"width": tileWidth,
			"float": "left",
			"opacity": "1",
			"transition": "opacity 0.2s"
		};

		var zIndex = this.css('z-index') + 1;

		var divCSS = {
			"position" : "absolute",
			"left" : 0,
			"top" : 0,
			"z-index" : zIndex,
			"overflow" : "hidden",
			"height": this.height(),
			"width": this.width()
		}

		return this.each(function(){
			var overDiv = $("<div></div>").addClass(options.className).css(divCSS);
			var allTiles = [];

			for (var i = 0; i < options.rows; i++) {
				for(j = 0 ;j < options.cols; j++){
					var tile = $("<div>").addClass("tile_" + i + "_" + j).css(tileCSS);
					overDiv.append(tile);
					allTiles.push(tile);				
				}
			}

			$(this).parent().append(overDiv);

			(function update(){	
				if(allTiles.length == 0) {
					cleanUp();
					return;
				}
				var i = Math.floor(Math.random() * allTiles.length);

				tileToRemove = allTiles[i];

				allTiles.splice(i,1);

				$("." + tileToRemove.attr("class")).css({"opacity": "0"});
				setTimeout(function(){
					update();
				},75);
			})();

			function cleanUp(){
				overDiv.remove();
			}
		});
	}

})(jQuery);