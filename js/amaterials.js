const fetchReviews = async () => {
  const res = await fetch(`${baseApi}/reviews/get-reviews.php`);
  return res.json();
};

const removeReviews = async (data) => {
  const res = await fetch(`${baseApi}/reviews/remove-reviews.php`, {
    method: 'POST',
    body: JSON.stringify(data),
  });
  const json = await res.json()

  if (json.success) {
    $('[data-id="' + data.id + '"]').remove()
  } else {
    alert(json.error ?? 'internal error')
  }
};

const renderReviews = async (data) => {
  const reviewsContainer = document.getElementById('reviews');
  reviewsContainer.innerHTML = '';
  const reviewsList = await fetchReviews();

  reviewsList.forEach((review) => {
    reviewsContainer.innerHTML += `
      <div class="reviews__item" data-id="${review.review_id}">
        <div class="reviews__head">
          <div class="reviews__name">${review.user_name}</div>
          <div class="reviews__date">${review.review_date}</div>
        </div>
        <div class="reviews__text">
          ${review.review_text}
        </div>
        <div class="btn btn-square btn-red remove" onclick="removeReviews({id:${review.review_id}})">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path d="M18 18L6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
              <path d="M18 6L6 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
          </div>
      </div>
    `;
  });
};


$(document).ready(async function () {
  $('#blogAddImageButton').click((e) => {
    $('#file-post').trigger('click')
  })
  $('#file-post').change((e) => {
    const fileName = e.target.files[0].name
    $('#blogAddImageButton').text(fileName)
  })
});
