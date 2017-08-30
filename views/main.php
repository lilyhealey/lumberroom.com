<?
$current_id = 174;
$current_obj = $oo->children($current_id)[0];

$artist = $current_obj['name1'];
$curr_letter = $artist[0];

// collect media and captions
$media = $oo->media($current_obj['id']);
$media_urls = array();
$media_captions = array();
$i = 0;
?><section><h2><? echo $artist; ?></h2><? echo nl2br($current_obj['body'])?></section><?
?><section id="hp-thumbnails"><?
foreach ($media as $m)
{
  $url = m_url($m);
  $media_urls[] = $url;
  $caption = $m['caption'];
  $media_captions[] = $caption;

  $random_padding = rand(0, 150);
  $random_width = rand(15, 45);
  $random_float = (rand(0, 1) == 0) ? 'left' : 'right';

  $style = "padding-top: {$random_padding}px;";
  $style.= "width: $random_width%;";
  $style.= "float: $random_float;";
  ?><figure class="thumb" onclick='launch(<? echo $i++; ?>)' style='<? echo $style; ?>'><?
    ?><img src="<? echo $url; ?>"><?
    ?><figcaption><? echo nl2br($caption); ?></figcaption><?
  ?></figure><?
}
?></section><?
require_once("gallery.php");
?>
