function GeneratePassword(length) {
	if (parseInt(navigator.appVersion) <= 3) { return ""; }
	var sPassword = "";
	for (i = 0; i < length; i++) {
		numI = getRandomNum();
		while (checkPunctuationMarks(numI)) { numI = getRandomNum(); }
		sPassword = sPassword + String.fromCharCode(numI);
	}
	return sPassword;
}
function getRandomNum() {
	var rndNum = Math.random(); // between 0 - 1
	rndNum = parseInt(rndNum * 1000); // rndNum from 0 - 1000|
	rndNum = (rndNum % 94) + 33; // rndNum from 33 - 127
	return rndNum;
}
function checkPunctuationMarks(num) {
	if ((num >= 33) && (num <= 47)) { return true; }
	if ((num >= 58) && (num <= 64)) { return true; }
	if ((num >= 91) && (num <= 96)) { return true; }
	if ((num >= 123) && (num <= 126)) { return true; }
	return false;
}