<?
$artist = $item['name1'];
$curr_letter = $artist[0];
?><h2><? echo $curr_letter; ?></h2><ul><li><? echo $artist; ?></li></ul><?
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
  ?><figure onclick='launch(<? echo $i++; ?>)'><?
    ?><img src="<? echo $url; ?>"><?
    ?><figcaption><? echo nl2br($caption); ?></figcaption><?
  ?></figure><?
}

require_once("gallery.php");
?>
