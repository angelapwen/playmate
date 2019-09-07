

// Submit the user registration information to the server
function submitUserRegistration() {
    // Package user inputs
    const username = document.getElementById("register_usernameInput").value;
    const phone = document.getElementById("register_nicknameInput").value;
    const password1 = document.getElementById("register_password1Input").value;
    const password2 = document.getElementById("register_password2Input").value;
    const data = {
        "username": username,
        "phone": phone,
        "password1": password1,
        "password2": password2
    };
        
    fetch("requests/userRegistration.php", {
        method: "POST",
        body: JSON.stringify(data),
        headers: {
            "content-type": "application/json"
        }
    })
    .then(response => response.json())
    .then(data => response = data)
    .then(() => document.getElementById("register_message").textContent = response.message)
    .then(() => console.log(response.message))
    .then(() => {
        if (response.success) {
    
                //TODO
        }
    });
}

function logInUser(){
    const username = document.getElementById("register_usernameInput").value;
    const password1 = document.getElementById("register_password1Input").value;
    const data = {
        "username": username,
        'password': password
    };