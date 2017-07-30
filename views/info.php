<?
$body = $item['body'];
$body = preg_replace('/\s*----\s*/', "<hr>", $body);
$body = nl2br($body);
echo $body;

$media = $oo->media($uu->id);

foreach ($media as $m)
{
  $url = m_url($m);
  ?><figure><?
    ?><img src="<? echo $url; ?>"><?
  ?></figure><?
}
?>
