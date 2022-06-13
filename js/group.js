$(document).ready(function () {
  $('[data-popup]').click(() => {
    $('.overlay').fadeIn(300);
    $('.popup__overlay').fadeIn(300);
  });

  $('.overlay').click(() => {
    $('.overlay').fadeOut(300);
    $('.popup__overlay').fadeOut(300);
  });
});

const fetchGroup = async () => {
  const group = await fetch(`${baseApi}/group/get-groups.php`);
  return group.json();
};

const fetchCountStubentByGroup = async (id) => {
  const count = await fetch(`${baseApi}/group/get-students.php?id=${id}`);
  return count.json();
};

const body = document.getElementsByTagName('body')[0];

const renderGroup = async () => {
  const groupData = await fetchGroup();
  const container = document.querySelector('.classgroup');
  container.innerHTML = '';
  groupData.forEach(async (group) => {
    const count = await fetchCountStubentByGroup(group.group_id);
    container.innerHTML += `
      <div class="classgroup__item" data-id="${group.group_id}">
        <div class="classgroup__info">
          <div class="classgroup__title">
            ${group.group_title}
          </div>
          <div class="classgroup__desc">
            <span>Количество:  ${count.length}</span> | <span>${getLevel(
      group.group_level,
    )}</span>
          </div>
        </div>
        <div class="classgroup__nav">
          <i class="ci-long_right"></i>
        </div>
      </div>
  `;
    $('.classgroup__item').click(function () {
      const groupId = $(this).attr('data-id');
      console.log(groupId);
      window.location.href = `group-list.php?id=${groupId}`;
    });
  });

  $('.classgroup__item').click(function () {
    const groupId = $(this).attr('data-id');
    console.log(groupId);
    window.location.href = `group-list.php?id=${groupId}`;
  });
};

body.addEventListener('load', renderGroup(), false);

const getLevel = ($level) => {
  if ($level[0] === 'C') return 'Профессионалы';
  if ($level[0] === 'B') return 'Средний уровень';
  if ($level[0] === 'A') return 'Начинающие';
};

$('.form').submit(function (event) {
  event.preventDefault();

  addGroup();
});

const addGroup = () => {
  const form = document.querySelector('.form');
  const formData = new FormData(form);

  const json = parsFormData(formData);

  console.log(json);

  fetch(`${baseApi}/group/create-group.php`, {
    method: 'POST',
    body: json,
  })
    .then((response) => {
      $('.overlay').fadeOut(300);
      $('.popup__overlay').fadeOut(300);
    })
    .then((data) => {
      renderGroup();
    })
    .catch((error) => {
      windiw.alert(error);
    });
};

const parsFormData = (formData) => {
  const object = {};
  formData.forEach(function (value, key) {
    object[key] = value;
  });
  const json = JSON.stringify(object);
  return json;
};
