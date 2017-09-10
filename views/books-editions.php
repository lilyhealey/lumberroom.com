<?
?><p>Books &amp; Editions</p>
<p>To order please e-mail order (at) lumberroom.com</p><?
$books = $oo->children($uu->id);
$base_url = "/{$uu->url}/";

foreach($books as $b)
{
  $b_name = $b['name1'];
  $b_media = $oo->media($b['id'])[0];
  $b_media_url = m_url($b_media);
  ?><div class="book">
    <div class="book-thumb"><img src="<? echo $b_media_url; ?>"></div><?
    ?><div class="book-desc"><p><? echo nl2br($b['deck']); ?></p><?
    ?><div class="courier"><? echo process_body($b['body']); ?></div></div><?
  ?></div><?
  ?><hr><?
}
?>
