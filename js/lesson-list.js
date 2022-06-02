$(document).ready(function () {
  $('data-remove').hide(0);

  $('[data-popup]').click(() => {
    $('.overlay').fadeIn(300);
    $('#popup-1').fadeIn(300);
  });

  $('.overlay').click(() => {
    $('.overlay').fadeOut(300);
    $('#popup-1').fadeOut(300);
  });

  $('#delete').click(() => {
    cancelLesson();
  });

});

const toggleEditRow = (element) => {
  const id = element.attr('data-edit');
  element.toggleClass('active');
  $(`[data-remove=${id}]`).toggleClass('show');
  if ($(`[data-mark=${id}]`).attr('disabled')) {
    $(`[data-mark=${id}]`).removeAttr('disabled');
  } else {
    $(`[data-mark=${id}]`).attr('disabled', '');
  }
};

const removeEditRow = (element) => {
  const id = element.attr('data-edit');
  element.removeClass('active');
  $(`[data-remove=${id}]`).removeClass('show');
  $(`[data-mark=${id}]`).attr('disabled', '');
};

const editShow = () => {
  $('[data-editShow]').show(300);
  $('.head__nav-default').hide(0);
  $('.head__nav-sub').toggleClass('show');
};

const editHide = () => {
  $('.head__nav-default').show(300);
  $('[data-editShow]').hide(0);
  $('.head__nav-sub').toggleClass('show');
  $('div[data-edit]').each(function () {
    removeEditRow($(this));
  });
};

const fetchStudents = async (id) => {
  const group = await fetch(`${baseApi}/group/get-students.php?id=${id}`);
  return group.json();
};

const fetchLesson = async (id) => {
  const groupItem = await fetch(
    `${baseApi}/lesson/get-lesson.php?lesson_id=${id}`,
  );
  return groupItem.json();
};

function getGet(name) {
  var s = window.location.search;
  s = s.match(new RegExp(name + '=([^&=]+)'));
  return s ? s[1] : false;
}

const body = document.getElementsByTagName('body')[0];

const renderStudents = async (id) => {
  const groupData = await fetchStudents(id);

  const container = document.querySelector('.table');
  container.innerHTML = '';
  groupData.forEach(
    (student) =>
      (container.innerHTML += `
  <div class="table__row">
  <div class="table__name">
    ${student.user_name}
  </div>
  <div class="table__login">
    ${student.user_email}
  </div>
  <div class="table__counter">
    <strong>6</strong>/10
  </div>
  <input class="table__mark" disabled value="8" data-mark="${student.user_id}"></input>
  <div class="table__edit" data-editShow>
    <div class="btn btn-square btn-gray" data-edit="${student.user_id}">
      <svg data-edit="${student.user_id}" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
        <path d="M8 19.9998V20.9998C8.26522 20.9998 8.51957 20.8945 8.70711 20.707L8 19.9998ZM4 19.9998H3C3 20.5521 3.44772 20.9998 4 20.9998V19.9998ZM4 15.9998L3.29289 15.2927C3.10536 15.4803 3 15.7346 3 15.9998H4ZM15.2929 4.70696L16 5.41406L16 5.41406L15.2929 4.70696ZM16.7071 4.70696L16 5.41406L16 5.41406L16.7071 4.70696ZM19.2929 7.29274L20 6.58564V6.58564L19.2929 7.29274ZM19.2929 8.70696L18.5858 7.99985L19.2929 8.70696ZM8 18.9998H4V20.9998H8V18.9998ZM5 19.9998V15.9998H3V19.9998H5ZM4.70711 16.707L16 5.41406L14.5858 3.99985L3.29289 15.2927L4.70711 16.707ZM16 5.41406L18.5858 7.99985L20 6.58564L17.4142 3.99985L16 5.41406ZM18.5858 7.99985L7.29289 19.2927L8.70711 20.707L20 9.41406L18.5858 7.99985ZM18.5858 7.99985V7.99985L20 9.41406C20.781 8.63302 20.781 7.36669 20 6.58564L18.5858 7.99985ZM16 5.41406H16L17.4142 3.99985C16.6332 3.2188 15.3668 3.2188 14.5858 3.99985L16 5.41406Z" fill="#2E3134" />
        <path d="M12 8L16 12" stroke="#2E3134" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
      </svg>
    </div>
    <div class="table__btn-container" data-remove="${student.user_id}">
      <span>Удалить</span>
      <div class="btn btn-square btn-red">
        <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M18 18L6 6" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
          <path d="M18 6L6 18" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
        </svg>
      </div>
    </div>
  </div>
</div>
  `),
  );

  $('#edit').click(() => {
    editShow();
  });

  $('#editHide').click(() => {
    editHide();
  });

  $('div[data-edit]').click(function () {
    toggleEditRow($(this));
  });

  $('div[data-remove]').click(function () {
    const id = $(this).attr('data-remove');
    removeStudent(id);
  });
};

const renderInfo = async () => {
  const lesson = await fetchLesson(getGet('id'));
  $('#headTitle').html(lesson.lesson_title);
  $('[data-meet]').attr('href', lesson.lesson_link);
  console.log(lesson);
  await renderStudents(lesson.group_id);
};

body.addEventListener('load', renderInfo(), false);

$('#addStudent').submit(function (event) {
  event.preventDefault();
  addStudent();
});

const addStudent = async () => {
  const form = document.querySelector('#addStudent');
  const formData = new FormData(form);
  const lesson = await fetchLesson(getGet('id'));
  let json = { ...JSON.parse(parsFormData(formData)), group_id: lesson.group_id };
  json = JSON.stringify(json);

  console.log(json);

  const res = await fetch(`${baseApi}/group/add-student.php`, {
    method: 'POST',
    body: json,
  })
    .then((response) => {
      renderStudents(lesson.group_id);
      $('.overlay').fadeOut(300);
      $('.popup__overlay').fadeOut(300);
      return response.json();
    })
    .catch((error) => {
      console.error(error);
    });

  console.log(res);
};

const removeStudent = async (student_id) => {
  const lesson = await fetchLesson(getGet('id'));
  let json = { user_id: student_id, group_id: lesson.group_id };
  json = JSON.stringify(json);

  console.log(json);

  const res = await fetch(`${baseApi}/group/remove-student.php`, {
    method: 'POST',
    body: json,
  })
    .then((response) => {
      renderStudents(lesson.group_id);
      return response.json();
    })
    .catch((error) => {
      console.error(error);
    });

  console.log(res);
};

const parsFormData = (formData) => {
  const object = {};
  formData.forEach(function (value, key) {
    object[key] = value;
  });
  const json = JSON.stringify(object);
  return json;
};

const cancelLesson = async () => {
  let json = { lesson_id: getGet('id') };
  json = JSON.stringify(json);

  const response = await fetch(`${baseApi}/lesson/cancel-lesson.php`, {
    method: 'POST',
    body: json,
  });

  const data = await response.json();
  console.log(data)
  if (data.success) {
    window.location.href = '/web/lessons.php'
  }
}

const getLevel = ($level) => {
  if ($level[0] === 'C') return 'Профессионалы';
  if ($level[0] === 'B') return 'Средний уровень';
  if ($level[0] === 'A') return 'Начинающие';
};
