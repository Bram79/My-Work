<?php
$conn = mysqli_connect("localhost", "root", "", "voetbal");
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $voornaam = mysqli_real_escape_string($conn, $_POST['voornaam']);
  $achternaam = mysqli_real_escape_string($conn, $_POST['achternaam']);
  $geboortedatum = mysqli_real_escape_string($conn, $_POST['geboortedatum']);

  $sql = "UPDATE voetballers SET voornaam='$voornaam', achternaam='$achternaam', geboortedatum='$geboortedatum' WHERE id='$id'";

  if (mysqli_query($conn, $sql)) {
    header("Location: index.php");
    exit();
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else if (isset($_GET['id'])) {
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM voetballers WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  }
}

?>


<link rel="stylesheet" href="voetbal.css">
<div class="wrapper">
  <div class="nav">
    <a href="index.php">Home</a>
    <a href="toevoegen.php">Toevoegen</a>
  </div>
  <center>
    <form method="post">
      <h1>Aanpassen</h1>
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

      <div class="form-group">
        <label for="voornaam">voornaam</label>
        <input type="text" name="voornaam" id="voornaam" class="form-control"
          value="<?php echo htmlspecialchars($row['voornaam']); ?>" required>
      </div>

      <div class="form-group">
        <label for="achternaam">achternaam</label>
        <input type="text" name="achternaam" id="achternaam" class="form-control"
          value="<?php echo htmlspecialchars($row['achternaam']); ?>" required>
      </div>

      <div class="form-group">
        <label for="geboortedatum">geboortedatum</label>
        <input type="date" name="geboortedatum" id="geboortedatum" class="form-control"
          value="<?php echo htmlspecialchars($row['geboortedatum']); ?>" required>
      </div>

      <input type="submit" name="submit" class="btn" value="Edit">
    </form>
</div>
</center>