//Registration
function checkForm() {

    var name = document.getElementById("name").value;
    var address = document.getElementById("address").value;
    var phone = document.getElementById("phone").value;
    var email = document.getElementById("email").value;
    var username = document.getElementById("username").value;
    var password_hash = document.getElementById("password_hash").value;


    var namePatt = /^[a-zA-Z\s]+$/;
    var addressPatt = /^[a-zA-Z0-9\s]+$/;
    var phonePatt = /^1[0-9]{10}$/; 
    var emailPatt = /^[a-zA-Z0-9]+@[a-zA-Z]+\.(com|cn)$/;
    var userPassPatt = /^[a-zA-Z0-9]{6,}$/;
    
    if (!namePatt.test(name)) {
        alert("Name is invalid. Only alphabetical letters and space allowed.");
        document.getElementById("name").select();
        return false;
    }

    if (!addressPatt.test(address)) {
        alert("Address is invalid. Only alphanumeric letters and space allowed.");
        document.getElementById("address").select();
        return false;
    }

    if (!phonePatt.test(phone)) {
        alert("Phone is invalid. Please enter a valid 11-digit China phone number.");
        document.getElementById("phone").select();
        return false;
    }

    if (!emailPatt.test(email)) {
        alert("Email is invalid. Must contain exactly one '@' and end with .cn or .com.");
        document.getElementById("email").select();
        return false;
    }

    if (!userPassPatt.test(username)) {
        alert("Username is invalid. Must consist of at least 6 alphanumeric characters.");
        document.getElementById("username").select();
        return false;
    }

    if (!userPassPatt.test(password_hash)) {
        alert("Password is invalid. Must consist of at least 6 alphanumeric characters.");
        document.getElementById("password_hash").select();
        return false;
    }

    return true; 
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