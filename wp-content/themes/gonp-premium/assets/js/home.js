(() => {
  const nav = document.querySelector('[data-nav]');
  const menuToggle = document.querySelector('[data-menu-toggle]');
  const menu = document.querySelector('#gonp-menu');

  const setNavState = () => {
    if (!nav) return;
    nav.classList.toggle('is-scrolled', window.scrollY > 24);
  };

  setNavState();
  window.addEventListener('scroll', setNavState, { passive: true });

  if (menuToggle && menu) {
    menuToggle.addEventListener('click', () => {
      const expanded = menuToggle.getAttribute('aria-expanded') === 'true';
      menuToggle.setAttribute('aria-expanded', String(!expanded));
      menu.classList.toggle('is-open', !expanded);
    });
  }

  const carousel = document.querySelector('[data-carousel]');
  const prev = document.querySelector('[data-carousel-prev]');
  const next = document.querySelector('[data-carousel-next]');

  const slide = (direction) => {
    if (!carousel) return;
    const amount = Math.max(280, carousel.clientWidth * 0.82);
    carousel.scrollBy({ left: amount * direction, behavior: 'smooth' });
  };

  prev?.addEventListener('click', () => slide(-1));
  next?.addEventListener('click', () => slide(1));

  const reveals = document.querySelectorAll('.gonp-reveal');
  const io = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('is-visible');
        io.unobserve(entry.target);
      }
    });
  }, { threshold: 0.12 });

  reveals.forEach((el) => io.observe(el));
})();
