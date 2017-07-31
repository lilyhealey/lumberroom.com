<?
$events = $oo->children($uu->id);
$base_url = "/{$uu->url}/";
$events = array_reverse($events);
foreach($events as $e)
{
  $e_url = $base_url.$e['url'];
  $begin = strtotime($e['begin']);
  $end = strtotime($e['end']);

  $begin_day = date("l, F j, Y", $begin);
  $begin_time = date("gA", $begin);

  $end_day = date("l, F j, Y", $end);
  $end_time = date("gA", $end);

  ?><div class="event"><?
    ?><p><? echo $begin_day; ?><br><?
    ?><? echo $e['deck']; ?></p><?
    /* ?><a href="<? echo $e_url; ?>"><? echo $e['name1']; ?></a><? */
    ?><p><? echo $e['body'] ?></p><?
  ?></div><?
  ?><hr><?
}
?>
