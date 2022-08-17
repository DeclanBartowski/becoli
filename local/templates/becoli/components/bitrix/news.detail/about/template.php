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
<div class="about-section section" id="about">
    <div class="logo-bg" data-aos="fade-right" data-aos-offset="300"></div>
    <div class="container">
        <div class="about-section_content" data-aos="fade-left">
            <div class="windmills-bg" data-aos="fade-up" data-aos-offset="500" data-aos-delay="700"></div>
            <div class="section-title white-title"><?=$arResult['NAME']?></div>
            <?=$arResult['PREVIEW_TEXT']?>
            <a data-about="<?=$arResult['ID']?>" class="white-btn"><?=GetMessage('ABOUT_BTN_TEXT')?> <span class="ico-plus"></span></a>
        </div>
    </div>
</div>