// import AOS from 'aos';
import { burgerMenu, fixedHeader } from './components/header';


if ('ontouchstart' in window || navigator.maxTouchPoints > 0) {
  document.body.classList.add('touch-device');
} else {
  document.body.classList.add('no-touch');
}


burgerMenu();
fixedHeader();

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