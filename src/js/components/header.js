/**
 * Burger
 */
const burgerMenu = () => {
  const burger = document.querySelector('[data-burger]');

  if (burger) {
    burger.addEventListener('click', () => {
      document.body.classList.toggle('nav-active');
      const expanded = burger.getAttribute('aria-expanded') === 'true';
      burger.setAttribute('aria-expanded', !expanded);
    });
  }

  const menuWrapper = document.querySelector('.header__menu');
  if (!menuWrapper) return;

  menuWrapper.addEventListener('click', (e) => {
    if (e.target.classList.contains('menu-item-has-children') ||
      e.target.parentElement.classList.contains('menu-item-has-children')) {
      const menuItem = e.target.classList.contains('menu-item-has-children') ? e.target : e.target.parentElement;

      if (window.innerWidth <= 1400) {
        e.preventDefault();
      }

      menuItem.classList.toggle('active');
    }

    if (
      e.target.nodeName == 'A' &&
      e.target.parentElement.classList.contains('menu-item-has-children') &&
      e.target.getAttribute('href').includes('#')
    ) {
      e.preventDefault();
    }
  });


  document.addEventListener('click', (e) => {
    if (e.target.classList.contains('nav-active')) {
      document.body.classList.remove('nav-active');
      burger.setAttribute('aria-expanded', false);
    }
  });
}

/**
 * Active menu item
 */
// const highlightActiveMenuItem = () => {
//   const sections = document.querySelectorAll('section');
//   const navLi = document.querySelectorAll('.page-header__nav__menu__item');

//   if (!sections || !navLi) return;

//   window.onscroll = (e) => {
//     var current = "";

//     sections.forEach((section) => {
//       const sectionTop = section.offsetTop;
//       const scrollTop = window.pageYOffset || document.documentElement.scrollTop || document.body.scrollTop;

//       if (scrollTop >= sectionTop - 140) {
//         current = section.getAttribute("id");
//       }
//     });

//     navLi.forEach((li) => {
//       li.classList.remove("active");
//       if (current != '' && li.hash.includes(current)) {
//         li.classList.add("active");
//       }
//     });
//   };
// }

/**
 * Fixed Header
 */
const fixedHeader = () => {
  checkFixedClasses();

  window.addEventListener('scroll', () => {
    checkFixedClasses();
  });

  function checkFixedClasses() {
    if (window.pageYOffset > 0) {
      document.body.classList.add('page-scrolled');
    }
    else {
      document.body.classList.remove('page-scrolled');
    }
  }
}

const menuPostsCounters = () => {
  const csMenuItem = document.querySelector('.cs-menu-item > a');
  if (!csMenuItem) return;

  let lang;
  if (window.location.pathname.includes('/en')) lang = 'en'
  else if (window.location.pathname.includes('/de')) lang = 'de';
  else lang = 'pl';

  fetch(`/wp-json/wp/v2/case-study?per_page=100&_fields=id,lang`)
  .then(response => response.json())
  .then(posts => {
    const totalPosts = posts.filter(post => post.lang === lang).length;

    if (totalPosts > 0) {
      csMenuItem.innerHTML = `${csMenuItem.innerHTML} <sup>(${totalPosts})</sup>`;
    }
  })
  .catch(error => {
    console.error('Błąd przy pobieraniu liczby wpisów:', error);
  });
}

export { burgerMenu, fixedHeader, menuPostsCounters };