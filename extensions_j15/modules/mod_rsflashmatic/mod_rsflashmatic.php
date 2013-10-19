<?php
/**
 * @version 1.3 $Id: mod_rsflashmatic.php
 * @package Joomla 1.5.x
 * @subpackage RS-FlashMatic flash image slideshow module.
 * @copyright (C) 2010-2015 RS Web Solutions (http://www.rswebsols.com)
 * @license GNU/GPL http://www.gnu.org/copyleft/gpl.html
 */

// no direct access
defined('_JEXEC') or die('Restricted access');

if(!function_exists('rsws_sql_regcase')) {
	function rsws_sql_regcase($rsws_string, $rsws_encoding='auto') {
		$rsws_max = mb_strlen($rsws_string, $rsws_encoding);
		for($rsws_i=0; $rsws_i<$rsws_max; $rsws_i++) {
			$rsws_char = mb_substr($rsws_string, $rsws_i, 1, $rsws_encoding);
			$rsws_up = mb_strtoupper($rsws_char, $rsws_encoding);
			$rsws_low = mb_strtolower($rsws_char, $rsws_encoding);
			$rsws_ret .= ($rsws_up!=$rsws_low) ? '['.$rsws_up.$rsws_low.']' : $rsws_char;
	  	}
	  	return $rsws_ret;
	}
}

$rsws_insertSWFOBJECT = $params->get('rsws_insertSWFOBJECT', 1);
$rsws_width = $params->get('rsws_width', 600);
$rsws_height = $params->get('rsws_height', 300);
$rsws_random = $params->get('rsws_random', 2);
$rsws_backgroundColor = $params->get('rsws_backgroundColor', 'FFFFFF');
$rsws_backgroundTransparency = $params->get('rsws_backgroundTransparency', 100);
$rsws_loaderColor = $params->get('rsws_loaderColor', '000000');
$rsws_cellWidth = $params->get('rsws_cellWidth', 50);
$rsws_cellHeight = $params->get('rsws_cellHeight', 50);
$rsws_showMinTime = $params->get('rsws_showMinTime', 0.2);
$rsws_showMaxTime = $params->get('rsws_showMaxTime', 1.5);
$rsws_blur = $params->get('rsws_blur', 50);
$rsws_netTime = $params->get('rsws_netTime', 0.5);
$rsws_alphaNet = $params->get('rsws_alphaNet', 80);
$rsws_netColor = $params->get('rsws_netColor', '000000');
$rsws_controllerVisible = $params->get('rsws_controllerVisible', 1);
$rsws_controllerBackgroundVisible = $params->get('rsws_controllerBackgroundVisible', 1);
$rsws_prevNextVisible = $params->get('rsws_prevNextVisible', 1);
$rsws_playBtVisible = $params->get('rsws_playBtVisible', 1);
$rsws_autoPlay = $params->get('rsws_autoPlay', 1);
$rsws_navigationButtonsColor = $params->get('rsws_navigationButtonsColor', '000000');
$rsws_controllerDistanceX = $params->get('rsws_controllerDistanceX', 10);
$rsws_controllerDistanceY = $params->get('rsws_controllerDistanceY', 10);
$rsws_controllerHeight = $params->get('rsws_controllerHeight', 27);
$rsws_distanceBetweenControllerElements = $params->get('rsws_distanceBetweenControllerElements', 10);
$rsws_normalColor = $params->get('rsws_normalColor', '000000');
$rsws_overColor = $params->get('rsws_overColor', '473C31');
$rsws_selectedTextColor = $params->get('rsws_selectedTextColor', 'FFFFFF');
$rsws_selectedButtonAlpha = $params->get('rsws_selectedButtonAlpha', 70);
$rsws_distanceBetweenThumbs = $params->get('rsws_distanceBetweenThumbs', 7);
$rsws_captionY = $params->get('rsws_captionY', 10);
$rsws_captionX = $params->get('rsws_captionX', 10);
$rsws_captionWidth = $params->get('rsws_captionWidth', 390);
$rsws_buttonText = $params->get('rsws_buttonText', 'read more');
$rsws_btnNormalColor = $params->get('rsws_btnNormalColor', 'FFFFFF');
$rsws_btnOverColor = $params->get('rsws_btnOverColor', '999999');
$rsws_readMoreBackAlpha = $params->get('rsws_readMoreBackAlpha', 80);
$rsws_readMoreBackColor = $params->get('rsws_readMoreBackColor', '473C31');
$rsws_btnSpacingW = $params->get('rsws_btnSpacingW', 50);
$rsws_btnSpacingH = $params->get('rsws_btnSpacingH', 5);
$rsws_paddingX = $params->get('rsws_paddingX', 20);
$rsws_paddingY = $params->get('rsws_paddingY', 15);
$rsws_imageshow = $params->get('rsws_imageshow', 1);

