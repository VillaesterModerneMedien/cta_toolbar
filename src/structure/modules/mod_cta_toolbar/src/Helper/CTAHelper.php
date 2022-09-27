<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_cta_toolbar
 *
 * @copyright   (C) 2020 Mario Hewera
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\CTAToolbar\Site\Helper;

\defined('_JEXEC') or die;

/**
 * Helper for mod_cta_toolbar
 *
 * @since  1.0
 */
class CTAHelper
{
	/**
	 * @param $params
	 *
	 * @return array
	 *
	 * @since version
	 */
	public static function getContent($params)
    {
        $items                          = $params->get('subitems', '');
	    $toolbarPosition                = $params->get('toolbarPosition','');
	    $boxAlign                       = $params->get('boxAlign','');
	    $hideable                       = $params->get('hideable','');
        $enableMobile                   = $params->get('enableMobile','');
        $breakpoint                     = $params->get('breakpoint','');
        $toolbarPositionMobile          = $params->get('toolbarPositionMobile','');
        $iconSize                       = $params->get('iconSize','');
	    $fontSize                       = $params->get('fontSize','');
	    $animationStyle                 = $params->get('animationStyle','');
	    $groupBackgroundColor           = $params->get('groupBackgroundColor','');
	    $globalTextColor                = $params->get('globalTextColor','');
	    $globalTextHoverColor           = $params->get('globalTextHoverColor','');
	    $globalTextBackgroundColor      = $params->get('globalTextBackgroundColor','');
	    $globalTextHoverBackgroundColor = $params->get('GlobalTextBackgroundColor','');

        $content = [
			'items'                          =>  $items,
            'toolbarPosition'                =>  $toolbarPosition,
            'boxAlign'                       =>  $boxAlign,
            'hideable'                       =>  $hideable,
            'enableMobile'                   =>  $enableMobile,
            'breakpoint'                     =>  $breakpoint,
            'toolbarPositionMobile'          =>  $toolbarPositionMobile,
            'iconSize'                       =>  $iconSize,
            'fontSize'                       =>  $fontSize,
	        'animationStyle'                 =>  $animationStyle,
			'groupBackgroundColor'           =>  $groupBackgroundColor,
			'globalTextColor'                =>  $globalTextColor,
			'globalTextHoverColor'           =>  $globalTextHoverColor,
			'globalTextBackgroundColor'      =>  $globalTextBackgroundColor,
			'globalTextHoverBackgroundColor' =>  $globalTextHoverBackgroundColor,
        ];
        return $content;
    }

}
