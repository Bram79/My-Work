<?php
ob_start();
$sql = "SELECT * FROM artist";
$result = mysqli_query($conn, $sql);

?>
<div class="info">
    <table class="table_info">
        <thead>
            <tr>
                <th>naam</th>
                <th>land</th>
            </tr>
        </thead>
        <tbody>
            <?php if (mysqli_num_rows($result) > 0): ?>
                <?php while ($row = mysqli_fetch_assoc($result)): ?>
                    <tr>
                        <td><?= htmlspecialchars($row["name"]) ?></td>
                        <td><?= htmlspecialchars($row["country"]) ?></td>
                        </td>
                    </tr>
                </tbody>
        </div>
    <?php endwhile; ?>
<?php endif; ?>


<?php $content = ob_get_clean(); ?>