// Variable Preconfiguration
if($rsws_random == '1') {
	$rsws_random = 'true';
} else {
	$rsws_random = 'false';
}
if($rsws_controllerVisible == '2') {
	$rsws_controllerVisible = 'false';
} else {
	$rsws_controllerVisible = 'true';
}
if($rsws_controllerBackgroundVisible == '2') {
	$rsws_controllerBackgroundVisible = 'false';
} else {
	$rsws_controllerBackgroundVisible = 'true';
}
if($rsws_prevNextVisible == '2') {
	$rsws_prevNextVisible = 'false';
} else {
	$rsws_prevNextVisible = 'true';
}
if($rsws_playBtVisible == '2') {
	$rsws_playBtVisible = 'false';
} else {
	$rsws_playBtVisible = 'true';
}
if($rsws_autoPlay == '2') {
	$rsws_autoPlay = 'false';
} else {
	$rsws_autoPlay = 'true';
}

// Set FTP credentials, if given
$rsws_module_path = JPATH_BASE.DS.'modules'.DS.'mod_rsflashmatic'.DS;
jimport('joomla.client.helper');
JClientHelper::setCredentialsFromRequest('ftp');
$ftp = JClientHelper::getCredentials('ftp');

$rsws_file = $rsws_module_path.'xml'.DS.'rsflashmatic_'.$module->id.'.xml';

$rsws_txt = '<?xml version="1.0" encoding="UTF-8"?><banner width="'.$rsws_width.'" height="'.$rsws_height.'" startWith="1" random="'.$rsws_random.'" backgroundColor="0x'.$rsws_backgroundColor.'" backgroundTransparency="'.$rsws_backgroundTransparency.'" cellWidth="'.$rsws_cellWidth.'" cellHeight="'.$rsws_cellHeight.'" showMinTime="'.$rsws_showMinTime.'" showMaxTime="'.$rsws_showMaxTime.'" blur="'.$rsws_blur.'" netTime="'.$rsws_netTime.'" alphaNet="'.$rsws_alphaNet.'" netColor="0x'.$rsws_netColor.'" overColor="0x'.$rsws_overColor.'" normalColor="0x'.$rsws_normalColor.'" selectedTextColor="0x'.$rsws_selectedTextColor.'" selectedButtonAlpha="'.$rsws_selectedButtonAlpha.'" controllerVisible="'.$rsws_controllerVisible.'" controllerBackgroundVisible="'.$rsws_controllerBackgroundVisible.'" prevNextVisible="'.$rsws_prevNextVisible.'" playBtVisible="'.$rsws_playBtVisible.'" autoPlay="'.$rsws_autoPlay.'" navigationButtonsColor="0x'.$rsws_navigationButtonsColor.'" controllerDistanceX="'.$rsws_controllerDistanceX.'" controllerDistanceY="'.$rsws_controllerDistanceY.'" controllerHeight="'.$rsws_controllerHeight.'" distanceBetweenControllerElements="'.$rsws_distanceBetweenControllerElements.'" distanceBetweenThumbs="'.$rsws_distanceBetweenThumbs.'" captionY="'.$rsws_captionY.'" captionX="'.$rsws_captionX.'" captionWidth="'.$rsws_captionWidth.'" buttonText="'.$rsws_buttonText.'" btnNormalColor="0x'.$rsws_btnNormalColor.'" btnOverColor="0x'.$rsws_btnOverColor.'" readMoreBackAlpha="'.$rsws_readMoreBackAlpha.'" readMoreBackColor="0x'.$rsws_readMoreBackColor.'" paddingX="'.$rsws_paddingX.'" paddingY="'.$rsws_paddingY.'" btnSpacingW="'.$rsws_btnSpacingW.'" btnSpacingH="'.$rsws_btnSpacingH.'" loaderColor="0x'.$rsws_loaderColor.'">';

