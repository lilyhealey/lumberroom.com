
// open the image gallery, starting at image i
function launch(i) {
	show(gallery_id);
	// setsrc(gallery_img, images[i]);
  setbg(gallery_img, images[i]);
  sethtml(gallery_cap, captions[i]);
	index = i; // store current image index

	if(!attached)
	{
		// document.addEventListener("click", gallery_listener);
	}
	// this is such a cheat
	// the setting of inGallery needs to happen *after* the
	// above eventListner is added to the document. URGH
	// setTimeout(function(){gallery_listener_set();}, 1000);
	inGallery = true;
}

function launchMulti(i, j) {
	show(gallery_id);
	setbg(gallery_img, multi_images[j][i]);
	sethtml(gallery_cap, multi_captions[j][i]);
	index = i;
	inGallery = true;
	images = multi_images[j];
	captions = multi_captions[j];
}

function gallery_listener_set() {
	inGallery = true;
}

function prev() {
	if(index == 0)
		index = images.length;
	index--;
  setbg(gallery_img, images[index]);
  sethtml(gallery_cap, captions[index]);
}

function next() {
	if(index == images.length-1)
		index = -1;
	index++;
  setbg(gallery_img, images[index]);
  sethtml(gallery_cap, captions[index]);
}

function close_gallery() {
	inGallery = false;
	hide(gallery_id);
	if(attached) {
		// document.removeEventListener("click", gallery_listener);
	}
	attached = false;
}

// use arrow keys for navigation within the gallery
document.onkeydown = function(e) {
	if(inGallery) {
		e = e || window.event;
		switch(e.which || e.keyCode) {
      // left arrow
      case 37:
				prev();
			break;
      // right arrow
			case 39:
				next();
			break;
      // esc
			case 27:
				close_gallery();
			break;
      // exit this handler for other keys
			default: return;
		}
		e.preventDefault();
	}
}

function setbg(id, url) {
	// get element
	el = document.getElementById(id);

	// build bg style
	bi = "url('".concat(url).concat("')");
	el.style.backgroundImage = bi;
}

function setsrc(id, url) {
	// get element
	el = document.getElementById(id);
	el.src = url;
}

function sethtml(id, h) {
  el = document.getElementById(id);
  el.innerHTML = h;
}

function hide(id) {
	el = document.getElementById(id);
	el.classList.remove("visible");
	el.classList.add("hidden");
}

function show(id) {
	el = document.getElementById(id);
	el.classList.remove("hidden");
	el.classList.add("visible");
}

function gallery_listener(e) {
	var level = 0;
	attached = true;
  	for(var element = e.target; element; element = element.parentNode) {
		if(element.id === 'img-gallery') {
			next();
			return;
		}
		level++;
	}
}
