const fetchGroups = async () => {
  const res = await fetch(`${baseApi}/group/get-groups.php`);

  return res.json();
};

const fetchGroupItem = async (id) => {
  const groupItem = await fetch(`/app/group/get-group-item.php?id=${id}`);
  return groupItem.json();
};

const createLesson = async (data) => {
  const res = await fetch(`${baseApi}/lesson/create-lesson.php`, {
    method: 'POST',
    body: JSON.stringify(data),
  });
  return await res.json();
};

const fetchLessonsByDay = async (lesson_date) => {
  const res = await fetch(
    `${baseApi}/lesson/get-lesson.php?lesson_date=${lesson_date}`,
  );

  return res.json();
};

const formatDate = (date) => {
  const year = date.getFullYear();
  let month = date.getMonth() + 1;
  const day = date.getDate();

  if (month < 10) month = `0${month}`;

  return `${year}-${month}-${day}`;
};

const renderLessons = (lessonsByDay) => {
  const lessonsContainer = document.getElementById('classgroup');
  lessonsContainer.innerHTML = '';

  lessonsByDay.map(async (lesson) => {
    const groupId = lesson.group_id;
    const groupLesson = await fetchGroupItem(groupId);
    lessonsContainer.innerHTML += `
        <div class="classgroup__item" data-id="${lesson.lesson_id}">
        <div class="classgroup__info">
          <div class="classgroup__title">
            ${lesson.lesson_title}
          </div>
          <div class="classgroup__desc">
            <span>${lesson.lesson_time}</span> |
            <span>${lesson.lesson_date}</span> |
            <span>${groupLesson[0].group_title}</span>
          </div>
        </div>
        <div class="classgroup__nav">
          <i class="ci-long_right"></i>
        </div>
      </div>
        `;

    $('.classgroup__item').click(function () {
      const lessonId = $(this).attr('data-id');
      window.location.href = `lessons-list.php?id=${lessonId}`;
    });
  });
};

$(document).ready(async function () {
  var hoursToTakeAway = [00, 01, 02, 03, 04, 05, 06, 07, 08, 09, 19, 20, 21, 22, 23];
  $('#lesson_date').datetimepicker({
      format:'Y-m-d H:i',
      timepicker: true,
      theme:'light',
      onGenerate: function(ct,$i) {
        $('.xdsoft_time_variant .xdsoft_time').each(
          function(index){
            if(hoursToTakeAway.indexOf(parseInt($(this).text())) !== -1) {
                $(this).remove();
            }
          });
        }
  });

  const groupsList = await fetchGroups();
  groupsList.forEach((g) => {
    const option = document.createElement('option');
    option.setAttribute('value', g.group_id);
    option.innerHTML = g.group_title;

    document.getElementById('selectGroups').appendChild(option);
  });

  document
    .getElementById('createLessonBtn')
    .addEventListener('click', async (event) => {
      event.preventDefault();
      const data = {
        lesson_title: document.getElementById('lesson_title').value,
        lesson_date: document.getElementById('lesson_date').value,
        lesson_link: document.getElementById('lesson_link').value,
        group_id: document.getElementById('selectGroups').value
      };
      const res = await createLesson(data);

      if (!res.success) {
          alert(res.error ?? '"Произошла ошибка, пожалуйста, обратитесь к администратору')
         return;
      }

      const lessonDate = document.getElementById('lessonDate');
      lessonDate.value = document.getElementById('lesson_date').value;
      lessonsByDay = await fetchLessonsByDay(lessonDate.value);
      renderLessons(lessonsByDay);

      $('.overlay').fadeOut(300);
      $('.popup__overlay').fadeOut(300);
    });

  const lessonDate = document.getElementById('lessonDate');
  lessonDate.value = formatDate(new Date());

  let lessonsByDay = await fetchLessonsByDay(lessonDate.value);

  lessonDate.addEventListener('change', async () => {
    lessonsByDay = await fetchLessonsByDay(lessonDate.value);
    renderLessons(lessonsByDay);
  });

  renderLessons(lessonsByDay);

  $('[data-popup]').click(() => {
    $('.overlay').fadeIn(300);
    $('.popup__overlay').fadeIn(300);
  });

  $('.overlay').click(() => {
    $('.overlay').fadeOut(300);
    $('.popup__overlay').fadeOut(300);
  });
});
