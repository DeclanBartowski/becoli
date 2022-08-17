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
<div class="text-center h3 h3-mod"><?= GetMessage('MODAL_PROJECTS_TITLE') ?></div>
<div class="unified_popup-content project_popup-content">
    <div class="row">
        <? if (!empty($arResult['PROPERTIES']['PHOTO_MODAL']['VALUE'])): ?>
            <div class="col-md-7">
                <div class="project-photo">
                    <? foreach ($arResult['PROPERTIES']['PHOTO_MODAL']['VALUE'] as $item): ?>
                        <a href="<?= CFile::GetPath($item) ?>" class="fancybox" data-fancybox="gallery"><img
                                    data-src="<?= CFile::GetPath($item) ?>" alt="alt"></a>
                    <? endforeach; ?>
                </div>
            </div>
        <? endif; ?>
        <div class="col-md-5 project_desc-column">
            <div class="section-title popup-title popup-mod_title"><?= $arResult['NAME'] ?></div>
            <?= $arResult['DETAIL_TEXT'] ?>
        </div>
    </div>
</div>