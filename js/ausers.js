const fetchUsers = async () => {
    const res = await fetch(`${baseApi}/users/get-users.php`);
    return res.json();
  };
  
  const updateUser = async (data) => {
    const res = await fetch(`${baseApi}/reviews/update-user.php`, {
      method: 'POST',
      body: JSON.stringify(data),
    });
    const json = await res.json()
  
    if (json.success) {
      // TODO
    } else {
      alert(json.error ?? 'internal error')
    }
  };
  
  const renderUsers = async (data) => {
    const usersContainer = document.getElementById('users');
    usersContainer.innerHTML = '';
    const usersList = await fetchUsers();
  
    usersList.forEach((user) => {
        usersContainer.innerHTML += `
        <div class="reviews__item" data-id="${user.user_id}">
            <div class="user__name">${user.user_name}</div>
            <div class="user__email">${user.user_email}</div>
            <div class="user__level">${user.user_level}</div>
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
  
    $('#blogAddImageButton2').click((e) => {
      $('#file-post2').trigger('click')
    })
    $('#file-post2').change((e) => {
      const fileName = e.target.files[0].name
      $('#blogAddImageButton2').text(fileName)
    })
  });

  $(document).ready(async function () {
    renderUsers()
  });
  