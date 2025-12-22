(function() {
  const trigger = document.getElementById('sticky-trigger');
  const sticky  = document.getElementById('header-sticky');
  const root    = document.documentElement; // <html>

  if (!trigger || !sticky) return;

  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  if (prefersReduced) {
    sticky.classList.remove('transition-transform', 'ease-in-out');
  }

  const setActive = (active) => {
    sticky.dataset.active = active ? 'true' : 'false';
    if (active) {
      sticky.removeAttribute('inert');
      sticky.setAttribute('aria-hidden', 'false');
      root.classList.add('sticky-active');     // << fade main header out
    } else {
      sticky.setAttribute('inert', '');
      sticky.setAttribute('aria-hidden', 'true');
      root.classList.remove('sticky-active');  // << fade main header back in
    }
  };

  const io = new IntersectionObserver(
    ([entry]) => setActive(!entry.isIntersecting),
    { threshold: 0 }
  );

  io.observe(trigger);
})();



// resources/js/menu-offcanvas.js
import gsap from "gsap";
gsap.defaults({ overwrite: "auto" });

export function ambassadorzermattInitOffcanvasMenuGsap() {
  const btns = gsap.utils.toArray(document.querySelectorAll(".menu-toggle__button"));
  const wrap = document.querySelector("#menu-offcanvas");
  if (!btns.length || !wrap) return;

  let cols = gsap.utils.toArray(wrap.querySelectorAll("[data-menu-col]"));
  if (!cols.length) cols = gsap.utils.toArray(wrap.querySelectorAll('[class*="col-span-"]'));

  const targets = [document.body, document.documentElement];
  const prefersReduced = window.matchMedia("(prefers-reduced-motion: reduce)").matches;

  const polygonStart = "polygon(0 0, 100% 0, 100% 0, 0 0)";        // top edge only
  const polygonEnd   = "polygon(0 0, 100% 0, 100% 100%, 0 100%)";  // full rect

  // initial state
  gsap.set(wrap, {
    x: 0, y: 0, xPercent: 0, yPercent: -100,
    clipPath: polygonStart, webkitClipPath: polygonStart,
    willChange: "transform, clip-path", force3D: true
  });
  gsap.set(cols, { autoAlpha: 0, y: -20 });
  cols.forEach((col) => {
    const items = col.querySelectorAll("li");
    if (!items.length) return; // no <li> in this column – skip
    gsap.set(items, { autoAlpha: 0, y: -10 });
  });

  const setA11y = (open) => {
    btns.forEach(b => {
      b.setAttribute("aria-expanded", open ? "true" : "false");
      // ensure all buttons claim control over the same element
      b.setAttribute("aria-controls", "menu-offcanvas");
    });
    wrap.setAttribute("aria-hidden", open ? "false" : "true");
    if (open) {
      wrap.removeAttribute("inert");
      targets.forEach((el) => el.classList.add("menu-open"));
    } else {
      wrap.setAttribute("inert", "");
      targets.forEach((el) => el.classList.remove("menu-open"));
    }
  };

  const tl = gsap.timeline({
    paused: true,
    defaults: { ease: "power2.out" },
    onReverseComplete() {
      document.documentElement.classList.remove("lenis-stopped");
      gsap.set(wrap, { yPercent: -100, clipPath: polygonStart, webkitClipPath: polygonStart });
      setA11y(false);
      btns.forEach(b => b.classList.remove("menu-open"));
    }
  });

  tl.addLabel("ambassadorzermattWrapStart", 0)
    .to(wrap, { yPercent: 0, duration: 0.32, ease: "power4.inOut" }, "ambassadorzermattWrapStart")
    .to(wrap, {
      clipPath: polygonEnd,
      webkitClipPath: polygonEnd,
      duration: 0.32,
      ease: "power2.out"
    }, "ambassadorzermattWrapStart") // start together for a clean “roll down”
    .fromTo(cols, { autoAlpha: 0, y: -20 }, { autoAlpha: 1, y: 0, duration: 0.4, stagger: 0.06, ease: "power2.out", immediateRender: false }, "ambassadorzermattWrapStart+=0.40");

  const ambassadorzermattAllItems = cols.flatMap(col => Array.from(col.querySelectorAll("li")));
  if (ambassadorzermattAllItems.length) {
    tl.fromTo(ambassadorzermattAllItems, { autoAlpha: 0, y: -8 }, { autoAlpha: 1, y: 0, duration: 0.3, stagger: { each: 0.06, from: 0 }, ease: "power2.out", immediateRender: false }, "ambassadorzermattWrapStart+=0.30");
  }

  const openMenu = () => {
    btns.forEach(b => b.classList.add("menu-open"));
    setA11y(true);
    if (prefersReduced) {
      gsap.set(wrap, { yPercent: 0, clipPath: polygonEnd, webkitClipPath: polygonEnd });
      return;
    }
    tl.timeScale(1).play(0);
  };

  const closeMenu = () => {
    if (![...btns].some(b => b.classList.contains("menu-open"))) return;
    btns.forEach(b => b.classList.remove("menu-open"));
    if (prefersReduced) {
      gsap.set(wrap, { yPercent: -100, clipPath: polygonStart, webkitClipPath: polygonStart });
      setA11y(false);
      return;
    }
    tl.timeScale(1.1).reverse();
  };

  // Wire both buttons
  btns.forEach(btn => {
    btn.addEventListener("click", () => {
      const isOpen = btn.classList.contains("menu-open");
      isOpen ? closeMenu() : openMenu();
    });
  });

  // ESC to close
  document.addEventListener("keydown", (e) => { if (e.key === "Escape") closeMenu(); });

  // Outside click (include .menu-toggle wrapper to avoid accidental closes)
  document.addEventListener("click", (e) => {
    const insideToggle = e.target.closest(".menu-toggle, .menu-toggle__button");
    const insideMenu   = e.target.closest("#menu-offcanvas");
    if (!insideToggle && !insideMenu) closeMenu();
  });

  // Close when clicking any menu link
  wrap.addEventListener("click", (e) => {
    const link = e.target.closest("a");
    if (!link) return;

    // if this is a top-level mega link, do NOT close the menu
    if (link.closest('.menu-item-has-children')) return;

    closeMenu();
  });
}

