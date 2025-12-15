/**
 * eventToggleMoreText
 */
const eventToggleMoreText = () => {
  const events = document.querySelectorAll('.event-row');
  if (!events.length) return;

  events.forEach((event) => {
    const button = event.querySelector('.event-row__more-button');
    const moreContent = event.querySelector('.event-row__more');
    
    if (!button || !moreContent) return;

    const openText = button.textContent;
    const closeText = button.getAttribute('data-close-text');

    button.addEventListener('click', () => {
      event.classList.toggle('active');

      if (event.classList.contains('active')) {
        button.textContent = closeText;
      } else {
        button.textContent = openText;
      }
    });
  });
}

export { eventToggleMoreText };