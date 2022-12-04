<?if(!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();?>
<?$APPLICATION->IncludeComponent(
	"bitrix:map.yandex.view",
	"",
	Array(
		"API_KEY" => "",
		"COMPOSITE_FRAME_MODE" => "A",
		"COMPOSITE_FRAME_TYPE" => "AUTO",
		"CONTROLS" => array("ZOOM","TYPECONTROL","SCALELINE"),
		"INIT_MAP_TYPE" => "MAP",
		"MAP_DATA" => "a:4:{s:10:\"yandex_lat\";d:55.15945197488848;s:10:\"yandex_lon\";d:82.96823206272803;s:12:\"yandex_scale\";i:14;s:10:\"PLACEMARKS\";a:3:{i:0;a:3:{s:3:\"LON\";d:82.977453835875;s:3:\"LAT\";d:55.162979711068;s:4:\"TEXT\";s:71:\"Розничный магазин на​Магистральная, 13\";}i:1;a:3:{s:3:\"LON\";d:82.961969351352;s:3:\"LAT\";d:55.15859936871;s:4:\"TEXT\";s:83:\"Розничный магазин на ​Лейтенанта Амосова, 67а\";}i:2;a:3:{s:3:\"LON\";d:82.98107047200453;s:3:\"LAT\";d:55.16142453556732;s:4:\"TEXT\";s:67:\"Розничный магазин на Солидарности, 23\";}}}",
		"MAP_HEIGHT" => "100%",
		"MAP_ID" => "",
		"MAP_WIDTH" => "100%",
		"OPTIONS" => array("ENABLE_DBLCLICK_ZOOM","ENABLE_DRAGGING"),
		"USE_REGION_DATA" => "Y"
	)
);?>