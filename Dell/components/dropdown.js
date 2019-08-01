
	$( "[dropdown]" ).on( "click", ".activator", function() {
		$('[dropdown]').removeClass('open');
		$(this).parent().toggleClass('open');

	});

$(document).on("click", function(event){
        var $trigger = $("[dropdown]");
        if($trigger !== event.target && !$trigger.has(event.target).length){
            $("[dropdown]").removeClass("open");

        }
    });

    $(document).ready(function(){
        $("button").click(function(){
            $(this).text($(this).text() == 'Order by Alphabet' ? 'Order by Category' : 'Order by Alphabet').fadeIn();
        });
    });