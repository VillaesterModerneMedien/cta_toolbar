<?php
/**
 * @package      Autohausen MIAHub Joomla 4 PKG
 *
 * @author       Christian Schuelling <info@autohausen.de>
 * @copyright    2023 autohausen.de - All rights reserved.
 * @license      GNU General Public License version 3 or later
 */

use Joomla\CMS\Factory;

$app = Factory::getApplication();
/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $app->getDocument()->getWebAssetManager();
$wa->registerAndUseStyle('mod_cta_toolbar', './modules/mod_cta_toolbar/assets/css/all.min.css');
$wa->registerAndUseStyle('mod_cta_toolbar_custom', './modules/mod_cta_toolbar/assets/css/toolbar.css');
$wa->registerAndUseStyle('mod_cta_toolbar_custom', './modules/mod_cta_toolbar/assets/js/functions.js');

$counter = 0;

?>

<div id="desktopContainer">
    <div class="itemContainer">
		<?php foreach ($content as $item):?>
        <?php $counter++; ?>
            <div class="itemTab">
                <div class="item itemToggle item-<?=$counter?>">
                    <a href="<?= $item->url; ?>" target="<?= $item->target; ?>">
                        <i class="<?=  $item->icon ?> itemIcon fa-fw"></i>
                    </a>
                </div>
                <div class="item itemContent item-<?=$counter?>">
                    <a href="<?= $item->url; ?>" target="<?= $item->target; ?>">
                        <span class="iconText"><?= $item->label; ?></span>
                    </a>
                </div>
            </div>
		<?php endforeach;?>
    </div>
</div>

