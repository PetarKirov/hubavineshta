<?php
	/* Template name: Start */
?>
	
<?php get_header(); ?>
					<script src="<?php bloginfo('template_directory'); ?>/js/anythingslider/js/jquery.easing.1.2.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/anythingslider/css/anythingslider.css">
	<script src="<?php bloginfo('template_directory'); ?>/js/anythingslider/js/jquery.anythingslider.js"></script>
	<script src="<?php bloginfo('template_directory'); ?>/js/anythingslider/js/jquery.anythingslider.fx.js"></script>

	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/anythingslider/css/theme-custom.css">
			<style>
			ul#slider, ul#slider li {
    			width: 750px;
    			height: 400px;
    			list-style: none;
			}
			#slider img{
				border-top-left-radius:22px;			
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
				height:410px;
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
							<img style="position:absolute;z-index:10" src="<?php bloginfo('template_directory'); ?>/images/ramki/ramkaSmall_piece.png"/>	
						<div class="header">
							<div class="slideshow">
								<ul id="slider" class="slideshow-image">
									<?php
									$post=get_post(get_the_ID()); 
									$content = apply_filters('the_content', $post->post_content);	
									$imgArr = get_post_images(get_the_ID()); 
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
					<div class="content">
						<?=$content;?>
						<? $posts_array = get_posts(array(
													'numberposts' => 2,
													'category'=>14,
													'orderby'=> 'post_date',
													'order' => 'DESC')
													);?>
						<br>
						<?foreach($posts_array as $post):?>
						<?$imgArr = get_post_images($post->ID);
						$title=apply_filters('the_title', $post->post_title);?>
						<div style="height:175px">
							<a style="font-size: 18px;font-family: Arial;font-weight: 700;color: #0DA2D1;text-decoration:none" href="<?=get_permalink( $post->ID )?>">
								<img style="height:150px;float:left;margin-right:30px" src="<?=$imgArr[0]?>" />
								<h3 style="padding:75px 0 0 0"><?=$title?></h3>
							</a>
						</div>
					<?endforeach;?>
					</div>

					</div>
<?php get_footer(); ?>
