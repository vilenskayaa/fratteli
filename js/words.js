const btnCreate = document.getElementById('createWord');

const form = document.querySelector("#create-word-form");

const createNewWord = () => {

  // alert(JSON.stringify(formData));
  $(document).ready(function() {
    
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



form.addEventListener("submit", (event) => {
  event.preventDefault();
  const formData = new FormData(form);
  $.ajax({
    type: "post",
    url: "/app/word/create-word.php",
    data: formData,
    contentType: false,
    cache: false,
    processData: false,
    success: function(data) {
        if (data) {
            console.log(data);
        }
    }
})
})