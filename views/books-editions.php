<?
?><p>Books &amp; Editions</p>
<p>To order please e-mail order (at) lumberroom.com</p><?
$books = $oo->children($uu->id);
$base_url = "/{$uu->url}/";

foreach($books as $b)
{
  $b_name = $b['name1']
  ?><div class="book"><?
    ?><p><? echo $b_name; ?><br><?
    ?><? echo $b['deck']; ?></p><?
    ?><p><? echo $b['body'] ?></p><?
  ?></div><?
  ?><hr><?
}
?>
