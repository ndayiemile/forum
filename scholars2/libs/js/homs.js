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
//recycling php text ignored
let postHeadsAndContent = document.querySelectorAll('.similar-posts-col .text-content,.similar-posts-col-heading h3')
console.log(postHeadsAndContent.length)
postHeadsAndContent.forEach(element =>{
	let text = element.innerHTML
	// let newText = text.replace(/badfea475da23b23da23674c294c3fca/g,'<?php')
	// newText = newText.replace(/d26156de98aa0c35a880962700751e42/g,'$')
	let newText = text.replace(/524a50782178998021a88b8cd4c8dcd8/g,'<')
	newText = newText.replace(/cedf8da05466bb54708268b3c694a78f/g,'>')
	newText = newText.replace(/c3e97dd6e97fb5125688c97f36720cbe/g,'$')
	console.log(newText)
	element.textContent = newText
})
//NAV BAR
const basicAutocomplete = document.querySelector('#search-autocomplete');
const data = ['One', 'Two', 'Three', 'Four', 'Five'];
const dataFilter = (value) => {
  return data.filter((item) => {
    return item.toLowerCase().startsWith(value.toLowerCase());
  });
};

new mdb.Autocomplete(basicAutocomplete, {
  filter: dataFilter
});