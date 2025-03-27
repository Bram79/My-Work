<?php
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['submit'])) {
  $id = mysqli_real_escape_string($conn, $_POST['id']);
  $name = mysqli_real_escape_string($conn, $_POST['name']);
  $born = mysqli_real_escape_string($conn, $_POST['born']);
  $email = mysqli_real_escape_string($conn, $_POST['email']);

  $sql = "UPDATE login SET name='$name', born='$born', email='$email' WHERE id='$id'";

  if (mysqli_query($conn, $sql)) {
    header("Location: index.php?action=info");
    exit();
  } else {
    echo "Error: " . mysqli_error($conn);
  }
} else if (isset($_GET['id'])) {
  $id = mysqli_real_escape_string($conn, $_GET['id']);
  $sql = "SELECT * FROM login WHERE id = '$id'";
  $result = mysqli_query($conn, $sql);

  if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
  }
}


ob_start();

?>



  <div class="container">
    <form method="post" autocomplete="off">
      <h1>Update page</h1>
      <input type="hidden" name="id" value="<?php echo htmlspecialchars($row['id']); ?>">

      <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control"
          value="<?php echo htmlspecialchars($row['name']); ?>" required>
      </div>
      <div class="form-group">
        <label for="born">Born</label>
        <input type="date" name="born" id="born" class="form-control"
          value="<?php echo htmlspecialchars($row['born']); ?>" required>
      </div>
      <div class="form-group">
        <label for="email">E-mail</label>
        <input type="text" name="email" id="email" class="form-control"
          value="<?php echo htmlspecialchars($row['email']); ?>" required>
      </div>
      <input type="submit" name="submit" class="btn" value="Edit">
    </form>
  </div>

<?php
$content = ob_get_clean();
?>