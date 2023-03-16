<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

defined('_JEXEC') or die;

use Joomla\CMS\Helper\ModuleHelper;
use Joomla\Module\CTAToolbar\Site\Helper\CTAHelper;


$layout         = $params->get('layout', 'default');
$content        = CTAHelper::getContent($params);
$parameters     = CTAHelper::getParameters($params);

if ($params->get('compile') === '1')
{
	$scss = CTAHelper::writeCss($params);
}

if($parameters->get('horizontalPosition') === 'center')
{
	$layout .= '_switcher';
}

require ModuleHelper::getLayoutPath('mod_cta_toolbar', $params->get('mod_cta_toolbar', $layout));