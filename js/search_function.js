var storedCars = localStorage.getItem('carsData');// localStorage self-learned
if (storedCars) {
    window.cars = JSON.parse(storedCars);
} else {
    window.cars = [
        { model: "Tesla Model S", year: 2023, colour: "Red", price: 350000, location: "Beijing", image: "../images/TESLA_S.png", description: "Electric luxury sedan, autopilot included." },
        { model: "SUV", year: 2022, colour: "Grey", price: 250000, location: "Shanghai", image: "../images/SUV-grey.jpg", description: "Spacious family SUV, low mileage." },
        { model: "BMW i8", year: 2023, colour: "Blue", price: 450000, location: "Beijing", image: "../images/BMW-blue.jpg", description: "Hybrid sports car, excellent condition." },
        { model: "BMW", year: 2025, colour: "White", price: 200000, location: "Shenzhen", image: "../images/BMW-white.jpg", description: "Luxury sedan, fully loaded." },
        { model: "SUV", year: 2024, colour: "Red", price: 400000, location: "Beijing", image: "../images/SUV-red.jpg", description: "Premium SUV, panoramic roof." },
        { model: "Xiaomi", year: 2023, colour: "Grey", price: 350000, location: "Beijing", image: "../images/xiaomi-grey.jpg", description: "Smart electric car, tech features." }
    ];
    localStorage.setItem('carsData', JSON.stringify(window.cars));// localStorage self-learned
}

function getQueryParam(param) {
    var url = window.location.href;
    var regex = new RegExp('[?&]' + param + '=([^&#]*)');
    var results = regex.exec(url);
    if (results == null) return null;
    return decodeURIComponent(results[1]);
}

function goToDetail(model, year) {
    window.location.href = 'detail.html?model=' + encodeURIComponent(model) + '&year=' + year;
}

function loadRecommendations() {
    if (!document.getElementById('recommendContainer')) return;
    var html = '';
    for (var i = 0; i < window.cars.length; i++) {
        html += '<div class="car-card" onclick="goToDetail(\'' + window.cars[i].model + '\', ' + window.cars[i].year + ')">';
        html += '<img src="' + window.cars[i].image + '" alt="' + window.cars[i].model + '">';
        html += '<h3>' + window.cars[i].model + ' - ' + window.cars[i].year + '</h3>';
        html += '<p>¥' + window.cars[i].price.toLocaleString() + '</p>';
        html += '</div>';
    }
    document.getElementById('recommendContainer').innerHTML = html;
}

function doSearch() {
    var modelInput = document.getElementById('model').value.toLowerCase();
    var yearInput = document.getElementById('year').value;
    var colourInput = document.getElementById('colour').value.toLowerCase();
    var priceInput = document.getElementById('price').value;

    if (!modelInput && !yearInput && !colourInput && !priceInput) {
        document.getElementById('resultsContainer').innerHTML = '<p style="color: red; text-align: center;">Please enter at least one search condition.</p>';
        return;
    }

    var results = window.cars.filter(function(car) {
        var match = true;
        if (modelInput && !car.model.toLowerCase().includes(modelInput)) match = false;
        if (yearInput && car.year != yearInput) match = false;
        if (colourInput && car.colour.toLowerCase() !== colourInput) match = false;
        if (priceInput && car.price > parseInt(priceInput)) match = false;
        return match;
    });

    if (results.length === 0) {
        document.getElementById('resultsContainer').innerHTML = '<p style="color: gray; text-align: center;">No cars found. Try different keywords.</p>';
    } else {
        var html = '';
        for (var i = 0; i < results.length; i++) {
            html += '<div class="car-card" onclick="goToDetail(\'' + results[i].model + '\', ' + results[i].year + ')">';
            html += '<img src="' + results[i].image + '" alt="' + results[i].model + '">';
            html += '<h3>' + results[i].model + ' - ' + results[i].year + '</h3>';
            html += '<p>¥' + results[i].price.toLocaleString() + '</p>';
            html += '</div>';
        }
        document.getElementById('resultsContainer').innerHTML = html;
    }
}

function findCar(modelParam, yearParam) {
    if (!modelParam && !yearParam) return null;
    
    return window.cars.find(function(car) {
        var modelMatch = true;
        var yearMatch = true;
        
        if (modelParam) {
            modelMatch = car.model.toLowerCase() === modelParam.toLowerCase();
        }
        if (yearParam) {
            yearMatch = car.year == yearParam;
        }
        return modelMatch && yearMatch;
    });
}

function updateDetailPage() {
    if (!document.getElementById('modelValue')) return;
    
    var modelParam = getQueryParam('model');
    var yearParam = getQueryParam('year');
    
    var car = findCar(modelParam, yearParam);
    
    if (car) {
        document.getElementById('modelValue').innerHTML = car.model;
        document.getElementById('colourValue').innerHTML = car.colour;
        document.getElementById('yearValue').innerHTML = car.year;
        document.getElementById('locationValue').innerHTML = car.location;
        document.getElementById('priceValue').innerHTML = '¥' + car.price.toLocaleString();
        document.getElementById('descriptionValue').innerHTML = car.description;
        if (document.getElementById('detailImage')) {
            document.getElementById('detailImage').src = car.image;
            document.getElementById('detailImage').alt = car.model;
        }
    } else {
        if (modelParam) {
            document.getElementById('modelValue').innerHTML = modelParam;
        }
        if (yearParam) {
            document.getElementById('yearValue').innerHTML = yearParam;
        }
        document.getElementById('descriptionValue').innerHTML = "No detailed information available for this vehicle.";
    }
}