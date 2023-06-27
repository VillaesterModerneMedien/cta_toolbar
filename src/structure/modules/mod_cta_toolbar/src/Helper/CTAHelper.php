<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_cta_toolbar
 *
 * @copyright   (C) 2020 Mario Hewera
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

namespace Joomla\Module\CTAToolbar\Site\Helper;

use Joomla\CMS\Filesystem\File;
use Joomla\CMS\Uri\Uri;
use ScssPhp\ScssPhp\Compiler as ScssCompiler;

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
        return $params->get('subitems', '');
    }

	public static function getParameters($params)
    {
        return $params;
    }

	public static function writeCss($params)
	{
		$parameters = [
			'horizontalPosition'             =>  $params->get('horizontalPosition',''),
			'verticalPosition'               =>  $params->get('verticalPosition',''),
			'offsetX'                        =>  $params->get('offsetX',''),
			'offsetY'                        =>  $params->get('offsetY',''),
			'hideable'                       =>  $params->get('hideable',''),
			'enableMobile'                   =>  $params->get('enableMobile',''),
			'breakpoint'                     =>  $params->get('breakpoint',''),
			'toolbarPositionMobile'          =>  $params->get('toolbarPositionMobile',''),
			'iconSize'                       =>  $params->get('iconSize',''),
			'fontSize'                       =>  $params->get('fontSize',''),
			'animationStyle'                 =>  $params->get('animationStyle',''),
			'globalTextColor'                =>  $params->get('globalTextColor',''),
			'globalTextHoverColor'           =>  $params->get('globalTextHoverColor',''),
			'globalBorderColor'              =>  $params->get('globalBorderColor',''),
			'globalBorderHoverColor'         =>  $params->get('globalBorderHoverColor',''),
			'globalTextBackgroundColor'      =>  $params->get('globalTextBackgroundColor',''),
			'globalTextHoverBackgroundColor' =>  $params->get('globalTextHoverBackgroundColor',''),
			'borderRadius'                   =>  $params->get('borderRadius',''),
			'toogleOpen'                     =>  $params->get('toggleOpen',''),
			'toggleClose'                    =>  $params->get('toggleClose',''),
		];

		$items = $params->get('subitems', '');

		/*** Defaultwerte für Variablen ***/

		$addCss = '';       //leerer CSS-Style wird angelegt
		$counter = 0;       //Itemcounter für eindeutige Zuweisung
		$direction = 'row'; //Default-Reihenfolge Icon / Text
		$containerDirection = 'column';
		$translateX = '0px';
		$translateY = '0px';
		$translateXm = '0px';
		$translateYm = '0px';
		$animateX = '0px';
		$animateY = '0px';
		$alignItems = 'start';
		$justifyContent = 'start';
		$itemPadding = '';
		$togglePadding = '';
		$mobileTransform = 'translate(0px, 0px);';
		$breakpoint = '960px';
		$horizontalPositionM = '';
		$toggleTranslation = '0px';
		$toggleFlex = 'flex-start';
		$animateM = '0px';

		/*** Items ***/

		foreach($items as $item)
		{
			$counter++;

			$backgroundColor = !($item->textBackgroundColor) ? $parameters['globalTextBackgroundColor'] : $item->textBackgroundColor;
			$textColor = !($item->textColor) ? $parameters['globalTextColor'] : $item->textColor;
			$borderColor = !($item->borderColor) ? $parameters['globalBorderColor'] : $item->borderColor;
			$borderHoverColor = !($item->borderHoverColor) ? $parameters['globalBorderHoverColor'] : $item->borderHoverColor;
			$backgroundHoverColor = !($item->textHoverBackgroundColor) ? $parameters['globalTextHoverBackgroundColor'] : $item->textHoverBackgroundColor;
			$textHoverColor = !($item->textHoverColor) ? $parameters['globalTextHoverColor'] : $item->textHoverColor;

			$addCss .= '.item-' . $counter . ' {';
			$addCss .= 'color:' . $textColor . ';';
			$addCss .= 'background-color:' . $backgroundColor . '; ';
			$addCss .= 'border: 1px solid ' . $borderColor . '; ';
			$addCss .= '}';
			$addCss .= '.item-' . $counter . ' a {';
			$addCss .= 'color:' . $textColor . ';';
			$addCss .= '}';
			$addCss .= '.item-' . $counter . ':hover{';
			$addCss .= 'border: 1px solid ' . $borderHoverColor . '; ';
			$addCss .= '}';
			$addCss .= '.item-' . $counter . ':hover, .item-' . $counter . ' a:hover{';
			$addCss .= 'color:' . $textHoverColor . ';';
			$addCss .= 'background-color:' . $backgroundHoverColor . '; ';
			$addCss .= '}';

		}

		/*** Positionierung Itemcontainer und davon abhängiges Styling***/
		switch ($parameters['horizontalPosition']){
			case 'left':
				$horizontalPosition = 'left: 0;';
				$direction .= '-reverse';   //Reihenfolge Icon / Text umkehren
				$animateX = 'calc(100% - ' . $parameters['iconSize'] . ' - 1.25em - 8px - ' . $parameters['borderRadius'] . ')';
				$translateX = 'calc(' . $parameters['iconSize'] . ' - 100% + 1.25em + 8px)';
				$alignItems = 'end';
				$itemPadding = '-left';
				$toggleTranslation = '-100%';
				$toggleFlex = 'flex-end';
				break;

			case 'right':
				$horizontalPosition = 'right: 0;';
				$translateX = 'calc(100% - ' . $parameters['iconSize'] . ' - 1.25em - 8px)';
				$animateX = 'calc(' . $parameters['iconSize'] . ' - 100% + 1.25em + 8px + ' . $parameters['borderRadius'] . ')';
				$itemPadding = '-right';
				$toggleTranslation = '100%';
				break;
		}

		switch ($parameters['verticalPosition']){
			case 'top':
				$verticalPosition = 'top: 0;';
				break;

			case 'middle':
				$verticalPosition = 'top: 50vh;';
				$translateY = '-50%';
				break;

			case 'bottom':
				$verticalPosition = 'bottom: 0;';
				break;
		}

		if($parameters['verticalPosition'] !== 'middle')
		{
			$addCss .= '.item a{margin-top:0;margin-bottom:0;}';
			$addCss .= '.itemToggle{margin-top:0;margin-bottom:0;}';
		}

		$addCss .= '#desktopContainer{';
		$addCss .= $horizontalPosition;
		$addCss .= $verticalPosition;
		$addCss .= '}';

		$addCss .= '.item:not(.item.itemContent){';
		$addCss .= 'padding' . $itemPadding . ': calc(8px + ' . $parameters['borderRadius'] . ');';
		$addCss .= '}';

		$addCss .= '.itemToggle{';
		$addCss .= 'padding' . $togglePadding . ': 8px;';
		$addCss .= '}';

		/***MiddlePosition***/

		$addCss .='.itemTab:hover .item.itemToggle{';
		$addCss .='     border' . $togglePadding . '-left-radius:0;';
		$addCss .='     border' . $togglePadding . '-right-radius:0;';
		$addCss .='}';
		$addCss .='.itemTab:hover:first-child .itemContent{';
		$addCss .='	  border' . $itemPadding . '-left-radius: 0;';
		$addCss .='}';
		$addCss .='.itemTab:hover:last-child .itemContent';
		$addCss .='{';
		$addCss .='border' . $itemPadding . '-right-radius: 0;';
		$addCss .='}';


		/***MobilePosition***/

		if($parameters['enableMobile'] === 'true')
		{
			$breakpoint = $parameters['breakpoint'];
			$verticalPositionM = 'bottom: 0';
			$translateYm = '-10px';
			$animateM = 'calc(100% + ' . $parameters['iconSize'] . ' + 1.25em + 8px + 10px)' ;

			switch($parameters['toolbarPositionMobile'])
			{
				case 'left':
					$horizontalPositionM = 'left: 0;';
					$translateXm = '10px';
					$addCss .='#mobileContainer{.itemContainer {bottom:-100%;}}';
					break;
				case 'center':
					$horizontalPositionM = 'left: 50vw;';
					$translateXm = '-50%';
					$addCss .='#mobileContainer{align-items:center}';
					break;
				case 'right':
					$horizontalPositionM = 'right: 0;';
					$translateXm = '-10px';
					$addCss .='#mobileContainer{align-items:end}';

					break;
			}

			$addCss .='.toggleButton{';
			$addCss .='width: calc(' . $parameters['iconSize'] . ' + 15px);';
			$addCss .='height: calc(' . $parameters['iconSize'] . ' + 15px);';
			$addCss .='}';

			$addCss .= '#mobileContainer{';
			$addCss .= $horizontalPositionM;
			$addCss .= $verticalPositionM;
			$addCss .= '}';
		}
		else
		{
			$breakpoint = '0px';
		}

		/***SCSS Variabeln***/

		$variables = [
			'$direction'                        => $direction,
			'$iconSize'                         => $parameters['iconSize'],
			'$textSize'                         => $parameters['fontSize'],
			'$translation'                      => 'translate(calc(' . $translateX . ' + ' . $parameters['offsetX'] . ') , calc(' . $translateY . ' + ' . $parameters['offsetY'] . ') );',
			'$translationM'                     => 'translate(' . $translateXm . ', ' . $translateYm . ') );',
			'$animation'                        => 'translate(' . $animateX . ' , ' . $animateY . ' );',
			'$animationM'                       => 'translate( 0 , ' . $animateM . ' );',
			'$alignItems'                       => $alignItems,
			'$justifyContent'                   => $justifyContent,
			'$borderRadius'                     => $parameters['borderRadius'],
			'$containerDirection'               => $containerDirection,
			'$breakpoint'                       => $breakpoint,
			'$globalTextColor'                  => $parameters['globalTextColor'],
			'$globalTextHoverColor'             => $parameters['globalTextHoverColor'],
			'$borderColor'                      => $borderColor,
			'$borderHoverColor'                 => $borderHoverColor,
			'$globalBackgroundColor'            => $parameters['globalTextBackgroundColor'],
			'$globalHoverBackgroundColor'       => $parameters['globalTextHoverBackgroundColor'],
			'$toggleTranslation'                => $toggleTranslation,
			'$toggleFlex'                       => $toggleFlex,
		];



		/*****************Compiler*********************/
		
		$base = Uri::base();
		$path = $base . 'modules/mod_cta_toolbar/src/Helper/';
		//include('scss.inc.php');
		require_once $_SERVER['DOCUMENT_ROOT'] . '/modules/mod_cta_toolbar/src/Helper/scss.inc.php';
		
		$compiler = new ScssCompiler();
		$htAuth = $params['htUser'] . ':' . $params['htPass'];
		$arrContextOptions=array(       //Einstellungen für das Schreiben bei SSL-Zertifikat
			"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
			),
			'http' => array (
				'header' => 'Authorization: Basic ' . base64_encode($htAuth)
			),
		);

		$source_scss = Uri::base() . 'modules/mod_cta_toolbar/assets/css/custom.scss';

		$scssContents = file_get_contents($source_scss, false , stream_context_create($arrContextOptions));

		$import_path = 'scss';
		$compiler->addImportPath($import_path);

		$compiler->addVariables($variables);

		$scssContents .= $addCss;

		$css = $compiler->compileString($scssContents);

		File::write('modules/mod_cta_toolbar/assets/css/toolbar.css', $css->getCss(), '' );

    }

}
