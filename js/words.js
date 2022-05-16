const btnCreate = document.getElementById('createWord');


const createNewWord = async (data) => {
    return fetch(`${baseApi}/word/create-word.php`, {
        method: 'POST',
        body: data,
      })
        .then((response) => {
          console.log(response);
        })
        .then((data) => {
          console.log(data);
        })
        .catch((error) => {
          console.error(error);
        });
}

const fetchWords = async () => {
    const words = await fetch(`${baseApi}/word/get-words.php`);
    return words.json();
};

const fetchCompletedWords = async () => {
    const words = await fetch(`${baseApi}/word/get-words.php?state=COMPLETED`);
    return words.json();
};

const fetchAddedWords = async () => {
    const words = await fetch(`${baseApi}/word/get-words.php?state=ADDED`);
    return words.json();
};



btnCreate.onclick = (e) => {
    const word_rus = document.getElementById('word_rus').value;
    const word_italian = document.getElementById('word_italian').value;
    const word_picture = document.getElementById('word_picture').value;

    const formData = new FormData();
    formData.append("word_rus", word_rus);
    formData.append("word_italian", word_italian);
    formData.append("word_picture", word_picture);

    createNewWord({word_rus, word_italian, word_picture});
};