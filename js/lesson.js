const fetchGroups = async () => {
    const res = await fetch(`${baseApi}/group/get-groups.php`);

    return res.json();
}

const createLesson = async (data) => {
    const res = await fetch(`${baseApi}/lesson/create-lesson.php`, {
        method: 'POST',
        body: JSON.stringify(data),
    });
    return res.json();
}

$(document).ready(async function(){
    const groupsList = await fetchGroups();
    groupsList.forEach(g => {
        const option = document.createElement('option');
        option.setAttribute("value", g.group_id);
        option.innerHTML = g.group_title;

        document.getElementById('selectGroups').appendChild(option);
    });
    
    document.getElementById('createLessonBtn').addEventListener("click", async (event) => {
        event.preventDefault();
        const data = {
            lesson_title: document.getElementById("lesson_title").value,
            lesson_date: document.getElementById("lesson_date").value,
            lesson_link: document.getElementById("lesson_link").value,
            group_id: document.getElementById("selectGroups").value
        };

        const res = await createLesson(data);
        console.log(res);

        if (!res.succes) {
            alert(res.error);
        } else {
            console.log("success",res);
        }
    });


    $("[data-popup]").click(() => {
      $('.overlay').fadeIn(300)
      $('.popup__overlay').fadeIn(300)
    })
  
    $(".overlay").click(() => {
      $('.overlay').fadeOut(300)
      $('.popup__overlay').fadeOut(300)
    })
  
});
