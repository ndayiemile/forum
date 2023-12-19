let search_field = document.getElementById("search_input")
let suggestions_dropdown = document.getElementById("search_dropdown")
search_field.onkeyup = () => {
    let text = search_field.value
    let xhr = new XMLHttpRequest();
    xhr.open('GET', 'inc/search_engine.php?search_input=' + text, true)
    xhr.onload = function() {
        if (this.status == 200 && this.readyState == 4) {
            suggestions_dropdown.innerHTML = "";
            let suggestions = JSON.parse(this.responseText)
            suggestions.forEach(object => {
                let child_suggestion = document.createElement("p")
                child_suggestion.setAttribute("class", "dropdown-item mx-0 my-1 p-0 text-muted")
                child_suggestion.innerText = object[1];
                suggestions_dropdown.appendChild(child_suggestion);
            });
        }
    }
    xhr.send()
}