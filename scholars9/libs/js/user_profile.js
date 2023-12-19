//variables and constants
const button_profile_picture_update = document.getElementById("profile_update_button")
const form_profile_picture = document.getElementById("form_profile_picture")
const input_profile_picture = document.getElementById("profile_update_input")

//displaying the profile input button
button_profile_picture_update.addEventListener("click", input_profile_picture_displayer)

function input_profile_picture_displayer(e) {
    e.preventDefault()
    let input_profile_picture_classname = input_profile_picture.className
    if (input_profile_picture_classname == "border d-none mx-3") {
        input_profile_picture.classList.remove('d-none')
    }
    if (input_profile_picture_classname == "border mx-3") {
        input_profile_picture.classList.add('d-none')
    }
    console.log(input_profile_picture_classname)

}