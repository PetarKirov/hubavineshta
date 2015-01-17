function find_max(parent)
{
	var max_width=0;
	parent.find('li').each(function(index)
	{
		if($(this).width()>max_width)
			max_width=$(this).width();
	});
	return max_width;
	
}
var fix_sizes=function()
{	
	var ulWidth = $('#menu-main_nav').width();
	var menuWidth = $('div.menu-main_nav-container').width();
	var widthDiff = menuWidth-ulWidth;
	var lis=$('#menu-main_nav>li');
	var count=lis.length;
	var lastEl = lis.last();	
	var elPadding = parseInt(widthDiff/count);
	if(elPadding==0){
		lastEl.css('padding-right',widthDiff+'px');
		return;	
	}
	var elSidePadding = parseInt(elPadding/2);
	
	lis.each(function(index)
	{
		var jthis=$(this); 
		jthis.css({'padding-left':elSidePadding+'px','padding-right':elSidePadding+'px'});
		var max_width=find_max(jthis);
		var parrent_width=jthis.width();
		    
		if(max_width>0)
		{
			var li_width= max_width >  parrent_width ? max_width : parrent_width;
			jthis.find('li').each(function(index)
			{
				$(this).css({'width':li_width+'px'});
			});
		}
		
	});
	var remainPx = parseInt((elSidePadding*2)*count);
	var lastElPadding = widthDiff-remainPx;
	lastEl.css('border-right','none');
	//console.log(lastEl);
	if(lastElPadding>0){
		var lastSidePad = elSidePadding+1;
		if(lastElPadding==1){
			lastEl.css('padding-right',lastSidePad+'px');
			return;		
		}
		if(lastElPadding%2 == 0){
			var sidePad = elSidePadding+lastElPadding/2;
			lastEl.css({'padding-right':sidePad+'px','padding-left':sidePad+'px'});
		}else
		{
			var leftPad = Math.ceil(lastElPadding/2)+elSidePadding;
			var rightPad = Math.floor(lastElPadding/2)+elSidePadding;
			lastEl.css({'padding-right':rightPad+'px','padding-left':leftPad+'px'});
		}
	}
	
	var totalWidth = 0;
	lis.each(function(index)
	{ 
		totalWidth+=$(this).outerWidth(true);
	});
	if(totalWidth>menuWidth)
	{
		var lastElPaddingRight = parseInt(lastEl.css('padding-right'));
		var difW = totalWidth-menuWidth;
		lastEl.css('padding-right',lastElPaddingRight-difW+'px');
	}
	
}
$(window).resize(function(){
	$('#menu-main_nav>li').css({'padding-left':'0','padding-right':'0'});
	fix_sizes();
});
$(document).ready(function(){
	
	/* Widgets footer fix */
	$('#sidebar .widget').append('<div class="widget-footer"><div/>');
	$("#partners_button").click(function(){
		$("#partners_cotnainer").slideToggle();
		$("#partners_wrapper").toggleClass('opened');
	});
});


$(document).ready(function()
{

	// Init slideshow on the homepage
	
//	if( $('.slideshow').find("a").length > 1 )
//	{
//		setInterval ( "slideSwitch()", 1000 );
//	}
//	else
//	{
//		$(".slideshow-prevNav").hide();
//		$(".slideshow-nextNav").hide();
//	}
//	
//
//	
//	$(".slideshow-prevNav").live("click", function()
//	{
//		
//		var $active = $('.slideshow .active');
//		var $activeDot = $('.slideshow-dots .active');
//		
//		var $prev =  $active.prev().length ? $active.prev() : $('.slideshow a:first');
//		var $prevDot =  $activeDot.prev().length ? $activeDot.prev() : $('.slideshow-dots span:first');
//		
//		
//		changeSlide( $active, $prev );
//		changeDot( $activeDot, $prevDot );
//	});
//
//	$(".slideshow-nextNav").live("click", function()
//	{
//		var $active = $('.slideshow .active');
//		var $activeDot = $('.slideshow-dots .active');
//		
//		var $next =  $active.next().length ? $active.next() : $('.slideshow a:first');
//		var $nextDot =  $activeDot.next().length ? $activeDot.next() : $('.slideshow-dots span:first');
//		
//		changeSlide( $active, $next );
//		changeDot( $activeDot, $nextDot );
//	});
//		
});

function slideSwitch() 
{
	var $active = $('.slideshow .active');
	var $activeDot = $('.slideshow-dots .active');

	var $next =  $active.next().length ? $active.next() : $('.slideshow a:first');
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
