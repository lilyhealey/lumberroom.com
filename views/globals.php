<?php

// path to config file
$config = $_SERVER["DOCUMENT_ROOT"];
$config = $config."/open-records-generator/config/config.php";
require_once($config);

// specific to this 'app'
$config_dir = $root."/config/";
require_once($config_dir."url.php");
// require_once($config_dir."request.php");
require_once("lib/lib.php");

$db = db_connect("guest");

$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL();

// self
if ($uu->id)
  $item = $oo->get($uu->id);
else
  $item = $oo->get(0);

function startsWith($haystack, $needle) {
  $length = strlen($needle);
  return (substr($haystack, 0, $length) === $needle);
}

?>
