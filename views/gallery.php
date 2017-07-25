<div id="gallery" class="center hidden">
  <div id="gallery-ex" onclick="close_gallery();"><img src="/media/svg/ex.svg"></div>
		<div id="gallery-prev" onclick="prev();"><img src="/media/svg/la.svg"></div>
		<div id="gallery-next" onclick="next();"><img src="/media/svg/ra.svg"></div>
  <figure class="gallery">
      <div id="gallery-div"></div>
      <!-- img id="gallery-img" class="gallery" src="/media/00001.jpeg" -->
      <figcaption id="gallery-cap" class="gallery"></figcaption>
  </figure>
</div>
<script type="text/javascript">
  var images = <? echo json_encode($media_urls); ?>;
  var captions = <? echo json_encode($media_captions); ?>;
  var gallery_id = "gallery";
  // var gallery_img = "gallery-img";
  var gallery_img = "gallery-div";
  var gallery_cap = "gallery-cap";
  var index = 0;
  var inGallery = false;
  var attached = false;
  var gallery = document.getElementById(gallery_id);
</script>
