<?php
/* 
* +--------------------------------------------------------------------------+
* | Copyright (c) ShemOtechnik Profitquery Team shemotechnik@profitquery.com |
* +--------------------------------------------------------------------------+
* | This program is free software; you can redistribute it and/or modify     |
* | it under the terms of the GNU General Public License as published by     |
* | the Free Software Foundation; either version 2 of the License, or        |
* | (at your option) any later version.                                      |
* |                                                                          |
* | This program is distributed in the hope that it will be useful,          |
* | but WITHOUT ANY WARRANTY; without even the implied warranty of           |
* | MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the            |
* | GNU General Public License for more details.                             |
* |                                                                          |
* | You should have received a copy of the GNU General Public License        |
* | along with this program; if not, write to the Free Software              |
* | Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA 02110-1301 USA |
* +--------------------------------------------------------------------------+
*/
/**
* Plugin Name: 24 of the Best Free Marketing Tools
* Plugin URI: http://profitquery.com/?utm_campaign=aio_widgets_wp
* Description: 24 free marketing tools for any WordPress websites. Growth website traffic, emails, subscription, feedbacks, phone numbers, shares, referrals, followers
* Version: 5.0.4
*
* Author: Profitquery Team <support@profitquery.com>
* Author URI: http://profitquery.com/?utm_campaign=aio_widgets_wp
*/

//update_option('profitquery', array());
$profitquery = get_option('profitquery');

//rename contactus popup
if(isset($profitquery[contactUsPopup])){
	$profitquery[contactFormPopup] = $profitquery[contactUsPopup];
	unset($profitquery[contactUsPopup]);
	update_option('profitquery', $profitquery);
}

error_reporting(0);



if (!defined('PROFITQUERY_SMART_WIDGETS_PLUGIN_NAME'))
	define('PROFITQUERY_SMART_WIDGETS_PLUGIN_NAME', trim(dirname(plugin_basename(__FILE__)), '/'));

if (!defined('PROFITQUERY_SMART_WIDGETS_PAGE_NAME'))
	define('PROFITQUERY_SMART_WIDGETS_PAGE_NAME', 'free_profitquery_aio_widgets');

if (!defined('PROFITQUERY_SMART_WIDGETS_ADMIN_CSS_PATH'))
	define('PROFITQUERY_SMART_WIDGETS_ADMIN_CSS_PATH', 'css/');

if (!defined('PROFITQUERY_SMART_WIDGETS_ADMIN_JS_PATH'))
	define('PROFITQUERY_SMART_WIDGETS_ADMIN_JS_PATH', 'js/');

if (!defined('PROFITQUERY_SMART_WIDGETS_ADMIN_IMG_PATH'))
	define('PROFITQUERY_SMART_WIDGETS_ADMIN_IMG_PATH', 'images/');

if (!defined('PROFITQUERY_SMART_WIDGETS_ADMIN_IMG_PREVIEW_PATH'))
	define('PROFITQUERY_SMART_WIDGETS_ADMIN_IMG_PREVIEW_PATH', 'preview/');

$pathParts = pathinfo(__FILE__);
$path = $pathParts['dirname'];

if (!defined('PROFITQUERY_SMART_WIDGETS_FILENAME'))
	define('PROFITQUERY_SMART_WIDGETS_FILENAME', $path.'/free_profitquery_aio_widgets.php');


require_once 'free_profitquery_aio_widgets_class.php';
$ProfitQuerySmartWidgetsClass = new ProfitQuerySmartWidgetsClass();


add_action('init', 'profitquery_smart_widgets_init');


function profitquery_smart_widgets_init(){
	global $profitquery;
	global $ProfitQuerySmartWidgetsClass;	
	if ( !is_admin()){		
		add_action('wp_head', 'profitquery_smart_widgets_insert_code');		
	}		
}


function pq_printr($array){
	echo '<pre>';
	print_r($array);
	echo '</pre>';
}

/* Adding action links on plugin list*/
function profitquery_wordpress_admin_link($links, $file) {
    static $this_plugin;

    if (!$this_plugin) {
        $this_plugin = plugin_basename(__FILE__);
    }

    if ($file == $this_plugin) {
        $settings_link = '<a href="options-general.php?page=free_profitquery_aio_widgets">Settings</a>';
        array_unshift($links, $settings_link);
    }

    return $links;
}

function PQcolorToHex($val){		
	$colorArray = array("indianred"=>"#cd5c5c","crimson"=>"#dc143c","lightpink"=>"#ffb6c1","pink"=>"#ffc0cb","palevioletred"=>"#D87093","hotpink"=>"#ff69b4","mediumvioletred"=>"#c71585","orchid"=>"#da70d6","plum"=>"#dda0dd","violet"=>"#ee82ee","magenta"=>"#ff00ff","purple"=>"#800080","mediumorchid"=>"#ba55d3","darkviolet"=>"#9400d3","darkorchid"=>"#9932cc","indigo"=>"#4b0082","blviolet"=>"#8a2be2","mediumpurple"=>"#9370db","darkslateblue"=>"#483d8b","mediumslateblue"=>"#7b68ee","slateblue"=>"#6a5acd","blue"=>"#0000ff","navy"=>"#000080","midnightblue"=>"#191970","royalblue"=>"#4169e1","cornflowerblue"=>"#6495ed","steelblue"=>"#4682b4","lightskyblue"=>"#87cefa","skyblue"=>"#87ceeb","deepskyblue"=>"#00bfff","lightblue"=>"#add8e6","powderblue"=>"#b0e0e6","darkturquoise"=>"#00ced1","cadetblue"=>"#5f9ea0","cyan"=>"#00ffff","teal"=>"#008080","mediumturquoise"=>"#48d1cc","lightseagreen"=>"#20b2aa","paleturquoise"=>"#afeeee","mediumspringgreen"=>"#00fa9a","springgreen"=>"#00ff7f","darkseagreen"=>"#8fbc8f","palegreen"=>"#98fb98","lmgreen"=>"#32cd32","forestgreen"=>"#228b22","darkgreen"=>"#006400","lawngreen"=>"#7cfc00","grnyellow"=>"#adff2f","darkolivegreen"=>"#556b2f","olvdrab"=>"#6b8e23","yellow"=>"#ffff00","olive"=>"#808000","darkkhaki"=>"#bdb76b","khaki"=>"#f0e68c","gold"=>"#ffd700","gldenrod"=>"#daa520","orange"=>"#ffa500","wheat"=>"#f5deb3","navajowhite"=>"#ffdead","burlywood"=>"#deb887","darkorange"=>"#ff8c00","sienna"=>"#a0522d","orngred"=>"#ff4500","tomato"=>"#ff6347","salmon"=>"#fa8072","brown"=>"#a52a2a","red"=>"#ff0000","black"=>"#000000","darkgrey"=>"#a9a9a9","dimgrey"=>"#696969","lightgrey"=>"#d3d3d3","slategrey"=>"#708090","lightslategrey"=>"#778899","silver"=>"#c0c0c0","whtsmoke"=>"#f5f5f5","white"=>"#ffffff");
	foreach((array)$colorArray as $k => $v){			
		if(strstr(trim($val), '_'.$k)){				
			return $v;
		}
	}
	return $val;
	
}

