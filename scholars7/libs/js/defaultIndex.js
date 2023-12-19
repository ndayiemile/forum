let newPostForm = document.querySelector(".new-topic");
let newPostToggleBtn = document.querySelector(".start-new-topic");
let isOpen = false;

// Toggling the NEW POST form

newPostToggleBtn.addEventListener("click", () => {
    if (!isOpen) {
        newPostForm.style.display = "grid";
        isOpen = !isOpen;
    } else {
        newPostForm.style.display = "none";
        isOpen = !isOpen;
    }
})