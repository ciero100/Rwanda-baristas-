<?php
include "config/db.php";

if (!isset($_GET['id'])) {
    die("Barista not found.");
}

$id = (int)$_GET['id'];

$barista = mysqli_query($conn, "SELECT * FROM baristas WHERE id=$id");

if (mysqli_num_rows($barista) != 1) {
    die("Barista not found.");
}

$b = mysqli_fetch_assoc($barista);
?>

<!DOCTYPE html>
<html>
<head>
    <title><?php echo $b['full_name']; ?> | Barista Profile</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<h2><?php echo $b['full_name']; ?></h2>

<p><strong>Location:</strong> <?php echo $b['location']; ?></p>
<p><strong>Skills:</strong> <?php echo $b['skills']; ?></p>
<p><strong>Experience:</strong> <?php echo $b['experience']; ?></p>

<h3>📄 CV</h3>
<?php
$cv = mysqli_query($conn, "SELECT * FROM cvs WHERE barista_id=$id LIMIT 1");
if (mysqli_num_rows($cv) == 1) {
    $c = mysqli_fetch_assoc($cv);
    echo "<a href='uploads/cvs/{$c['file']}' target='_blank'>Download CV</a>";
} else {
    echo "<p>No CV uploaded.</p>";
}
?>

<h3>☕ Coffee Art</h3>
<div>
<?php
$arts = mysqli_query($conn, "SELECT * FROM arts WHERE barista_id=$id");
if (mysqli_num_rows($arts) > 0) {
    while ($a = mysqli_fetch_assoc($arts)) {
        echo "
        <div style='display:inline-block;margin:10px'>
            <img src='uploads/arts/{$a['image']}' width='150'><br>
            <small>{$a['description']}</small>
        </div>
        ";
    }
} else {
    echo "<p>No art uploaded.</p>";
}
?>
</div>
<h3>📞 Contact Barista</h3>

<?php
$phone = preg_replace('/\D/', '', $b['phone']); // clean phone
$whatsapp = (strlen($phone) == 10) ? "25".$phone : $phone;
?>

<a href="tel:<?php echo $b['phone']; ?>" 
   style="display:inline-block;padding:10px;background:#444;color:#fff;text-decoration:none;border-radius:5px;margin-right:10px;">
   📞 Call
</a>

<a href="https://wa.me/<?php echo $whatsapp; ?>" target="_blank"
   style="display:inline-block;padding:10px;background:#25D366;color:#fff;text-decoration:none;border-radius:5px;">
   💬 WhatsApp
</a>
<a href="search.php">⬅ Back to Search</a>

</body>
</html>
