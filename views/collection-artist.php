<?
$artist = $item['name1'];
$curr_letter = $artist[0];
$b = $item['body'];

$pattern = '/\n*(.+)\n*/';
$replacement = '<p>$1</p>';
$b = preg_replace($pattern, $replacement, $b);

$pattern = '/<p> {3,}(.*)<\\/p>/';
$replacement = '<p class="indent">$1</p>';
$b = preg_replace($pattern, $replacement, $b);

$pattern = '/\n/';
$replacement = '';
$b = preg_replace($pattern, $replacement, $b);

$pattern = '/<p>\s*<\\/p>/';
$replacement = '';
$b = preg_replace($pattern, $replacement, $b);

?><h2><? echo $curr_letter; ?></h2><ul><li><? echo $artist; ?></li></ul>
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
