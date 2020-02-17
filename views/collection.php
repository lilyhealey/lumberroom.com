<div id="collection-list-container"><?
$artists = $oo->children($uu->id);
$base_url = "/{$uu->url}/";
$artist_urls = array();
foreach ($artists as $a)
{
  $artist_urls["{$a['name1']}"] = $base_url.$a['url'];
}
ksort($artist_urls);
reset($artist_urls);

$curr_letter = key($artist_urls)[0];
if ($curr_letter != '.') {
?><div class="anchor">
    <a id="<? echo strtolower($curr_letter); ?>">&nbsp;</a>
    <h2><? echo $curr_letter; ?></h2>
  </div><ul><?
}
foreach($artist_urls as $name=>$a_url)
{
  $this_letter = $name[0];
  if ($this_letter == '.') {
    continue;
  }
  if ($this_letter != $curr_letter)
  {
      ?></ul>
        <div class="anchor">
          <a id="<? echo strtolower($this_letter); ?>">&nbsp;</a>
          <h2><? echo $this_letter; ?></h2>
        </div>
        <ul><?
  }
  ?><li><a href="<? echo $a_url; ?>"><? echo $name; ?></a></li><?
  $curr_letter = $this_letter;
}
?></div>
<div id="collection-thumbs-container"></div><?php
$artists_by_name = array();

foreach ($artists as $a) {
  $artists_by_name["{$a['name1']}"] = $a['id'];
}
ksort($artists_by_name);

$media_urls = array();
$media_captions = array();

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
require_once("gallery.php");
?>
