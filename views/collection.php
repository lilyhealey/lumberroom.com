<?
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
?><div class="anchor">
    <a id="<? echo strtolower($curr_letter); ?>">&nbsp;</a>
    <h2><? echo $curr_letter; ?></h2>
  </div><ul><?
foreach($artist_urls as $name=>$a_url)
{
  $this_letter = $name[0];
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
?></ul<?
?>
