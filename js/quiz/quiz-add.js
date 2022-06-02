const addBtn = document.querySelector('#add')
const questionList = document.querySelector('.question__list')
const add = document.querySelector('[data-add]')
let counter = 1;

addBtn.addEventListener("click", async () => {
  addQuestion()
})

add.addEventListener("click", async () => {
  packQuestion()
})

const addQuestion = () => {
  counter++
  let form = document.createElement('form');
  form.className = 'form question__form'
  form.innerHTML = `
  <form class="form question__form">
    <div class="form__fields">
      <div class="form__item">
        <input class="form__input" name="question_title" type="text" placeholder="Название вопроса" value="Вопрос ${counter}" required>
      </div>
      <div class="form__item">
        <input class="form__input" name="question_desc" placeholder="Текст вопроса">
      </div>
      <form class="form" action="">
        <div class="form__fields">
          <div class="form__item answer">
            <input type="radio" name="is_correct" value="1">
            <input class="form__input" name="answer_title" type="text" placeholder="Текст ответа">
          </div>
          <div class="form__item answer">
            <input type="radio" name="is_correct" value="2">
            <input class="form__input" name="answer_title" type="text" placeholder="Текст ответа">
          </div>
          <div class="form__item answer">
            <input type="radio" name="is_correct" value="3">
            <input class="form__input" name="answer_title" type="text" placeholder="Текст ответа">
          </div>
          <div class="form__item answer">
            <input type="radio" name="is_correct" value="4">
            <input class="form__input" name="answer_title" type="text" placeholder="Текст ответа">
          </div>
        </div>
      </form>
    </div>
  </form>
  `

  questionList.append(form)
}


let json = {}
const packQuestion = async () => {
  const questions = document.querySelectorAll('.question__form')
  const test_title = (document.querySelector('[name=test_title]')).value
  const test_level = (document.querySelector('[name=test_level]')).value
  const test_time = (document.querySelector('[name=test_time]')).value
  const test_complexity = (document.querySelector('[name=test_complexity]')).value

  json.test_title = test_title;
  json.test_level = test_level;
  json.test_time = test_time;
  json.test_complexity = test_complexity;

  let questionsList = []
  questions.forEach(element => {
    let json = {}
    const question_title = (element.querySelector('[name=question_title]')).value
    const question_desc = (document.querySelector('[name=question_desc]')).value
    json.question_title = question_title;
    json.question_desc = question_desc;
    json.type = 0;

    const answerList = element.querySelectorAll('.answer')
    let answers = []
    answerList.forEach(answer => {
      let json = {}
      const answer_title = (answer.querySelector('[name=answer_title]')).value
      let is_correct = ''
      if (answer.querySelector('[name=is_correct]').checked) {
        is_correct = 'true';
      } else {
        is_correct = 'false';
      }
      json.answer_title = answer_title
      json.is_correct = is_correct

      answers.push(json)
    })
    json.answers = answers
    questionsList.push(json)
  })
  json.questions = questionsList

  const res = await addTestDb(json)
  console.log(res);
}

const addTestDb = async (json) => {
  const res = await fetch(`${baseApi}/test/create-test.php`, {
    method: "POST",
    body: JSON.stringify(json),
  });

  return res.json();
}