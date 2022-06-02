$(document).ready(function() {
    $("#signIn").submit(function(event) {
        event.preventDefault();

        $.ajax({
            type: "post",
            url: "/app/account/signin.php",
            data: new FormData(this),
            contentType: false,
            cache: false,
            processData: false,
            success: function(data) {
                validation = jQuery.parseJSON(data)

                const inputEmail = document.querySelector(".input_field_email");
                const inputnPassword = document.querySelector(".input_field_password");

                inputEmail.classList.remove("error")
                inputnPassword.classList.remove("error")

                if (validation.key === 'true') {
                    window.location.href = validation.url
                } else {
                    if (validation.key === 'email') {
                        inputEmail.classList.add("error")
                    }
                    if (validation.key === 'password') {
                        inputnPassword.classList.add("error")
                    }
                }
            }
        })
    })
})

const viewPassword = () => {
    const viewField = document.querySelector('#viewField')
    const inputPass = document.querySelector('input[type="password"]')

    viewField.addEventListener('click', (event) => {
        viewField.classList.toggle('active')

        const passAttr = inputPass.getAttribute('type')
        if (passAttr === 'text') {
            inputPass.setAttribute('type', 'password')
        } else if (passAttr === 'password') {
            inputPass.setAttribute('type', 'text')
        }
    })
}

viewPassword()