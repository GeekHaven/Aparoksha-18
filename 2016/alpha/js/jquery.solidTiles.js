(function($) {

	$.fn.solidTiles = function(opts){

		var options = $.extend({
			rows: 6,
			cols: 5,
			className: "jquery_tile_div",
		},opts);

		var tileWidth = this.width()/options.cols;
		var tileHeight = this.height()/options.rows;

		var tileCSS = {
			"background-color" : "#020910",
			"height": tileHeight,
			"width": tileWidth,
			"float": "left",
			"opacity": "1",
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
				},60);
			})();

			function cleanUp(){
				overDiv.remove();
			}
		});
	}

})(jQuery);