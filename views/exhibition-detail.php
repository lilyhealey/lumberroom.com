<?
$name = $item['name1'];
$b = $item['body'];
$b = process_body($b);

?><ul><li><? echo $name; ?></li></ul>
<? echo $b; ?><?
// collect media and captions
$media = $oo->media($uu->id);
$media_urls = array();
$media_captions = array();
$i = 0;
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
require_once("gallery.php");
?>
