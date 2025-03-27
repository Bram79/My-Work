<?php
$sql = "SELECT * FROM login";
$result = mysqli_query($conn, $sql);

ob_start();
?>


<div class="container">
  <div class="box">
    <h1>Account info</h1>
    <div class="form-group">
      <label for="name">Name</label>
      <input type="text" name="name" id="name" class="form-control"
        value="<?= htmlspecialchars($_SESSION["name"] ?? '') ?>" disabled>
    </div>

    <div class="form-group">
      <label for="born">Born</label>
      <input type="date" name="born" id="born" class="form-control"
        value="<?= htmlspecialchars($_SESSION["born"] ?? '') ?>" disabled>
    </div>

    <div class="form-group">
      <label for="email">E-mail</label>
      <input type="text" name="email" id="email" class="form-control"
        value="<?= htmlspecialchars($_SESSION["email"] ?? '') ?>" disabled>
    </div>

    <div class="form-group">
      <label for="password">password</label>
      <input type="password" name="password" id="password" class="form-control"
        value="<?= htmlspecialchars($_SESSION["password"] ?? '') ?>" disabled>
        <a href="?action=change_password">change password</a>
    </div>

  </div>
</div>


<?php
$content = ob_get_clean();
?>