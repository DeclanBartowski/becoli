<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
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
<div class="main-section">
    <? if (!empty($arResult['PROPERTIES']['VIDEO']['VALUE'])): ?>
        <video class="video" preload="yes" muted="muted" autoplay playsinline loop
               poster="<?= $arResult['PREVIEW_PICTURE']['SRC'] ?>">
            <source src="<?= CFile::GetPath($arResult['PROPERTIES']['VIDEO']['VALUE']) ?>" class="source"
                    type="video/mp4">
        </video>
    <? endif; ?>
    <div class="container">
        <div class="row">
            <? if (!empty($arResult['ADVANTAGES'])): ?>
                <div class="col-md-6 order-md-2">
                    <ul class="main-section_adv-list">
                        <? foreach ($arResult['ADVANTAGES'] as $advantage): ?>
                            <li>
                                <? if (!empty($advantage['SVG'])): ?>
                                    <span class="item-icon">
                                        <img data-src="<?= $advantage['SVG'] ?>" alt="<?= $advantage['NAME'] ?>">
                                    </span>
                                <? endif; ?>
                                <?= $advantage['NAME'] ?>
                            </li>
                        <? endforeach; ?>
                    </ul>
                </div>
            <? endif; ?>
            <div class="col-md-6 main-section_left-column">
                <div class="main-section_desc">
                    <div class="main-section_desc-inner">
                        <h1><?= $arResult['NAME'] ?></h1>
                        <p>
                            <?= $arResult['PREVIEW_TEXT'] ?>
                        </p>
                        <a href="#callback" data-toggle="modal" class="white-btn"><?= GetMessage('MAIN_MODAL_BTN') ?>
                            <span class="ico-arrow"></span></a>
                    </div>
                </div>
                <div class="wrapper-arrow-down js_arrow-down">
                    <span class="ico-arrow-2"></span>
                </div>
            </div>
        </div>
    </div>
</div>