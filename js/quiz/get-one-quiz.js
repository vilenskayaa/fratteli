const isTeacher = user ?.role === 'teacher';

const fetchTestById = async(test_id) => {
    const res = await fetch(`${baseApi}/test/get-test.php?test_id=${test_id}`);
    return res.json();
}


const body = document.getElementsByTagName("body")[0];
const renderTest = async() => {
    const testContainer = document.getElementById("testContainer");

    const params = new URLSearchParams(window.location.search);
    const testData = await fetchTestById(params.get("test_id"));

    const testTitle = document.createElement("h2");
    testTitle.innerText = testData.test_title;

    testContainer.appendChild(testTitle);

    const testLevel = document.createElement("div");
    testLevel.setAttribute("class", "test_level")
    testLevel.innerText = testData.test_level;

    testContainer.appendChild(testLevel);

    const questionsContainer = document.createElement("div");

    testData.questions.forEach(q => {
        const questionTitle = document.createElement("h3");
        questionTitle.innerText = q.question_title;
        questionTitle.setAttribute("class", 'h3');
        const answersContainer = document.createElement("div");
        answersContainer.setAttribute("class", "answers-container");
        const questionDesc = document.createElement("p");
        questionDesc.setAttribute("class", "questions-desc");
        questionDesc.innerText = q.question_desc;

        if (q.type_id === "0") {
            q.answers.forEach(a => {
                const option = document.createElement("input");
                option.setAttribute("type", "radio");
                option.setAttribute("id", `answer`);
                option.setAttribute("value", a.answer_id);
                option.setAttribute("name", `question${a.question_id}`);

                const optionLabel = document.createElement("label");
                optionLabel.setAttribute("for", `answer-${a.answer_id}`);
                optionLabel.innerText = a.answer_title;

                const optionsContainer = document.createElement("div");
                optionsContainer.setAttribute("class", "answer-item");


                if (!isTeacher) optionsContainer.appendChild(option);
                optionsContainer.appendChild(optionLabel);

                answersContainer.appendChild(optionsContainer);
            });
        } else if (q.type_id === "1") {
            const inputAnswer = document.createElement("input");
            inputAnswer.setAttribute("type", "text");
            inputAnswer.setAttribute("id", `answer-text`);

            if (!isTeacher) answersContainer.appendChild(inputAnswer);
        }

        questionsContainer.appendChild(questionTitle);
        questionsContainer.appendChild(questionDesc);
        questionsContainer.appendChild(answersContainer);
        questionsContainer.setAttribute("class", 'setdata');
    });


    const sendTestBtn = document.createElement("button");
    sendTestBtn.setAttribute("class", 'btn');
    sendTestBtn.innerText = "Завершить";

    testContainer.appendChild(questionsContainer);
    if (!isTeacher) testContainer.appendChild(sendTestBtn);

    let answer_ids = [];

    sendTestBtn.addEventListener("click", async() => {
        const optionsChecked = document.querySelectorAll("input[type=radio]:checked");
        const answersText = document.querySelectorAll("#answer-text");
        options_ids = [].map.call(optionsChecked, r => r.value);
        textAnswersValues = [].map.call(answersText, r => r.value);

        const res = await fetch(`${baseApi}/test/save-result.php`, {
            method: 'POST',
            body: JSON.stringify({
                answer_ids: [...options_ids, ...textAnswersValues],
                test_id: testData.test_id,
            })
        });

        const result = await res.json();
        console.log(result)
        const resultDiv = document.querySelector('#result')
        resultDiv.innerHTML = ''
        resultDiv.innerHTML = `
        <h2>Правильных ответов:</h2>
        <h3>${result.count_correct}/${result.count_questions}</h3>
        <h2>Оценка:</h2>
        <h3>${result.rating}</h3>
        `
    });


};


body.addEventListener("load", renderTest(), false);