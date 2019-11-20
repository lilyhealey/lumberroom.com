<?
?><p>Books &amp; Editions</p>
<p>To order or for additional information, please contact: <a href="mailto:info@lumberroom.com">info@lumberroom.com</a></p><?
$books = $oo->children($uu->id);
$base_url = "/{$uu->url}/";


?><script type="text/javascript">
  // declare some initial javascript variables
  var multi_images = [];
  var multi_captions = [];
  var images;
  var captions;
  // var images = <? echo json_encode($media_urls); ?>;
  // var captions = <? echo json_encode($media_captions); ?>;
  var gallery_id = "gallery";
  var gallery_img = "gallery-div";
  var gallery_cap = "gallery-cap";
  var index = 0;
  var inGallery = false;
  var attached = false;
  var gallery = document.getElementById(gallery_id);
</script><?

$j = 0;
foreach ($books as $b)
{
  $b_name = $b['name1'];
  $b_media = $oo->media($b['id'])[0];
  $b_media_url = m_url($b_media);
  ?><div class="book">
    <div class="book-thumb" onclick='launchMulti(0, <? echo $j; ?>)'><img src="<? echo $b_media_url; ?>"></div><?
    ?><div class="book-desc"><p><? echo nl2br($b['deck']); ?></p><?
    ?><div class="courier"><? echo process_body($b['body']); ?></div></div><?
  ?></div><?
  ?><hr><?

  // collect media and captions
  $media = $oo->media($b['id']);
  $media_urls = array();
  $media_captions = array();
  $i = 0;
  foreach ($media as $m)
  {
    if (strcasecmp($media['type'], 'pdf') != 0)
    {
      $url = m_url($m);
      $media_urls[] = $url;
      $caption = $m['caption'];
      $media_captions[] = $caption;
    }
  }

  ?><div id="gallery" class="center hidden">
    <div id="gallery-ex" onclick="close_gallery();"><img src="/media/svg/ex.svg"></div>
      <div id="gallery-prev" onclick="prev();"><img src="/media/svg/la.svg"></div>
      <div id="gallery-next" onclick="next();"><img src="/media/svg/ra.svg"></div>
    <figure class="gallery">
        <div id="gallery-div"></div>
        <figcaption id="gallery-cap" class="gallery"></figcaption>
    </figure>
  </div>
  <script type="text/javascript">
    // do some per-gallery things
    images = <? echo json_encode($media_urls); ?>;
    captions = <? echo json_encode($media_captions); ?>;
    multi_images.push(images);
    multi_captions.push(captions);
  </script><?
  $j++;
}
?>
