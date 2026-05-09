function goToDetail(carId) {
    window.location.href = 'detail.php?id=' + carId;
}

function loadRecommendations() {
    if (!document.getElementById('recommendContainer')) return;
    
    fetch('search.php?model=')
        .then(response => response.json())
        .then(data => {
            var html = '';
            for (var i = 0; i < data.length; i++) {
                html += '<div class="car-card" onclick="goToDetail(' + data[i].car_id + ')">';
                html += '<img src="' + data[i].image_url + '" alt="' + data[i].model + '">';
                html += '<h3>' + data[i].model + ' - ' + data[i].year + '</h3>';
                html += '<p>¥' + Number(data[i].price).toLocaleString() + '</p>';
                html += '</div>';
            }
            document.getElementById('recommendContainer').innerHTML = html;
        });
}

function doSearch() {
    var modelInput = document.getElementById('model').value;
    var yearInput = document.getElementById('year').value;
    var colourInput = document.getElementById('colour').value;
    var priceInput = document.getElementById('price').value;

    if (!modelInput && !yearInput && !colourInput && !priceInput) {
        document.getElementById('resultsContainer').innerHTML = '<p style="color: red; text-align: center;">Please enter at least one search condition.</p>';
        return;
    }

    var url = 'search.php?model=' + encodeURIComponent(modelInput) 
            + '&year=' + encodeURIComponent(yearInput)
            + '&colour=' + encodeURIComponent(colourInput)
            + '&price=' + encodeURIComponent(priceInput);

    fetch(url)
        .then(response => response.json())
        .then(data => {
            if (data.length === 0) {
                document.getElementById('resultsContainer').innerHTML = '<p style="color: gray; text-align: center;">No cars found.</p>';
            } else {
                var html = '';
                for (var i = 0; i < data.length; i++) {
                    html += '<div class="car-card" onclick="goToDetail(' + data[i].car_id + ')">';
                    html += '<img src="' + data[i].image_url + '" alt="' + data[i].model + '">';
                    html += '<h3>' + data[i].model + ' - ' + data[i].year + '</h3>';
                    html += '<p>¥' + Number(data[i].price).toLocaleString() + '</p>';
                    html += '</div>';
                }
                document.getElementById('resultsContainer').innerHTML = html;
            }
        });
}
