<?php
/*
Plugin Name: Fast Cat
Plugin URI: http://www.ciprian-dobrea.com/2009/01/fast-cat-is-fast/
Description: A fast category listing widget
Author: Ciprian Dobrea
Version: 1.4
Author URI: http://www.ciprian-dobrea.com/
*/

/*
 * Widget diplay
 */
function widget_fastcat($args) {
  extract($args);
  
  $options = get_option('widget_fastcat');
  if(($options['not_on_singular'])&&(is_singular())) 
  	return;  
  $tree = false;
  if($options['tree']){
  	$tree=true;
  	wp_enqueue_script('jquery');
  	wp_enqueue_script('jqcookie','/wp-content/plugins/fastcat-tree/jquery.cookie.js', array('jquery'));
  	wp_enqueue_script('jqtree','/wp-content/plugins/fastcat-tree/jquery.treeview.js', array('jquery','jqcookie'));
  	wp_enqueue_style ('jqtreecss', '/wp-content/plugins/fastcat-tree/jquery.treeview.css',array(),'1.0');
  }
  global $wpdb, $wp_rewrite;
  
  $catlink = str_replace( '/%category%', '', $wp_rewrite->get_category_permastruct());
  if ($catlink =="") 
	$catlink = '/categories';  
  $res = $wpdb->get_results("select parent, wp_terms.term_id, name, slug 
  							from wp_terms, wp_term_taxonomy 
  							where taxonomy='category' 
  							and wp_terms.term_id = wp_term_taxonomy.term_id");
  $cats = array();
  foreach ($res as $r){
	$cats[$r->parent][$r->term_id]['name'] = $r->name;
	$cats[$r->parent][$r->term_id]['slug'] = $r->slug;
  }
  echo $before_widget;
  echo $before_title . $options['title'] . $after_title;
  if($options['tree']){
  	echo '<script type="text/javascript">
			$(function() {
				$("#tree").treeview({
					collapsed: true,
					animated: "medium",
					control:"#sidetreecontrol",
					persist: "location"
				});
			})
		  </script>';
  }
  echo recurseCats($cats, $catlink, $options['rootcat'], false, $tree);  
  echo $after_widget;
  
}

/*
 * Recursive categories UL tree generator
 */
function recurseCats($cats, $path, $root=0, $child=false, $tree = false){
	if(is_array($cats[$root])){
		
		$ret = '<ul>';
		if($tree) 
		  $ret = '<ul id="tree">';
		
		if($child)
			$ret = '<ul class="children">';
		foreach($cats[$root] as $id => $cat){
			$ret .= '<li class="cat-item cat-item-'.$id.'"><a href="'.$path.'/'.$cat['slug']
					.'" title="'.$cat['name'].'">'.$cat['name'].'</a>'
					.recurseCats($cats, $path.'/'.$cat['slug'], $id, true ).'</li>';
		}
		$ret .='</ul>';
		return $ret;
	}else{
		return '';
	}
}
/*
 * Recursive <option> treelike list generator for the widget settings combo box 
 * - select root category
 */
function recurseCatsOptions($cats, $selected, $root=0, $level = 0){
	if(is_array($cats[$root])){
		foreach($cats[$root] as $id => $cat){
			$selected_str ='';
			if($id == $selected) $selected_str = ' selected="" ';
			$ret .= '<option value="'.$id.'" title="'.$cat['name'].'" '.$selected_str.' >'. 
				str_repeat("&nbsp;", $level). $cat['name']."</option>\n".
				recurseCatsOptions($cats, $selected, $id, $level + 1 ).'</li>';
		}
		return $ret;
	}else{
		return '';
	}
}

/*
 * Widget configuration
 */
function widget_fastcat_control(){
	$options = $newoptions = get_option('widget_fastcat');
	if ( $_POST["fastcat-submit"] ) {
		print_r($_POST);
		$newoptions['title']   = strip_tags(stripslashes($_POST["fastcat-title"]));
		$newoptions['rootcat'] = strip_tags(stripslashes($_POST["fastcat-rootcat"]));
		if($_POST["fastcat-tree"]=='on')
			$newoptions['tree'] = true;
		else 
			$newoptions['tree'] = false;
		
		if($_POST["fastcat-not_on_singular"]=='on')
			$newoptions['not_on_singular'] = true;
		else 
			$newoptions['not_on_singular'] = false;
		if ( empty($newoptions['title']) )   $newoptions['title'] = 'Categories';
		if ( empty($newoptions['rootcat']) ) $newoptions['rootcat'] = '0';
	}
	if ( $options != $newoptions ) {
		$options = $newoptions;
		update_option('widget_fastcat', $options);
	}
	$title = htmlspecialchars($options['title'], ENT_QUOTES);
	if($options['not_on_singular'])
		$checked_not_on_singular = 'checked=""';
	else
		$checked_not_on_singular = ''; 
	
	if($options['tree'])
		$checked_tree = 'checked=""';
	else
		$checked_tree = ''; 
	global $wpdb;
    
	$res = $wpdb->get_results("select parent, wp_terms.term_id, name, slug 
  							from wp_terms, wp_term_taxonomy 
  							where taxonomy='category' 
  							and wp_terms.term_id = wp_term_taxonomy.term_id");
	$cats = array();
	foreach ($res as $r){
		$cats[$r->parent][$r->term_id]['name'] = $r->name;
		$cats[$r->parent][$r->term_id]['slug'] = $r->slug;
	}
    ?>
				<p><label for="fastcat-title"><?php _e('Title:'); ?> <input style="width: 250px;" id="fastcat-title" name="fastcat-title" type="text" value="<?php echo $title; ?>" /> </label></p>
				<p><label for="fastcat-title"><?php _e('Display as collapsible tree:'); ?> <input id="fastcat-tree" name="fastcat-tree" type="checkbox" <?php echo $checked_tree; ?> /></label></p>
				<p><label for="fastcat-title"><?php _e('Hide for articles or pages:'); ?> <input id="fastcat-not_on_singular" name="fastcat-not_on_singular" type="checkbox" <?php echo $checked_not_on_singular; ?> /></label></p>
				<p><label for="fastcat-title"><?php _e('Root category:'); ?> 
						<select style="width: 250px;" id="fastcat-rootcat" name="fastcat-rootcat">
							<option value="0">[absolute root]</option>
							<?php 
								echo recurseCatsOptions($cats, $options['rootcat']); 
							?>
						</select>
					</label>
				</p>
				<input type="hidden" id="fastcat-submit" name="fastcat-submit" value="1" />
	<?php
}

//Widget initialization

function fastcat_init()
{
  register_sidebar_widget(__('Fast Cat'), 'widget_fastcat');
  register_widget_control('Fast Cat', 'widget_fastcat_control', null, 75, 'fastcat');
  $options = get_option('widget_fastcat');
  if($options['tree']){
  	wp_enqueue_script('jquerie','/wp-content/plugins/fastcat-tree/jquery.js', array('jquery'));
  	wp_enqueue_script('jqcookie','/wp-content/plugins/fastcat-tree/jquery.cookie.js', array('jquerie'));
  	wp_enqueue_script('jqtree','/wp-content/plugins/fastcat-tree/jquery.treeview.js', array('jquerie','jqcookie'));
  	wp_enqueue_style ('jqtreecss', '/wp-content/plugins/fastcat-tree/jquery.treeview.css',array());
  }
}
add_action("plugins_loaded", "fastcat_init");
?>