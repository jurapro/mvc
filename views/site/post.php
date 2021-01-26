<h1>Статьи из базы</h1>

<?php
foreach ($model as $row) {
    echo "<div><h2>$row[title]</h2><p>$row[text]</p></div>";
}
?>
