<?php

use Joomla\CMS\Factory;

$app = Factory::getApplication();
/** @var Joomla\CMS\WebAsset\WebAssetManager $wa */
$wa = $app->getDocument()->getWebAssetManager();
$wa->registerAndUseStyle('mod_cta_toolbar', './modules/mod_cta_toolbar/assets/css/all.min.css');
$wa->registerAndUseStyle('mod_cta_toolbar_custom', './modules/mod_cta_toolbar/assets/css/toolbar.css');

$counter = 0;

?>

    <ul id="itemContainer">
        <li class="toggleButton item">
            <a href="#"><i class="itemIcon fa-solid fa-angle-up fa-fw mobileOpen"></i></a>
        </li>
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

