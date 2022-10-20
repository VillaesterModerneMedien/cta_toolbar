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
$start ='';
$toggleOpen = '';
$toggleClose = '';
$toggleOpenM = '';
$toggleCloseM = '';

if($parameters->get('startStatusDesktop') === 'open' || $parameters->get('toggle') === 'false')
{
    $start = 'show';
    $toggleOpen = 'hide';
}
else
{
    $toggleClose = 'hide';
}
if($parameters->get('startStatusMobile') === 'open')
{
    $startM = 'show';
    $toggleOpenM = 'hide';
}
else
{
    $toggleCloseM = 'hide';
}
?>
<div id="desktopContainer">
    <ul class="itemContainer <?= $start; ?>" id="desktopMenu">
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
    <?php if($parameters->get('toggle') === 'true') {?>
        <div class="toggleButton item" id="toggleDesk">
            <i id="toggleOpenDesk" class="<?=  $parameters->get('toggleOpen') ?> itemIcon fa-fw <?= $toggleOpen;?>"></i>
            <i id="toggleCloseDesk" class="<?=  $parameters->get('toggleClose') ?> itemIcon fa-fw <?= $toggleClose;?>"></i>
        </div>
    <?php }?>
</div>

<div id="mobileContainer">
    <div class="toggleButton item" id="toggle">
        <i id="toggleOpen" class="<?=  $parameters->get('toggleOpen') ?> itemIcon fa-fw <?= $toggleOpenM;?>"></i>
        <i id="toggleClose" class="<?=  $parameters->get('toggleClose') ?> itemIcon fa-fw <?= $toggleCloseM;?>"></i>
    </div>
    <ul class="itemContainer <?= $startM; ?>" id="mobileMenu">
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

