

// Submit the user registration information to the server
function submitUserRegistration() {
    // Package user inputs
    const username = document.getElementById('register_usernameInput').value;
    const phone = document.getElementById('register_nicknameInput').value;
    const password1 = document.getElementById('register_password1Input').value;
    const password2 = document.getElementById('register_password2Input').value;
    const data = {
        'username': username,
        'phone': phone,
        'password1': password1,
        'password2': password2
    };
        
    fetch('requests/userRegistration.php', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'content-type': 'application/json'
        }
    })
    .then(response => response.json()) //Response is a promise -> Set Response to response.json() --> Get the json only
    .then(data => response = data)//Sets data to what is returned. (message and success)
    .then(() => document.getElementById('register_message').textContent = response.message)
    .then(() => console.log(response.message))
    .then(() => {
        if (response.success) {
    
                //TODO
                //Go To Good Page, Close some stuff
                //Go to INFORMATION PAGE (and get all the info...)
        }
    });
}

function logInUser(){
    const username = document.getElementById('username').value;
    const password = document.getElementById('password').value;
    const data = {
        'username': username,
        'password': password
    };
    
    fetch('requests/userLogin.php', {
        method: 'POST',
        body: JSON.stringify(data),
        headers: {
            'content-type': 'application/json'
        }
    })
    .then(response => response.json())
    .then(data => response = data)
    .then(() => document.getElementById('register_message').textContent = response.message)
    .then(() => console.log(response.message))
    .then(() => {
        if (response.success) {
    
                //TODO
        }
    });
}

function updatePersonalInformation(){
    const first_name =document.getElementById('first_name');
    const last_name = document.getElementById('last_name');
    const age = document.getElementById('age');
    const street = document.getElementById('street');
    const city = document.getElementById('city');
    const state = document.getElementById('state');
    const travel_distance = document.getElementById('travel_distance');
    const email=document.getElementById('email');

    const data = {
        'first_name':first_name;
        
    }

}