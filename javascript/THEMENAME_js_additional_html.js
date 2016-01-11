// there's currently no way of knowing if a main main item contains a submenu, so let's
// add a utility class onto each parent of a submenu
try {

	// there's currently no way of knowing if a main main item contains a submenu, so let's
	// add a utility class onto each parent of a submenu
	$('document').ready(function(){
		$('#totaramenu ul li, #custommenu ul li').children('ul').parent('li').addClass('has-sub-menu');
	});

	// purge cache shortcut key "ctrl + home"
	$(document).keydown(function (e) {
      if (e.ctrlKey) {
      	if (e.keyCode === 36) {
      		var reloadURL = encodeURI( document.location.pathname.substr(document.location.pathname.indexOf('htdocs/') + 6) + document.location.search );
      		var purgeURL = M.cfg.wwwroot + '/admin/purgecaches.php?confirm=1&sesskey=' + M.cfg.sesskey + '&returnurl=' + reloadURL;
	        document.location.href = purgeURL;
	    }

	  }
	});

} catch (e) {
	// no jQuery available, most likely
}
