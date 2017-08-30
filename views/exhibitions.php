<?
$years = $oo->children($uu->id);
$base_url = "/{$uu->url}/";
$ex_urls = array();
$years = array_reverse($years);


foreach($years as $y)
{
  ?><div class="ex-year"><? echo $y['name1']; ?></div><?
  $exhibitions = $oo->children($y['id']);
  ?><ul><?
  foreach ($exhibitions as $e)
  {
  $begin = strtotime($e['begin']);
  $end = strtotime($e['end']);

  $begin_day = date("n/j/y", $begin);
  $end_day = date("n/j/y", $end);

  $url = $base_url.$y['url']."/".$e['url'];
  ?><li class="exhibition"><a href="<? echo $url; ?>"><? echo $e['name1']."; ".$begin_day; ?> – <? echo "$end_day"; ?></a></li><?
  }
  ?></ul><?
}

?>
