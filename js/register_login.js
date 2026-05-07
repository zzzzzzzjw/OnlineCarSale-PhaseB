//Registration
let regForm = document.getElementById('RegistrationForm');
if(regForm) {
    regForm.addEventListener('submit', function(event) {
        event.preventDefault(); 
        let user = document.querySelector('input[name="username"]').value;
        let pass = document.querySelector('input[name="password"]').value;
        let account = { username: user, password: pass };

        //Hello teacher, we learned the localStorage API from W3Schools to simulate database storage.
        localStorage.setItem('autoverve_account', JSON.stringify(account));

        alert("Registration successful! Please log in with your new account.");
        window.location.href = "login.html"; 
    });
}


//Login
let loginForm = document.getElementById('LoginForm');
if(loginForm) {
    loginForm.addEventListener('submit', function(event) {
        event.preventDefault(); 
        let loginUser = document.querySelector('input[name="username"]').value;
        let loginPass = document.querySelector('input[name="password"]').value;
        let savedData = localStorage.getItem('autoverve_account');
        
        if (savedData) {
            let savedAccount = JSON.parse(savedData);
            if (loginUser === savedAccount.username && loginPass === savedAccount.password) {
                localStorage.setItem('isLoggedIn', 'true');
                alert("Login successful! Welcome, Seller!.");
                window.location.href = "seller.html"; 
            } else {
                alert("Incorrect username or password. Please try again!");
            }
        } else {
            alert("Account not found. Please register first!");
        }
    });
}