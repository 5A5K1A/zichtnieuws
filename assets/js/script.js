// check on iframe load
function iframeLoaded() {
	// grab frame
    var elFrame    = document.querySelector('.frame');
    // grab framed document
    var elFrameDoc = elFrame.contentDocument || elFrame.contentWindow.document;
    // check on ready state
    if( elFrameDoc.readyState  == 'complete' ) {
    	// waiter
        elFrame.contentWindow.onload = function() {
            console.log('iframe has loaded');
        };
        // framed document is loaded, let's resize the frame
        resizeFrame(elFrame, elFrameDoc);
        return;
    }
    // fallback on not loaded framed doc
    window.setTimeout('iframeLoaded();', 100);
}

// resize the iframe based on it's inner document
function resizeFrame( elFrame, elDoc ) {
	// grab wrapper to determine height
	var elWrapper = elDoc.querySelector('.frame-wrapper');
	elFrame.height  = (elWrapper.offsetHeight + 60)+'px';
}
