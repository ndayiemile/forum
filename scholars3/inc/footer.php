<footer class="bg-white mb-0 text-center footer">
        <div><a href="" class="logo">scholars</a></div>
        <div>
            <p class="m-0">Copyrights 2021, Scholars.com</p>
        </div>
</footer>
<script>
  let paginationContainer = document.querySelector(".pagination");

  for (let i = 1; i <= <?php echo $num_of_pages ?>; i++) {
    //button pages form
      let page_button = document.createElement("form")
      page_button.setAttribute("action", "index.php")
      page_button.setAttribute("method", "post")
      let page = document.createElement("button")
      page.innerHTML = i;
      page.setAttribute("type", "submit")
      page.setAttribute("name", "page")
      page.setAttribute("class", "pagination-button")
      page.setAttribute("value", i)
      if (i == <?php echo $page?>) {
        page.style.opacity = 1;
      }
      page_button.appendChild(page)
      paginationContainer.appendChild(page_button);
  }
</script>