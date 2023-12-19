let profile_update_input = document.getElementById("profile_update_input")
let profile_update_button = document.getElementById("profile_update_button")
let posts_history_table_body = document.getElementById("posts_history_table_body")
let form_profile_picture = document.getElementById("form_profile_picture")
let saveProfile_button = document.getElementById("saveProfile")
let profile_update_input_display = true

//profile updates
profile_update_button.onclick = (e) => {
        e.preventDefault()
        let new_profile_image = profile_update_input.value
        profile_update_input_display = !profile_update_input_display
            // toogling the input button
        if (profile_update_input_display) {
            profile_update_input.classList.add("d-none")
        } else {
            profile_update_input.classList.remove("d-none")

        }
        // updating the profile image    
        if (new_profile_image.length > 0) {
            // let file = new File(profile_update_input, true)
            // console.log(file)
            // let xhr = new XMLHttpRequest();
            // let profile_image = "profile_image=" + new_profile_image;
            // xhr.open('POST', 'userProfiles.php', true);
            // xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            // xhr.onload = function() {
            //     if (this.status == 200) {
            //         console.log(this.responseText)
            //         console.log("this.responseText")
            //     }
            // }
            // xhr.send(profile_image)
            form_profile_picture.submit()
        } else {
            if (profile_update_input_display) {
                alert("no file choosen")
            }
        }
    }
    // loading the posts data
let posts_xhr = new XMLHttpRequest();
let posts_sort_order = "date"
posts_xhr.open('GET', 'userProfiles.php?current_user_posts_sort=' + posts_sort_order, true)
posts_xhr.onload = function() {
    if (this.status == 200 && this.readyState == 4) {
        // console.log(this.responseText)
        let newPostsSetContent = ""
        let Posts_feed = JSON.parse(this.responseText)
        Posts_feed.forEach(post => {
            newPostsSetContent += `<!-- post -->
            <tr class="text-center">
                <td style="white-space: nowrap;
                    max-width: 200px;
                    overflow: hidden;
                    text-overflow: ellipsis;
                    text-transform:capitalize;"
                    class="text-left">` + post[1] + `</td>
                <td>` + post[2] + `</td>
                <td>` + post[3] + `</td>
                <td>` + post[4] + `</td>
                <td>` + post[5] + `</td>
                <td class="d-flex justify-content-center"><button class="btn btn-outline-danger mx-1">er</button>
                    <button class="btn btn-outline-warning  mx-1">er</button>
                </td>
            </tr>`
        })
        posts_history_table_body.innerHTML = newPostsSetContent;
    }
}
posts_xhr.send()

// editing the profile
saveProfile_button.onclick = (e) => {
        e.preventDefault()
        let newUsername_input = document.getElementById("new-username")
        let newPassworde_input = document.getElementById("new-password")
        let previousPassworde_input = document.getElementById("previous-password")
        let confirm_newPassworde_input = document.getElementById("confirm-password")
        let newUsername = newUsername_input.value
        let newPassword = newPassworde_input.value
        let previousPassword = previousPassworde_input.value
        let confirm_newPassword = confirm_newPassworde_input.value
        if (confirm_newPassword === newPassword) //password validator
        {
            let updateType = "all"
            if (!((newPassword.length > 0) && (newUsername.length > 0))) {
                if (newPassword.length > 0) {
                    updateType = "password"
                } else if (newUsername.length > 0) {
                    updateType = "username"
                } else {
                    updateType = "none"
                }
            }
            let newProfile = [newUsername, previousPassword, newPassword, updateType]
            let xhr = new XMLHttpRequest();

            newProfile = JSON.stringify(newProfile)
            xhr.open('GET', 'userProfiles.php?update_profile=' + newProfile, true)
            xhr.onload = function() {
                if (this.status == 200 && this.readyState == 4) {
                    alert(this.responseText)
                }
            }
            xhr.send()
        } else {
            alert("password don't much")
        }
    }
    // manage account