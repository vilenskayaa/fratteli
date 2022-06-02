async function showPopup(post_id) {
    const res = await fetch(`${baseApi}/posts/get-post.php`, {
        method: 'POST',
        body: JSON.stringify({ id: post_id }),
    });
    const post = await res.json();

    const popupContainer = document.querySelector('.blog-popup-container');
    popupContainer.innerHTML = '';
    popupContainer.style.visibility = 'visible';
    const popup = document.createElement('div');
    const body = document.querySelector('body');
    const popupTitle = document.createElement('h1');
    const popupText = document.createElement('p');
    const popupImg = document.createElement('img');
    const popupClose = document.createElement('img');
    const confirmBtn = document.createElement('button');
    const textContainer = document.createElement('div');
    const gradient = document.createElement('div');

    popupImg.setAttribute('src', post.post_picture);
    popupClose.setAttribute('src', '../assets/icons/close_circle.svg');

    popupImg.classList.add('popup-image');
    popupTitle.classList.add('title__text');
    popup.classList.add('popup');
    popupText.classList.add('main__title__text');
    confirmBtn.classList.add('btn', 'blog-button');
    popupClose.classList.add('popup__close');
    textContainer.classList.add('popup-text-container');
    gradient.classList.add('hide-gradient');
    confirmBtn.innerHTML = 'OK';

    textContainer.append(popupTitle, popupText);
    body.append(popupContainer);
    popup.append(popupImg, popupImg, textContainer, confirmBtn, gradient, popupClose);
    popupContainer.append(popup);

    popupTitle.innerText = post.post_header;
    popupText.innerText = post.post_text;
    body.style.overflow = 'hidden';

    confirmBtn.addEventListener('click', () => {
        popupContainer.style.visibility = 'hidden';
        body.style.overflow = 'auto';
    });

    popupClose.addEventListener('click', () => {
        popupContainer.style.visibility = 'hidden';
        body.style.overflow = 'auto';
    });
}