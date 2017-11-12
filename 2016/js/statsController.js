(function(window){
	
	function codeRun(terminal){
		this._init(terminal);
		this._start();
	}
	
	codeRun.prototype._init = function(){
		this.terminal = terminal;
		this.noOfNodes = 0;
		this.nodesLimit = 9;
		this.paraText = ["Connecting to localhost://127.0.0.1:9080.",
						 "Files downloaded completely. Errors = 0. Continue",
						 "Err: Could not connect to host server.",
						 "Resource loading failed... ",
						 "Connecting  to localhost...",
						 "Cannot create file. Permission denied",
						 "Creating a buffer. Allocating memory",
						 "Successfully created file. Permission granted."];
	}
	
	codeRun.prototype._start = function(){
		var self = this;
		(function animate(index){
			//create a new p tag;
			self.pNode = document.createElement("p");
			
			//garbage collection
			if(self.noOfNodes > self.nodesLimit){
				self.terminal.removeChild(self.terminal.firstElementChild);
				--self.noOfNodes;
			}
			
			//append it to the div.i.e self.terminal
			self.terminal.appendChild(self.pNode);
			++self.noOfNodes;
			index = (index + 1) % self.paraText.length;
			var nodeToWork = self.pNode,
				text = self.paraText[index],
				len = text.length,
				characters = text.split("");
			
			nodeToWork.innerHTML = "";
			(function animateWriting(charPos){
				self.terminal.scrollTop = self.terminal.scrollHeight;//trial and error.
				nodeToWork.innerHTML += characters[charPos++];
				if(charPos != len)
					window.setTimeout(function(){
						animateWriting(charPos);
					}, 15);
				else{
					window.setTimeout(function(){
						animate(index);
					},100);
				}
			})(0);
		})(-1);
	}
	
	window.codeRun = codeRun;
})(window);


(function changeGraphs(images){
	var len = images.length;
	(function animate(index){
		images[index].style.display = "block";
		setTimeout(function(){
			images[index].style.display = "none";
			index = (index + 1) % len;
			animate(index);
		},1500);
	})(0);
})(document.querySelectorAll("#stats-graph img"));


var terminal = document.querySelector("#terminal");
var codeRunObj = new codeRun(terminal);