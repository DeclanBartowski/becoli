<?php
if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) {
    die();
}

use Bitrix\Main\Page\Asset;

$page = $APPLICATION->GetCurPage(false);
?>
<!DOCTYPE html>
<html lang="<?= LANGUAGE_ID ?>">
<head>
    <?php $APPLICATION->ShowHead(); ?>
    <?php
    Asset::getInstance()->addString('<meta content="' . SITE_TEMPLATE_PATH . '/browserconfig.xml" name="msapplication-config" />');
    Asset::getInstance()->addString('<meta http-equiv="X-UA-Compatible" content="IE=edge">');
    Asset::getInstance()->addString('<meta name="viewport" content="width=device-width, initial-scale=1">');
    Asset::getInstance()->addString('<link href="' . SITE_TEMPLATE_PATH . '/img/favicon.ico" rel="icon" type="image/png"/>');
    Asset::getInstance()->addString('<link href="' . SITE_TEMPLATE_PATH . '/img/favicon.png" rel="icon" type="image/png"/>');
    Asset::getInstance()->addString('<link rel="apple-touch-icon" sizes="120x120" href="' . SITE_TEMPLATE_PATH . '/img/apple-touch-icon.png"/>');
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/min.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/main.css");
    Asset::getInstance()->addCss(SITE_TEMPLATE_PATH . "/css/custom.css");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/min.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/main.js");
    Asset::getInstance()->addJs(SITE_TEMPLATE_PATH . "/js/custom.js");
    ?>
    <title><?php $APPLICATION->ShowTitle(); ?></title>
</head>
<body>
<?php $APPLICATION->ShowPanel(); ?>
<!--[if lt IE 10]>
   <?
$APPLICATION->IncludeComponent("bitrix:main.include", "", [
    "AREA_FILE_SHOW" => "file",
    "PATH" => SITE_TEMPLATE_PATH . "/include/header/ie_info.php",
    "EDIT_TEMPLATE" => ""
], false, []);

?>
<![endif]-->
<div class="global-wrapper">
    <div class="wrapper-loader">
        <div class="logo-loader_content">
            <div class="logo-loader"></div>
        </div>
        <div class="wrapper_loader-text">
            <span class="loader-text"><?= COption::GetOptionString("tq.tools",
                    "tq_module_param_nastroyki_sayta_logo_title") ?></span>
        </div>
    </div>
    <? if (ERROR_404 != 'Y'): ?>
        <div class="bg-overlay"></div>
        <header class="ui-header">
            <div class="container">
                <div class="hamburger hamburger--spring">
                    <div class="hamburger-box">
                        <div class="hamburger-inner"></div>
                    </div>
                </div>
                <div class="head-logo">
                    <img data-src="<?= SITE_TEMPLATE_PATH ?>/img/static/logo.svg" alt="alt" class="logo_first-img">
                    <img data-src="<?= SITE_TEMPLATE_PATH ?>/img/icons/logo-icon.svg" alt="alt" class="logo_second-img">
                </div>
                <nav class="head-nav">
                    <span class="menu_close-btn ico-close"></span>
                    <? $APPLICATION->IncludeComponent(
                        "bitrix:menu",
                        "menu_header",
                        array(
                            "ALLOW_MULTI_SELECT" => "N",
                            "CHILD_MENU_TYPE" => "left",
                            "DELAY" => "N",
                            "MAX_LEVEL" => "1",
                            "MENU_CACHE_GET_VARS" => array(0 => "",),
                            "MENU_CACHE_TIME" => "3600",
                            "MENU_CACHE_TYPE" => "N",
                            "MENU_CACHE_USE_GROUPS" => "Y",
                            "ROOT_MENU_TYPE" => "top",
                            "USE_EXT" => "N"
                        )
                    ); ?>
                    <div class="mobile_header-content">
                        <?
                        $APPLICATION->IncludeComponent("bitrix:main.include", "", [
                            "AREA_FILE_SHOW" => "file",
                            "PATH" => SITE_TEMPLATE_PATH . "/include/footer/callback.php",
                            "EDIT_TEMPLATE" => ""
                        ], false, []);
                        ?>
                        <div class="copyright"> &#169; <?= COption::GetOptionString("tq.tools",
                                "tq_module_param_nastroyki_sayta_company_name") ?> </div>
                        <a href="//webmedia39.ru/" target="_blank" class="footer-studio"><img
                                    data-src="<?= SITE_TEMPLATE_PATH ?>/img/static/studio.svg" alt="alt"></a>
                    </div>
                </nav>
                <div class="head_right-column">
                    <a href="tel:<?= str_replace(['-'], '',
                        COption::GetOptionString("tq.tools", "tq_module_param_nastroyki_sayta_phone_second")) ?>"
                       class="head_phone-number"><?= COption::GetOptionString("tq.tools",
                            "tq_module_param_nastroyki_sayta_phone") ?></a>
                    <?
                    $APPLICATION->IncludeComponent("bitrix:main.include", "", [
                        "AREA_FILE_SHOW" => "file",
                        "PATH" => SITE_TEMPLATE_PATH . "/include/header/callback.php",
                        "EDIT_TEMPLATE" => ""
                    ], false, []);

                    ?>
                </div>
            </div>
        </header>
    <? endif; ?>
    <main class="main-content">