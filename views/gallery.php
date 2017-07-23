<div id="gallery" class="center hidden">
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
