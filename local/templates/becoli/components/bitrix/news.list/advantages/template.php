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
<? if (!empty($arResult['ITEMS'])): ?>
    <div class="advantages-section section" id="advantages">
        <div class="container">
            <div class="section-title text-center" data-aos="fade-up"><?= $arResult['NAME'] ?></div>
            <ul class="advantages-list" data-aos="fade-up">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>
                    <li id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <?if(!empty($arItem['PROPERTIES']['SVG']['VALUE'])):?>
                            <span class="item-icon">
                                <img data-src="<?=CFile::GetPath($arItem['PROPERTIES']['SVG']['VALUE'])?>" alt="<?=$arItem['~NAME']?>">
                            </span>
                        <?endif;?>
                        <?=$arItem['~NAME']?>
                    </li>
                <? endforeach; ?>
            </ul>
        </div>
    </div>
<? endif; ?>