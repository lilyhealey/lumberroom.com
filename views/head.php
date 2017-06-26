<?
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

$title = "Lumber Room";

// self
if ($uu->id)
  $item = $oo->get($uu->id);
else
  $item = $oo->get(0);

$dev = get_cookie('dev');
if (!$dev)
  $dev = $_GET['dev'];
if ($dev)
  set_cookie('dev', $dev);
else
  die("under construction");

?>
<!DOCTYPE html>
<html>
	<head>
		<title><? echo $title; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="<? echo $host;?>media/png/icon.png">
		<link rel="stylesheet" href="<? echo $host; ?>static/css/main.css">
	</head>
	<body>
	  <div id="header-container"><header><a href="/"><? echo $title; ?></a></header></div>
	  <section class="main">
	  <div id="menu"><?
	    $menu_url = "";
	    $children = $oo->children(0);
      foreach ($children as $child)
      {
        $menu_url = "/".$child['url'];
        if ($child['id'] == $item['id'])
        {
        ?><div class="menu-item select"><?
        }
        else
        {
        ?><div class="menu-item"><?
        }
        ?><a href="<? echo $menu_url;?>"><? echo $child['name1']; ?></a></div><?
      }
	  ?></div>
