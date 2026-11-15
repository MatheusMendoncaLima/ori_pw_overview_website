import '../css/ori-refresh.css';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();

document.querySelectorAll('[data-confirm]').forEach((form) => {
    form.addEventListener('submit', (event) => {
        if (!window.confirm(form.dataset.confirm)) event.preventDefault();
    });
});

const navToggle = document.querySelector('.nav-toggle');
const siteNav = document.querySelector('#site-nav');

navToggle?.addEventListener('click', () => {
    const expanded = navToggle.getAttribute('aria-expanded') === 'true';
    navToggle.setAttribute('aria-expanded', String(!expanded));
    siteNav?.classList.toggle('is-open', !expanded);
});

siteNav?.querySelectorAll('a').forEach((link) => {
    link.addEventListener('click', () => {
        navToggle?.setAttribute('aria-expanded', 'false');
        siteNav.classList.remove('is-open');
    });
});
