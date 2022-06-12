const fetchUsers = async (page) => {
    const res = await fetch(`${baseApi}/users/get-users.php?page=${page}`);
    return res.json();
  };

  const editUser = async (id) => {
    const userContainer = $('div [data-id="' + id + '"]');
    console.log(userContainer);
    const name = userContainer.children(".user__name")[0].innerText;
    const email = userContainer.children(".user__email")[0].innerText;
    const level = userContainer.children(".user__level")[0].innerText;
    const checked =  userContainer.children(".user__approved")[0].classList.contains("green") ? "checked" : "";
    userContainer[0].innerHTML = `
        <div class="user__name"><input type="text" value="${name}"></input></div>
        <div class="user__email"><input type="text" value="${email}"></input></div>
        <div class="user__level"><input type="text" value="${level}"></input></div>
        <div class="user__approved"><input type="checkbox" ${checked}>Подтвержден</input></div>
        <div class="btn-edit" id="edit" onclick="updateUser(${id})">
            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M8 19.9998V20.9998C8.26522 20.9998 8.51957 20.8945 8.70711 20.707L8 19.9998ZM4 19.9998H3C3 20.5521 3.44772 20.9998 4 20.9998V19.9998ZM4 15.9998L3.29289 15.2927C3.10536 15.4803 3 15.7346 3 15.9998H4ZM15.2929 4.70696L16 5.41406L16 5.41406L15.2929 4.70696ZM16.7071 4.70696L16 5.41406L16 5.41406L16.7071 4.70696ZM19.2929 7.29274L20 6.58564V6.58564L19.2929 7.29274ZM19.2929 8.70696L18.5858 7.99985L19.2929 8.70696ZM8 18.9998H4V20.9998H8V18.9998ZM5 19.9998V15.9998H3V19.9998H5ZM4.70711 16.707L16 5.41406L14.5858 3.99985L3.29289 15.2927L4.70711 16.707ZM16 5.41406L18.5858 7.99985L20 6.58564L17.4142 3.99985L16 5.41406ZM18.5858 7.99985L7.29289 19.2927L8.70711 20.707L20 9.41406L18.5858 7.99985ZM18.5858 7.99985V7.99985L20 9.41406C20.781 8.63302 20.781 7.36669 20 6.58564L18.5858 7.99985ZM16 5.41406H16L17.4142 3.99985C16.6332 3.2188 15.3668 3.2188 14.5858 3.99985L16 5.41406Z" fill="#2E3134" />
                <path d="M12 8L16 12" stroke="#2E3134" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
            </svg>
        </div>
    `;
  };
  
  const updateUser = async (id) => {
    const userContainer = $('div [data-id="' + id + '"]');
    const name = userContainer.children(".user__name").children("input")[0].value;
    const email = userContainer.children(".user__email").children("input")[0].value;
    const level = userContainer.children(".user__level").children("input")[0].value;
    const approved = userContainer.children(".user__approved").children("input")[0].checked === true ? 1 : 0;

    const res = await fetch(`${baseApi}/users/update-user.php`, {
      method: 'POST',
      body: JSON.stringify({ user_id: id, email: email, name: name, level: level, approved: approved}),
    });
    const json = await res.json()
  
    if (json.success) {
      renderUsers(getPage());
    } else {
      alert(json.error ?? 'Невозможно обновить данные пользователя с внесенными параметрами')
    }
  };
  
  const renderUsers = async (page) => {
    const usersContainer = document.getElementById('users');
    const pagesContainer = document.getElementById('pages');
    usersContainer.innerHTML = '';
    const usersJson = await fetchUsers(page);
  
    usersJson["users"].forEach((user) => {
        console.log(user);
        const status = user.approved === '1' ? "Подтвержден" : "Не подтвержден";
        const statusClass = user.approved === '1' ? "green" : "red";
        usersContainer.innerHTML += `
        <div class="reviews__item user" data-id="${user.user_id}">
            <div class="user__name">${user.user_name}</div>
            <div class="user__email">${user.user_email}</div>
            <div class="user__level">${user.user_level}</div>
            <div class="user__approved ${statusClass}">${status}</div>
            <div class="btn-edit" id="edit" onclick="editUser(${user.user_id})">
                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M8 19.9998V20.9998C8.26522 20.9998 8.51957 20.8945 8.70711 20.707L8 19.9998ZM4 19.9998H3C3 20.5521 3.44772 20.9998 4 20.9998V19.9998ZM4 15.9998L3.29289 15.2927C3.10536 15.4803 3 15.7346 3 15.9998H4ZM15.2929 4.70696L16 5.41406L16 5.41406L15.2929 4.70696ZM16.7071 4.70696L16 5.41406L16 5.41406L16.7071 4.70696ZM19.2929 7.29274L20 6.58564V6.58564L19.2929 7.29274ZM19.2929 8.70696L18.5858 7.99985L19.2929 8.70696ZM8 18.9998H4V20.9998H8V18.9998ZM5 19.9998V15.9998H3V19.9998H5ZM4.70711 16.707L16 5.41406L14.5858 3.99985L3.29289 15.2927L4.70711 16.707ZM16 5.41406L18.5858 7.99985L20 6.58564L17.4142 3.99985L16 5.41406ZM18.5858 7.99985L7.29289 19.2927L8.70711 20.707L20 9.41406L18.5858 7.99985ZM18.5858 7.99985V7.99985L20 9.41406C20.781 8.63302 20.781 7.36669 20 6.58564L18.5858 7.99985ZM16 5.41406H16L17.4142 3.99985C16.6332 3.2188 15.3668 3.2188 14.5858 3.99985L16 5.41406Z" fill="#2E3134" />
                    <path d="M12 8L16 12" stroke="#2E3134" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                </svg>
          </div>
        </div>
      `;
    });
    const pages =  usersJson["pages"];
    if (pages > 1) {
      for (i = 0; i < pages; i++) {
        const activeClass = page == (i+1) ? "active" : "";
        pagesContainer.innerHTML += `<a href="../web/ausers.php?page=${i+1}" class="page ${activeClass}">${i+1}</a>`;
      }
    }
  };

  $(document).ready(async function () {
    renderUsers(getPage());
  });

  function getPage() {
    var s = window.location.search;
    s = s.match(new RegExp('page=([^&=]+)'));
    return s ? s[1] : 1;
  }
  