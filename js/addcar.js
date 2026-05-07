var form = document.getElementById('AddCarForm');
var colourInput = document.querySelector('input[name="colour"]');
var modelInput = document.querySelector('input[name="model"]');
var yearInput = document.querySelector('input[name="year"]');
var locationInput = document.querySelector('input[name="location"]');
var priceInput = document.querySelector('input[name="price"]');
var imageInput = document.querySelector('input[name="image"]');

var validations = {
    colour: { regex: /^[a-zA-Z]+$/, message: "Colour must contain only letters." },
    model: { regex: /^[a-zA-Z0-9\s]+$/, message: "Model must contain only letters, numbers and spaces." },
    year: { regex: /^[0-9]{4}$/, message: "Year must be a valid 4-digit number (e.g. 2023)." },
    location: { regex: /^[a-zA-Z\s]+$/, message: "Location must contain only letters and spaces." },
    price: { regex: /^[0-9]+$/, message: "Price must be a valid number (e.g. 350000)." },
    image: { regex: /^.*$/, message: "" } 
};

function showError(input, message) {
    var parent = input.parentElement;
    var existingError = parent.querySelector('.error-message');
    if (existingError) existingError.remove();
    
    if (message) {
        var error = document.createElement('div');
        error.className = 'error-message';
        error.style.color = 'red';
        error.style.fontSize = '10pt';
        error.style.marginTop = '5px';
        error.innerHTML = message;
        parent.appendChild(error);
    }
}

function validateField(input, fieldName) {
    var value = input.value.trim();
    var rule = validations[fieldName];
    
    if (!rule) return true;
    
    if (fieldName !== 'image' && value === "") {
        showError(input, "This field is required.");
        return false;
    }
    
    if (fieldName === 'image' && value === "") {
        showError(input, "");
        return true;
    }
    
    if (rule.regex.test(value)) {
        showError(input, "");
        return true;
    } else {
        showError(input, rule.message);
        return false;
    }
}

if (colourInput) colourInput.addEventListener('input', function() { validateField(this, 'colour'); });
if (modelInput) modelInput.addEventListener('input', function() { validateField(this, 'model'); });
if (yearInput) yearInput.addEventListener('input', function() { validateField(this, 'year'); });
if (locationInput) locationInput.addEventListener('input', function() { validateField(this, 'location'); });
if (priceInput) priceInput.addEventListener('input', function() { validateField(this, 'price'); });
if (imageInput) imageInput.addEventListener('input', function() { validateField(this, 'image'); });

if (form) {
    form.addEventListener('submit', function(event) {
        var isValid = true;
        
        if (!validateField(colourInput, 'colour')) isValid = false;
        if (!validateField(modelInput, 'model')) isValid = false;
        if (!validateField(yearInput, 'year')) isValid = false;
        if (!validateField(locationInput, 'location')) isValid = false;
        if (!validateField(priceInput, 'price')) isValid = false;
        if (!validateField(imageInput, 'image')) isValid = false;
        
        if (!isValid) {
            event.preventDefault();
            alert("Please fix the errors in the form before submitting.");
        } else {
            if (window.cars) {
                var newCar = {
                    model: modelInput.value.trim(),
                    year: parseInt(yearInput.value.trim()),
                    colour: colourInput.value.trim(),
                    price: parseInt(priceInput.value.trim()),
                    location: locationInput.value.trim(),
                    image: imageInput.value.trim() || "../images/logo.png",
                    description: "Newly listed vehicle."
                };
                window.cars.push(newCar);
                localStorage.setItem('carsData', JSON.stringify(window.cars));
                alert("Car added successfully! You can now search for it.");
                window.location.href = "../buyer/search.html"
            } else {
                alert("Car added successfully! (Note: Search database not available)");
                window.location.href = "../buyer/search.html"
            }
            form.reset();
        }
    });
}