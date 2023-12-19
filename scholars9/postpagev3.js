//initializations
let leave_comment_button = document.getElementById("leave_comment_button")
let leave_comment_form = document.getElementById("leave_comment_form")
let send_comment_button = document.getElementById("send_comment_button")
let comment_response_form_triggler_button = document.querySelectorAll(".comment_response_form_triggler_button")
let comment_boxes = document.querySelectorAll(".comment-box")
let button_like_post = document.getElementById("button_like_post")
let post_like_status = button_like_post.getAttribute('like_status')
    //EVENT HUNDLER FUNCTIONS
    // -----------------------------------------------------------------------------------------------

//displaying post commenting form
leave_comment_button.addEventListener("click", comment_form_displayer)


function comment_form_displayer() {
    leave_comment_form.classList.remove("d-none")
    leave_comment_button.classList.add("d-none")
}

//adding a like to the post
if (post_like_status == "unliked") {
    button_like_post.addEventListener("click", post_like_adder)
}

function post_like_adder() {
    let like_xhr = new XMLHttpRequest();
    like_xhr.open('GET', 'post_response.php?post_add_like=liked', true)
    like_xhr.onload = function() {
        if (this.status == 200 && this.readyState == 4) {
            // console.log(this.responseText)
        }
    }
    like_xhr.send()
}

//sending a comment and hidinging post commenting form
send_comment_button.addEventListener("click", comment_sender)

function comment_sender(e) {
    //prevent default page submission
    e.preventDefault()
        //commenting form rehiding
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
//displaying comment replying action form
comment_response_form_triggler_button.forEach(button => {
    button.onclick = () => {
        button.parentNode.classList.remove("d-flex")
        button.parentNode.classList.add("d-none")
    }
});

//POST COMMENT METHODs
comment_boxes.forEach(comment => {

    //initialization to the form and its elements
    let reply_form_triggler = comment.children[3].children[0]
    let comment_replies_triggler = comment.children[3].children[1]
    let comment_replies = comment.children[2]
    let hide_comment_replies = comment_replies.children[0]
    let replyForm = comment.children[4]
    let reply_text_button = replyForm.children[1]
    let replies_set = comment_replies.children[2]
    let comment_id = comment.getAttribute("commentId")

    // displaying the comment replies section
    //___________________________________________________
    comment_replies_triggler.addEventListener("click", comment_replies_displayer)

    function comment_replies_displayer() {
        comment_replies.classList.remove('d-none')
        comment_replies_triggler.classList.add('d-none')
            //ajax comment hundler
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'post_response.php?comment_replies=' + comment_id, true)
        xhr.onload = function() {
            if (this.status == 200 && this.readyState == 4) {
                let newRelpySetContent = ""
                let comment_replies_feed = JSON.parse(this.responseText)
                comment_replies_feed.forEach(reply => {
                    newRelpySetContent += `<!-- reply -->
                        <div class="bg-white mt-1 mb-2 p-2 shadow rounded border-info border-left comment_reply">
                        <div class="d-flex">
                            <img class="rounded-circle" src="` + reply[0] + `" alt="user profile image" style="width:20px"/><span style="font-size:smaller">` + reply[1] + `</span>
                        </div>
                            <p class="text-muted">
                                <small>` + reply[2] + `</small>
                            </p>
                        </div>
                        </div>`
                })
                replies_set.innerHTML = newRelpySetContent
            }
        }
        xhr.send()
    }
    //hiding the comment replies
    hide_comment_replies.addEventListener("click", hidecomment_replies_hider)

    function hidecomment_replies_hider() {
        comment_replies.classList.add('d-none')
        comment_replies_triggler.classList.remove('d-none')
    }
    //displaying post commenting form
    reply_form_triggler.addEventListener("click", reply_form_displayer)

    function reply_form_displayer() {
        replyForm.classList.remove("d-none")
        replyForm.classList.add("d-flex")
        reply_form_triggler.parentNode.classList.remove("d-flex")
        reply_form_triggler.parentNode.classList.add("d-none")
    }
    //reply text form hundler functions
    reply_text_button.addEventListener("click", reply_text_sender)

    function reply_text_sender(e) {
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

        //displaying the new reply
        // comment_replies_displayer()
    }
})