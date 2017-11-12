function initGalleryScripts(){
		var fo = new SWFObject("./TiltViewer.swf", "viewer", "100%", "100%", "9.0.28", "#000000");			
		
		// TILTVIEWER CONFIGURATION OPTIONS
		// To use an option, uncomment it by removing the "//" at the start of the line
		// For a description of config options, go to: 
		// http://www.airtightinteractive.com/projects/tiltviewer/config_options.html
															
		//FLICKR GALLERY OPTIONS
		// To use images from Flickr, uncomment this block
		//fo.addVariable("useFlickr", "true");
		//fo.addVariable("user_id", "129074767@N06");
		//fo.addVariable("tags", "jump,smile");
		// fo.addVariable("tag_mode", "all");
		// fo.addVariable("showTakenByText", "true");			
		
		// XML GALLERY OPTIONS
		// To use local images defined in an XML document, use this block		
		fo.addVariable("useFlickr", "false");
		fo.addVariable("xmlURL", "./gallery.xml");
		fo.addVariable("maxJPGSize","640");
		
		//GENERAL OPTIONS		
		fo.addVariable("useReloadButton", "false");
		fo.addVariable("columns", "4");
		fo.addVariable("rows", "4");
		fo.addVariable("showFullscreenOption", "false");
		fo.addVariable("showFlipButton", "false");
		fo.addVariable("showLinkButton", "true");		
		//fo.addVariable("linkLabel", "View image info");
		fo.addVariable("frameColor", "black");
		//fo.addVariable("backColor", "0x0000FF");
		fo.addVariable("bkgndInnerColor", "transparent");
		//fo.addVariable("bkgndOuterColor", "0//x0000FF");				
		//fo.addVariable("langAbout", "About");				
		
		// END TILTVIEWER CONFIGURATION OPTIONS
		
		//fo.addParam("allowFullScreen","true");
		fo.write("flashcontent");
	}