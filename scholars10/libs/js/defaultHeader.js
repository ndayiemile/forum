let search_field = document.getElementById("search_input")
let suggestions_dropdown = document.getElementById("search_dropdown")
let newPostForm = document.querySelector(".new-topic")
let newPostToggleBtn = document.querySelector(".start-new-topic")
let newPost_isOpen = false;
//livesearch nav
search_field.onkeyup = () => {
        let text = search_field.value
        let xhr = new XMLHttpRequest();
        xhr.open('GET', 'inc/search_engine.php?search_input=' + text, true)
        xhr.onload = function() {
            if (this.status == 200 && this.readyState == 4) {
                let newSuggestions = ""
                let suggestions_set = JSON.parse(this.responseText)
                suggestions_set.forEach(object => {
                    newSuggestions += `<button  type="submit" name="post_request" value="` + object[0] + `" class="dropdown-item mx-0 my-1 p-0 text-muted">` + object[1] + `</button>`
                })
                suggestions_dropdown.innerHTML = newSuggestions
            }
        }
        xhr.send()
    }
    // Toggling the NEW POST form

newPostToggleBtn.addEventListener("click", () => {
    if (!newPost_isOpen) {
        newPostForm.style.display = "grid";
        newPost_isOpen = !newPost_isOpen;
    } else {
        newPostForm.style.display = "none";
        newPost_isOpen = !newPost_isOpen;
    }
})