function PQgetNormalColorStructure($name, $val){
	$array = array(
		'background_button_block' => 'pq_btngbg_bgcolor_btngroup_PQCC',
		'background_text_block' => 'pq_bgtxt_bgcolor_bgtxt_PQCC',
		'background_form_block' => 'pq_formbg_bgcolor_formbg_PQCC',
		'background_soc_block' => 'pq_bgsocblock_bgcolor_bgsocblock_PQCC',
		'overlay' => 'pq_over_bgcolor_PQCC',
		'button_text_color' => 'pq_btn_color_btngroupbtn_PQCC',
		'button_color' => 'pq_btn_bg_bgcolor_btngroupbtn_PQCC',
		'head_color' => 'pq_h_color_h1_PQCC',
		'text_color' => 'pq_text_color_block_PQCC',
		'border_color' => 'pq_bd_bordercolor_PQCC',
		'bookmark_text_color' => 'pq_text_color_block_PQCC',
		'bookmark_background_color' => 'pq_bg_bgcolor_PQCC',
		'close_icon_color' => 'pq_x_color_pqclose_PQCC',
		'gallery_background_color' => 'pq_bg_bgcolor_PQCC',
		'gallery_button_text_color' => 'pq_btn_color_btngroupbtn_PQCC',
		'gallery_button_color' => 'pq_btn_bg_bgcolor_btngroupbtn_PQCC',
		'gallery_head_color' => 'pq_h_color_h1_PQCC',
		'tblock_text_font_color' => 'pq_bgtxt_color_bgtxtp_PQCC',
		'background_mobile_block' => 'pq_mblock_bgcolor_bgmobblock_PQCC',
		'mblock_text_font_color' => 'pq_mblock_color_bgmobblockp_PQCC',
		'formbar_background_color' => 'pq_formbar_bg_bgcolor_PQCC',
		'formbar_border_color' => 'pq_formbar_bd_bordercolor_PQCC',
		'formbar_head_color' => 'pq_formbar_h_color_p_PQCC',
		'formbar_close_icon_color' => 'pq_formbar_x_color_fbclose_PQCC'
	);
	$ret = '';
	if(trim($val)){
		if(strstr(trim($val), '#')){
			$ret = $array[$name].str_replace('#','',trim($val));
		}else{
			$ret = $array[$name].str_replace('#','',trim(PQcolorToHex($val)));
		}
	}
	return $ret;
}

function hex2rgb($hex) {
   $hex = str_replace("#", "", $hex);

   if(strlen($hex) == 3) {
      $r = hexdec(substr($hex,0,1).substr($hex,0,1));
      $g = hexdec(substr($hex,1,1).substr($hex,1,1));
      $b = hexdec(substr($hex,2,1).substr($hex,2,1));
   } else {
      $r = hexdec(substr($hex,0,2));
      $g = hexdec(substr($hex,2,2));
      $b = hexdec(substr($hex,4,2));
   }
   $rgb = array($r, $g, $b);
   //return implode(",", $rgb); // returns the rgb values separated by commas
   return $rgb; // returns an array with the rgb values
}

function PQgetBackgroundColor($bg, $opacity){
	$ret = '';
	if((int)$opacity == 0) $opacity = 10;
	if($bg && $opacity){		
		$rgb = hex2rgb(str_replace('#','',trim(PQcolorToHex($bg))));		
		$ret = 'pq_bg_bgcolor_PQRGBA_'.(int)$rgb[0].'_'.(int)$rgb[1].'_'.(int)$rgb[2].'_'.$opacity;		
	}
	return $ret;
}

