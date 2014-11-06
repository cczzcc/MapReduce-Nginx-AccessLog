#!/usr/bin/php
<?php
$ip2count = array();
while (($line = fgets(STDIN)) !== false) {  
	$line = trim($line);
	// parse the input we got from mapper-ip.php   
	list($ip, $count) = explode(chr(9), $line);
	$count = intval($count);
	if ($count > 0) {
		if(!isset($ip2count[$ip])){
			$ip2count[$ip] = 0;
		}
		$ip2count[$ip] += $count;
	}
}
ksort($ip2count);
// write the results to STDOUT (standard output)   
foreach ($ip2count as $ip => $count) {
	echo $ip, chr(9), $count, PHP_EOL;  
}
?>