import { Fancybox } from "@fancyapps/ui";

// wait until DOM is ready
document.addEventListener("DOMContentLoaded", () => {
  // wait until images, links, fonts, stylesheets, and js is loaded
  window.addEventListener(
    "load",
    () => {
      // Only on single (room) pages
      if (document.body.classList.contains("page-template-page-experience-biking")) {
        Fancybox.bind('[data-fancybox="biker-gallery"]', {
          // optional config
          //groupAll: true,        // in case there are multiple containers
          //hideScrollbar: false,
          // You can add more options here if needed
        });
      }
    },
    false
  );
});
