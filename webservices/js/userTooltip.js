function InitTooltip(progressImageUrl, ajaxUrl) {

	var template = $("#userPopup").html();
	template = template.replace( /%7B/g , "{").replace( /%7D/g , "}"); // to fix stupid Firefox encoding

	$(document).on("click", ".uPopup", function (e) {
		e.preventDefault();
		$("html").unbind('click', HideUserPopup);
		var linkPosition = $(this).offset();
		var popupLeftCoord = linkPosition.left;

		var wndWidth = $(window).width();
		if (linkPosition.left + 320 > wndWidth) popupLeftCoord = wndWidth - 320;

		var id = $(this).attr("data-userid");
		if (id) {
			$("#userPopup").html("<img src='" + progressImageUrl + "' class='indicator' style='position:absolute; top: 50%; left: 50%;' /><b class='border-notch notch'></b><b class='notch'></b>");
			$("#userPopup").show().offset({ top: linkPosition.top + 25, left: popupLeftCoord });

			$.ajax({
				type: "POST",
				url: ajaxUrl,
				data: "{userId:" + id + "}",
				contentType: "application/json; charset=utf-8",
				dataType: "json",
				success: function(msg) {
					var userObj = msg; // json object returned from server
					userObj.NameSpecified = (userObj.FirstName || userObj.LastName);
					//parsing dates
					if (userObj.RecentTickets != null) {
						$.each(userObj.RecentTickets, function(k, v) {
							var d = new Date(parseInt(v.IssueDate.substr(6)));
							v.IssueDate = d.getFullYear() + "-" + (d.getMonth() + 1) + "-" + d.getDate();
						});
					}
					var markup = Mustache.to_html(template, userObj);
					$("#userPopup").html(markup);
					$("#userPopupAvatar").attr("src", userObj.AvatarURL); //had to set image src for avatar separately to avoid annoying 404 error
					$("html").bind('click', HideUserPopup);
					$("#userPopup").click(function (e) { e.stopPropagation(); });
					if ($('#lnkEditNotes').text() == "") $('#lnkEditNotes').text('add notes...');

					//move notch to click loction
					var notch = $("#userPopup .notch");
					notch.css('left', (linkPosition.left - popupLeftCoord) + 'px');
				}
			});
		}
	});
}

function SaveUserNotes(ajaxUrl, userId) {
	$.post(ajaxUrl, { userId: userId, notes: $('#txtUserNotes').val() });
	$('#divEditNotes').slideUp();
	$('#lnkEditNotes').text($('#txtUserNotes').val());
	$('#lnkEditNotes').show();
}

var HideUserPopup = function() {
	if ($('#userPopup').is(':visible')) {
		$('#userPopup').hide();
	}
	$("html").unbind('click', HideUserPopup);
}