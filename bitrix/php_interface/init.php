<?
use Bitrix\Main; 
use Bitrix\Main\Loader;
use \Bitrix\Sale;

\Bitrix\Main\EventManager::getInstance()->addEventHandler('catalog','\Bitrix\Catalog\Product::OnBeforeUpdate','onBeforeProductUpdate');
\Bitrix\Main\EventManager::getInstance()->addEventHandler('catalog','\Bitrix\Catalog\Product::OnBeforeAdd','onBeforeProductUpdate');

function onBeforeProductUpdate(\Bitrix\Main\Entity\Event $event){
   $result =   new \Bitrix\Main\Entity\EventResult();   
   $id  =   $event->getParameter('primary')['ID'];
   
   $arCatalogParamsProp = [
		'WEIGHT' => "OZON_VES",
		'HEIGHT' => "VYSOTA",
		'LENGTH' => "DLINA",
		'WIDTH' => "SHIRINA",
	];
	
	$arSelect = ['ID'];
	
   foreach($arCatalogParamsProp as $code){
	    $arSelect[] = 'PROPERTY_'.$code;
   }
   
   $res = CIBlockElement::GetList([], ['ID' => $id], false, false, $arSelect);
   if($arItem = $res -> Fetch()){
	   foreach($arCatalogParamsProp as $field => $code){
			if($arItem['PROPERTY_'.$code.'_VALUE']){
				$val = trim(str_replace(',', '.', $arItem['PROPERTY_'.$code.'_VALUE']));
				if($field == 'WEIGHT'){
					$val = $val * 1000;
				}
				if($val){
					$arFieldsCatalog[$field] = $val;					
				}	
			}else{
				$arFieldsCatalog[$field] = '';
			}
		}
   }
   if(!empty($arFieldsCatalog)){
	   $result->modifyFields($arFieldsCatalog);
   }
   

   return  $result;
}

if(!function_exists('_vardump')){
  /*
   * Custom vardump
   *
   * @param mixed $var
   * @param string $output ('f' or 'd')
   * @param boolean $checkAccess
   */
  function _vardump($var = '', $output = 'display', $checkAccess = true){
    global $USER;
    if($checkAccess && !$USER->IsAdmin()) return;

    $dump = print_r($var, true);

    $backtraceInfo = debug_backtrace(false);
    $source = 'File <b>'.$backtraceInfo[0]['file'].'</b> in line <b>'.$backtraceInfo[0]['line'].'</b>';

    switch($output){
      case 'f':
      case 'file':
        $logPath = $_SERVER['DOCUMENT_ROOT'].'/vardump_log.txt';

        $logFile = fopen($logPath, 'a');
        fwrite($logFile, "---— " . date('d.m.Y H:i:s') . " | " . strip_tags($source) . " —----------------------\n" . $dump . "\n\n");
        fclose($logFile);
        break;
      default:
        $dump = '<div style="margin: 20px; background: #fdf5db; border-radius: 4px; padding: 5px; border: 1px solid #ffe69d; box-shadow: 0 0 10px 0px #ccc; font-family: Arial;"><div style="margin-bottom: 5px; font-size: 11px; color: #848484; overflow:hidden;" title="'.strip_tags($source).'">'.$source.'</div><pre style="display: block; margin: 0; padding: 10px;  background: #fff; border: 1px solid #ccc; max-height: 400px; overflow: scroll; font-size: 13px; color: #000;">'.$dump.'</pre></div>';
        echo $dump;
        break;
    }
  }
}