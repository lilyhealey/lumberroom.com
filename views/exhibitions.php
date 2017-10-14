<?
$years = $oo->children($uu->id);
$base_url = "/{$uu->url}/";
$ex_urls = array();
$years = array_reverse($years);

foreach($years as $y)
{
  ?><div class="ex-year"><? echo $y['name1']; ?></div><?
  $exhibitions = $oo->children($y['id']);
  $exhibitions = array_reverse($exhibitions);
  ?><ul><?
  foreach ($exhibitions as $e)
  {
    if($e['begin'])
    {
      $begin = strtotime($e['begin']);
      $begin_day = date("n/j/y", $begin);
    }
    else
      $begin_day = ". . .";
    if($e['end'])
    {
      $end = strtotime($e['end']);
      $end_day = date("n/j/y", $end);
    }
    else
      $end_day = ". . .";

  $url = $base_url.$y['url']."/".$e['url'];
  ?><li class="exhibition"><a href="<? echo $url; ?>"><? echo strip_tags($e['name1'])."; ".$begin_day; ?> – <? echo "$end_day"; ?></a></li><?
  }
  ?></ul><?
}
?>
