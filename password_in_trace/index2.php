<?php

require __DIR__ . '/config.php';

$aLocalConf = $aConf;
$sLocalSecret = $sSecret;
unset($aConfig);
unset($sSecret);

function error_handler($errno, $errstr, $errfile, $errline, $errcontext)
{
	unset($errcontext['aParams']['mdp']);
	
	$msg = print_r($errcontext, true);
	var_dump($msg);
}

set_error_handler('error_handler');

function test(array $a, $s)
{
	trigger_error('test', E_ERROR);
}

test($aLocalConf, $sLocalSecret);