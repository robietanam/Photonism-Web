const form = document.querySelector(".signup-tag form"),
signupBtn = form.querySelector(".button input"),
textError = form.querySelector(".error-text")

form.onsubmit = (e) => {
    e.preventDefault()
    
}

signupBtn.onclick = () => {
    // AJAX
    console.log("Test Apakah Bisa")
    
    let xhr = new XMLHttpRequest();
    xhr.open("POST", "php/signup.php", true)
    xhr.onload = () => {
        console.log("Test masuk onload")
        if (xhr.readyState === XMLHttpRequest.DONE){
            if (xhr.status === 200){
                let data = xhr.response;
                console.log("respon data",data);
                if(data == "success"){
                    location.href = "users.php"
                }else{
                    console.log("masuk ke else", data)
                    textError.textContent = data;
                    textError.style.display = "block";
                }
            }
        }
    }

    // send data ke php dengan ajax
    let formData = new FormData(form); // buat formdata object
    xhr.send(formData);
}