// Mobile menu toggle + before/after slider (ported unchanged from the original page)
document.addEventListener('DOMContentLoaded', function() {
  var menuToggle = document.getElementById('menuToggle');
  var mobileMenu = document.getElementById('mobileMenu');
  var menuIcon = document.getElementById('menuIcon');
  
  if (menuToggle && mobileMenu) {
    menuToggle.addEventListener('click', function() {
      if (mobileMenu.style.display === 'none') {
        mobileMenu.style.display = 'block';
        menuIcon.className = 'bi bi-x fs-5';
      } else {
        mobileMenu.style.display = 'none';
        menuIcon.className = 'bi bi-list fs-5';
      }
    });
  }
  
  document.querySelectorAll('.mobile-link').forEach(function(link) {
    link.addEventListener('click', function() {
      if (mobileMenu) {
        mobileMenu.style.display = 'none';
        if (menuIcon) menuIcon.className = 'bi bi-list fs-5';
      }
    });
  });

  var slider = document.getElementById('beforeAfterSlider');
  var beforeImage = document.getElementById('beforeImage');
  var beforeImageInner = document.getElementById('beforeImageInner');
  var sliderHandle = document.getElementById('sliderHandle');
  if (slider && beforeImage) {
    slider.addEventListener('input', function() {
      var val = Math.max(1, Number(this.value));
      beforeImage.style.width = val + '%';
      if (beforeImageInner) {
        beforeImageInner.style.width = (100 / val) * 100 + '%';
      }
      if (sliderHandle) {
        sliderHandle.style.left = val + '%';
      }
    });
  }
});
