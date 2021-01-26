<h1>Пользователи из базы</h1>
<?php
foreach ($model as $row) {
    echo "<div><h2>$row[name]</h2></div>";
}
?>
