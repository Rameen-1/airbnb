<?php include 'db.php'; ?>
 
<!DOCTYPE html>
<html>
<head>
  <title>Search Results - Midnight BnB</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  <header>🔍 Your Midnight Stays</header>
 
  <div class="filters">
    <form method="GET">
      <label>Sort by:</label>
      <select name="sort">
        <option value="low">Price: Low to High</option>
        <option value="high">Price: High to Low</option>
        <option value="top">Top Rated</option>
      </select>
      <button type="submit">Apply</button>
    </form>
  </div>
 
  <?php
  $location = $_GET['location'] ?? '';
  $sort = $_GET['sort'] ?? '';
 
  $query = "SELECT * FROM properties WHERE location LIKE ?";
  if ($sort == 'low') $query .= " ORDER BY price ASC";
  elseif ($sort == 'high') $query .= " ORDER BY price DESC";
  elseif ($sort == 'top') $query .= " ORDER BY rating DESC";
 
  $stmt = $conn->prepare($query);
  $stmt->execute(["%$location%"]);
  $properties = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
  if ($properties) {
    foreach ($properties as $prop) {
      echo "<div class='property-card'>
              <img src='images/{$prop['image']}' alt='Property Image'>
              <h2>{$prop['title']}</h2>
              <p>Location: {$prop['location']}</p>
              <p>Price: \${$prop['price']}/night</p>
              <p>Rating: ⭐ " . number_format($prop['rating'], 1) . "</p>
              <a href='book.php?pid={$prop['id']}'>Book Now</a>
            </div>";
    }
  } else {
    echo "<div class='booking-box'>😢 No properties found for '$location'</div>";
  }
  ?>
</body>
</html>
 
 
