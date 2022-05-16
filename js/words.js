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