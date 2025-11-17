$(document).ready(function(){


  document.querySelectorAll('.border-box').forEach((section) => {
  const svg = section.querySelector('svg');
  const boxes = svg.querySelectorAll('.box');
  const snake = svg.querySelector('.snake');

  // 🎯 Each section controls its own animation state
  let isAnimating = true;
  let offset = 0;

  // Convert rect to rounded path string
  function rectToRoundedPath(rect) {
    const x = parseFloat(rect.getAttribute('x'));
    const y = parseFloat(rect.getAttribute('y'));
    const w = parseFloat(rect.getAttribute('width'));
    const h = parseFloat(rect.getAttribute('height'));
    const r = parseFloat(rect.getAttribute('rx')) || 0;

    return `M${x + r},${y}
            H${x + w - r}
            A${r},${r} 0 0 1 ${x + w},${y + r}
            V${y + h - r}
            A${r},${r} 0 0 1 ${x + w - r},${y + h}
            H${x + r}
            A${r},${r} 0 0 1 ${x},${y + h - r}
            V${y + r}
            A${r},${r} 0 0 1 ${x + r},${y} Z`;
  }

  // Partial traversal along a box edge
  function partialPath(fullPath, percent = 0.5) {
    const path = document.createElementNS("http://www.w3.org/2000/svg", "path");
    path.setAttribute("d", fullPath);
    const total = path.getTotalLength();
    const length = total * percent;
    const point = path.getPointAtLength(length);
    return fullPath + ` M${point.x},${point.y}`;
  }

  // Move snake continuously between boxes
  function moveSnake() {
    if (!isAnimating) return;

    const nextBox = boxes[Math.floor(Math.random() * boxes.length)];
    const fullPath = rectToRoundedPath(nextBox);
    const randomPart = Math.random() * 0.7 + 0.3;
    const nextPartialPath = partialPath(fullPath, randomPart);
    const currentD = snake.getAttribute('d') || nextPartialPath;
    const randomDuration = Math.random() * 900 + 80;

    const anim = snake.animate(
      [
        { d: currentD },
        { d: nextPartialPath }
      ],
      {
        duration: randomDuration,
        easing: 'ease-in-out',
        fill: 'forwards'
      }
    );

    anim.onfinish = () => {
      snake.setAttribute('d', nextPartialPath);
      setTimeout(moveSnake, Math.random() * 100 + 50);
    };
  }

  // Snake appearance
  snake.setAttribute('stroke', '#00FF66');
  snake.setAttribute('stroke-width', '3');
  snake.setAttribute('fill', 'none');
  snake.setAttribute('stroke-linecap', 'round');

  // Dynamic dash pattern
  function updateDashPattern() {
    if (!isAnimating) return;
    const visible = Math.random() * 1000 + 800;
    const gap = 2000;
    snake.setAttribute('stroke-dasharray', `${visible} ${gap}`);
    setTimeout(updateDashPattern, Math.random() * 800 + 300);
  }

  // Continuous dash animation
  function animateDash() {
    if (isAnimating) {
      offset -= 30;
      snake.setAttribute('stroke-dashoffset', offset);
    }
    requestAnimationFrame(animateDash);
  }

  // Start animation
  moveSnake();
  animateDash();
  updateDashPattern();
});
  

});




// initialize after DOM ready
    document.addEventListener('DOMContentLoaded', function () {
      AOS.init({
        offset: 120,        // offset (px) from the original trigger point
        delay: 0,           // values from 0 to 3000, with step 50ms
        duration: 800,      // global duration of animations
        easing: 'ease-in-out',
        once: false,        // <--- allow animation to happen more than once
        mirror: true,       // <--- animate elements when scrolling past them in the opposite direction
        anchorPlacement: 'top-bottom' // controls trigger point
      });
    });

    // keep AOS in sync if layout changes (images load, dynamic content)
    window.addEventListener('load', () => AOS.refresh());
    window.addEventListener('resize', () => AOS.refresh());



    $(document).ready(function(){
      // Image slider (fade)
      $('.slider-images').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-text',
        autoplay: true,
        autoplaySpeed: 4000,
        speed: 800
      });

      // Text slider (slide)
      $('.slider-text').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        asNavFor: '.slider-images',
        dots: true,
        arrows: false,
        fade: false,
        speed: 600,
        adaptiveHeight: true
      });


      $('.feedback-slider > ul').slick({
    slidesToShow: 4,
    slidesToScroll: 1,
    infinite: true,        // ✅ enables looping
    dots: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 3500,
    speed: 800,            // smooth transition
    adaptiveHeight: true,        // fade effect (optional)
    cssEase: 'linear',
    responsive: [
    {
      breakpoint: 1141,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 1,
        dots: true
      }
    },
    {
      breakpoint: 992,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        dots: true
      }
    },
    {
      breakpoint: 561,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
        dots: true
      }
    }
  ]
  });



const ham = document.querySelector('.hamburger');
const menu = document.querySelector('.mobile-menu');
const overlay = document.querySelector('.overlay');
const mobile = document.querySelector('.mobile'); // parent div

// TOGGLE SIDEBAR (OPEN / CLOSE)
ham.addEventListener('click', () => {

    // Toggle classes
    menu.classList.toggle('active');
    mobile.classList.toggle('active'); 

    // Show/Hide overlay
    overlay.style.display = menu.classList.contains('active') ? "block" : "none";
});

// CLOSE ON OVERLAY CLICK
overlay.addEventListener('click', () => {
    menu.classList.remove('active');
    mobile.classList.remove('active'); 
    overlay.style.display = "none";
});

// DO NOT close when clicking inside sidebar
menu.addEventListener('click', (e) => {
    e.stopPropagation();
});






   










    });