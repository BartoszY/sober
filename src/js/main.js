// import AOS from 'aos';
import { burgerMenu, fixedHeader } from './components/header';
import { eventToggleMoreText } from './components/event';


if ('ontouchstart' in window || navigator.maxTouchPoints > 0) {
  document.body.classList.add('touch-device');
} else {
  document.body.classList.add('no-touch');
}


burgerMenu();
fixedHeader();

eventToggleMoreText();

// window.addEventListener('load', () => {
//   // 

//   let resizeTimeout;
//   window.addEventListener('resize', () => {
//     clearTimeout(resizeTimeout);
//     resizeTimeout = setTimeout(() => {
//       // 

//     }, 200);
//   });
// });