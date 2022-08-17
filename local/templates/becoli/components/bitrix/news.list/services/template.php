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
    <div class="services-section section" id="services">
        <div class="container">
            <span class="section-subtitle" data-aos="fade-up"><?= $arResult['NAME'] ?></span>
            <div class="wrapper_services-slider" data-aos="fade-up">
                <div class="services-slider">
                    <? foreach ($arResult["ITEMS"] as $arItem): ?>
                        <?
                        $this->AddEditAction($arItem['ID'], $arItem['EDIT_LINK'],
                            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_EDIT"));
                        $this->AddDeleteAction($arItem['ID'], $arItem['DELETE_LINK'],
                            CIBlock::GetArrayByID($arItem["IBLOCK_ID"], "ELEMENT_DELETE"),
                            array("CONFIRM" => GetMessage('CT_BNL_ELEMENT_DELETE_CONFIRM')));
                        ?>
                        <div class="service-slide" id="<?= $this->GetEditAreaId($arItem['ID']); ?>">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="services-counter">
                                        <span class="pagination-number"></span>
                                        <span class="divider"><?=GetMessage('SERVICE_DIVIDER')?></span>
                                        <span class="pagination-digit"></span>
                                    </div>
                                    <span class="service-slide_title"><?=$arItem['NAME']?></span>
                                </div>
                                <div class="col-md-6">
                                    <div class="service-slide_desc">
                                        <div class="desc-content">
                                           <?=$arItem['PREVIEW_TEXT']?>
                                        </div>
                                        <a href="javascript:void(0);" data-service="<?=$arItem['ID']?>"
                                           class="white-btn service-slide_btn"><?=GetMessage('SERVICE_BTN_NAME')?> <span class="ico-plus"></span></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <? endforeach; ?>
                </div>
                <div class="services-arrows"></div>
            </div>
        </div>
    </div>
<? endif; ?>