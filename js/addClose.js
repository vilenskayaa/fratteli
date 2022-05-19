const adBlock = document.querySelector('.header__container');

const adCloseBtn = document.querySelector('.header__img');

adCloseBtn.addEventListener('click', () => {
  adBlock.style.display = 'none';
})