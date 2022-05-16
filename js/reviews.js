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

const renderReviews = async () => {
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
});

const body = document.getElementsByTagName('body')[0];
body.addEventListener('load', renderReviews(), false);
