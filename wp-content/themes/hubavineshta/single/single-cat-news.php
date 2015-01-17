<?php get_header(); ?>
					<script src="<?php bloginfo('template_directory'); ?>/js/anythingslider/js/jquery.easing.1.2.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/anythingslider/css/anythingslider.css">
	<script src="<?php bloginfo('template_directory'); ?>/js/anythingslider/js/jquery.anythingslider.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/anythingslider/js/jquery.anythingslider.fx.js"></script>

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/anythingslider/css/theme-custom.css">
			<style>
			ul#slider, ul#slider li {
    			width: 750px;
    			height: 560px;
    			list-style: none;
			}
			#slider img{
				border-top-left-radius:22px;			
			}
			.content {
				-moz-border-radius :0px 0px 25px 0px !important;
				-webkit-border-radius:0px 0px 25px 0px !important;
				border-radius: 0px 0px 25px 0px !important;			
			}
			.slideshow-image {
				position: relative;
				padding:0;
			}
			.slideshow{
				padding:0;
			}
			#content-wrapper .header
			{
				width: 750px;
				height:560px;
				border-top:5px solid #0da2d1;
				border-left:5px solid #0da2d1;
				border-right:5px solid #0da2d1;
				background: #E3E3E3;
				padding:0;
			}
			#content-wrapper .content{
			border-top:none !important;
			}
		</style>
					<script>
		// Set up Sliders
		// **************
		$(function(){

			$('#slider').anythingSlider({
				animationTime : 0,
				theme           : 'custom',
				autoPlay		: true,
				buildArrows: false,
    			buildNavigation: false,				
				buildStartStop: false,
				onSlideComplete : function(slider){
					// alert('Welcome to Slide #' + slider.currentPage);
				}
    		});
    $('#slider').anythingSliderFx({
        inFx: {
            'img' : { opacity: 1, duration: 800 }
        },
        outFx: {
            'img' : { opacity: 0, duration: 0 }
        }
			});
   
		});
		</script>
					<div id="content-wrapper">
						<div class="header">
							<div class="slideshow">
								<ul id="slider" class="slideshow-image">
									<?php
									$post=get_post(get_the_ID()); 
									$content = apply_filters('the_content', $post->post_content);										
									$imgArr = get_post_images( get_the_ID() ); 
									foreach( $imgArr as $img )
									{
										echo "<li>";
										echo "<img src=\"{$img}\"/>";
										echo "</li>";
									}
									?>
								</ul>
							</div>
						</div>
					<div class="content"><?=$content;?></div>

					</div>
<?php get_footer(); ?>
