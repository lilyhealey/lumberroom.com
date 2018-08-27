<?
$current_id = 234;
$current_obj = $oo->children($current_id)[0];

$name = $current_obj['name1'];
$body = process_body($current_obj['body']);


?><section><?
if ($name[0] != ".")
{
  ?><p><? echo $name; ?></p><?
}
?><? echo $body; ?></section><?

// collect media and captions
$media = $oo->media($current_obj['id']);
$media_urls = array();
$media_captions = array();
$i = 0;

?><section id="hp-thumbnails"><?
foreach ($media as $m)
{
  if (strcasecmp($media['type'], "pdf") != 0)
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
}
?></section><?
require_once("gallery.php");
?>
