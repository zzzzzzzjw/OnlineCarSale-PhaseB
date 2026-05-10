<?php
require_once '../config/db_connect.php';


$model = $_GET['model'] ?? '';
$year = $_GET['year'] ?? '';
$colour = $_GET['colour'] ?? '';
$price = $_GET['price'] ?? '';

if ($model != "" || $year != "" || $colour != "" || $price != "") {

    $sql = "SELECT car_id, model, colour, year, location, price, image_url, description FROM cars WHERE 1=1";
    $params = [];
    $types = "";

    if ($model != "") {
        $sql .= " AND model LIKE ?";
        $params[] = "%$model%";
        $types .= "s";
    }
    if ($year != "") {
        $sql .= " AND year = ?";
        $params[] = $year;
        $types .= "s";
    }

    $stmt = mysqli_prepare($connection, $sql);
    if (count($params) > 0) {
        mysqli_stmt_bind_param($stmt, $types, ...$params);
    }
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    $cars = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $cars[] = $row;
    }

    header('Content-Type: application/json');
    echo json_encode($cars);
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Search Cars - AutoMarket</title>
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/buyer_style.css">
</head>
<body class="buyer-page">

<div class="navbar">
    <div class="container clearfix">
        <div class="logo">
            <a href="../index.php">
                <img src="../images/logo.png" alt="AutoMarket Logo">
            </a>
        </div>
        <ul class="nav-links">
            <li><a href="../index.php">Home</a></li>
            <li><a href="search.php">Search Cars</a></li>
            <li><a href="../seller/register.php">Register</a></li>
            <li><a href="../seller/login.php">Login</a></li>
            <li><a href="../seller/add-car.php">Add Car</a></li>
        </ul>
    </div>
</div>

<div style="clear: both;"></div>

<div class="hero">
    <div class="hero-text">SEARCH</div>
</div>

<div class="filter-bar">
    <input type="text" id="model" placeholder="Model e.g. Tesla">
    <input type="text" id="year" placeholder="Year e.g. 2023">
    <input type="text" id="colour" placeholder="Colour e.g. Red">
    <input type="text" id="price" placeholder="Price e.g. 300000">
    <button onclick="doSearch()">Search</button>
</div>

<div class="recommend-section" id="searchResults">
    <div class="recommend-title">Search Results</div>
    <div id="resultsContainer">
        <p style="color: gray; text-align: center;">Please enter at least one search condition.</p>
    </div>
</div>

<div class="recommend-section">
    <div class="recommend-title">Recommended for You</div>
    <div id="recommendContainer">

    </div>
</div>

<script src="../js/search_function.js"></script>
<script>
    loadRecommendations();
    
</script>

</body>
</html>
