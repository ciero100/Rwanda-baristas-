<?php
include "config/db.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Find Baristas | Rwandan Baristas</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2>Find a Barista ☕</h2>

<form method="GET">
    <input type="text" name="keyword" placeholder="Skill or name (Latte, Espresso...)">
    <input type="text" name="location" placeholder="Location (Kigali, Huye...)">
    <button type="submit">Search</button>
</form>

<hr>

<?php
$where = [];

if (!empty($_GET['keyword'])) {
    $k = mysqli_real_escape_string($conn, $_GET['keyword']);
    $where[] = "(full_name LIKE '%$k%' OR skills LIKE '%$k%')";
}

if (!empty($_GET['location'])) {
    $l = mysqli_real_escape_string($conn, $_GET['location']);
    $where[] = "location LIKE '%$l%'";
}

$sql = "SELECT * FROM baristas";

if ($where) {
    $sql .= " WHERE " . implode(" AND ", $where);
}

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    while ($b = mysqli_fetch_assoc($result)) {
        echo "
        <div style='background:#fff;padding:15px;margin:15px 0;border-radius:6px'>
            <h3>{$b['full_name']}</h3>
            <p><strong>Location:</strong> {$b['location']}</p>
            <p><strong>Skills:</strong> {$b['skills']}</p>
            <a href='profile.php?id={$b['id']}'>View Profile</a>
        </div>
        ";
    }
} else {
    echo "<p>No baristas found.</p>";
}
?>

</body>
</html>
