#!/usr/bin/php
<?php
$array_log = array();
while (($buffer = fgets(STDIN)) !== false) {
// split the line while removing any empty string
$log_item = preg_split('/\r/', $buffer, 0, PREG_SPLIT_NO_EMPTY);
$regex = '/^(\d{1,3}.\d{1,3}.\d{1,3}.\d{1,3})\s-\s-\s\[(.*)\]\s\"(.*)\"\s(\d{3})\s(\d+)\s\"(.*)\"\s\"(.*)\"$/';
preg_match($regex,$log_item[0],$matches);
$array_log[] = $matches;
}
foreach ($array_log as $sub_log) {
	if(!empty($sub_log)){
		$ip_list[$sub_log[1]][] = $sub_log[1];
	}
}
foreach ($ip_list as $ip => $item) {
	$ip_count[$ip] = count($item);
}
foreach ($ip_count as $ip => $count) {
	echo $ip, chr(9), $count, PHP_EOL;
}
?>