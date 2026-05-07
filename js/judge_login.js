if (localStorage.getItem('isLoggedIn') !== 'true') {
    alert("This page requires seller access. Please log in first!");
    window.location.href = "login.html"; 
}