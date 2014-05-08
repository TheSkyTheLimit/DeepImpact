//call this func to resize a textbox to it's content height
function AutoResize(elem) {
	var editorScrollTop = elem.scrollTop;
	if (editorScrollTop > 0) {
		elem.style.height = (elem.clientHeight + editorScrollTop) + "px";
	}
}

//call this func to resize editable ifram to it's content height
function AutoResizeEditableIframe(oFrame) {
	var scrollHeight = oFrame.contentWindow.document.body.scrollHeight;
	if (scrollHeight > oFrame.contentWindow.document.body.clientHeight) {
		oFrame.style.height = (scrollHeight) + "px";
	}
}

//this function moves not by character, but by element, including <br> and textnodes
function SetCaretPositionInIframe(ifr, pos) {
	if (!ifr.contentDocument.getSelection) return; //IE8 or less, don't bother
	var idoc = ifr.contentDocument;
	var ibody = ifr.contentDocument.body;
	var sel = ifr.contentDocument.getSelection();
	var range = sel.getRangeAt(0);
	var el = ibody;
	range.setStart(el, pos);
	range.collapse(true);

	sel.removeAllRanges();
	sel.addRange(range);
}