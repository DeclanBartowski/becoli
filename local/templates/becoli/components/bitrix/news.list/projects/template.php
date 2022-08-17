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
    <div class="projects-section section" id="projects">
        <div class="container">
            <div class="section-subtitle" data-aos="fade-up"><?=$arResult['NAME']?></div>
        </div>
        <div class="wrapper_projects-slider" data-aos="fade-up">
            <div class="projects-slider">
                <? foreach ($arResult["ITEMS"] as $arItem): ?>
                    <?
                    $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                    $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                        CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                        array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                    ?>

                    <div class="wrapper-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                        <div class="project-item" style="background-image:url(<?=$arItem['PREVIEW_PICTURE']['SRC']?>)">
                            <span class="project-item_name"><?=$arItem['NAME']?></span>
                            <div class="project-item_desc">
                                <p><?=$arItem['PREVIEW_TEXT']?></p>
                                <a data-project="<?=$arItem['ID']?>" class="white-btn project-item_btn"><?=GetMessage('PROJECT_BTN_NAME')?> <span class="ico-plus"></span></a>
                            </div>
                        </div>
                    </div>
                <? endforeach; ?>
            </div>
            <div class="projects-arrows"></div>
        </div>
    </div>
<? endif; ?>