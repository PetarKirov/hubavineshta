<?php get_header(); ?>
			<div id="content-wrapper">
					<div class="content">
					<img style="position:absolute;z-index:10;margin-top: -21px;
margin-left: -26px;" src="<?php bloginfo('template_directory'); ?>/images/ramki/ramka_corner_gray.png"/>
					<?$posts_array = get_posts(array('category'=>get_query_var('cat'),'posts_per_page'=>50));?>
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
