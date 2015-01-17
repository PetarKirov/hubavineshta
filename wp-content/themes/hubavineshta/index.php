<?php get_header(); ?>
	<script src="<?php bloginfo('template_directory'); ?>/js/anythingslider/js/jquery.easing.1.2.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/anythingslider/css/anythingslider.css">
	<script src="<?php bloginfo('template_directory'); ?>/js/anythingslider/js/jquery.anythingslider.js"></script>
	<link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/js/anythingslider/css/theme-custom.css">
	<style>
			ul#slider, ul#slider li {
    			width: 360px;
    			height: 270px;
    			list-style: none;
			}
			#content-wrapper .header
			{
				height:260px;
			}
			.content_non {
				-moz-border-radius :25px 0px 25px 0px !important;
				-webkit-border-radius:25px 0px 25px 0px !important;
				border-radius: 25px 0px 25px 0px !important;			
			}
		</style>
					<script>
		// Set up Sliders
		// **************
		$(function(){

			$('#slider').anythingSlider({
				theme           : 'custom',
				easing          : 'swing',
				buildStartStop: false,
				onSlideComplete : function(slider){
					// alert('Welcome to Slide #' + slider.currentPage);
				},
				 appendBackTo: ".anythingControls",
				 appendForwardTo: ".anythingControls"
    // Append back arrow to a HTML element
    // (jQuery Object, selector or HTMLNode), if not null
    
				
			});
		});
		</script>
	<div id="content-wrapper">
		<?$cat=get_query_var('cat')?>
		<? $categories=get_curr_cats();?>
				<?if(empty($categories)&&!($cat=='15'||$cat=='16'||$cat=='17'||$cat=='18')):?>
					<?$posts_array = get_posts(array('category'=>$cat));?>
						<?if(count($posts_array)==1):?>
							<? $post=get_post(@$posts_array[0]->ID);?>
							<img style="position:absolute;z-index:10" src="<?php bloginfo('template_directory'); ?>/images/ramki/ramkaSmall_piece.png"/>						
							<div  class="header">
							<div  class="slideshow">
								<ul  id="slider" class="slideshow-image">
								<?php
								$imgArr = get_post_images($post->ID); 
								foreach( $imgArr as $img )
								{
									echo "<li>";
									echo "<img src=\"{$img}\"/>";
									echo "</li>";
								}
								?>
							</div>
							<h3><?=get_the_title($post->ID);?></h3>
							</div>
							<div class="content">	
							<?=$post->post_content;?>
							</div>
						</div>
						<?else:?>
						<div class="content">
							<img style="position:absolute;z-index:10;margin-top: -21px;
margin-left: -26px;" src="<?php bloginfo('template_directory'); ?>/images/ramki/ramka_corner_gray.png"/>
						<?foreach($posts_array as $post):?>
							<h3 class="products" ><?=get_the_title($post->ID);?></h3>
						<?endforeach;?>
					</div>
				<?endif;?>
			<?else:?>
				<div class="content_non">
					<img style="position:absolute;z-index:10;margin-top: -21px;
margin-left: -26px;" src="<?php bloginfo('template_directory'); ?>/images/ramki/ramka_corner_gray.png"/>
					<?if($cat=='13'||$cat=='15'||$cat=='16'||$cat=='17'||$cat=='18'):?>
						<?$post_id=466;$post=get_post($post_id);?>
						<h3 style="font-size: 18px;font-family: Arial;font-weight: 700;color: #0DA2D1;"><?=get_the_title($post->ID);?></h3>
						<?=$post->post_content;?>
					<?else:?>
						<?foreach($categories as $cat):?>
							<?$posts_array = get_posts(array(
													'category'=>$cat->term_id,
													'orderby'=> 'post_date',
													'order' => 'DESC')
													);
								if(!count($posts_array))
									continue;
								$i=0;
								do{
									$imgArr = get_post_images($posts_array[$i]->ID);
									$i++;
								}while(empty($imgArr)&&isset($posts_array[$i]))							
								
							?>
						<div style="height:175px">
							<a style="font-size: 18px;font-family: Arial;font-weight: 700;color: #0DA2D1;text-decoration:none" href="<?=get_category_link($cat->term_id )?>">
								<img style="height:150px;width:200px;float:left;margin-right:30px" src="<?=$imgArr[0]?>" />
								<h3 style="padding:75px 0 0 0"><?=$cat->name?></h3>
							</a>
						</div>
					<?endforeach;?>
					<?endif;?>
				</div>
			   </div>
			<?endif;?>
				
<?php get_footer(); ?>
