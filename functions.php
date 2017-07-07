<?php
require_once 'connectvars.php';
 mysql_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("Нема з'єднання із сервером");
mysql_select_db(DB_NAME) or die("Нема з'єднання із БД");
mysql_query("SET NAMES 'utf8'") or die("Не вдалось встановити кодування з'єднання");

function selectTxt($id){
	$txt = array();
	$query = "SELECT id, code FROM editor  where id = $id";
	$res = mysql_query($query);
	while($row = mysql_fetch_assoc($res)){
		$txt[] = $row;
	}
	
	return $txt;
}


function code_content($content){
	$pattern = '#\[code\s*=\s*(\w+)](.*?)\[/code]#is';
	$content = preg_replace_callback($pattern, "callback", $content);
	return $content;
}

function callback($match){
	$content = "<pre class='brush: " .strtolower($match[1]). "'>" .htmlspecialchars($match[2]). "</pre>";
	return $content;
}

?>
