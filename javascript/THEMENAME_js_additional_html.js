// there's currently no way of knowing if a main main item contains a submenu, so let's
// add a utility class onto each parent of a submenu
try {
	$('document').ready(function(){
			$('#totaramenu ul li, #custommenu ul li').children('ul').parent('li').addClass('has-sub-menu');
	});
} catch (e) {
	// no jQuery available, most likely
}
