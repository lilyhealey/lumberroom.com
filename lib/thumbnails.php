<?php

// path to config file
$config = $_SERVER["DOCUMENT_ROOT"];
require_once($config."/lib/lib.php");
$config = $config."/open-records-generator/config/config.php";
require_once($config);

$db = db_connect("guest");

$oo = new Objects();
$mm = new Media();
$ww = new Wires();
$uu = new URL(['collection']);

$artists = $oo->children($uu->id);

$artists_by_name = array();

foreach ($artists as $a) {
  $artists_by_name["{$a['name1']}"] = $a['id'];
}
ksort($artists_by_name);

$media_urls = array();
$media_captions = array();

$truncated_artists = array_slice($artists, $start, $num);

/*
foreach ($truncated_artists as $a) {
  // echo($a['id']);
  $media = $oo->media($a['id']);
  $media_urls = array();
  $j = 0; 
  foreach ($media as $m) {
    if (strcasecmp($media['type'], 'pdf') != 0) {
      $url = m_url($m);
      ?><figure class="thumbnail" onclick='launch(<? echo $j++; ?>)'>
        <img src="<? echo $url; ?>">
    </figure><?php
    }
  }
  $i++;
}
*/

// collect ALL media
// foreach ($artists as $artist) {
foreach ($artists_by_name as $name=>$a_id) {
  $media = $oo->media($a_id);
  foreach ($media as $m) {
    if (strcasecmp($media['type'], 'pdf') != 0) {
      $url = m_url($m);
      $media_urls[] = $url;
      $caption = $m['caption'];
      $media_captions[] = $caption;
    }
  }
}

$truncated_media_urls = array_slice($media_urls, $start, $num);
$truncated_media_captions = array_slice($media_urls, $start, $num);

/*
if (count($truncated_media_urls) > 0) {
  ?><h3>START:<?php echo $start; ?></h3><?php
  ?><h3>NUM:<?php echo $num; ?></h3><?php
}
*/

for ($i = 0; $i < count($truncated_media_urls); $i++) {
  $url = $truncated_media_urls[$i];
  $caption = $truncated_media_captions[$i];
  ?><figure class="thumbnail" onclick='launch(<? echo $i + $start; ?>)'>
    <img src="<? echo $url; ?>">
  </figure><?php
}
?>
