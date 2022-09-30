<?php

use Joomla\CMS\Factory;

$app = Factory::getApplication();
/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $app->getDocument()->getWebAssetManager();
$wa->registerAndUseStyle('mod_cta_toolbar', './modules/mod_cta_toolbar/assets/css/all.min.css');
$wa->registerAndUseStyle('mod_cta_toolbar_custom', './modules/mod_cta_toolbar/assets/css/toolbar.css');
$wa->registerAndUseScript('functions', './modules/mod_cta_toolbar/assets/js/functions.js');

$counter = 0;
$counterM = 0;

?>

<div id="desktopContainer">
    <ul class="itemContainer">
		<?php foreach ($content as $item):?>
        <?php $counter++; ?>
            <li class="item item-<?=$counter?>">
                <a href="<?= $item->url; ?>" target="<?= $item->target; ?>">
                    <i class="<?=  $item->icon ?> itemIcon fa-fw"></i>
	                <span class="iconText"><?= $item->label; ?></span>
                </a>
            </li>
		<?php endforeach;?>
    </ul>
</div>

<div id="mobileContainer">
    <a href="#" class="toggleButton item" id="toggle"><i class="itemIcon fa-solid fa-angle-up fa-fw"></i></a>
    <ul class="itemContainer" id="mobileMenu">
		<?php foreach ($content as $item):?>
        <?php $counterM++; ?>
            <li class="item item-<?=$counterM?>">
                <a href="<?= $item->url; ?>" target="<?= $item->target; ?>">
                    <i class="<?=  $item->icon ?> itemIcon fa-fw"></i>
	                <span class="iconText"><?= $item->label; ?></span>
                </a>
            </li>
		<?php endforeach;?>
    </ul>

</div>

