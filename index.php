<?
$uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));

require_once("views/head.php");

// here's where all of the fun stuff is
if (empty($uri[0]))
{
  require_once("views/main.php");
}
else if ($uri[0] == "collection")
{
  if (empty($uri[1]))
    require_once("views/collection.php");
  else
    require_once("views/collection-artist.php");
}

// close body, close html
require_once("views/foot.php");
?>
