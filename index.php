<?
$uri = explode("/", trim($_SERVER['REQUEST_URI'], "/"));

// all pages have the same head
require_once("views/head.php");

// here's where all of the fun stuff is
if (empty($uri[0])) {
  require_once("views/main.php");
}
else if (empty($uri[1])) {
  $view = "views/{$uri[0]}.php";
  require_once($view);
}
else if ($uri[0] == "exhibitions") {
  require_once("views/exhibition-detail.php");
}
else {
  require_once("views/collection-artist.php");
}

// close body, close html
require_once("views/foot.php");
?>
