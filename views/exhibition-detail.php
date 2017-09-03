<?
$name = $item['name1'];
$b = $item['body'];
$b = process_body($b);
?><ul><p><? echo $uri[1]; ?></p><li><? echo $name; ?></li></ul>
<? echo $b; ?><?
// collect media and captions
$media = $oo->media($uu->id);
$media_urls = array();
$media_captions = array();
$i = 0;
foreach ($media as $m)
{
  $url = m_url($m);
  $media_urls[] = $url;
  $caption = $m['caption'];
  $media_captions[] = $caption;
  ?><figure class="thumb" onclick='launch(<? echo $i++; ?>)'><?
    ?><img src="<? echo $url; ?>"><?
    ?><figcaption><? echo nl2br($caption); ?></figcaption><?
  ?></figure><?
}
require_once("gallery.php");
?>
