const likeButtons = {
    like: '/assets/icons/like--blue.svg',
    dontLike: '/assets/img/library/controll__complete.svg'
}

const fetchStickers = async () => {
    const res = await fetch(`${baseApi}/stickers/get-stickers.php`)
    return await res.json()
};

const fetchToggle = async (url, data) => {
    const res = await fetch(url, {
        method: 'POST',
        body: JSON.stringify(data),
    })
    return await res.json()
}

const renderStickers = (stickers) => {
    let innerHTML = '';
    for (const sticker of stickers) {
        console.log(sticker)
        innerHTML += '<div class="selected__cards__item is-like" data-id="' + sticker.vocabulary_id + '" >' +
            '<img class="sticker__image" src="' + sticker.word_picture + '" alt="image">' +
            '<p class="title__text">' + sticker.word_italian + '</p>' +
            '<p class="main__title__text">' + sticker.word_rus + '</p>' +
            '<button class="like__btn">' +
            '<img src="' + likeButtons.like + '" alt="like">' +
            '</button>' +
            '</div>'
    }

    const wrapper = document.getElementById('selected__cards');
    wrapper.innerHTML = innerHTML;
    $(wrapper).find('.like__btn').click(async function (e) {
        const block = $(this).closest('.selected__cards__item')
        const newSrc = block.hasClass('is-like') ? likeButtons.dontLike : likeButtons.like
        const url = block.hasClass('is-like')
            ? `${baseApi}/stickers/remove-sticker.php`
            : `${baseApi}/stickers/add-sticker.php`;

        const res = await fetchToggle(url, {'id': block.attr('data-id')})

        if (res.success) {
            $(this).find('img').attr('src', newSrc)
            block.toggleClass('is-like')
        } else {
            alert(res.error ?? 'internal error')
        }
    })
}

$(document).ready(async () => {
    const stickers = await fetchStickers()
    renderStickers(stickers)
})