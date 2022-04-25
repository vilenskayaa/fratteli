const fetchTests = async () => {
    const res = await fetch(`${baseApi}/test/get-test.php`);
    return res.json();
};

const body = document.getElementsByTagName("body")[0];
const renderTests = async () => {
    const testData = await fetchTests();

    const testContainer = document.getElementById("testList");

    
   testData.forEach(test => testContainer.innerHTML += (`
        <div class="card" id="testItem">
            <div class="test_level" id="testLevel">${test.test_level}</div>
            <div class="test_title" id="testTitle">${test.test_title}</div>
            <div class="test_bottom">
                <div class="test_info">
                    <span id="questionsCount">24 вопроса</span>
                    <span id="testTime">${test.test_time}</span>
                </div>
                <button class="black_arrow" id="btnTest">-></div>
            </div>
        </div>`));
};


body.addEventListener("load", renderTests(), false);

