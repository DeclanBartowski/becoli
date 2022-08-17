<?
if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

?>

<? if (!empty($arResult["ERROR_MESSAGE"])) {
    foreach ($arResult["ERROR_MESSAGE"] as $v) {
        ShowError($v);
    }
}
if (strlen($arResult["OK_MESSAGE"]) > 0) {

    ?>
    <script>
        BX.onCustomEvent('modal_success');
    </script>
    <?
}
?>
<div class="section-title popup-title"><?= $arResult['IBLOCK_INFO']['NAME'] ?></div>
<span class="popup_top-text"><?= $arResult['IBLOCK_INFO']['DESCRIPTION'] ?></span>
<form action="<?= POST_FORM_ACTION_URI ?>" method="POST" class="callback-form">
    <?= bitrix_sessid_post() ?>
    <input type="hidden" name="PARAMS_HASH" value="<?= $arResult["PARAMS_HASH"] ?>">
    <input type="hidden" name="submit" value="<?= GetMessage("SUBMIT") ?>">
    <div class="form-group">
        <input name="NAME" type="text" class="form-control requiredField callback-name">
        <label class="form-label"><?=GetMessage('NAME_APPLICATION')?></label>
        <span class="input_delete-text ico-close"></span>
    </div>
    <div class="form-group">
        <input name="PHONE" type="tel" class="form-control requiredField callback-phone">
        <label class="form-label"><?=GetMessage('PHONE_APPLICATION')?></label>
        <span class="input_delete-text ico-close"></span>
    </div>
    <? if ($arParams["USE_CAPTCHA"] == "Y"): ?>
        <div class="mf-captcha">
            <input type="hidden" name="captcha_sid" value="<?= $arResult["capCode"] ?>">
            <img src="/bitrix/tools/captcha.php?captcha_sid=<?= $arResult["capCode"] ?>" width="180" height="40"
                 alt="CAPTCHA">
            <div class="mf-text"><?= GetMessage("MFT_CAPTCHA_CODE") ?><span class="mf-req">*</span></div>
            <input type="text" name="captcha_word" size="30" maxlength="50" value="">
        </div>
    <? endif; ?>

    <div class="wrapper_popup-form_submit main-btn">
        <?=GetMessage('SEND_APPLICATION')?> <span class="ico-arrow"></span>
        <input type="submit" class="popup-form_submit js_form-submit" value="">
    </div>
    <div class="popup-policy">
        <?=GetMessage('PRIVACY_APPLICATION')?>
    </div>
</form>