function PQgetThankCodeStructure($data){
	$return = array();
	//enable
	if((string)$data[enable] == 'on' || (int)$data[enable] == 1) $return[enable] = 1; else $return[enable] = 0;
	//animation
	if($data[animation]) $return[animation] = 'pq_animated '.$data[animation];	
	
	//closeIconOption
	$return[closeIconOption][animation] = stripslashes($data[close_icon][animation]);
	$return[closeIconOption][button_text] = htmlspecialchars(stripslashes($data[close_icon][button_text]));
	
	
	//designOptions	
	$return[designOptions] = $data[typeWindow].' '.$return[animation].' '.$data[popup_form].' '.PQgetBackgroundColor($data[background_color], $data[background_opacity]).' '.$data[head_font];
	$return[designOptions] .= ' '.$data[head_size].' '.PQgetNormalColorStructure('head_color', $data[head_color]).' '.$data[text_font].' '.$data[font_size].' '.PQgetNormalColorStructure('text_color', $data[text_color]);    
	$return[designOptions] .= ' '.PQgetNormalColorStructure('border_color', $data[border_color]).' '.$data[button_font].' '.PQgetNormalColorStructure('button_text_color', $data[button_text_color]).' '.PQgetNormalColorStructure('button_color', $data[button_color]);
	$return[designOptions] .= ' '.$data[close_icon][form].' '.PQgetNormalColorStructure('close_icon_color', $data[close_icon][color]).' '.$data[button_font_size];
	$return[designOptions] .= ' '.PQgetNormalColorStructure('background_button_block', $data[background_button_block]).' '.PQgetNormalColorStructure('background_soc_block', $data[background_soc_block]);
		
	$return[designOptions] .= ' '.$data[header_img_type].' '.$data[close_text_font];
	$return[designOptions] .= ' '.$data[form_block_padding].' '.$data[button_block_padding];
	$return[designOptions] .= ' '.$data[text_block_padding].' '.$data[icon_block_padding];
	$return[designOptions] .= ' '.$data[button_form].' '.$data[input_type].' '.$data[button_type];
	$return[designOptions] .= ' '.$data[showup_animation];
	
	//img
	$return[header_image_src] = stripslashes($data[header_image_src]);	
	$return[background_image_src] = stripslashes($data[background_image_src]);	
	
	
	//txt
	$return[title] = htmlspecialchars(stripslashes($data[title]));
	$return[sub_title] = htmlspecialchars(stripslashes($data[sub_title]));	
	
	if($data[socnet_block_type] == 'follow' || $data[socnet_block_type] == 'share'){		
		$return[designOptions] .= ' '.$data[icon][design].' '.$data[icon][form].' '.$data[icon][size].' '.$data[icon][space];
		$return[socnetBlockType] = $data[socnet_block_type];
		$return[hoverAnimation] = $data[icon][animation];		
		
		if($data[socnet_block_type] == 'share'){
			foreach((array)$data[socnet_with_pos] as $k => $v){
				if($v){
					$return[socnetShareBlock][$v][exactPageShare] = 1;
				}
			}
		}
		//		
		if($data[socnet_block_type] == 'follow'){
			foreach((array)$data[socnetIconsBlock] as $k => $v){
				if($k && $v){
					if($k == 'FB' || $k == 'facebook') {
						$v = str_replace('https://facebook.com','',$v);
						$v = str_replace('http://facebook.com','',$v);
						$return[socnetFollowBlock]['facebook'] = stripslashes('https://facebook.com/'.$v);
					}
					if($k == 'TW' || $k == 'twitter') {
						$v = str_replace('https://twitter.com','',$v);
						$v = str_replace('http://twitter.com','',$v);
						$return[socnetFollowBlock]['twitter'] = stripslashes('https://twitter.com/'.$v);
					}
					if($k == 'GP' || $k == 'google-plus') {
						$v = str_replace('https://plus.google.com','',$v);
						$v = str_replace('http://plus.google.com','',$v);						
						$return[socnetFollowBlock]['google-plus'] = stripslashes('https://plus.google.com/'.$v);
					}
					if($k == 'PI' || $k == 'pinterest') {
						$v = str_replace('https://pinterest.com','',$v);
						$v = str_replace('http://pinterest.com','',$v);
						$return[socnetFollowBlock]['pinterest'] = stripslashes('https://pinterest.com/'.$v);
					}
					if($k == 'VK' || $k == 'vk') {
						$v = str_replace('https://vk.com/','',$v);
						$v = str_replace('http://vk.com/','',$v);
						$return[socnetFollowBlock]['vk'] = stripslashes('http://vk.com/'.$v);
					}
					if($k == 'YT' || $k == 'youtube') {
						$v = str_replace('https://www.youtube.com/channel/','',$v);
						$v = str_replace('http://www.youtube.com/channel/','',$v);
						$return[socnetFollowBlock]['youtube'] = stripslashes('https://www.youtube.com/channel/'.$v);
					}
					if($k == 'RSS') {
						$return[socnetFollowBlock]['RSS'] = stripslashes($v);
					}
					if($k == 'IG' || $k == 'instagram') {
						$v = str_replace('https://instagram.com','',$v);
						$v = str_replace('http://instagram.com','',$v);
						$return[socnetFollowBlock]['instagram'] = stripslashes('http://instagram.com/'.$v);
					}
					if($k == 'OD' || $k == 'odnoklassniki') {
						$v = str_replace('https://ok.ru','',$v);
						$v = str_replace('http://ok.ru','',$v);
						$return[socnetFollowBlock]['odnoklassniki'] = stripslashes('http://ok.ru/'.$v);
					}
					if($k == 'LI' || $k == 'linkedin') {
						$v = str_replace('https://www.linkedin.com/','',$v);
						$v = str_replace('http://www.linkedin.com/','',$v);
						$return[socnetFollowBlock]['linkedin'] = stripslashes('https://www.linkedin.com/'.$v);
					}
				}
			}
		}
	}
	
	if($data[buttonBlock][type] == 'redirect'){
		$return[buttonActionBlock][type] = 'redirect';
		$return[buttonActionBlock][redirect_url] = stripslashes($data[buttonBlock][url]);
		$return[buttonActionBlock][button_text] = htmlspecialchars(stripslashes($data[buttonBlock][button_text]));
	}	
	
	
	if($data[overlay]){
		$return[blackoutOption][enable] = 1;
		$return[blackoutOption][style] = PQgetNormalColorStructure('overlay', $data[overlay]).' '.$data[overlay_opacity];
	}
	
	if($data[overlay_image_src]){
		$return[blackoutOption][enable] = 1;
		$return[blackoutOption][background_image_src] = $data[overlay_image_src];
	}
	
	return $return;
}


