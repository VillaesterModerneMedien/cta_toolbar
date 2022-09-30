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
			'globalTextBackgroundColor'      =>  $params->get('globalTextBackgroundColor',''),
			'globalTextHoverBackgroundColor' =>  $params->get('globalTextHoverBackgroundColor',''),
			'borderRadius'                   =>  $params->get('borderRadius',''),
		];

		$items = $params->get('subitems', '');

		/*** Defaultwerte für Variablen ***/

		$addCss = '';       //leerer CSS-Style wird angelegt
		$counter = 0;       //Itemcounter für eindeutige Zuweisung
		$direction = 'row'; //Defaul-Reihenfolge Icon / Text
		$containerDirection= 'column';
		$translateX = '0px';
		$translateY = '0px';
		$animateX = '0px';
		$animateY = '0px';
		$alignItems = 'start';
		$justifyContent = 'start';
		$itemPadding = '';
		$togglePadding = '';
		$mobileTransform = 'translate(0px, 0px);';
		$breakpoint = '960px';

		/*** Items ***/

		if($parameters['horizontalPosition'] === 'center')
		{
			$addCss = ".itemContent {";
			$addCss .= 'position: absolute;';
			$addCss .= 'left: 0;';
			$addCss .= 'width: 100%;';
			$addCss .= $parameters['verticalPosition'] . ':-100%;';
			$addCss .= '}';
		}


		foreach($items as $item)
		{
			$counter++;

			$backgroundColor = !($item->textBackgroundColor) ? $parameters['globalTextBackgroundColor'] : $item->textBackgroundColor;
			$textColor = !($item->textColor) ? $parameters['globalTextColor'] : $item->textColor;
			$backgroundHoverColor = !($item->textHoverBackgroundColor) ? $parameters['globalTextHoverBackgroundColor'] : $item->textHoverBackgroundColor;
			$textHoverColor = !($item->textHoverColor) ? $parameters['globalTextHoverColor'] : $item->textHoverColor;

			$addCss .= '.item-' . $counter . '{';
			$addCss .= 'color:' . $textColor . ';';
			$addCss .= 'background-color:' . $backgroundColor . '; ';
			$addCss .= '}';
			$addCss .= '.item-' . $counter . ':hover, .item-' . $counter . ' a:hover{';
			$addCss .= 'color:' . $textHoverColor . ';';
			$addCss .= 'background-color:' . $backgroundHoverColor . '; ';
			$addCss .= '}';

			/***Stylying für mittlere positionierung***/
			if($parameters['horizontalPosition'] === 'center')
			{
				$addCss .= '.itemTab:hover .item.itemContent.item-' . $counter . '{';
				$addCss .= $parameters['verticalPosition'] . ':100%;';
				$addCss .= 'color:' . $textHoverColor . ';';
				$addCss .= 'background-color:' . $backgroundHoverColor . '; ';
				$addCss .= '}';
				$addCss .= '.item.itemContent.item-' . $counter . ':hover .item.itemTab.item-' . $counter . '{';
				$addCss .= 'color:' . $textHoverColor . ';';
				$addCss .= 'background-color:' . $backgroundHoverColor . '; ';
				$addCss .= '}';
			}
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
				break;

			case 'center':
				$horizontalPosition = 'left: 50vw;';
				$translateX = '-50%';
				$direction = 'column';
				$containerDirection = 'row';
				break;

			case 'right':
				$horizontalPosition = 'right: 0;';
				$translateX = 'calc(100% - ' . $parameters['iconSize'] . ' - 1.25em - 8px)';
				$animateX = 'calc(' . $parameters['iconSize'] . ' - 100% + 1.25em + 8px + ' . $parameters['borderRadius'] . ')';
				$itemPadding = '-right';
				break;
		}

		switch ($parameters['verticalPosition']){
			case 'top':
				$verticalPosition = 'top: 0;';
				if($parameters['horizontalPosition'] === 'center')
				{
					$translateY    = 'calc(' . $parameters['iconSize'] . ' - 100% + 1.25em + 8px)';
					$itemPadding   = '-top';
					$togglePadding = '-bottom';
				}
				break;

			case 'middle':
				$verticalPosition = 'top: 50vh;';
				$translateY = '-50%';
				break;

			case 'bottom':
				$verticalPosition = 'bottom: 0;';
				if($parameters['horizontalPosition'] === 'center')
				{
					$translateY = 'calc(100% - ' . $parameters['iconSize'] . ' - 1.25em - 8px)';
					$itemPadding = '-bottom';
					$togglePadding = '-top';
				}
				break;
		}

		if($parameters['verticalPosition'] !== 'middle')
		{
			$addCss .= '.item a{margin-top:0;margin-bottom:0;}';
			$addCss .= '.itemToggle{margin-top:0;margin-bottom:0;}';
		}

		$addCss .= '#itemContainer{';
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
			//$addCss .='@import(./group.css)';
			$breakpoint = $parameters['breakpoint'];
			$verticalPosition = 'bottom: calc(-100% -  ' . $parameters['iconSize'] . ' - 1.25em - 8px);';
			switch($parameters['toolbarPositionMobile'])
			{
				case 'left':
					$horizontalPosition = 'left: 0;';
					break;
				case 'center':
					$horizontalPosition = 'left: 50vw;';
					$mobileTransform = 'translate(-50%, 0);';
					break;
				case 'right':
					$horizontalPosition = 'right: 0;';
					break;
			}

			$addCss .= '@media(max-width:' . $breakpoint . '){';
			$addCss .= '#itemContainer{';
			$addCss .= $horizontalPosition;
			$addCss .= $verticalPosition;
			$addCss .= '}';
			$addCss .= '}';
		}
		else
		{
			$breakpoint = '100vw';
		}

		/***Mobile / Gruppenstyling***/
		$addCss .='.toggleButton{';
		$addCss .='width: calc(' . $parameters['iconSize'] . ' + 15px);';
		$addCss .='height: calc(' . $parameters['iconSize'] . ' + 15px);';
		$addCss .='}';



		/***SCSS Variabeln***/

		$variables = [
			'$direction'                    => $direction,
			'$iconSize'                     => $parameters['iconSize'],
			'$textSize'                     => $parameters['fontSize'],
			'$translation'                  => 'translate(calc(' . $translateX . ' + ' . $parameters['offsetX'] . ') , calc(' . $translateY . ' + ' . $parameters['offsetY'] . ') );',
			'$animation'                    => 'translate(' . $animateX . ' , ' . $animateY . ' );',
			'$alignItems'                   => $alignItems,
			'$justifyContent'               => $justifyContent,
			'$borderRadius'                 => $parameters['borderRadius'],
			'$containerDirection'           => $containerDirection,
			'$breakpoint'                   => $breakpoint,
			'globalTextColor'               => $parameters['globalTextColor'],
			'globalTextHoverColor'          => $parameters['globalTextHoverColor'],
			'globalBackgroundColor'         => $parameters['globalTextBackgroundColor'],
			'globalHoverBackgroundColor'    => $parameters['globalTextHoverBackgroundColor'],
		];



		/*****************Compiler*********************/
		require_once 'scss.inc.php';

		$compiler = new Compiler();

		$arrContextOptions=array(       //Einstellungen für das Schreiben bei SSL-Zertifikat
			"ssl"=>array(
				"verify_peer"=>false,
				"verify_peer_name"=>false,
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
