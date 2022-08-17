<? if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED !== true) {
    die();
}
$arSelect = array(
    "NAME",
    "PROPERTY_SVG"
);
$arFilter = array("IBLOCK_ID" => 1, "ACTIVE" => "Y");
$res = CIBlockElement::GetList(array(), $arFilter, false, false, $arSelect);
while ($ob = $res->Fetch()) {

    $arResult['ADVANTAGES'][] = [
        'NAME' => $ob['NAME'],
        'SVG' => (!empty($ob['PROPERTY_SVG_VALUE'])) ? CFile::GetPath($ob['PROPERTY_SVG_VALUE']) : '',
    ];

}