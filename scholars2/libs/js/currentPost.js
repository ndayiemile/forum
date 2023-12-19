//recycling php text ignored
let postHeadsAndContent = document.querySelectorAll('.post-title h3,.post-title p')
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