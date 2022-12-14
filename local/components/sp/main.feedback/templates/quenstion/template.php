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
        <div class="form-section_content <?=$class?>" data-aos="fade-up">
            <div class="row">
                <div class="col-md-4">
                    <div class="section-title"><?=$arResult['IBLOCK_INFO']['NAME']?></div>
                    <?=$arResult['IBLOCK_INFO']['DESCRIPTION']?>
                </div>
                <div class="col-md-8">
                    <form action="<?=POST_FORM_ACTION_URI?>" method="POST" class="request-form">
                        <?=bitrix_sessid_post()?>
                        <input type="hidden" name="PARAMS_HASH" value="<?=$arResult["PARAMS_HASH"]?>">
                        <input type="hidden" name="submit" value="<?=GetMessage("SUBMIT")?>">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="NAME" type="text" class="form-control requiredField callback-name">
                                    <label class="form-label"><?=GetMessage('NAME_QUESTION')?></label>
                                    <span class="input_delete-text ico-close"></span>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <input name="PHONE" type="tel" class="form-control requiredField callback-phone">
                                    <label class="form-label"><?=GetMessage('PHONE_QUESTION')?></label>
                                    <span class="input_delete-text ico-close"></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea name="QUESTION" class="form-control form-textarea" placeholder="<?=GetMessage('QUESTION_FIELDS')?>"></textarea>
                        </div>
                        <div class="form-footer">
                            <label class="unified-checkbox">
                                <input value="" type="checkbox" name="checkbox" checked="">
                                <span class="checkbox-text"><?=GetMessage('PRIVACY_QUESTION')?></span>
                            </label>
                            <div class="wrapper_form-submit_btn main-btn">
                                <?=GetMessage('SEND_QUESTION')?> <span class="ico-arrow"></span>
                                <input type="submit" class="form-submit_btn js_form-submit" value="">
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

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
