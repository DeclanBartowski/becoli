<?if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
/** @var array $arParams */
/** @var array $arResult */
/** @global CMain $APPLICATION */
/** @global CUser $USER */
/** @global CDatabase $DB */
/** @var CBitrixComponentTemplate $this */
/** @var string $templateName */
/** @var string $templateFile */
/** @var string $templateFolder */
/** @var string $componentPath */
/** @var CBitrixComponent $component */
$this->setFrameMode(true);
?>
<div class="section-title popup-title"><?=$arResult['NAME']?></div>
<div class="unified_popup-content">
    <?=$arResult['DETAIL_TEXT']?>
    <a href="javascript:void(0);" class="main-btn js_application-btn" data-callback-btn><?=GetMessage('SERVICE_BTN_SUBMIT_MODAL')?> <span class="ico-arrow"></span></a>
</div>