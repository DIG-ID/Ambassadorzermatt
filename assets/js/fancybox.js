import { Fancybox } from "@fancyapps/ui";

// wait until DOM is ready
document.addEventListener("DOMContentLoaded", () => {
  // wait until images, links, fonts, stylesheets, and js is loaded
  window.addEventListener(
    "load",
    () => {
      // Only on single (room) pages
      if (document.body.classList.contains("page-template-page-experience-biking")) {
        console.log("JS biking: condição body OK");
        Fancybox.bind('[data-fancybox="biker-gallery"]', {
          // optional config
          //groupAll: true,        // in case there are multiple containers
          //hideScrollbar: false,
          // You can add more options here if needed
        });
        const zoomBtn = document.querySelector(".trails-zoom-trigger");
        console.log("zoomBtn:", zoomBtn);

        if (zoomBtn) {
          zoomBtn.addEventListener("click", function (event) {
            event.preventDefault();
            console.log("Zoom button CLICK");

            const activeSlide = document.querySelector(
              ".trailsSwiper .swiper-slide-active"
            );
            console.log("Active slide:", activeSlide);

            const activeLink = activeSlide
              ? activeSlide.querySelector('[data-fancybox="biker-gallery"]')
              : null;

            console.log("Active link:", activeLink);

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
