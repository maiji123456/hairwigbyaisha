// Mobile menu toggle + before/after slider + Look Switcher
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

  // Before / After Slider Logic
  var slider = document.getElementById('beforeAfterSlider');
  var container = document.getElementById('beforeAfterContainer');
  var beforeImage = document.getElementById('beforeImage');
  var afterImage = document.getElementById('afterImage');
  var sliderHandle = document.getElementById('sliderHandle');

  function updateSlider(val) {
    val = Math.min(100, Math.max(0, Number(val)));
    if (container) {
      container.style.setProperty('--slider-pos', val + '%');
    }
    if (beforeImage) {
      var clipVal = 'inset(0 ' + (100 - val) + '% 0 0)';
      beforeImage.style.clipPath = clipVal;
      beforeImage.style.webkitClipPath = clipVal;
    }
    if (sliderHandle) {
      sliderHandle.style.left = val + '%';
    }
  }

  if (slider) {
    slider.addEventListener('input', function() {
      updateSlider(this.value);
    });
    // Set initial position
    updateSlider(slider.value || 50);
  }

  // Look switcher tabs
  var lookButtons = document.querySelectorAll('.transformation-tab-btn');
  var transformationTitle = document.getElementById('transformationTitle');
  var transformationSpecs = document.getElementById('transformationSpecs');

  if (lookButtons.length && beforeImage && afterImage) {
    lookButtons.forEach(function(btn) {
      btn.addEventListener('click', function() {
        lookButtons.forEach(function(b) {
          b.classList.remove('active');
          b.style.borderColor = 'rgba(255,255,255,0.15)';
          b.style.background = 'rgba(255,255,255,0.03)';
          b.style.color = '#B8B8B8';
          var dot = b.querySelector('span');
          if (dot) {
            dot.style.background = 'rgba(255,255,255,0.4)';
            dot.style.boxShadow = 'none';
          }
        });

        btn.classList.add('active');
        btn.style.setProperty('border-color', '#E8C96A', 'important');
        btn.style.background = 'linear-gradient(135deg, rgba(232,201,106,0.18), rgba(232,184,199,0.18))';
        btn.style.color = '#F5F2F0';
        var activeDot = btn.querySelector('span');
        if (activeDot) {
          activeDot.style.background = '#E8C96A';
          activeDot.style.boxShadow = '0 0 10px #E8C96A';
        }

        var beforeSrc = btn.getAttribute('data-before');
        var afterSrc = btn.getAttribute('data-after');
        var title = btn.getAttribute('data-title');
        var specs = btn.getAttribute('data-specs');

        beforeImage.src = beforeSrc;
        afterImage.src = afterSrc;
        if (transformationTitle && title) transformationTitle.textContent = title;
        if (transformationSpecs && specs) transformationSpecs.textContent = specs;
      });
    });
  }
});
