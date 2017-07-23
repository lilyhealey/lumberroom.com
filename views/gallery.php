<div id="gallery" class="center hidden">
  <div id="gallery-ex" onclick="close_gallery();"><img src="/media/svg/ex.svg"></div>
		<div id="gallery-prev" onclick="prev();"><img src="/media/svg/la.svg"></div>
		<div id="gallery-next" onclick="next();"><img src="/media/svg/ra.svg"></div>
  <img id="img-gallery" class="center" src="/media/00001.jpeg">
</div>
<script type="text/javascript">
  var images = <? echo json_encode($media_urls); ?>;
  var gallery_id = "gallery";
  var gallery_img = "img-gallery";
  var index = 0;
  var inGallery = false;
  var attached = false;
  var gallery = document.getElementById(gallery_id);
</script>
