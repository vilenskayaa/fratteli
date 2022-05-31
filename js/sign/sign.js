// view password
const viewPassword = () => {
    const viewField = document.querySelector('#viewField')
    const inputPass = document.querySelectorAll('input[type="check"]')

    if (viewField === null || inputPass.length == 0) {
        return
    }

    viewField.addEventListener('click', (event) => {
        viewField.classList.toggle('active')

        const passAttr = inputPass[0].getAttribute('type')
        if (passAttr === 'text') {
            inputPass.forEach(function(x) { x.setAttribute('type', 'password') })
        } else if (passAttr === 'password') {
            inputPass.forEach(function(x) { x.setAttribute('type', 'text') })
        }
    })
}


const signData = new FormData();

const signForm = (selector) => {
    const id = "#" + selector;
    const form = document.querySelector(id)

    if (form) {
        form.addEventListener('submit', (event) => {
            event.preventDefault()

            const data = new FormData(form)

            if (selector === "signUp") {
                if (!chekValidation(data)) {
                    return
                }
            }

            for (const key of data.keys()) {
                signData.append(key, data.get(key))
            }

            const dataSelector = "data-" + selector;
            const section = document.querySelector(`[${dataSelector}]`)
            section.style.transform = "translateX(-900px)"
        })
    }
}

const moveForm = (element) => {
    const form = document.querySelector(`[${element}]`)
    form.style.transform = "translateX(0)";
}

const changeBg = () => {
    const inputStudent = document.querySelector("label[for=inputStudent]")
    const inputTeacher = document.querySelector("label[for=inputTeacher]")
    const main = document.querySelector("main")

    inputStudent.addEventListener("click", () => {
        main.className = "sign sign-student"
    })
    inputTeacher.addEventListener("click", () => {
        main.className = "sign sign-teacher"
    })
}

const chekValidation = (formData) => {
    console.log("chekValidation")
    const password = formData.get('password')
    const passwordRepeat = formData.get('passwordRepeat')
    const reg = /(?=.*[0-9])(?=.*[a-z])[0-9a-zA-Z!@#$%^&*]{6,}/g;
    const inputPass = document.querySelector(".input_field_password")
    const inputPassRepeat = document.querySelector(".input_field_password_repeat")

    inputPass.classList.remove('error')
    inputPassRepeat.classList.remove('error')

    let flag = true;
    if (!reg.test(password)) {
        console.log("wrong pass")
        inputPass.classList.add('error')
        flag = false
    }
    if (password !== passwordRepeat) {
        console.log("wrong repeat pass")
        inputPassRepeat.classList.add('error')
        flag = false
    }

    return flag
}

const signUp = () => {
    $(document).ready(function() {
        $("#signEnd").submit(function(event) {
            event.preventDefault();

            $.ajax({
                type: "post",
                url: "/app/account/signup.php",
                data: signData,
                contentType: false,
                cache: false,
                processData: false,
                success: function(data) {
                    if (data) {
                        window.location.href = "/web/lessons.php"
                    }
                }
            })
        })
    })
}


viewPassword()
changeBg()
signForm('signUp')
signForm('signRole')
signForm('signLevel')
signUp()