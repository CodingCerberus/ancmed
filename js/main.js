var coll = document.getElementsByClassName("collapsible");
var i;

for (i = 0; i < coll.length; i++) {
  coll[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var content = this.nextElementSibling;
    if (content.style.maxHeight){
      content.style.maxHeight = null;
      content.style.overflow = "hidden";
    } else {
      content.style.maxHeight = content.scrollHeight + "px";
      content.style.overflow = "visible";
    } 
  });
}

document.addEventListener( 'DOMContentLoaded', function () {
  var main = new Splide( '#main-slider', {
  type      : 'fade',
  rewind    : true,
  pagination: false,
  arrows    : false,
  } );

  var thumbnails = new Splide( '#thumbnail-slider', {
  fixedWidth  : 160,
  fixedHeight : 106,
  gap         : 20,
  rewind      : true,
  pagination  : false,
  cover       : true,
  isNavigation: true,
  breakpoints : {
    600: {
    fixedWidth : 60,
    fixedHeight: 44,
    },
  },
  } );

  main.sync( thumbnails );
  main.mount();
  thumbnails.mount();
} );


/* Slide out Menu */

/* Set the width of the side navigation to 250px */
function openNav() {
  if (document.querySelector("html").offsetWidth <= 930){
    document.getElementById("mySidenav").style.width = "100%";
  } else {
  document.getElementById("mySidenav").style.width = "32%";
  }
  document.getElementById("blurHeader").style.filter = "blur(5px)";
  document.getElementById("blurMainBody").style.filter = "blur(5px)";
  document.getElementById("blurFooter").style.filter = "blur(5px)";
}

/* Set the width of the side navigation to 0 */
function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
  document.getElementById("blurHeader").style.filter = "blur(0)";
  document.getElementById("blurMainBody").style.filter = "blur(0)";
  document.getElementById("blurFooter").style.filter = "blur(0)";
}

//Modal Section

var slideIndex = 1;
showSlide(slideIndex);

function openLightbox() {
  document.getElementById('Lightbox').style.display = 'block';
}

function closeLightbox() {
  document.getElementById('Lightbox').style.display = 'none';
}

function changeSlide(n) {
	showSlide(slideIndex += n);
}

function toSlide(n) {
	showSlide(slideIndex = n);
}

function showSlide(n) {

  const slides = document.getElementsByClassName('slide');
  let modalPreviews = document.getElementsByClassName('modal-preview');

  if (n > slides.length) {
    slideIndex = 1;	
  }
  
  if (n < 1) {
  	slideIndex = slides.length;
  }

  for (let i = 0; i < slides.length; i++) {
      slides[i].style.display = "none";
  }
  for (let i = 0; i < modalPreviews.length; i++) {
      modalPreviews[i].className = modalPreviews[i].className.replace(' active', '');
  }
  
  slides[slideIndex - 1].style.display = 'block';
  modalPreviews[slideIndex - 1].className += ' active';
}

// Button on press styling

function shadowButton() {
  document.getElementById("resetAllBtn").style.boxShadow = "inset 0 0 10px rgb(177, 122, 60)";
}

function lightButton() {
  document.getElementById("resetAllBtn").style.boxShadow = "none";
}

function searchAutoClose() {
  document.getElementsByClassName('active').classList.toggle('active');
}