let leave_comment_button = document.getElementById("leave_comment_button")
let leave_comment_form = document.getElementById("leave_comment_form")
let send_comment_button = document.getElementById("send_comment_button")
leave_comment_button.onclick = () => {
    leave_comment_form.classList.remove("d-none")
    leave_comment_button.classList.add("d-none")
}
send_comment_button.onclick = (e) => {
    //prevent default page submission
    e.preventDefault()
        //post reformatting
    leave_comment_form.classList.add("d-none")
    leave_comment_button.classList.remove("d-none")
        //ajax comment hundler
    let text = document.getElementById("post_comment_text").value
    if (text.length > 0) {
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'post_commenting.php?post_comment_text=' + text, true)
        xhr.onload = function() {
            if (this.status == 200 && this.readyState == 4) {
                console.log(this.responseText)
            }
        }
        xhr.send()
    }
}