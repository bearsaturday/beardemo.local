//jsコマンドで呼ばれるメソッド
(function($) {
	$.app = {
		demo : function(values) {
		    $(values).animate({opacity: "0.1", left: "+=400"}, 1200)
		    .animate({opacity: "0.4", top: "+=160", height: "20", width: "20"}, "slow")
		    .animate({opacity: "1", hspace: "+=100px", height: "300px", width: "500px"}, "slow")
		    .animate({top: "0", hspace: "-=100px", height: "90px", width: "286px"}, "slow")
		    .slideUp()
		    .slideDown("slow");
		    return false;
		}
	}
})($);

$(document).ready( function() {
	// rel=ajaxとなっているAタグをAjaxLink化します。
	$("a[rel^='ajax']").p().bearAjaxLink({form : true});
	// rel=ajaxとなっているFormタグをAjaxForm化します。
	$("form[rel^='ajax']").p().bearAjaxForm();
});