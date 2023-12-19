closeNav.addEventListener("click", () => {
  if (isNavOpen) {
    nav.classList.remove("nav-opened");
    isNavOpen = false;
  } 
})

openNav.addEventListener("click", () => {
  if (!isNavOpen) {
    nav.classList.add("nav-opened");
    isNavOpen = true;
  }
})