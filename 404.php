<?
include_once($_SERVER['DOCUMENT_ROOT'].'/bitrix/modules/main/include/urlrewrite.php');

CHTTP::SetStatus("404 Not Found");
@define("ERROR_404","Y");

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");

$APPLICATION->SetTitle("404 Not Found");

?>

    <div class="error-section">
        <div class="container">
            <div class="error-number">404</div>
            <div class="error-section_right-column">
                <span class="large-text">not <br>founD</span>
                <a href="/" class="white-btn">Go Home <span class="ico-arrow"></span></a>
            </div>
        </div>
    </div>

<?php

require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>