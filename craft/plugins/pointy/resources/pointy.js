$(document).ready(function(){
	
	var marker_offset_x = 6;
	var marker_offset_y = 6;
	
	$("body").delegate("img.pointy-image", "click", function(e) {

		var field = $(this).closest('div.field');
		
		var elOffsetX = $(this).offset().left,
        elOffsetY = $(this).offset().top,
        x = Math.round( e.pageX - elOffsetX ),
        y = Math.round( e.pageY - elOffsetY );
		
		field.find(".pointy-x").val( x );
		field.find(".pointy-y").val( y );
		
		if(x != 0 && y != 0)
		{
			field.find(".pointy-marker").css({
				left: (x - marker_offset_x) + 'px', top: (y - marker_offset_y) + 'px'
			});
		}

	});

});