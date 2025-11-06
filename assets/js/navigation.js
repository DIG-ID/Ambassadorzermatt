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