document.addEventListener("DOMContentLoaded", ambassadorzermattInitOffcanvasMenuGsap);



/*MEGA MENU TRIGGERS*/
function ambassadorBindMegaPanels() {
  const root = document.querySelector('#menu-offcanvas');
  if (!root) return;

  const mainLinks = Array.from(root.querySelectorAll('.main-menu-col .mega-toplink'));
  const panels    = Array.from(root.querySelectorAll('.sub-menu-col .submenu-panel'));
  const empty     = root.querySelector('.sub-menu-col [data-empty]');
  const photos    = Array.from(root.querySelectorAll('.mega-menu-photo')); // NEW
  const prefersReduced = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  // Map menu-item-id -> <img>
  const photosByMenuId = new Map();
  photos.forEach(img => {
    const mid = img.dataset.menuItemId;
    if (mid) photosByMenuId.set(String(mid), img);
  });

  // --- layout: lock a comfortable height (tallest panel) to prevent jumps ---
  const col = root.querySelector('.sub-menu-col');
  if (col) {
    let maxH = 0;
    panels.concat(empty || []).forEach(p => {
      const prevDisplay = p.style.display;
      const prevPos     = p.style.position;
      const prevInset   = p.style.inset;

      p.style.display  = 'block';
      p.style.position = 'absolute';
      p.style.inset    = '0';
      maxH = Math.max(maxH, p.scrollHeight);

      p.style.display  = prevDisplay;
      p.style.position = prevPos;
      p.style.inset    = prevInset;
    });
    if (maxH) col.style.minHeight = maxH + 'px';
  }

  // --- initial states for submenu panels ---
  panels.forEach(p => {
    gsap.set(p, { autoAlpha: 0 });
    p.setAttribute('aria-hidden', 'true');
    p.classList.remove('is-visible');
  });
  if (empty) {
    gsap.set(empty, { autoAlpha: 0 });
    empty.setAttribute('aria-hidden', 'true');
    empty.classList.remove('is-visible');
  }

  // --- initial states + helpers for photos (right column) ---
  let activePhoto = null;

  const fadeInPhoto = (img) => {
    if (!img) return;
    gsap.killTweensOf(img);
    img.classList.add('is-visible');
    img.setAttribute('aria-hidden', 'false');

    if (prefersReduced) {
      gsap.set(img, { autoAlpha: 1 });
    } else {
      gsap.fromTo(
        img,
        { autoAlpha: 0 },
        { autoAlpha: 1, duration: 0.45, ease: 'power2.out' } // smoother & slower
      );
    }
  };

  const fadeOutPhoto = (img) => {
    if (!img) return;
    gsap.killTweensOf(img);

    if (prefersReduced) {
      gsap.set(img, { autoAlpha: 0 });
      img.classList.remove('is-visible');
    } else {
      gsap.to(img, {
        autoAlpha: 0,
        duration: 0.35,
        ease: 'power2.out',
        onComplete: () => img.classList.remove('is-visible'),
      });
    }
    img.setAttribute('aria-hidden', 'true');
  };

  if (photos.length) {
    photos.forEach((img, idx) => {
      if (idx === 0) {
        gsap.set(img, { autoAlpha: 1 });
        img.classList.add('is-visible');
        img.setAttribute('aria-hidden', 'false');
        activePhoto = img;
      } else {
        gsap.set(img, { autoAlpha: 0 });
        img.classList.remove('is-visible');
        img.setAttribute('aria-hidden', 'true');
      }
    });
  }


  const DUR_IN  = 0.25;
  const DUR_OUT = 0.20;
  const EASE    = 'power2.out';
  const HOVER_DELAY_MS = 100;

  let activeLink  = null;
  let activePanel = null;
  let hoverTimer  = null;

  const showEl = (el) => {
    gsap.killTweensOf(el);
    el.classList.add('is-visible');
    if (prefersReduced) {
      gsap.set(el, { autoAlpha: 1 });
    } else {
      gsap.to(el, { autoAlpha: 1, duration: DUR_IN, ease: EASE });
    }
    el.setAttribute('aria-hidden', 'false');
  };

  const hideEl = (el) => {
    gsap.killTweensOf(el);
    if (prefersReduced) {
      gsap.set(el, { autoAlpha: 0 });
      el.classList.remove('is-visible');
    } else {
      gsap.to(el, {
        autoAlpha: 0,
        duration: DUR_OUT,
        ease: EASE,
        onComplete: () => el.classList.remove('is-visible'),
      });
    }
    el.setAttribute('aria-hidden', 'true');
  };

  // --- photo helpers (NEW) ---
  const showPhotoForMenuId = (menuId) => {
    if (!menuId || !photosByMenuId.size) return;
    const next = photosByMenuId.get(String(menuId));
    if (!next || next === activePhoto) return;

    if (activePhoto) fadeOutPhoto(activePhoto);
    fadeInPhoto(next);
    activePhoto = next;
  };



  const clearUnderline = () => {
    mainLinks.forEach(a => {
      a.classList.remove('is-active');
      a.setAttribute('aria-expanded', 'false');
    });
  };

  const deactivate = () => {
    clearUnderline();
    if (activePanel) hideEl(activePanel);
    if (empty) hideEl(empty);
    activeLink  = null;
    activePanel = null;
    // You can optionally reset the photo here:
    // if (photos.length) showPhotoByIndex(0);
  };

  const activate = (link) => {
    if (link === activeLink) return;
    if (hoverTimer) { clearTimeout(hoverTimer); hoverTimer = null; }

    clearUnderline();
    link.classList.add('is-active');

    const pid       = link.getAttribute('data-parent-id');
    const nextPanel = pid ? panels.find(p => p.dataset.parentId === String(pid)) : null;

    // --- swap right-side photo based on link index ---  NEW
    const menuId = link.dataset.menuItemId;
    if (menuId) {
      showPhotoForMenuId(menuId);
    }


    // show new panel first, then fade out old (prevents “gap”)
    if (nextPanel) {
      showEl(nextPanel);
      if (empty) hideEl(empty);
    } else if (empty) {
      showEl(empty);
    }
    if (activePanel && activePanel !== nextPanel) hideEl(activePanel);

    link.setAttribute('aria-expanded', nextPanel ? 'true' : 'false');
    activeLink  = link;
    activePanel = nextPanel || null;
  };

  mainLinks.forEach(link => {
    link.addEventListener('mouseenter', () => {
      if (hoverTimer) clearTimeout(hoverTimer);
      hoverTimer = setTimeout(() => activate(link), HOVER_DELAY_MS);
    });
    link.addEventListener('focus', () => activate(link));
  });
  
  // Submenu item hover → change photo too
  const subLinks = Array.from(
    root.querySelectorAll('.sub-menu-col .submenu-panel a[data-menu-item-id]')
  );

  subLinks.forEach(link => {
    const handle = () => {
      const menuId = link.dataset.menuItemId;
      if (menuId) showPhotoForMenuId(menuId);
    };
    link.addEventListener('mouseenter', handle);
    link.addEventListener('focus', handle);
  });

  root.addEventListener('mouseleave', () => {
    if (hoverTimer) { clearTimeout(hoverTimer); hoverTimer = null; }
    deactivate();
  });
}
document.addEventListener('DOMContentLoaded', ambassadorBindMegaPanels);



