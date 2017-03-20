(function() {

	// resize frame to fit content
	var elFrame = document.querySelector('.frame');
	if(elFrame) {
		elFrameDocument = elFrame.contentDocument;
		elWrapper       = elFrameDocument.querySelector('.frame-wrapper');
		elFrame.height  = (elWrapper.offsetHeight + 60)+'px';
	}

})();
