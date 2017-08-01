<?
$exhibitions = $oo->children($uu->id);
$base_url = "/{$uu->url}/";
$ex_urls = array();
$exhibitions = array_reverse($exhibitions);

?><ul><?
foreach($exhibitions as $e)
{
  $begin = strtotime($e['begin']);
  $end = strtotime($e['end']);

  $begin_day = date("F j, Y", $begin);
  $end_day = date("F j, Y", $end);

  $url = $base_url.$e['url'];
  ?><li><a href="<? echo $url; ?>"><? echo $e['name1']; ?></a><br><? echo $e['deck']; ?>
  <p><? echo $begin_day; ?> – <? echo $end_day; ?></p></li><hr><?
}
?></ul<?
?>
