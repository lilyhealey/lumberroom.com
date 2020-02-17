<?php

// head variables
$title = "lumber room";

?>
<!DOCTYPE html>
<html>
	<head>
		<title><? echo $title; ?></title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width">
		<link rel="shortcut icon" href="<? echo $host;?>media/png/icon.png">
		<link rel="stylesheet" href="<? echo $host; ?>static/css/main.css">
    <script type="text/javascript" src="<? echo $host; ?>static/js/gallery.js"></script>
	</head>
	<body>
    <header><a href="/"><? echo $title; ?></a></header>
    <section id="menu"><?php
	    $menu_url = "";
	    $children = $oo->children(0);
      foreach ($children as $child)
      {
        if(startsWith($child['name1'], "."))
          continue;
        $menu_url = "/".$child['url'];

        // this is a hack for collections pages
        // any child of the 'collection' object should modify the collection
        // menu item so as to navigate back to collection#LETTER where LETTER
        // is the first letter of the child's uri. for example,
        // /collection/friedlander-lee will navigate back to /collection#f
        if ($uri[0] == "collection" && sizeof($uri) == 2) {
          $menu_url.= "#" . substr($uri[1], 0, 1);
        }

        if ($uri[0] == "collection") {
          if ($child['id'] == $item['id']) {
            ?><div class="menu-item">
              <a class="select" href="<? echo $menu_url;?>">Collection</a>,
              <a id="collection-index" class="select" onclick="showCollectionIndex()">Index</a>,
              <a id="collection-thumbnails" onclick="getCollectionThumbnails()">Thumbnails</a>
            </div><?
          }
          else {
            ?><div class="menu-item">
              <a href="<? echo $menu_url;?>"><? echo $child['name1']; ?></a>
            </div><?
          }
        } else {
          if ($child['id'] == $item['id']) {
            ?><div class="menu-item select"><?
          }
          else {
            ?><div class="menu-item"><?
          }
          ?><a href="<? echo $menu_url;?>"><? echo $child['name1']; ?></a></div><?
        }
      }
	  ?></section>
    <section class="main">
