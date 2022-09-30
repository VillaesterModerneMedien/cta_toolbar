<?php
/**
 * @package     Joomla.Site
 * @subpackage  mod_feed
 *
 * @copyright   (C) 2005 Open Source Matters, Inc. <https://www.joomla.org>
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
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