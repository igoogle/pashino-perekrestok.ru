<?php
/*������� ����� ���������� �����
�� ������� CMS  +  ������ �������, ������ � ����� �� ����������, ��� ��� �������� �����  � �� ������������ � timeout �������
*/
function find_files($path, $text, $replace=0) {
  $handle = opendir($path);
  while ( false !== ($file = readdir($handle)) ) {
    if ( ($file !== "..") ) {
	  if(is_file($path."/".$file) && ($file !== ".") && ($file!=='file_finder.php')){
		$arr = pathinfo($path."/".$file);		
		if(in_array($arr['extension'],array('php','html', 'htm', 'xsl','tpl','tpls')))//������ ���������� ������ ������� ����� �����������
		{	
			$fpath = realpath($path."/".$file);
			$fcont=file_get_contents($fpath);			
			if(stripos($fcont, $text)!==false) { // ������ �������  �����				
				echo $path."/".$file . "<br>";
				//������ �������� ������ �� ������
				if($replace) file_put_contents($fpath, str_ireplace($text,' ',$fcont));
			}
		}
	  }
      if ( !is_file($path."/".$file) && ($file !== ".") )
      find_files($path . "/" . $file, $text, $replace);
    }
  }
  closedir($handle);
}
//�������� ��������� ����� ��� ��� ? false - �� ��������, true - ��������
$replace=false;
//������ ������
$path = $_SERVER["QUERY_STRING"];
//��� ���� ?
$text= 'one_click_buy_form'; 
//�� ��������� �����  ������ �� ����� �����
if ( $path{0} != "/" )  $path = $_SERVER["DOCUMENT_ROOT"] . "/" . $path;

find_files($path, $text, $replace);
?>