//Prepare output sctructure
function profitquery_prepare_sctructure_product($data, $bookmark = 0, $formBar = 0){	
	$return = $data;
	
	//enable
	if((string)$data[enable] == 'on' || (int)$data[enable] == 1) $return[enable] = 1; else $return[enable] = 0;
	
	//hoverAnimation
	$return[hoverAnimation] = $return[icon][animation];
	
	//closeIconOption
	$return[closeIconOption][animation] = stripslashes($data[close_icon][animation]);
	$return[closeIconOption][button_text] = htmlspecialchars(stripslashes($data[close_icon][button_text]));
/************************************************GENERATE TYPE WINDOW********************************************************************************/
	//position
	if($data[position] == 'BAR_TOP') $return[position] = 'pq_top';
	if($data[position] == 'BAR_BOTTOM') $return[position] = 'pq_bottom';
	if($data[position] == 'SIDE_LEFT_TOP') $return[position] = 'pq_left pq_top';
	if($data[position] == 'SIDE_LEFT_MIDDLE') $return[position] = 'pq_left pq_middle';
	if($data[position] == 'SIDE_LEFT_BOTTOM') $return[position] = 'pq_left pq_bottom';
	if($data[position] == 'SIDE_RIGHT_TOP') $return[position] = 'pq_right pq_top';
	if($data[position] == 'SIDE_RIGHT_MIDDLE') $return[position] = 'pq_right pq_middle';
	if($data[position] == 'SIDE_RIGHT_BOTTOM') $return[position] = 'pq_right pq_bottom';
	if($data[position] == 'CENTER') $return[position] = '';
	if($data[position] == 'FLOATING_LEFT_TOP') $return[position] = 'pq_fixed pq_left pq_top';
	if($data[position] == 'FLOATING_LEFT_BOTTOM') $return[position] = 'pq_fixed pq_left pq_bottom';
	if($data[position] == 'FLOATING_RIGHT_TOP') $return[position] = 'pq_fixed pq_right pq_top';
	if($data[position] == 'FLOATING_RIGHT_BOTTOM') $return[position] = 'pq_fixed pq_right pq_bottom';
	
	//animation
	if($data[animation]) $return[animation] = 'pq_animated '.$data[animation];	
	
	if((int)$bookmark == 1){
		$return[designOptions] = $return[typeWindow];
		$return[typeBookmarkWindow] = $return[position].' '.PQgetNormalColorStructure('bookmark_background_color', $data[bookmark_background]).' '.PQgetNormalColorStructure('bookmark_text_color',$return[bookmark_text_color]).' '.$return[bookmark_text_font].' '.$return[bookmark_text_size];
	}else{
		if((int)$formBar == 1){
			$return[designOptions] = $return[typeWindow];
		}else{
			$return[designOptions] = $return[typeWindow].' '.$return[position];
		}
		
	}
	
	$return[designOptions] .=' '.$return[themeClass].' '.$return[icon][design].' '.$return[icon][form].' '.$return[icon][size].' '.$return[icon][space].' '.$return[icon][shadow];
	$return[designOptions] .=' '.$return[animation].' '.$return[mobile_type].' '.$return[mobile_position];
	//new mobile
	$return[designOptions] .=' '.PQgetNormalColorStructure('background_mobile_block',$return[background_mobile_block]).' '.$return[mblock_text_font].' '.PQgetNormalColorStructure('mblock_text_font_color',$return[mblock_text_font_color]).' '.$return[mblock_text_font_size];	
	$return[designOptions] .=' '.PQgetBackgroundColor($data[background_color], $data[background_opacity]).' '.$return[text_font].' '.$return[font_size].' '.PQgetNormalColorStructure('text_color',$return[text_color]).' '.$return[button_font];
	$return[designOptions] .=' '.PQgetNormalColorStructure('button_text_color',$return[button_text_color]).' '.PQgetNormalColorStructure('button_color',$return[button_color]).' '.$return[button_font_size];
	$return[designOptions] .=' '.PQgetNormalColorStructure('border_color',$return[border_color]).' '.$return[popup_form].' '.$return[head_font];
	$return[designOptions] .=' '.$return[head_size].' '.PQgetNormalColorStructure('head_color',$return[head_color]);	
	$return[designOptions] .= ' '.$data[close_icon][form].' '.PQgetNormalColorStructure('close_icon_color', $data[close_icon][color]);
	$return[designOptions] .= ' '.$data[header_img_type].' '.$data[close_text_font];
	$return[designOptions] .= ' '.$data[form_block_padding].' '.$data[button_block_padding];
	$return[designOptions] .= ' '.$data[text_block_padding].' '.$data[icon_block_padding];
	$return[designOptions] .= ' '.$data[button_form].' '.$data[input_type].' '.$data[button_type];
	$return[designOptions] .= ' '.$data[showup_animation];
		
	
	//new
	$return[designOptions] .= ' '.PQgetNormalColorStructure('background_button_block', $data[background_button_block]).' '.PQgetNormalColorStructure('background_text_block', $data[background_text_block]).' '.PQgetNormalColorStructure('background_form_block', $data[background_form_block]).' '.PQgetNormalColorStructure('background_soc_block', $data[background_soc_block]).' '.PQgetNormalColorStructure('tblock_text_font_color', $data[tblock_text_font_color]);
	
	$return[designOptions] = str_replace('  ', ' ',$return[designOptions]);
	$return[designOptions] = str_replace('  ', ' ',$return[designOptions]);
	
	//type Design
	$return[typeDesign] = $return[themeClass].' '.$return[icon][form].' '.$return[icon][size].' '.$return[icon][space].' '.$return[icon][shadow].' '.$return[icon][position];
	
	//formBar
	$return[formBarOptions][designOptions] = $return[themeClass].' '.$return[position];
	$return[formBarOptions][designOptions] .= ' '.$return[formbar_border_type].' '.$return[formbar_border_depth].' '.$return[formbar_border_depth].' pq_animated '.$return[formbar_animation];
	$return[formBarOptions][designOptions] .= ' '.$return[formbar_head_font].' '.$return[formbar_head_font_size].' '.$return[formbar_close_icon_animation].' '.$return[formbar_roll_icon_animation];
	$return[formBarOptions][designOptions] .= ' '.$return[formbar_close_icon][form];
	$return[formBarOptions][designOptions] .= ' '.$return[formbar_close_icon][color];
	$return[formBarOptions][designOptions] .= ' '.PQgetNormalColorStructure('formbar_background_color',$return[formbar_background_color]);
	$return[formBarOptions][designOptions] .= ' '.PQgetNormalColorStructure('formbar_border_color',$return[formbar_border_color]);
	$return[formBarOptions][designOptions] .= ' '.PQgetNormalColorStructure('formbar_head_color',$return[formbar_head_color]);
	$return[formBarOptions][designOptions] .= ' '.PQgetNormalColorStructure('formbar_close_icon_color',$return[formbar_close_icon][color]);
	$return[formBarOptions][designOptions] .= ' '.$data[showup_animation];
	$return[formBarOptions][designOptions] .= ' '.$data[formbar_header_img_type];
	$return[formBarOptions][designOptions] .= ' '.$data[formbar_close_text_font];
	
	$return[formBarOptions][title] = stripslashes($data[formbar_title]);
	$return[formBarOptions][header_image_src] = stripslashes($data[formbar_header_image_src]);	
	$return[formBarOptions][closeIconOption][animation] = $return[formBarOptions][rollIconOption][animation] = $data[formbar_close_icon][animation];	
	$return[formBarOptions][closeIconOption][button_text] = $return[formbar_close_icon][button_text];	
/*************************************************************************************************************************************************/	

	if($data[displayRules]){
		unset($return[displayRules]);
		foreach((array)$data[displayRules][pageMask] as $k => $v){
			if($v){
				if($data[displayRules][pageMaskType][$k] == 'enable'){
					$return[displayRules][enableOnPage][] = $v;
				}else{
					$return[displayRules][disableOnPage][] = $v;
				}
			}
		}
		$return[displayRules][display_on_main_page] = ($data[displayRules][display_on_main_page] == 'on')?1:0;
		$return[displayRules][work_on_mobile] = ($data[displayRules][work_on_mobile] == 'on')?1:0;
		$return[displayRules][allowedExtensions] = $data[displayRules][allowedExtensions];
		$return[displayRules][allowedImageAddress] = $data[displayRules][allowedImageAddress];
		
	}	
	$return[thank] = PQgetThankCodeStructure($data[thank]);
	

	if($data[overlay]){
		$return[blackoutOption][enable] = 1;
		$return[blackoutOption][style] = PQgetNormalColorStructure('overlay',$data[overlay]).' '.$data[overlay_opacity];
	}
	
	if($data[overlay_image_src]){
		$return[blackoutOption][enable] = 1;
		$return[blackoutOption][background_image_src] = $data[overlay_image_src];
	}
	
	if(isset($data[url])){
		$return[buttonBlock][action] = 'redirect';		
		$return[buttonBlock][redirect_url] = $data[url];
		$return[buttonBlock][button_text] = $data[button_text];
	}
	
	
	//galerryOptions
	if((string)$data[galleryOption][enable] == 'on' || (int)$data[galleryOption][enable] == 1){
		unset($return[galleryOption]);
		$return[galleryOption][enable] = 1;
		$return[galleryOption][designOptions] = $data[galleryOption][head_font].' '.$data[galleryOption][head_size].' '.$data[galleryOption][button_font].' '.$data[galleryOption][button_font_size].' '. PQgetNormalColorStructure('galleryOption_button_text_color',$data[galleryOption][button_text_color]).' '.PQgetNormalColorStructure('galleryOption_button_color',$data[galleryOption][button_color]).' '.PQgetNormalColorStructure('galleryOption_background_color',$data[galleryOption][background_color]).' '.PQgetNormalColorStructure('galleryOption_head_color',$data[galleryOption][head_color]);
		$return[galleryOption][title] = htmlspecialchars(stripslashes($data[galleryOption][title]));
		$return[galleryOption][button_text] = htmlspecialchars(stripslashes($data[galleryOption][button_text]));		
		$return[galleryOption][minWidth] = (int)$data[galleryOption][minWidth];		
	}
	
	//Image Sharer socnet
	if(isset($data[socnet])){
		unset($return[socnet]);
		foreach((array)$data[socnet] as $k => $v){
			if($v){
				$return[socnet][$k] = $data[socnetOption][$k];
				if($data[socnetOption][$k][type] == 'pq'){
					$return[socnet][$k][exactPageShare] = 0;
				} else {
					$return[socnet][$k][exactPageShare] = 1;
				}
			}
		}
		
	}
		
	//socnet_with_pos
	if(isset($data[socnet_with_pos])){
		unset($return[socnet]);
		foreach((array)$data[socnet_with_pos] as $k => $v){
			if($v){
				$return[shareSocnet][$v] = $data[socnetOption][$v];
				if($data[socnetOption][$v][type] == 'pq'){
					$return[shareSocnet][$v][exactPageShare] = 0;
				} else {
					$return[shareSocnet][$v][exactPageShare] = 1;
				}
			}
		}
		
	}
	
	
	//followSocnet
	if(isset($data[socnetIconsBlock])){
		foreach((array)$data[socnetIconsBlock] as $k => $v){
			if($k && $v){
				if($k == 'FB' || $k == 'facebook') {
					$v = str_replace('https://facebook.com','',$v);
					$v = str_replace('http://facebook.com','',$v);
					$return[socnetFollowBlock]['facebook'] = stripslashes('https://facebook.com/'.$v);
				}
				if($k == 'TW' || $k == 'twitter') {
					$v = str_replace('https://twitter.com','',$v);
					$v = str_replace('http://twitter.com','',$v);
					$return[socnetFollowBlock]['twitter'] = stripslashes('https://twitter.com/'.$v);
				}
				if($k == 'GP' || $k == 'google-plus') {
					$v = str_replace('https://plus.google.com','',$v);
					$v = str_replace('http://plus.google.com','',$v);						
					$return[socnetFollowBlock]['google-plus'] = stripslashes('https://plus.google.com/'.$v);
				}
				if($k == 'PI' || $k == 'pinterest') {
					$v = str_replace('https://pinterest.com','',$v);
					$v = str_replace('http://pinterest.com','',$v);
					$return[socnetFollowBlock]['pinterest'] = stripslashes('https://pinterest.com/'.$v);
				}
				if($k == 'VK' || $k == 'vk') {
					$v = str_replace('https://vk.com/','',$v);
					$v = str_replace('http://vk.com/','',$v);
					$return[socnetFollowBlock]['vk'] = stripslashes('http://vk.com/'.$v);
				}
				if($k == 'YT' || $k == 'youtube') {
					$v = str_replace('https://www.youtube.com/channel/','',$v);
					$v = str_replace('http://www.youtube.com/channel/','',$v);
					$return[socnetFollowBlock]['youtube'] = stripslashes('https://www.youtube.com/channel/'.$v);
				}
				if($k == 'RSS') {
					$return[socnetFollowBlock]['RSS'] = stripslashes($v);
				}
				if($k == 'IG' || $k == 'instagram') {
					$v = str_replace('https://instagram.com','',$v);
					$v = str_replace('http://instagram.com','',$v);
					$return[socnetFollowBlock]['instagram'] = stripslashes('http://instagram.com/'.$v);
				}
				if($k == 'OD' || $k == 'odnoklassniki') {
					$v = str_replace('https://ok.ru','',$v);
					$v = str_replace('http://ok.ru','',$v);
					$return[socnetFollowBlock]['odnoklassniki'] = stripslashes('http://ok.ru/'.$v);
				}
				if($k == 'LI' || $k == 'linkedin') {
					$v = str_replace('https://www.linkedin.com/','',$v);
					$v = str_replace('http://www.linkedin.com/','',$v);
					$return[socnetFollowBlock]['linkedin'] = stripslashes('https://www.linkedin.com/'.$v);
				}
			}
		}		
	}	
	
	return $return;
}
function profitquery_smart_widgets_insert_code(){
	global $profitquery;		
	$profitquerySmartWidgetsStructure = array();
	//sharingSidebar
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[sharingSidebar], 0);
	$sendMailWindow = profitquery_prepare_sctructure_product($profitquery[sharingSidebar][sendMailWindow], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	//printr($profitquery[sharingSidebar]);
	//printr($preparedObject);
	//printr($sendMailWindow);	
	$profitquerySmartWidgetsStructure['sharingSideBarOptions'] = array(
		'designOptions'=>'pq_icons '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],
		'socnetIconsBlock'=>$preparedObject[shareSocnet],
		'withCounters'=>$preparedObject[withCounter],
		'mobile_title'=>htmlspecialchars(stripslashes($preparedObject[mobile_title])),		
		'hoverAnimation'=>stripslashes($preparedObject[hoverAnimation]),		
		'eventHandler'=>$preparedObject[eventHandler],
		'galleryOption'=>$preparedObject[galleryOption],
		'displayRules'=>$preparedObject[displayRules],		
		'sendMailWindow'=>$sendMailWindow,
		'thankPopup'=>$preparedObject[thank]
	);	
	//imageSharer
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[imageSharer], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];
	$sendMailWindow = profitquery_prepare_sctructure_product($profitquery[imageSharer][sendMailWindow], 0);
	$profitquerySmartWidgetsStructure['imageSharer'] = array(
		'typeDesign'=>$preparedObject[typeDesign],		
		'enable'=>(int)$preparedObject[enable],
		'hoverAnimation'=>stripslashes($preparedObject[hoverAnimation]),
		'minWidth'=>(int)$preparedObject[minWidth],		
		'minHeight'=>$proOptions[minHeight],
		'activeSocnet'=>$preparedObject[socnet],
		'sendMailWindow'=>$sendMailWindow,
		'displayRules'=>$preparedObject[displayRules],	
		'thankPopup'=>$preparedObject[thank]
	);
	
	//emailListBuilderBar
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[emailListBuilderBar], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['subscribeBarOptions'] = array(
		'designOptions'=>'pq_bar '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),
		'mobile_title'=>stripslashes($preparedObject[mobile_title]),
		'closeIconOption'=>$preparedObject[closeIconOption],
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'enter_email_text'=>stripslashes($preparedObject[enter_email_text]),
		'enter_name_text'=>stripslashes($preparedObject[enter_name_text]),
		'button_text'=>stripslashes($preparedObject[button_text]),		
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],
		'subscribeProvider'=>stripslashes($preparedObject[provider]),
		'subscribeProviderOption'=>$preparedObject[providerOption],
		'thankPopup'=>$preparedObject[thank]
	);
	
	//emailListBuilderFormBar
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[emailListBuilderFormBar], 0, 1);		
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['subscribeFormBarOptions'] = array(
		'formBarOptions'=>$preparedObject[formBarOptions],
		'designOptions'=>$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'enter_email_text'=>stripslashes($preparedObject[enter_email_text]),
		'enter_name_text'=>stripslashes($preparedObject[enter_name_text]),		
		'button_text'=>stripslashes($preparedObject[button_text]),
		'blackoutOption'=>$preparedObject[blackoutOption],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],
		'subscribeProvider'=>stripslashes($preparedObject[provider]),
		'subscribeProviderOption'=>$preparedObject[providerOption],
		'thankPopup'=>$preparedObject[thank]
	);
	
	//emailListBuilderPopup
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[emailListBuilderPopup], 0);		
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['subscribePopupOptions'] = array(
		'designOptions'=>$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'enter_email_text'=>stripslashes($preparedObject[enter_email_text]),
		'enter_name_text'=>stripslashes($preparedObject[enter_name_text]),		
		'button_text'=>stripslashes($preparedObject[button_text]),
		'blackoutOption'=>$preparedObject[blackoutOption],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],
		'subscribeProvider'=>stripslashes($preparedObject[provider]),
		'subscribeProviderOption'=>$preparedObject[providerOption],
		'thankPopup'=>$preparedObject[thank]
	);
	
	//emailListBuilderFloating
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[emailListBuilderFloating], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['subscribeFloatingOptions'] = array(
		'designOptions'=>'pq_fixed '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),		
		'closeIconOption'=>$preparedObject[closeIconOption],
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'enter_email_text'=>stripslashes($preparedObject[enter_email_text]),
		'enter_name_text'=>stripslashes($preparedObject[enter_name_text]),		
		'button_text'=>stripslashes($preparedObject[button_text]),		
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],
		'subscribeProvider'=>stripslashes($preparedObject[provider]),
		'subscribeProviderOption'=>$preparedObject[providerOption],
		'thankPopup'=>$preparedObject[thank]
	);
	
	//sharingPopup	
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[sharingPopup], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];		
	
	$profitquerySmartWidgetsStructure['sharingPopup'] = array(
		'designOptions'=>$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'shareSocnet'=>$preparedObject[shareSocnet],
		'blackoutOption'=>$preparedObject[blackoutOption],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);	
	
	//sharingBar
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[sharingBar], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];		
	$profitquerySmartWidgetsStructure['sharingBar'] = array(
		'designOptions'=>'pq_bar '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'closeIconOption'=>$preparedObject[closeIconOption],
		'mobile_title'=>htmlspecialchars(stripslashes($preparedObject[mobile_title])),	
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'shareSocnet'=>$preparedObject[shareSocnet],		
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//sharingFloating
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[sharingFloating], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['sharingFloating'] = array(
		'designOptions'=>'pq_fixed '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'shareSocnet'=>$preparedObject[shareSocnet],
		'blackoutOption'=>$preparedObject[blackoutOption],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//promoteFormBar
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[promoteFormBar], 0, 1);		
//	pq_printr($preparedObject);
//	die();
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['promoteFormBar'] = array(
		'formBarOptions'=>$preparedObject[formBarOptions],
		'designOptions'=>$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	//pq_printr($profitquerySmartWidgetsStructure['promoteFormBar']);
	//die();
	
	//promotePopup
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[promotePopup], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['promotePopup'] = array(
		'designOptions'=>$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//promoteBar
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[promoteBar], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];		
	$profitquerySmartWidgetsStructure['promoteBar'] = array(
		'designOptions'=>'pq_bar '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'mobile_title'=>htmlspecialchars(stripslashes($preparedObject[mobile_title])),	
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],		
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//promoteFloating
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[promoteFloating], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['promoteFloating'] = array(
		'designOptions'=>'pq_fixed '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	
	//followPopup
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[followPopup], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];		
	$profitquerySmartWidgetsStructure['followPopup'] = array(
		'designOptions'=>$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],
		'followSocnet'=>$preparedObject[socnetFollowBlock],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);	
	
	//followBar
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[followBar], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];		
	$profitquerySmartWidgetsStructure['followBar'] = array(
		'designOptions'=>'pq_bar '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'mobile_title'=>htmlspecialchars(stripslashes($preparedObject[mobile_title])),	
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],		
		'followSocnet'=>$preparedObject[socnetFollowBlock],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//followFloating
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[followFloating], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];		
	$profitquerySmartWidgetsStructure['followFloating'] = array(
		'designOptions'=>'pq_fixed '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],
		'followSocnet'=>$preparedObject[socnetFollowBlock],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//callMePopup (bookmark)
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[callMePopup], 1);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$preparedObject[to_email] = $profitquery[settings][email];		
	$profitquerySmartWidgetsStructure['callMePopup'] = array(
		'typeBookmarkWindow'=>'pq_stick pq_call '.$preparedObject[typeBookmarkWindow],
		'designOptions'=>$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'to_email'=>stripslashes($preparedObject[to_email]),
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'button_text'=>stripslashes($preparedObject[button_text]),		
		'enter_name_text'=>stripslashes($preparedObject[enter_name_text]),		
		'enter_phone_text'=>stripslashes($preparedObject[enter_phone_text]),		
		'closeIconOption'=>$preparedObject[closeIconOption],
		'mail_subject'=>stripslashes($preparedObject[mail_subject]),		
		'bookmark_text'=>stripslashes($preparedObject[loader_text]),		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),				
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],		
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);	
	
	//callMeFloating
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[callMeFloating], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$preparedObject[to_email] = $profitquery[settings][email];		
	$profitquerySmartWidgetsStructure['callMeFloating'] = array(		
		'designOptions'=>'pq_fixed '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'to_email'=>stripslashes($preparedObject[to_email]),
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'button_text'=>stripslashes($preparedObject[button_text]),		
		'enter_name_text'=>stripslashes($preparedObject[enter_name_text]),		
		'enter_phone_text'=>stripslashes($preparedObject[enter_phone_text]),		
		'mail_subject'=>stripslashes($preparedObject[mail_subject]),		
		'closeIconOption'=>$preparedObject[closeIconOption],
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),				
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],		
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//ContactFormPopup (bookmark)
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[contactFormPopup], 1);	
	//close_icon
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$preparedObject[to_email] = $profitquery[settings][email];		
	$profitquerySmartWidgetsStructure['contactFormPopup'] = array(
		'typeBookmarkWindow'=>'pq_stick pq_contact '.$preparedObject[typeBookmarkWindow],
		'designOptions'=>$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'to_email'=>stripslashes($preparedObject[to_email]),
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'button_text'=>stripslashes($preparedObject[button_text]),		
		'enter_name_text'=>stripslashes($preparedObject[enter_name_text]),		
		'enter_email_text'=>stripslashes($preparedObject[enter_email_text]),		
		'enter_message_text'=>stripslashes($preparedObject[enter_message_text]),		
		'mail_subject'=>stripslashes($preparedObject[mail_subject]),		
		'bookmark_text'=>stripslashes($preparedObject[loader_text]),		
		'title'=>stripslashes($preparedObject[title]),		
		'closeIconOption'=>$preparedObject[closeIconOption],
		'sub_title'=>stripslashes($preparedObject[sub_title]),				
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],		
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//contactFormFloating
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[contactFormFloating], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$preparedObject[to_email] = $profitquery[settings][email];		
	
	$profitquerySmartWidgetsStructure['contactFormFloating'] = array(		
		'designOptions'=>'pq_fixed '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'to_email'=>stripslashes($preparedObject[to_email]),
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'button_text'=>stripslashes($preparedObject[button_text]),		
		'enter_name_text'=>stripslashes($preparedObject[enter_name_text]),		
		'enter_email_text'=>stripslashes($preparedObject[enter_email_text]),		
		'enter_message_text'=>stripslashes($preparedObject[enter_message_text]),		
		'mail_subject'=>stripslashes($preparedObject[mail_subject]),		
		'title'=>stripslashes($preparedObject[title]),		
		'closeIconOption'=>$preparedObject[closeIconOption],
		'sub_title'=>stripslashes($preparedObject[sub_title]),				
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],		
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//youtubePopup
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[youtubePopup], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['youtubePopup'] = array(
		'designOptions'=>$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'iframe_src'=>stripslashes($preparedObject[iframe_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);

	//youtubeFloating
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[youtubeFloating], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['youtubeFloating'] = array(
		'designOptions'=>'pq_fixed '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'iframe_src'=>stripslashes($preparedObject[iframe_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],		
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//iframePopup
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[iframePopup], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['iframePopup'] = array(
		'designOptions'=>$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'external_iframe_src'=>stripslashes($preparedObject[iframe_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],
		'blackoutOption'=>$preparedObject[blackoutOption],
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	//iframeFloating
	$preparedObject = profitquery_prepare_sctructure_product($profitquery[iframeFloating], 0);	
	$preparedObject[displayRules][main_page] = $profitquery[settings][mainPage];	
	$profitquerySmartWidgetsStructure['iframeFloating'] = array(
		'designOptions'=>'pq_fixed '.$preparedObject[designOptions],
		'enable'=>(int)$preparedObject[enable],		
		'title'=>stripslashes($preparedObject[title]),		
		'sub_title'=>stripslashes($preparedObject[sub_title]),		
		'text_with_background'=>stripslashes($preparedObject[tblock_text]),
		'closeIconOption'=>$preparedObject[closeIconOption],		
		'header_image_src'=>stripslashes($preparedObject[header_image_src]),
		'iframe_src'=>stripslashes($preparedObject[iframe_src]),
		'background_image_src'=>stripslashes($preparedObject[background_image_src]),
		'buttonBlock'=>$preparedObject[buttonBlock],		
		'lockedMechanism'=>$preparedObject[lockedMechanism],		
		'displayRules'=>$preparedObject[displayRules],
		'eventHandler'=>$preparedObject[eventHandler],		
		'thankPopup'=>$preparedObject[thank]
	);
	
	$additionalOptionText = '';
	if((string)$profitquery[settings][enableGA] != 'on' && isset($profitquery[settings])){
		$additionalOptionText = 'profitquery.productOptions.disableGA = 1;';
	}
	if($profitquery[settings][from_right_to_left] == 'on'){
		$additionalOptionText .= 'profitquery.productOptions.RTL = 1;';
	}
	if((int)$profitquery[i_agree2] == 1){		
		print "
		<script>
		(function () {			
				var PQInit = function(){
					profitquery.loadFunc.callAfterPQInit(function(){					
						profitquery.loadFunc.callAfterPluginsInit(						
							function(){									
								PQLoadTools();
							}							
							, ['//profitquery-a.akamaihd.net/lib/plugins/aio.plugin.profitquery.v5.min.js']							
						);
					});
				};
				var s = document.createElement('script');
				var _isPQLibraryLoaded = false;
				s.type = 'text/javascript';
				s.async = true;			
				s.profitqueryAPIKey = '".stripslashes($profitquery[settings][apiKey])."';
				s.profitqueryPROLoader = '".stripslashes($profitquery[settings][pro_loader_filename])."';				
				s.profitqueryLang = 'en';
				s.src = '//profitquery-a.akamaihd.net/lib/profitquery.v5.min.js';								
				s.onload = function(){
					if ( !_isPQLibraryLoaded )
					{					
					  _isPQLibraryLoaded = true;				  
					  PQInit();
					}
				}
				s.onreadystatechange = function() {								
					if ( !_isPQLibraryLoaded && (this.readyState == 'complete' || this.readyState == 'loaded') )
					{					
					  _isPQLibraryLoaded = true;				    
						
						PQInit();					
					}
				};
				var x = document.getElementsByTagName('script')[0];						
				x.parentNode.insertBefore(s, x);			
			})();
			
			function PQLoadTools(){
				profitquery.loadFunc.callAfterPQInit(function(){
							".$additionalOptionText."
							var smartWidgetsBoxObject = ".json_encode($profitquerySmartWidgetsStructure).";							
							profitquery.widgets.smartWidgetsBox.init(smartWidgetsBoxObject);	
						});
			}
		</script>	
		";		
	}
}


add_filter('plugin_action_links', 'profitquery_wordpress_admin_link', 10, 2);