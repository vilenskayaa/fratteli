const fetchReviews = async () => {
  const res = await fetch(`${baseApi}/reviews/get-reviews.php`);
  return res.json();
};

const addReviews = async (data) => {
  const res = await fetch(`${baseApi}/reviews/add-reviews.php`, {
    method: 'POST',
    body: JSON.stringify(data),
  });
};

const renderReviews = async (data) => {
  const reviewsContainer = document.getElementById('reviews');
  reviewsContainer.innerHTML = '';
  const reviewsList = await fetchReviews();
  console.log(reviewsList);
  reviewsList.forEach((review) => {
    reviewsContainer.innerHTML += `
      <div class="reviews__item">
        <div class="reviews__head">
          <div class="reviews__name">${review.user_name}</div>
          <div class="reviews__date">${review.review_date}</div>
        </div>
        <div class="reviews__text">
          ${review.review_text}
        </div>
      </div>
    `;
  });
};

const updateName = async (data) => {
  const res = await fetch(`${baseApi}/account/update-name.php`, {
    method: 'POST',
    body: JSON.stringify(data),
  });
  return await res.json()
}

$(document).ready(async function () {
  const reviewsAddButton = document.getElementById('reviewsAddButton');
  const reviewsTextarea = document.querySelector('textarea[name=reviews_text]');

  reviewsAddButton.addEventListener('click', async (event) => {
    event.preventDefault();
    const data = {
      reviews_text: reviewsTextarea.value,
    };
    if (!reviewsTextarea.value) {
      alert('Поле пустое');
      return;
    }
    addReviews(data);
    renderReviews();
  });

  document.getElementById('renameButton').addEventListener('click', async () => {
    const newName = document.getElementById('rename').querySelector('[name="name"]').value;
    console.log(newName)
    const res = await updateName({name: newName});
  })
});

const body = document.getElementsByTagName('body')[0];
body.addEventListener('load', renderReviews(), false);
