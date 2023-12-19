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
//POST COMMENT ACTIONs
comment_boxes.forEach(comment => {

    //initialization to the form and its elements
    let reply_form_triggler = comment.children[3].children[0]
    let comment_replies_triggler = comment.children[3].children[1]
    let comment_replies = comment.children[2]
    let hide_comment_replies = comment_replies.children[0]
    let replyForm = comment.children[4]
    let reply_text_button = replyForm.children[1]
    let comment_id = comment.getAttribute("commentId")

    // displaying the comment replies section
    //___________________________________________________
    comment_replies_triggler.onclick = () => {
            comment_replies.classList.remove('d-none')
            comment_replies_triggler.classList.add('d-none')
                //ajax comment hundler
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'post_response.php?comment_replies=' + comment_id, true)
            xhr.onload = function() {
                if (this.status == 200 && this.readyState == 4) {
                    let comment_replies_feed = JSON.parse(this.responseText)
                    comment_replies_feed.forEach(reply => {
                        let reply_div = document.createElement("div")
                        reply_div.setAttribute("class", "bg-white mt-1 mb-2 p-2 shadow rounded border-info border-left comment_reply")
                        let reply_div_header = document.createElement("div")
                        reply_div_header.classList.add("d-flex")
                        let replier_img = document.createElement("img")
                        replier_img.src = reply[0]
                        replier_img.setAttribute("alt", "user profile picture")
                        replier_img.classList.add("rounded-circle")
                        replier_img.style.width = "20px"
                        let username = document.createElement("span")
                        username.style.fontSize = "smaller"
                        username.innerText = reply[1]
                        reply_div_header.appendChild(replier_img)
                        reply_div_header.appendChild(username)
                        let reply_text = document.createElement("p")
                        reply_text.classList.add("text-muted")
                        reply_text.innerText = reply[2]

                        //appending sub divs to the reply div
                        reply_div.appendChild(reply_div_header)
                        reply_div.appendChild(reply_text)

                        //appending reply to the form
                        comment_replies.appendChild(reply_div)

                    });
                }
            }
            xhr.send()
        }
        //hiding the comment replies
    hide_comment_replies.onclick = () => {
            comment_replies.classList.add('d-none')
            comment_replies_triggler.classList.remove('d-none')
        }
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
                    // console.log(this.responseText)
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