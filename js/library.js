let words = [], index = 0

const getWords = async () => {
    const words = await fetch(  `${baseApi}/word/get-words.php`)
    return await words.json()
}

const setSticker = async (data) => {
    const res = await fetch(`${baseApi}/word/add-sticker.php`, {
        method: 'POST',
        body: JSON.stringify(data),
    })
    return await res.json()
}

const onClick = (id, type) => {
    return async (e) => {
        console.log('click', id, type)
        const res = await setSticker({
            id: id,
            type: type
        })

        if (res.success) {
            index++
            nextWordRender()
        } else {
            alert(res.error)
        }
    }
}

const nextWordRender = () => {
    const word = words[index]
    const wrapper = document.getElementById('product')

    if (!word) {
        wrapper.innerHTML = '<div class="empty"><h3>Вы изучили все карточки!</h3><p>Подождите, пока администратор добавит новые!</p></div'
        return
    }

    const innerHTML = '<div class="img__card" data-id="' + word.word_id + '" >' +
        '<img  src="' + word.word_picture + '" alt="">' +
        '</div>' +
        '<div class="music__content">' +
        '<h1>' + word.word_italian + '</h1>' +
        '<p class="main__title__text">' + word.word_rus + '</p>' +
        '<div class="music__controlls">' +
        '<button class="btn__controll like" onclick="onClick('+ word.word_id +', 1)()"><img src="/assets/img/library/controll__complete.svg" alt=""></button>' +
        '<button class="btn__controll success" onclick="onClick('+ word.word_id +', 0)()"><img src="/assets/img/library/controll__favorite.svg" alt=""></button>' +
        '</div>' +
        '</div>'

    wrapper.innerHTML = innerHTML
}

const renderPosts = async () => {
    const res = await fetch(`${baseApi}/posts/get-posts.php`)
    const posts = await res.json()

    let innerHTML = '';
    for (const post of posts) {
        innerHTML += '<div class="blog_item">' +
            '<img src="'+ post.post_picture +'" alt="">' +
            '<h3>' + post.post_header + '</h3>' +
            '<p class="blog__text">' + post.post_text.slice(0, 200) + '...</p>' +
            '<a href="#" class="blog__link">Читать далее <img src="/assets/icons/arrow--blue.svg" alt=""></a>' +
            '</div>'
    }

    document.getElementById('wrapper-posts').innerHTML = innerHTML
}

$(document).ready(async () => {
    words = await getWords()
    nextWordRender()
    renderPosts()
})