<?php

define( "CSS_DIR", TEMPLATEPATH . "/css/" );
define( "JS_DIR", TEMPLATEPATH . "/js/" );

define( "PAGES_DIR", TEMPLATEPATH . "/pages/" );
define( "SINGLE_DIR", TEMPLATEPATH . "/single/" );
define( "SYSTEM_DIR", TEMPLATEPATH . "/system/" );
define( "FUNCTIONS_DIR", TEMPLATEPATH ."/functions/");

$upload_dir = wp_upload_dir();
define( "TMP_DIR", $upload_dir['baseurl'] . "/temp/" );

//define( "JSON_KEY", "zlati" );

/* Navigatin menu items
 * 
 * name - Display name in the header navigation
 * subName - Display sub name in the header navigation
 * link - Url in the browser location bar. Usefull for SEO purposes in different languages. There also has to be such category created in WP
 * linkTitle - Thje title attribute in the link. Usefull for SEO purposes.
 * page - The actial page template name in the /pages folder. Usually in english for development purposes. This is used for the "slug" parameter of a post type. 
*/

class FS
{
	static $adminColumnsOrder = array("cb", "campaign_thumbnail",  "campaign_id", "Featured", "title", "date"); 
	
	static $categoryTypes = array("competition", "offer", "shopping");
	
	static $ajaxActions = array( "get_search_suggestions", "update_campaign_status", "send_share_mail" ); // List any AJAX Actions here or it won't be called
	
	static $navItemsParents = array(
						1 => array(
							"name" => "Tidningar",
							"subName" => "tidningar",
							"link" => "tidningar",
							"linkTitle" => "tidningar",
							"page" => "offer", //slug in post types
							"hasChildren" => TRUE
						),
						2 => array(
							"name" => "Tävlingar",
							"subName" => "tävlingar",
							"link" => "tavlingar",
							"linkTitle" => "tävlingar",
							"page" => "competition"
						),
						3 => array(
							"name" => "shopping",
							"subName" => "shopping",
							"link" => "shopping",
							"linkTitle" => "shopping",
							"page" => "shopping"
						),
						4 => array(
							"name" => "Kontakta oss",
							"subName" => "kontakta oss",
							"link" => "kontakta-oss",
							"linkTitle" => "kontaktaoss",
							"page" => "contactus",
						),
						5 => array(
							"name" => "bli medlem",
							"subName" => "bli medlem",
							"link" => "bli-medlem",
							"linkTitle" => "blimedlem",
							"page" => "signup"
						)
					);
	
	static $navItemsChildren = array(
						1 => array(
							"parentPage" => "offer",
							"name" => "Man",
							"link" => "man",
							"linkTitle" => "man",
							"page" => "man"
						),
						2 => array(
							"parentPage" => "offer",
							"name" => "Kvinna",
							"link" => "kvinna",
							"linkTitle" => "kvinna",
							"page" => "kvinna"
						),
						3 => array(
							"parentPage" => "offer",
							"name" => "Barn & familj",
							"link" => "barn-familj",
							"linkTitle" => "Barn och familj",
							"page" => "barn-familj"
						),
						4 => array(
							"parentPage" => "offer",
							"name" => "Hälsa",
							"link" => "halsa",
							"linkTitle" => "halsa",
							"page" => "halsa"
						),
						5 => array(
							"parentPage" => "offer",
							"name" => "Resa",
							"link" => "resa",
							"linkTitle" => "resa",
							"page" => "resa"
						),
						6 => array(
							"parentPage" => "offer",
							"name" => "Hem & Trädgård",
							"link" => "hem-tradgard",
							"linkTitle" => "Hem & Trädgård",
							"page" => "hem-tradgard"
						),
						7 => array(
							"parentPage" => "offer",
							"name" => "Mode/Skönhet",
							"link" => "mode-skonhet",
							"linkTitle" => "Mode/Skönhet",
							"page" => "mode-skonhet"
						),
						7 => array(
							"parentPage" => "offer",
							"name" => "Dagstidningar",
							"link" => "dagstidningar",
							"linkTitle" => "Dagstidningar",
							"page" => "dagstidningar"
						),
						8 => array(
							"parentPage" => "offer",
							"name" => "Serietidningar",
							"link" => "serietidningar",
							"linkTitle" => "Serietidningar",
							"page" => "serietidningar"
						),
						9 => array(
							"parentPage" => "offer",
							"name" => "Data/teknik/bilar",
							"link" => "data-teknik-bilar",
							"linkTitle" => "Data/teknik/bilar",
							"page" => "data-teknik-bilar"
						),
						10=> array(
							"parentPage" => "offer",
							"name" => "Övriga intressen",
							"link" => "ovriga-intressen",
							"linkTitle" => "Övriga intressen",
							"page" => "ovriga-intressen"
						),
					);
}