<?php
$sql = "SELECT * FROM login";
$result = mysqli_query($conn, $sql);

for ($x = 0; $x <= 1000; $x++) {
     $id = "$x";
  }

ob_start();
?>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<div class="box">
    <h1>Info of People</h1>
    <div class="form-control">
        <?php
        if ($_SESSION["isadmin"] == 1): ?>
            Welcome, admin &nbsp; <b><?= htmlspecialchars($_SESSION["name"]) ?></b>
        <?php elseif (!empty($_SESSION["name"])): ?>
            Welcome, &nbsp; <b><?= htmlspecialchars($_SESSION["name"]) ?></b>
        <?php endif; ?>
    </div>

    <div class="info">
        <table class="table_info">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Born</th>
                    <th>Email</th>
                    <?php if ($_SESSION["isadmin"] == 1): ?>
                        <th>Action</th>
                    <?php endif; ?>
                </tr>
            </thead>
            <tbody>
                <?php if (mysqli_num_rows($result) > 0): ?>
                    <?php while ($row = mysqli_fetch_assoc($result)): ?>
                        <tr>
                            <td><?php echo $id; ?></td>
                            <td><?= htmlspecialchars($row["name"]) ?></td>
                            <td><?= htmlspecialchars($row["born"]) ?></td>
                            <td><?= htmlspecialchars($row["email"]) ?></td>

                            <?php if ($_SESSION["isadmin"] == 1): ?>
                                <td>
                                    <a href="?action=update&id=<?= urlencode($row['id']) ?>">
                                        <i class="fa fa-edit edit"></i>
                                    </a>
                                    <a href="functions/delete.php?id=<?= urlencode($row['id']) ?>" onclick="return myFunction()">
                                        <i class="fa fa-trash-o trash"></i>
                                    </a>
                                </td>
                            <?php endif; ?>
                        </tr>
                    <?php endwhile; ?>
                <?php else: ?>
                    <td>could not be found</td>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <center>
        <br><b>Click here for logout </b><br>
        <input type="button" onclick="location.href='?action=login';" value="logout" class="btn" />
        <!-- <a href="?action=login"><button class="btn">logout</button></a> -->

    </center>
</div>

<script>
    function myFunction() {
        return confirm("Are you sure you want to delete the account?");
    }
</script>

<?php
$content = ob_get_clean();
?>