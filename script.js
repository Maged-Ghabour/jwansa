/* ======================================
   JWANSA DENTAL CLINIC — JAVASCRIPT
   ====================================== */

document.addEventListener('DOMContentLoaded', () => {

  /* ---------- SCROLL ANIMATIONS ---------- */
  const fadeEls = document.querySelectorAll(
    '.service-card, .why-card, .section-title, .section-label, .booking__form, .booking__map, .quiz__q, .quiz__image'
  );

  fadeEls.forEach((el, i) => {
    el.classList.add('fade-up');
    if (i % 4 === 1) el.classList.add('fade-up-delay-1');
    if (i % 4 === 2) el.classList.add('fade-up-delay-2');
    if (i % 4 === 3) el.classList.add('fade-up-delay-3');
  });

  const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
        observer.unobserve(entry.target);
      }
    });
  }, { threshold: 0.15 });

  fadeEls.forEach(el => observer.observe(el));

  /* ---------- QUIZ INTERACTION ---------- */
  const quizQuestions = document.querySelectorAll('.quiz__q');

  quizQuestions.forEach(q => {
    q.addEventListener('click', () => {
      quizQuestions.forEach(item => {
        item.classList.remove('quiz__q--active');
        item.querySelector('.quiz__dot').classList.remove('quiz__dot--active');
      });
      q.classList.add('quiz__q--active');
      q.querySelector('.quiz__dot').classList.add('quiz__dot--active');
    });
  });

  /* ---------- STICKY NAVBAR SHADOW ---------- */
  const navbar = document.querySelector('.navbar');
  window.addEventListener('scroll', () => {
    if (window.scrollY > 20) {
      navbar.style.boxShadow = '0 4px 24px rgba(0,0,0,0.12)';
    } else {
      navbar.style.boxShadow = '0 2px 16px rgba(0,0,0,0.07)';
    }
  });

  /* ---------- BOOKING FORM SUBMIT ---------- */
  const bookingForm = document.getElementById('bookingForm');
  if (bookingForm) {
    bookingForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const btn = bookingForm.querySelector('button[type="submit"]');
      btn.textContent = '✓ تم الحجز بنجاح!';
      btn.style.background = '#27ae60';
      btn.style.borderColor = '#27ae60';
      setTimeout(() => {
        btn.textContent = 'احجز الآن';
        btn.style.background = '';
        btn.style.borderColor = '';
        bookingForm.reset();
      }, 3000);
    });
  }

  /* ---------- ACTIVE NAV LINK ON SCROLL ---------- */
  const sections = document.querySelectorAll('section[id]');
  const navLinks = document.querySelectorAll('.navbar__links a');

  const sectionObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        navLinks.forEach(link => link.classList.remove('active'));
        const activeLink = document.querySelector(
          `.navbar__links a[href="#${entry.target.id}"]`
        );
        if (activeLink) activeLink.classList.add('active');
      }
    });
  }, { rootMargin: '-50% 0px -50% 0px' });

  sections.forEach(s => sectionObserver.observe(s));

});
