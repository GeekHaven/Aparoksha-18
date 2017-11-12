function iFrameOn(){
	rte.document.designMode = 'On';
}

function iBold(){
	rte.document.execCommand('bold', false, null);
}



function iPhoto(){
	var imgsrc = prompt('Enter image location','');
	rte.document.execCommand('insertimage', false, imgsrc);
}

function iUrl(){
	var link = prompt("Enter the URL: ","http://");
	rte.document.execCommand('CreateLink', false, link);
}

function iOl(){
	rte.document.execCommand('InsertOrderedList',true);
}

function iUl(){
	rte.document.execCommand('InsertUnorderedList',true);
}

function iLeft(){
	rte.document.execCommand('JustifyLeft', false);
}

function iCenter(){
	rte.document.execCommand('JustifyCenter', false);
}

function iRight(){
	rte.document.execCommand('JustifyRight', false);
}

function iJust(){
	rte.document.execCommand('JustifyFull', false);
}

function iUnder(){
	rte.document.execCommand('underline', false, null);
}

function iItalic(){
	rte.document.execCommand('italic', false, null);
}