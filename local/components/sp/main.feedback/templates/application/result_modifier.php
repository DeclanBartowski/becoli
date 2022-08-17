<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}

if(!empty($arParams['INFOBLOCKID'])) {
    $arResult['IBLOCK_INFO'] = CIBlock::GetByID($arParams['INFOBLOCKID'])->Fetch();
}