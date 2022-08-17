<?

if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}
?>
</main>
<? if (ERROR_404 != 'Y'): ?>
    <footer class="main-footer section" id="contact">
        <div class="container" data-aos="fade-down">
            <div class="row">
                <div class="col-md-6">
                    <div class="footer-logo"><img data-src="<?= SITE_TEMPLATE_PATH ?>/img/static/logo-2.svg" alt="alt">
                    </div>
                    <ul class="footer-info">
                        <li>
                            <a href="mailto:<?=COption::GetOptionString("tq.tools", "tq_module_param_nastroyki_sayta_email")?>" class="footer-email"><span class="ico-email"></span><?=COption::GetOptionString("tq.tools", "tq_module_param_nastroyki_sayta_email")?></a>
                        </li>
                        <li><a href="tel:<?=str_replace(['-'],'', COption::GetOptionString("tq.tools", "tq_module_param_nastroyki_sayta_phone_second"))?>"><span class="ico-phone-2"></span><?=COption::GetOptionString("tq.tools", "tq_module_param_nastroyki_sayta_phone_second")?></a></li>
                        <li>
                            <span class="ico-adress"></span>
                            <span class="text">
                                <?=COption::GetOptionString("tq.tools", "tq_module_param_nastroyki_sayta_adress_title")?> <span class="min"><?=COption::GetOptionString("tq.tools", "tq_module_param_nastroyki_sayta_adress_value")?></span></span>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6 footer_right-column">
                    <nav class="footer-nav">
                        <? $APPLICATION->IncludeComponent(
                            "bitrix:menu",
                            "menu_footer",
                            array(
                                "ALLOW_MULTI_SELECT" => "N",
                                "CHILD_MENU_TYPE" => "left",
                                "DELAY" => "N",
                                "MAX_LEVEL" => "1",
                                "MENU_CACHE_GET_VARS" => array(0 => "",),
                                "MENU_CACHE_TIME" => "3600",
                                "MENU_CACHE_TYPE" => "N",
                                "MENU_CACHE_USE_GROUPS" => "Y",
                                "ROOT_MENU_TYPE" => "footer_menu",
                                "USE_EXT" => "N"
                            )
                        ); ?>
                    </nav>
                    <div class="footer-contact-cell">
                        <a href="tel:<?=str_replace(['-'],'', COption::GetOptionString("tq.tools", "tq_module_param_nastroyki_sayta_phone"))?>" class="footer_phone-number"><?=COption::GetOptionString("tq.tools", "tq_module_param_nastroyki_sayta_phone")?></a>
                        <?
                        $APPLICATION->IncludeComponent("bitrix:main.include", "", [
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/footer/callback.php",
                            "EDIT_TEMPLATE" => ""
                        ], false, []);

                        ?>
                    </div>
                </div>
            </div>
            <div class="main-footer_bottom">
                <div class="row">
                    <div class="col-md-6">
                        <div class="copyright"> &#169; <?=COption::GetOptionString("tq.tools", "tq_module_param_nastroyki_sayta_company_name")?></div>
                    </div>
                    <div class="col-md-6 right-column">
                        <?
                        $APPLICATION->IncludeComponent("bitrix:main.include", "", [
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/footer/privacy_policy.php",
                            "EDIT_TEMPLATE" => ""
                        ], false, []);

                        ?>
                        <a href="//webmedia39.ru/" target="_blank" class="footer-studio"><img data-src="<?= SITE_TEMPLATE_PATH ?>/img/static/studio.svg" alt="alt"></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <div class="scroll-to-top"></div>
<? endif; ?>

</div>

<? if (ERROR_404 != 'Y'): ?>

    <div aria-hidden="true" class="modal modal-mod fade js-modal" id="callback" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close" data-dismiss="modal" type="button"><span class="ico-close"></span></button>
                <?$APPLICATION->IncludeComponent(
                    "sp:main.feedback",
                    "application",
                    Array(
                        "AJAX_MODE" => "Y",
                        "AJAX_OPTION_ADDITIONAL" => "",
                        "AJAX_OPTION_HISTORY" => "N",
                        "AJAX_OPTION_JUMP" => "N",
                        "AJAX_OPTION_STYLE" => "N",
                        "COMPONENT_TEMPLATE" => "",
                        "EVENT_MESSAGE_ID" => array(0=>"13",),
                        "FILE_SEND" => "N",
                        "INFOBLOCKADD" => "Y",
                        "INFOBLOCKID" => "10",
                        "OK_TEXT" => "Спасибо, ваше сообщение принято.",
                        "REQUIRED_FIELDS" => array(0=>"NONE",),
                        "USE_CAPTCHA" => "N"
                    )
                );?>
            </div>
        </div>
    </div>


    <div aria-hidden="true" class="modal fade js-modal" role="dialog" id="project-popup">
        <div class="modal-dialog modal-dialog_wide modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close" data-dismiss="modal" type="button"><span class="ico-close"></span></button>
                <div class="content-insert">
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" class="modal fade js-modal" role="dialog" id="services-popup">
        <div class="modal-dialog modal-dialog_wide modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close" data-dismiss="modal" type="button"><span class="ico-close"></span></button>
                <div class="content-insert">
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" class="modal fade js-modal" role="dialog" id="about-popup">
        <div class="modal-dialog modal-dialog_wide modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close" data-dismiss="modal" type="button"><span class="ico-close"></span></button>
                <div class="content-insert">
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" class="modal fade js-modal" role="dialog" id="privacy-policy">
        <div class="modal-dialog modal-dialog_wide modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close" data-dismiss="modal" type="button"><span class="ico-close"></span></button>
                <div class="content-insert">
                </div>
            </div>
        </div>
    </div>
    <div aria-hidden="true" class="modal fade js-modal" role="dialog" id="application-accepted">
        <div class="modal-dialog modal-dialog_mod modal-dialog-centered" role="document">
            <div class="modal-content">
                <button class="close" data-dismiss="modal" type="button"><span class="ico-close"></span></button>
                <div class="popup-icon"><img data-src="<?=SITE_TEMPLATE_PATH?>/img/icons/ico-check.svg" alt=""></div>
                <div class="popup-title section-title text-center">Your application has been successfully sent</div>
                <p class="text-center modal-text">Thank you! Our experts will contact you shortly</p>
            </div>
        </div>
    </div>
<? endif; ?>
</body>
</html>
