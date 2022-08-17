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
    <div class="about-item">
        <?if(!empty($arResult['PROPERTIES']['YOUTUBE']['VALUE'])):?>
        <div class="company-video">
            <div class="youtube" data-embed="<?=$arResult['PROPERTIES']['YOUTUBE']['VALUE']?>">
                <div class="play-button ico-play"></div>
            </div>
        </div>
        <?endif;?>
        <?=$arResult['DETAIL_TEXT']?>
    </div>
    <div class="about-item">
        <div class="row">
            <div class="col-md-6">
                <?if(!empty($arResult['PROPERTIES']['TITLE']['VALUE'])):?>
                    <div class="section-title popup-title"><?=$arResult['PROPERTIES']['TITLE']['VALUE']?></div>
                <?endif;?>
                <?if(!empty($arResult['PROPERTIES']['TEXT']['~VALUE']['TEXT'])):?>
                    <?=$arResult['PROPERTIES']['TEXT']['~VALUE']['TEXT']?>
                <?endif;?>
            </div>
            <?if(!empty($arResult['PROPERTIES']['PICTURE']['VALUE'])):?>
                <div class="col-md-6">
                    <div class="company-img"><img data-src="<?=CFile::GetPath($arResult['PROPERTIES']['PICTURE']['VALUE'])?>" alt="alt"></div>
                </div>
            <?endif;?>
        </div>
    </div>
</div>