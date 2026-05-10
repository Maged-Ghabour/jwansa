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
        const dot = item.querySelector('.quiz__dot');
        if (dot) dot.classList.remove('quiz__dot--active');
      });
      q.classList.add('quiz__q--active');
      const dot = q.querySelector('.quiz__dot');
      if (dot) dot.classList.add('quiz__dot--active');
    });
  });

  /* ---------- STICKY NAVBAR SHADOW ---------- */
  const navbar = document.querySelector('.navbar');
  if (navbar) {
    window.addEventListener('scroll', () => {
      if (window.scrollY > 20) {
        navbar.style.boxShadow = '0 4px 24px rgba(0,0,0,0.12)';
      } else {
        navbar.style.boxShadow = '0 2px 16px rgba(0,0,0,0.07)';
      }
    });
  }

  /* ---------- MOBILE MENU TOGGLE ---------- */
  const navToggle = document.getElementById('navToggle');

  if (navToggle && navbar) {
    navToggle.addEventListener('click', () => {
      const isOpen = navbar.classList.toggle('is-open');
      navToggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });

    // إغلاق القائمة عند النقر على أي رابط
    document.querySelectorAll('.navbar__links a').forEach(link => {
      link.addEventListener('click', () => {
        navbar.classList.remove('is-open');
        navToggle.setAttribute('aria-expanded', 'false');
      });
    });

    // إغلاق عند النقر خارج القائمة
    document.addEventListener('click', (e) => {
      if (!navbar.contains(e.target)) {
        navbar.classList.remove('is-open');
        navToggle.setAttribute('aria-expanded', 'false');
      }
    });
  }

  /* ---------- BOOKING FORM SUBMIT (AJAX) ---------- */
  const bookingForm = document.getElementById('bookingForm');
  if (bookingForm) {
    bookingForm.addEventListener('submit', (e) => {
      e.preventDefault();

      // البحث عن زر الإرسال (داخل النموذج أو خارجه)
      const btn = document.querySelector('button[type="submit"][form="bookingForm"]')
                  || bookingForm.querySelector('button[type="submit"]');
      if (!btn) return;

      const originalHTML = btn.innerHTML;
      btn.disabled = true;
      btn.innerHTML = 'جاري الإرسال...';

      // تجميع بيانات النموذج
      const formData = new FormData();
      formData.append('action',          'jwansa_booking');
      formData.append('nonce',           (typeof jwansaAjax !== 'undefined') ? jwansaAjax.nonce : '');
      formData.append('booking_name',    bookingForm.querySelector('[name="booking_name"]')?.value    || '');
      formData.append('booking_phone',   bookingForm.querySelector('[name="booking_phone"]')?.value   || '');
      formData.append('booking_service', bookingForm.querySelector('[name="booking_service"]')?.value || '');
      formData.append('booking_file',    bookingForm.querySelector('[name="booking_file"]')?.value    || '');
      formData.append('booking_message', bookingForm.querySelector('[name="booking_message"]')?.value || '');

      const ajaxUrl = (typeof jwansaAjax !== 'undefined') ? jwansaAjax.url : '/wp-admin/admin-ajax.php';

      fetch(ajaxUrl, { method: 'POST', body: formData })
        .then(res => res.json())
        .then(data => {
          if (data.success) {
            btn.textContent = '✓ ' + data.data.message;
            btn.style.background = '#27ae60';
            btn.style.borderColor = '#27ae60';
            bookingForm.reset();
            setTimeout(() => {
              btn.innerHTML = originalHTML;
              btn.style.background = '';
              btn.style.borderColor = '';
              btn.disabled = false;
            }, 4000);
          } else {
            btn.innerHTML = originalHTML;
            btn.disabled = false;
            alert(data.data?.message || 'حدث خطأ، يرجى المحاولة مرة أخرى.');
          }
        })
        .catch(() => {
          btn.innerHTML = originalHTML;
          btn.disabled = false;
          alert('حدث خطأ في الاتصال، يرجى المحاولة مرة أخرى.');
        });
    });
  }

  /* ---------- ACTIVE NAV LINK ON SCROLL ---------- */
  const sections    = document.querySelectorAll('section[id]');
  const navLinkEls  = document.querySelectorAll('.navbar__links a');

  const sectionObserver = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
      if (entry.isIntersecting) {
        navLinkEls.forEach(link => link.classList.remove('active'));
        const activeLink = document.querySelector(
          `.navbar__links a[href="#${entry.target.id}"]`
        );
        if (activeLink) activeLink.classList.add('active');
      }
    });
  }, { rootMargin: '-50% 0px -50% 0px' });

  sections.forEach(s => sectionObserver.observe(s));

});