if($rsws_imageshow == '1') {
	$rsws_basic_folder = $params->get('rsws_basic_folder', 'images/stories/slideshow/');
	$rsws_basic_url = $params->get('rsws_basic_url', '');
	$rsws_basic_url = str_replace('&amp;', '&', $rsws_basic_url);
	$rsws_basic_url = str_replace('&', '&amp;', $rsws_basic_url);
	$rsws_basic_url_target = $params->get('rsws_basic_url_target', '_blank');
	$rsws_basic_bar_color = $params->get('rsws_basic_bar_color', 'FFFFFF');
	$rsws_basic_bar_transparency = $params->get('rsws_basic_bar_transparency', 40);
	$rsws_basic_slideshowTime = $params->get('rsws_basic_slideshowTime', 4);
	
	$rsws_jpgimages = glob("".$rsws_basic_folder.rsws_sql_regcase("*.jpg"));
	$rsws_jpegimages = glob("".$rsws_basic_folder.rsws_sql_regcase("*.jpeg"));
	$rsws_pngimages = glob("".$rsws_basic_folder.rsws_sql_regcase("*.png"));
	$rsws_gifimages = glob("".$rsws_basic_folder.rsws_sql_regcase("*.gif"));
	
	$rsws_image = $rsws_jpgimages;
	
	$j=0;
	for($i=count($rsws_jpgimages);$i<count($rsws_jpgimages)+count($rsws_jpegimages);$i++) {
		$rsws_image[$i]=$rsws_jpegimages[$j];
		$j=$j+1;
	}
	
	$j=0;
	for($i=count($rsws_jpgimages);$i<count($rsws_jpgimages)+count($rsws_pngimages);$i++) {
		$rsws_image[$i]=$rsws_pngimages[$j];
		$j=$j+1;
	}
	
	$j=0;
	for($i=count($rsws_image);$i<count($rsws_jpgimages)+count($rsws_pngimages)+count($rsws_gifimages);$i++) {
		$rsws_image[$i]=$rsws_gifimages[$j];
		$j=$j+1;
	}
	
	for($i=0;$i<count($rsws_image);$i++) {		
		if(file_exists($rsws_image[$i])) {
			$rsws_txt .= '<item><path>'.JURI::root().$rsws_image[$i].'</path><title></title><caption></caption><target>'.$rsws_basic_url_target.'</target><link>'.$rsws_basic_url.'</link><bar_color>0x'.$rsws_basic_bar_color.'</bar_color><bar_transparency>'.$rsws_basic_bar_transparency.'</bar_transparency><caption_color>0xFFFFFF</caption_color><caption_transparency>60</caption_transparency><stroke_color>0xFFFFFF</stroke_color><stroke_transparency>60</stroke_transparency><slideshowTime>'.$rsws_basic_slideshowTime.'</slideshowTime></item>';
		}
	}
} else {
	$rsws_adv_path = $params->get('rsws_adv_path', '');
	$rsws_adv_title = $params->get('rsws_adv_title', '');
	$rsws_adv_caption = $params->get('rsws_adv_caption', '');
	$rsws_adv_link = $params->get('rsws_adv_link', '');
	$rsws_adv_target = $params->get('rsws_adv_target', '');
	$rsws_adv_bar_color = $params->get('rsws_adv_bar_color', '');
	$rsws_adv_bar_transparency = $params->get('rsws_adv_bar_transparency', '');
	$rsws_adv_caption_color = $params->get('rsws_adv_caption_color', '');
	$rsws_adv_caption_transparency = $params->get('rsws_adv_caption_transparency', '');
	$rsws_adv_stroke_color = $params->get('rsws_adv_stroke_color', '');
	$rsws_adv_stroke_transparency = $params->get('rsws_adv_stroke_transparency', '');
	$rsws_adv_slideshowTime = $params->get('rsws_adv_slideshowTime', '');
	
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_path), $rsws_adv_path_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_title), $rsws_adv_title_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_caption), $rsws_adv_caption_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_link), $rsws_adv_link_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_target), $rsws_adv_target_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_bar_color), $rsws_adv_bar_color_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_bar_transparency), $rsws_adv_bar_transparency_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_caption_color), $rsws_adv_caption_color_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_caption_transparency), $rsws_adv_caption_transparency_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_stroke_color), $rsws_adv_stroke_color_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_stroke_transparency), $rsws_adv_stroke_transparency_temp_arr);
	preg_match_all('|{(.*)}|imU', trim($rsws_adv_slideshowTime), $rsws_adv_slideshowTime_temp_arr);
	
	$count_temp_arr = count($rsws_adv_path_temp_arr[1]);
	
	for($i=0;$i<$count_temp_arr;$i++) {
		$rsws_temp_path = trim($rsws_adv_path_temp_arr[1][$i]);
		$rsws_temp_title = trim($rsws_adv_title_temp_arr[1][$i]);
		$rsws_temp_caption = trim($rsws_adv_caption_temp_arr[1][$i]);
		$rsws_temp_link = trim($rsws_adv_link_temp_arr[1][$i]);
		$rsws_temp_target = trim($rsws_adv_target_temp_arr[1][$i]);
		$rsws_temp_bar_color = trim($rsws_adv_bar_color_temp_arr[1][$i]);
		$rsws_temp_bar_transparency = trim($rsws_adv_bar_transparency_temp_arr[1][$i]);
		$rsws_temp_caption_color = trim($rsws_adv_caption_color_temp_arr[1][$i]);
		$rsws_temp_caption_transparency = trim($rsws_adv_caption_transparency_temp_arr[1][$i]);
		$rsws_temp_stroke_color = trim($rsws_adv_stroke_color_temp_arr[1][$i]);
		$rsws_temp_stroke_transparency = trim($rsws_adv_stroke_transparency_temp_arr[1][$i]);
		$rsws_temp_slideshowTime = trim($rsws_adv_slideshowTime_temp_arr[1][$i]);		
		
		if(file_exists($rsws_temp_path)) {
			$rsws_temp_path = JURI::root().$rsws_temp_path;
			if($rsws_temp_title != '') {
				$rsws_temp_title = '<![CDATA['.$rsws_temp_title.']]>';
			} else {
				$rsws_temp_title = $rsws_temp_title;
			}
			if($rsws_temp_caption != '') {
				$rsws_temp_caption = '<![CDATA['.$rsws_temp_caption.']]>';
			} else {
				$rsws_temp_caption = $rsws_temp_caption;
			}
			
			$rsws_temp_link = str_replace('&amp;', '&', $rsws_temp_link);
			$rsws_temp_link = str_replace('&', '&amp;', $rsws_temp_link);
			
			if(($rsws_temp_target == '_blank') || ($rsws_temp_target == '_self')) {
				$rsws_temp_target = $rsws_temp_target;
			} else {
				$rsws_temp_target = '_blank';
			}
			if(strlen($rsws_temp_bar_color) == '6') {
				$rsws_temp_bar_color = $rsws_temp_bar_color;
			} else {
				$rsws_temp_bar_color = 'FFFFFF';
			}
			if(($rsws_temp_bar_transparency >=0) && ($rsws_temp_bar_transparency<=100)) {
				$rsws_temp_bar_transparency = $rsws_temp_bar_transparency;			
			} else {
				$rsws_temp_bar_transparency = 40;
			}
			if(strlen($rsws_temp_caption_color) == '6') {
				$rsws_temp_caption_color = $rsws_temp_caption_color;
			} else {
				$rsws_temp_caption_color = 'FFFFFF';
			}
			if(($rsws_temp_caption_transparency >=0) && ($rsws_temp_caption_transparency<=100)) {
				$rsws_temp_caption_transparency = $rsws_temp_caption_transparency;			
			} else {
				$rsws_temp_caption_transparency = 60;
			}
			if(strlen($rsws_temp_stroke_color) == '6') {
				$rsws_temp_stroke_color = $rsws_temp_stroke_color;
			} else {
				$rsws_temp_stroke_color = 'FFFFFF';
			}
			if(($rsws_temp_stroke_transparency >=0) && ($rsws_temp_stroke_transparency<=100)) {
				$rsws_temp_stroke_transparency = $rsws_temp_stroke_transparency;			
			} else {
				$rsws_temp_stroke_transparency = 60;
			}
			if($rsws_temp_slideshowTime) {
				$rsws_temp_slideshowTime = $rsws_temp_slideshowTime;
			} else {
				$rsws_temp_slideshowTime = 20;
			}
			$rsws_txt .= '<item><path>'.$rsws_temp_path.'</path><title>'.$rsws_temp_title.'</title><caption>'.$rsws_temp_caption.'</caption><target>'.$rsws_temp_target.'</target><link>'.$rsws_temp_link.'</link><bar_color>0x'.$rsws_temp_bar_color.'</bar_color><bar_transparency>'.$rsws_temp_bar_transparency.'</bar_transparency><caption_color>0x'.$rsws_temp_caption_color.'</caption_color><caption_transparency>'.$rsws_temp_caption_transparency.'</caption_transparency><stroke_color>0x'.$rsws_temp_stroke_color.'</stroke_color><stroke_transparency>'.$rsws_temp_stroke_transparency.'</stroke_transparency><slideshowTime>'.$rsws_temp_slideshowTime.'</slideshowTime></item>';
		}
	}
}

