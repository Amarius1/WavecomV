jQuery(document).ready(function() {
	
	jQuery('header a').on('click', function(e)  {
		var currentAttrValue = jQuery(this).attr('href');

		jQuery('* ' + currentAttrValue).show().siblings().hide();
        
		jQuery(this).addClass('active').siblings().removeClass('active');

		e.preventDefault();
	});
});

$(document).ready(function(){
	$("input.indeterminate").attr('state','1').each(function(){
		$(this)[0].indeterminate = true;
	});
	$("input.indeterminate").click(function(){
		var state = parseInt($(this).attr('state'));
		if( state == 0 ) {
			$(this)[0].indeterminate = true;
			$(this)[0].checked = false;
		} else if( state == 1 ) {
			$(this)[0].indeterminate = false;
			$(this)[0].checked = true;
		} else if( state == 2 ) {
			$(this)[0].indeterminate = false;
			$(this)[0].checked = false;
			state = -1;
		}
		$(this).attr('state', ++state);
	});
});