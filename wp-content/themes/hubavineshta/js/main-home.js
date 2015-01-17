$(document).ready(function()
{	
	
	// Init slideshow on the homepage
	//aa
//	if( $('.slideshow-image ').find("a").length > 1 )
//	{
//		setInterval ( "slideSwitch()", 6125 );
//	}
//	else
//	{
//		$(".slideshow-prevNav").hide();
//		$(".slideshow-nextNav").hide();
//	}
	

	
//	$(".slideshow-prevNav").live("click", function()
//	{
//		
//		var $active = $('.slideshow-image .active');
//		var $activeDot = $('.slideshow-dots .active');
//		
//		var $prev =  $active.prev().length ? $active.prev() : $('.slideshow-image a:first');
//		var $prevDot =  $activeDot.prev().length ? $activeDot.prev() : $('.slideshow-dots span:first');
//		
//		
//		changeSlide( $active, $prev );
//		changeDot( $activeDot, $prevDot );
//	});
//
//	$(".slideshow-nextNav").live("click", function()
//	{
//		var $active = $('.slideshow-image .active');
//		var $activeDot = $('.slideshow-dots .active');
//		
//		var $next =  $active.next().length ? $active.next() : $('.slideshow-image a:first');
//		var $nextDot =  $activeDot.next().length ? $activeDot.next() : $('.slideshow-dots span:first');
//		
//		changeSlide( $active, $next );
//		changeDot( $activeDot, $nextDot );
//	});
		
});

function slideSwitch() 
{
	var $active = $('.slideshow-image .active');
	var $activeDot = $('.slideshow-dots .active');

	var $next =  $active.next().length ? $active.next() : $('.slideshow-image a:first');
	var $nextDot =  $activeDot.next().length ? $activeDot.next() : $('.slideshow-dots span:first');
		
	changeSlide( $active, $next );
	changeDot( $activeDot, $nextDot );
}


function changeSlide( $from, $to)
{
	$from.addClass('last-active');
			
	$to.css({opacity: 0.0})
		.addClass('active')
		.animate({opacity: 1.0}, 600, function() {
			$from.removeClass('active last-active');
		});
}

function changeDot( $from, $to )
{
	$to.addClass('active');
	$from.removeClass('active');
}

// end slideshow 