$rsws_txt .= '</banner>';

jimport('joomla.filesystem.file');
//if (JFile::exists($rssn_file)) {
	// Try to make the params file writeable
	if (!$ftp['enabled'] && JPath::isOwner($rsws_file) && !JPath::setPermissions($rsws_file, '0755')) {
		JError::raiseNotice('SOME_ERROR_CODE', JText::_('Could not make the file writable'));
	}

	JFile::write($rsws_file, $rsws_txt);

	// Try to make the params file unwriteable
	if (!$ftp['enabled'] && JPath::isOwner($rsws_file) && !JPath::setPermissions($rsws_file, '0555')) {
		JError::raiseNotice('SOME_ERROR_CODE', JText::_('Could not make the file unwritable'));
	}
//}
$rsws_document	=& JFactory::getDocument();

if($rsws_insertSWFOBJECT == '1') {
	$rsws_document->addScript( JURI::root().'modules/mod_rsflashmatic/js/swfobject.js');
}

$rsws_js_controller = 'var cacheBuster = "?t=" + Date.parse(new Date()); var stageW = "'.$rsws_width.'"; var stageH = "'.$rsws_height.'"; var attributes = {}; attributes.id = \'RSFlashmaticModule'.$module->id.'\'; attributes.name = attributes.id; var params = {}; params.bgcolor = "#'.$rsws_backgroundColor.'"; params.menu = "false"; params.scale = "noScale"; params.wmode = "opaque"; params.allowfullscreen = "true"; params.allowScriptAccess = "always"; var flashvars = {}; flashvars.componentWidth = stageW; flashvars.componentHeight = stageH; flashvars.pathToFiles = ""; flashvars.xmlPath = "'.JURI::root().'modules/mod_rsflashmatic/xml/rsflashmatic_'.$module->id.'.xml"; swfobject.embedSWF("'.JURI::root().'modules/mod_rsflashmatic/swf/preview.swf"+cacheBuster, attributes.id, stageW, stageH, "9.0.124", "'.JURI::root().'modules/mod_rsflashmatic/swf/expressInstall.swf", flashvars, params, attributes);';

$rsws_document->addScriptDeclaration($rsws_js_controller);
?>
<div id="RSFlashmaticModule<?php echo $module->id; ?>"><p>In order to view this object you need Flash Player 9+ support!</p><a href="http://www.adobe.com/go/getflashplayer"><img src="http://www.adobe.com/images/shared/download_buttons/get_flash_player.gif" alt="Get Adobe Flash player"/></a><p><?php echo base64_decode('UG93ZXJlZCBieQ==').' <a href="'.base64_decode('aHR0cDovL3d3dy5yc3dlYnNvbHMuY29t').'" target="_blank">'.base64_decode('UlMgV2ViIFNvbHV0aW9ucw==').'</a>'; ?></p></div>