import { Fancybox } from "@fancyapps/ui";

// wait until DOM is ready
document.addEventListener("DOMContentLoaded", () => {
  // wait until images, links, fonts, stylesheets, and js is loaded
  window.addEventListener(
    "load",
    () => {

      // Only on single (room) pages
      if (document.body.classList.contains("single")) {
        Fancybox.bind('[data-fancybox="room-gallery"]', {
          // optional config
          groupAll: true,        // in case there are multiple containers
          hideScrollbar: false,
          Toolbar: {
            display: {
              left: [],
              middle: [],
              right: ["close"],
            },
          },
          //groupAll: true,        // in case there are multiple containers
          //hideScrollbar: false,
          // You can add more options here if needed
        });
      }
      
      // Only on experience biking page
      if (document.body.classList.contains("page-template-page-experience-biking")) {
        Fancybox.bind('[data-fancybox="biker-gallery"]', {});
        const zoomBtn = document.querySelector(".trails-zoom-trigger");

        if (zoomBtn) {
          zoomBtn.addEventListener("click", function (event) {
            event.preventDefault();

            const activeSlide = document.querySelector(
              ".trailsSwiper .swiper-slide-active"
            );

            const activeLink = activeSlide
              ? activeSlide.querySelector('[data-fancybox="biker-gallery"]')
              : null;

            if (activeLink) {
              activeLink.click();
            } else {
              console.warn(
                "Nenhum [data-fancybox=\"biker-gallery\"] dentro do slide ativo"
              );
            }
          });
        }
      }
    },
    false
  );
});
