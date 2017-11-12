//Inspired from shuffleLetters
//Author : Gryk
(function($){
	$.fn.reverseShuffleLetters = function(prop){
		var options = $.extend({
			"step"		: 20,			// How many times should the letters be changed
			"fps"		: 25,			// Frames Per Second
			"text"		: "", 			// Use this text instead of the contents
			"callback"	: function(){}	// Run once the animation is complete
		},prop)
		return this.each(function(){
			var el = $(this),str = "";
			// Preventing parallel animations using a flag;
			if(el.data('animated'))
				return true;
			el.data('animated',true);
			if(options.text) 
				str = options.text.split('');
			else 
				str = el.text().split('');
			// The types array holds the type for each character.Letters holds the positions of non-space characters;
			var types = [],	letters = [];
			// Looping through all the chars of the string
			for(var i=0;i<str.length;i++){
				var ch = str[i];
				if(ch == " "){
					types[i] = "space";
					continue;
				}
				else if(/[a-z]/.test(ch)){
					types[i] = "lowerLetter";
				}
				else if(/[A-Z]/.test(ch)){
					types[i] = "upperLetter";
				}
				else {
					types[i] = "symbol";
				}
				letters.push(i);
			}
			(function reverseShuffle(start){
				var i, len = letters.length, strCopy = str.slice(0);
				if(start + options.step>len){
					el.data('animated',false);
					options.callback(el);
					return;
				}
				for(i=Math.max(start,0); i < len; i++){
					if( i < start+options.step){
						strCopy[letters[i]] = "";
					}
					else {
						strCopy[letters[i]] = randomChar(types[letters[i]]);
					}
				}
				el.text(strCopy.join(""));
				setTimeout(function(){ reverseShuffle(start+1); },1500/options.fps);
			})(-options.step);
		});
	};
	function randomChar(type){
		var pool = "";
		if (type == "lowerLetter")
			pool = "abcdefjhijklmnopqrstuvwxyz";
		else if (type == "upperLetter")
			pool = "ABCDEFJHIJKLMNOPQRSTUVWXYZ";
		else if (type == "symbol")
			pool = ",.?/\\(+-=@~²^)![]{}*&^%$#'\"";
		var arr = pool.split('');
		return arr[Math.floor(Math.random()*arr.length)];
	}

})(jQuery);