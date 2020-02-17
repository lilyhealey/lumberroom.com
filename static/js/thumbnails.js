const baseUrl = `http://${window.location.hostname}/index.php`;
const baseAjaxParams = {
  ajax: true
};

let start = 0;
let num = 50;

function listener(e) {

  if ((window.innerHeight + window.scrollY) >= document.body.offsetHeight) {
    start = start + num;
    getThumbnails(start, num);
  }
}

function getCollectionThumbnails() {
  // select the 'Thumbnails' menu item.
  document
    .getElementById('collection-thumbnails')
    .classList
    .add('select');

  // deselect the 'Index' menu item.
  document
    .getElementById('collection-index')
    .classList
    .remove('select');

  // hide the collection list
  document
    .getElementById('collection-list-container')
    .classList
    .add('hidden');

  // show the collection thumbnails
  document
    .getElementById('collection-thumbs-container')
    .classList
    .remove('hidden');

  getThumbnails(start, num);

  document.addEventListener('scroll', listener, false);
}

function showCollectionIndex() {

  document.removeEventListener('scroll', listener, false);

  // deselect the 'Thumbnails' menu item.
  document
    .getElementById('collection-thumbnails')
    .classList
    .remove('select');

  // select the 'Index' menu item.
  document
    .getElementById('collection-index')
    .classList
    .add('select');

  // show the collection list
  document
    .getElementById('collection-list-container')
    .classList
    .remove('hidden');

  // hide the collection thumbnails
  document
    .getElementById('collection-thumbs-container')
    .classList
    .add('hidden');
}

function getThumbnails(start, num) {
  let xmlhttp = new XMLHttpRequest();
  xmlhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      const container = document.getElementById('collection-thumbs-container');
      const tmpDiv = document.createElement('div');
      tmpDiv.innerHTML = this.responseText;
      while (tmpDiv.childNodes.length > 0) {
        container.appendChild(tmpDiv.childNodes[0]);
      }
    }
  };
  const queryParams = new URLSearchParams({
    ...baseAjaxParams,
    start,
    num
  });
  xmlhttp.open('GET', `${baseUrl}?${queryParams.toString()}`, true);
  xmlhttp.send();
}
