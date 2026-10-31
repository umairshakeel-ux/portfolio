/* ==========================================================================
   Umair Shakeel — Portfolio
   1) Fill in your real links once here — every matching button updates.
   2) Interactions (scroll reveals, hover effects, sliders) will be added next.
   ========================================================================== */
(function () {
  "use strict";

  // Put your real URLs here. Anything left empty stays as "#".
  var LINKS = {
    "upwork": "",        // e.g. "https://www.upwork.com/freelancers/~xxxxxxxx"
    "book-a-call": ""    // e.g. "https://calendly.com/your-name"
  };

  document.querySelectorAll("[data-link]").forEach(function (a) {
    var url = LINKS[a.getAttribute("data-link")];
    if (url) a.setAttribute("href", url);
  });
})();
