<?
$uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));

require_once("views/head.php");
if (empty($uri[0]))
{
  require_once("views/main.php");
}
else if ($uri[0] == "collection")
{
  require_once("views/collection.php");
}
require_once("views/foot.php");
?>
