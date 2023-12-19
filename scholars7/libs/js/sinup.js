let username = document.getElementById("username")
let username_status = document.getElementById("username_status")
let sinup = document.getElementById("sinup")
let i = 0
username.onkeyup = () => {
    let suggested_username = username.value
    let xhr = new XMLHttpRequest();
    xhr.open('GET', '../users/authentication.php?suggested_username=' + suggested_username, true)
    xhr.onload = function() {
        if (this.status == 200 && this.readyState == 4) {
            let responsestatus = this.responseText
            if (responsestatus == "exist") {
                console.log("bad")
                username_status.style.backgroundColor = 'red'
                sinup.setAttribute('disabled', 'disabled')
            } else {
                console.log("good")
                username_status.style.backgroundColor = 'green'
                sinup.removeAttribute('disabled')
            }
        }
    }
    xhr.send()
}