(function () {
  const offcanvas = document.getElementById('menu-offcanvas');
  if (!offcanvas) return;

  const submenuMobile = offcanvas.querySelector('[data-submenu-mobile]');
  const submenuBody   = offcanvas.querySelector('[data-submenu-mobile-body]');
  const backBtn       = offcanvas.querySelector('.submenu-mobile__back');

  if (!submenuMobile || !submenuBody || !backBtn) return;

  const mqDesktop = window.matchMedia('(min-width: 1280px)');

  const topLinks = offcanvas.querySelectorAll(
    '.menu-offcanvas__main-mega-menu .menu-item-has-children > a'
  );

  const panels = submenuBody.querySelectorAll('.submenu-panel');
  const emptyState = submenuBody.querySelector('[data-empty]');

  function showMobileSubmenu(parentId, labelText) {
    // ensure it's in the DOM flow (display:block) BEFORE animating
    submenuMobile.hidden = false;
    submenuMobile.setAttribute('aria-hidden', 'false');

    // Hide all panels / show matching
    let anyVisible = false;
    panels.forEach(panel => {
      const match = panel.dataset.parentId === String(parentId);
      panel.classList.toggle('is-visible', match);
      panel.hidden = !match;
      if (match) anyVisible = true;
    });

    if (emptyState) {
      emptyState.classList.toggle('is-visible', !anyVisible);
      emptyState.hidden = anyVisible;
    }

    // next frame -> add class so transform animates in
    requestAnimationFrame(() => {
      offcanvas.classList.add('menu-offcanvas--submenu-open');
    });
  }

  function closeMobileSubmenu() {
    // start the slide-out
    offcanvas.classList.remove('menu-offcanvas--submenu-open');
    submenuMobile.setAttribute('aria-hidden', 'true');

    const onDone = (e) => {
      if (e.target !== submenuMobile) return;
      if (e.propertyName !== 'transform') return;

      submenuMobile.hidden = true; // now it's truly "gone"
      submenuMobile.removeEventListener('transitionend', onDone);
    };

    submenuMobile.addEventListener('transitionend', onDone);
  }


  // Open submenu when tapping a top level item with children (mobile only)
  topLinks.forEach(link => {
    link.addEventListener('click', evt => {
      if (mqDesktop.matches) {
        // Desktop behaviour stays as you already have (hover panels)
        return;
      }

      evt.preventDefault();

      const parentId = link.dataset.parentId;
      if (!parentId) return;

      const labelText = link.textContent.trim();
      showMobileSubmenu(parentId, labelText);
    });
  });

  // Back button closes the screen
  backBtn.addEventListener('click', evt => {
    evt.preventDefault();
    closeMobileSubmenu();
  });

  // Optional: close submenu when resizing to desktop
  mqDesktop.addEventListener('change', e => {
    if (e.matches) {
      closeMobileSubmenu();
    }
  });
  
})();
