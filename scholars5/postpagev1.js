//initializations
let leave_comment_button = document.getElementById("leave_comment_button")
let leave_comment_form = document.getElementById("leave_comment_form")
let send_comment_button = document.getElementById("send_comment_button")
let comment_response_form_triggler_button = document.querySelectorAll(".comment_response_form_triggler_button")
let comment_boxes = document.querySelectorAll(".comment-box")
    //EVENT HUNDLER FUNCTIONS
    // -----------------------------------------------------------------------------------------------
    //displaying post commenting form
leave_comment_button.onclick = () => {
        leave_comment_form.classList.remove("d-none")
        leave_comment_button.classList.add("d-none")
    }
    //sending a comment and hidinging post commenting form
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
            xhr.open('GET', 'post_response.php?post_comment_text=' + text, true)
            xhr.onload = function() {
                if (this.status == 200 && this.readyState == 4) {
                    // console.log(this.responseText)
                }
            }
            xhr.send()
        }
    }
    //displaying comment replying form
comment_response_form_triggler_button.forEach(button => {
    button.onclick = () => {
        button.parentNode.classList.remove("d-flex")
        button.parentNode.classList.add("d-none")
    }
});
//-------------------------------------------------------------------------------------------------
//test on getting the post form
comment_boxes.forEach(comment => {

    //initialization to the form and its elements
    let reply_form_triggler = comment.children[2].children[0]
    let replyForm = comment.children[3]
    let reply_text_button = replyForm.children[1]
    let comment_id = replyForm.getAttribute("responseFormId")


    // ____________________________________________________
    //displaying post commenting form
    reply_form_triggler.onclick = () => {
            replyForm.classList.remove("d-none")
            replyForm.classList.add("d-flex")
            reply_form_triggler.parentNode.classList.remove("d-flex")
            reply_form_triggler.parentNode.classList.add("d-none")
        }
        // ____________________________________________________
        //form hundler functions
    reply_text_button.onclick = (e) => {
        e.preventDefault();
        //initializations
        let reply_text = replyForm.children[0].value
        if (reply_text.length > 0) {
            //ajax comment hundler
            let dataBus = [comment_id, reply_text]
            dataBus = JSON.stringify(dataBus)
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'post_response.php?comment_reply_json_data=' + dataBus, true)
            xhr.onload = function() {
                if (this.status == 200 && this.readyState == 4) {
                    console.log(this.responseText)
                }
            }
            xhr.send()
        }
        //  hiding post commenting form

        replyForm.classList.remove("d-flex")
        replyForm.classList.add("d-none")
        reply_form_triggler.parentNode.classList.remove("d-none")
        reply_form_triggler.parentNode.classList.add("d-flex")


    }
});