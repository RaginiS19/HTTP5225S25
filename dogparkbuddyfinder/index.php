<?php
// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);



// Include DB connection
include 'db.php';


// SQL JOIN Query
$sql = "
  SELECT d.dog_name, d.breed, d.age, d.owner_name, d.photo_url, d.vaccinated,
         p.park_name, p.location
  FROM dog_profiles d
  JOIN parks p ON d.park_id = p.id
  ORDER BY d.dog_name;
";

$result = $conn->query($sql);


if (!$result) {
  die("❌ SQL Error: " . $conn->error);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dog Park Buddy Finder</title>
  <link rel="stylesheet" href="css/styles.css">
</head>
<body>

<h1>Dog Park Buddy Finder</h1>
<div class="container">
  <?php if ($result->num_rows > 0): ?>
    <?php while($dog = $result->fetch_assoc()): ?>
      <article class="dog-card">
        <img src="images/<?= htmlspecialchars($dog['photo_url']) ?>" alt="Photo of <?= htmlspecialchars($dog['dog_name']) ?>">
        <h2><?= htmlspecialchars($dog['dog_name']) ?></h2>
        <p><strong>Breed:</strong> <?= htmlspecialchars($dog['breed']) ?></p>
        <p><strong>Age:</strong> <?= $dog['age'] ?> years</p>
        <p><strong>Owner:</strong> <?= htmlspecialchars($dog['owner_name']) ?></p>
        <p><strong>Favourite Park:</strong> <?= htmlspecialchars($dog['park_name']) ?> (<?= htmlspecialchars($dog['location']) ?>)</p>
        <p><strong>Vaccinated:</strong>
          <?php if ($dog['vaccinated']): ?>
            <span class="vaccinated-yes">Yes</span>
          <?php else: ?>
            <span class="vaccinated-no">No</span>
          <?php endif; ?>
        </p>
      </article>
    <?php endwhile; ?>
  <?php else: ?>
    <p>No dog records found.</p>
  <?php endif; ?>
</div>

</body>
</html>

<?php $conn->close(); ?>
