<?
$artist = $item['name1'];
$curr_letter = $artist[0];
?><h2><? echo $curr_letter; ?></h2><ul><li><? echo $artist; ?></li></ul><?
// collect media and captions
$media = $oo->media($uu->id);
$media_urls = array();
$media_captions = array();

foreach ($media as $m)
{
  $url = m_url($m);
  $caption = $m['caption'];
  ?><figure><img src="<? echo $url; ?>"><figcaption><? echo nl2br($caption); ?></figcaption></figure><?
}
?>
