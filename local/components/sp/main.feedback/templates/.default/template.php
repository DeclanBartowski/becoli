<?
if(!defined("B_PROLOG_INCLUDED")||B_PROLOG_INCLUDED!==true)die();
/**
 * Bitrix vars
 *
 * @var array $arParams
 * @var array $arResult
 * @var CBitrixComponentTemplate $this
 * @global CMain $APPLICATION
 * @global CUser $USER
 */

$class = '';
?>

<?if(!empty($arResult["ERROR_MESSAGE"]))
{
	foreach($arResult["ERROR_MESSAGE"] as $v)
		ShowError($v);
}
if(strlen($arResult["OK_MESSAGE"]) > 0)
{

    $class = 'aos-init aos-animate';
	?>
    <script>
        BX.onCustomEvent('modal_success');
    </script>
    <?
}
?>

<div class="form-section">
    <div class="container">
        <div class="form-section_content form-section_content-mod <?=$class?>" data-aos="fade-up">
            <div class="section-title"><?=$arResult['IBLOCK_INFO']['NAME']?></div>
            <?=$arResult['IBLOCK_INFO']['DESCRIPTION']?>
            <form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="request-form">
                <?=bitrix_sessid_post()?>
                <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                <input type="hidden" name="submit" value="<?=GetMessage("SUBMIT")?>">
                <div class="request-form_content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="NAME" type="text" class="form-control requiredField callback-name">
                                <label class="form-label"><?=GetMessage('NAME')?></label>
                                <span class="input_delete-text ico-close"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <input name="PHONE" type="tel" class="form-control requiredField callback-phone">
                                <label class="form-label"><?=GetMessage('PHONE')?></label>
                                <span class="input_delete-text ico-close"></span>
                            </div>
                        </div>
                    </div>

                    <?if($arParams["USE_CAPTCHA"] == "Y"):?>
                        <div class="mf-captcha">
                            <input type="hidden" name="captcha_sid" value="<?=$arResult["capCode"]?>">
                            <img src="/bitrix/tools/captcha.php?captcha_sid=<?=$arResult["capCode"]?>" width="180" height="40" alt="CAPTCHA">
                            <div class="mf-text"><?=GetMessage("MFT_CAPTCHA_CODE")?><span class="mf-req">*</span></div>
                            <input type="text" name="captcha_word" size="30" maxlength="50" value="">
                        </div>
                    <?endif;?>

                    <div class="wrapper_form-submit_btn main-btn">
                        <?=GetMessage('SEND_DEFAULT')?> <span class="ico-arrow"></span>
                        <input type="submit" class="form-submit_btn js_form-submit" value="">
                    </div>
                </div>
                <div class="form-footer">
                    <label class="unified-checkbox">
                        <input value="" type="checkbox" name="checkbox" checked="">
                        <span class="checkbox-text"><?=GetMessage('PRIVACY')?></span>
                    </label>
                </div>

                <div class="form-footer form-footer-text">
                    <p>
                        <?
                        $APPLICATION->IncludeComponent("bitrix:main.include", "", [
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/form/text.php",
                            "EDIT_TEMPLATE" => ""
                        ], false, []);

                        ?>
                    </p>
                </div>
            </form>
        </div>
    </div>
</div>
